<?php

namespace App\Http\Controllers\Admin;

use App\PortfiloCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfiloCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = PortfiloCategory::orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.portfilocategory.index', [
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
        return view('admin.portfilocategory.add');
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

        PortfiloCategory::create([
            'title'=>$request->title,
        ]);

        return redirect()->back()->with('message', 'portfilo category add successful');
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
        $feature = PortfiloCategory::find($id);
        return view('admin.portfilocategory.edit', [
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

        PortfiloCategory::where('id', $id)->update([
            'title'=>$request->title,
        ]);

        return redirect()->back()->with('message', 'portfilo category updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PortfiloCategory::destroy($id);
        return redirect()->back()->with('message', 'portfilo category deleted successful');
    }
}
