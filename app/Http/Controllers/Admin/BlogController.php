<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogCategory;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfilos = Blog::orderBy('id', 'desc')
            ->with(['tags', 'user', 'category'])
            ->paginate(10);
        return view('admin.blog.index', [
            'portfilos'=>$portfilos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = BlogCategory::all();
        $tags =  Tag::all();
        return view('admin.blog.add',[
            'categories'=>$category,
            'tags'=>$tags,
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string|min:5|max:255',
            'excerpt'=>'required|string|min:5|max:255',
            'description'=>'required|string',
            'images'=>'required',
            'tags'=>'required',
        ]);



        $data =[];
        foreach($request->file('images') as $image)
        {
            $name=time().'.'.$image->getClientOriginalName();
            $image->move(public_path().'/upload/', $name);
            $data[] = $name;
        }

        $blog = Blog::create([
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'image'=>json_encode($data),
            'user_id'=>Auth::user()->id,
            'blog_category_id'=>$request->portfilo_category_id,
        ]);

        foreach ($request->tags as $tag)
        {
            DB::table('blogs_tags')
                ->insert([
                    'blog_id'=>$blog->id,
                    'tag_id'=>$tag,
                ]);
        }
        return redirect()->back()->with('message', 'Blog item added successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BlogCategory::all();
        $portfilo = Blog::where('id',$id)
            ->with('tags')
            ->first();
        $tags =  Tag::all();
        return view('admin.blog.edit',[
            'categories'=>$category,
            'portfilo'=>$portfilo,
            'tags'=>$tags
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required|string|min:5|max:255',
            'excerpt'=>'required|string|min:5|max:255',
            'description'=>'required|string',
            'tags'=>'required',
        ]);
        $allimages = $request->oldimage;

        if ($request->images)
        {
            foreach($request->file('images') as $image)
            {
                $name=time().'.'.$image->getClientOriginalName();
                $image->move(public_path().'/upload/', $name);
                $data[] = $name;
            }
            $allimages = json_encode($data);
        }


        Blog::where('id', $id)->update([
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'image'=>$allimages,
            'user_id'=>Auth::user()->id,
            'blog_category_id'=>$request->portfilo_category_id,
        ]);

        DB::table('blogs_tags')
            ->where('blog_id', $id)
            ->delete();
        foreach ($request->tags as $tag)
        {
            DB::table('blogs_tags')
                ->insert([
                    'blog_id'=>$id,
                    'tag_id'=>$tag,
                ]);
        }
        return redirect()->back()->with('message', 'Blog item edited successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        DB::table('blogs_tags')
            ->where('blog_id', $id)
            ->delete();
        return redirect()->back()->with('message', 'Blog item deleted successful');
    }
}
