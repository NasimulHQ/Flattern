<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\Client;
use App\Feature;
use App\Mail\AdminMail;
use App\Mail\UserMail;
use App\Portfilo;
use App\PortfiloCategory;
use App\Slider;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $features = Feature::orderBy('id','desc')
            ->limit(4)
            ->get();
        $portfilos = Portfilo::orderBy('id','desc')
            ->limit(8)
            ->get();
        $clients = Client::orderBy('id', 'desc')
            ->get();
        return view('front.index', [
            'sliders'=>$sliders,
            'fs'=>$features,
            'portfilos'=>$portfilos,
            'clients'=>$clients
        ]);
    }

    public function Actioncontact()
    {
        return view('front.contact');
    }

    public function Actionportfolio()
    {
        $categories = PortfiloCategory::all();
        $portfilos = Portfilo::orderBy('id', 'desc')
            ->with('portfilocategory')
            ->get();
         return view('front.portfolio', [
             'categories'=>$categories,
             'portfilos'=>$portfilos,
         ]);
    }

    public function Actionblogleft()
    {
        $categories = BlogCategory::orderBy('title', 'asc')
            ->get();

        $latest_posts = Blog::orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $tags =Tag::orderBy('title', 'asc')
            ->get();

        $blogs = Blog::orderBy('id', 'desc')
            ->with(['category', 'user'])
            ->paginate(4);

        $blog_header = 'All Blog';

        $input_category = Input::get('category');

        if ($input_category)
        {
            $blogs = Blog::whereHas('category', function ($q) use ($input_category){
                $q->where('slug', $input_category);
            })
                ->orderBy('id', 'desc')
                ->with(['category', 'user'])
                ->paginate(4);

            $blog_header = $input_category;
        }

        $input_tag = Input::get('tag');

        if ($input_tag)
        {
            $blogs = Blog::whereHas('tags', function ($q) use ($input_tag){
                $q->where('slug', $input_tag);
            })
                ->orderBy('id', 'desc')
                ->with(['category', 'user'])
                ->paginate(4);
            $blog_header = $input_tag;
        }

        $input_user = Input::get('user');

        if ($input_user)
        {
            $blogs = Blog::where('user_id', $input_user)
                ->orderBy('id', 'desc')
                ->with(['category', 'user'])
                ->paginate(4);

            $user =  User::find($input_user);
            $blog_header = $user->name;
        }

        $search = Input::get('search');

        if ($search)
        {
            $blogs = Blog::where('title',  'LIKE', '%'.$search.'%')
                ->orderBy('id', 'desc')
                ->with(['category', 'user'])
                ->paginate(4);
            $blog_header = 'Search result';
        }

        return view('front.blogleft', [
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
            'tags'=>$tags,
            'blog_header'=>$blog_header,
            'blogs'=>$blogs
        ]);
    }

    public function Actionpostleft($slug)
    {
        $categories = BlogCategory::orderBy('title', 'asc')
            ->get();

        $latest_posts = Blog::orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $tags =Tag::orderBy('title', 'asc')
            ->get();

        $blogs = Blog::orderBy('id', 'desc')
            ->with(['category', 'user'])
            ->paginate(4);
        $blog = Blog::where('slug', $slug)
            ->with(['user', 'category', 'tags'])
            ->first();
        $blog_header = $blog->title;

        return view('front.postleft',[
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
            'tags'=>$tags,
            'blog_header'=>$blog_header,
            'blog'=>$blog
        ]);
    }

    public function ActionportfolioDetails($slug)
    {
        $portfilo = Portfilo::where('slug', $slug)
            ->with(['client', 'portfilocategory'])
            ->first();
        return view('front.portfilloDetails', [
            'portfilo'=>$portfilo
        ]);
    }

    public function actionSearch(Request $request)
    {
        return Blog::where('title',  'LIKE', '%'.$request->q.'%')->get();
    }

    public function actionSendMail(Request $request)
    {
        $name = $request->name;
        $subject = $request->subject;
        $message = $request->message;
        $email = $request->email;

        Mail::to('admin@example.com')
            ->send(new AdminMail($name, $subject, $message, $email));

        Mail::to($email)->send(new UserMail($name));

        return redirect()->back()->with('message', 'Contact saved');
    }
}
