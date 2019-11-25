<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = BlogCategory::orderBy('id', 'desc')
            ->paginate(10);
        toastr()->success('Blog category add successful');
        return view('admin.blogcategory.index', [
            'categories'=>$category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogcategory.add');
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
            'title'=>'required|string|min:3|max:255',
        ]);

        BlogCategory::create([
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
        ]);
        toastr()->success('Blog category add successful');
        return redirect()->back();
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
        $feature = BlogCategory::find($id);
        return view('admin.blogcategory.edit', [
            'feature'=>$feature
        ]);
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
            'title'=>'required|string|min:3|max:255',
        ]);

        BlogCategory::where('id', $id)->update([
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
        ]);

        return redirect()->back()->with('message', 'Blog category updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::destroy($id);
        return redirect()->back()->with('message', 'Blog category deleted successful');
    }
}
