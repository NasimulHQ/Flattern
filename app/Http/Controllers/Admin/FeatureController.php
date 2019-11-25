<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature = Feature::orderBy('id', 'desc')
            ->paginate(5);
        return view('admin.feature.index', [
           'features'=>$feature
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.add');
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
           'icon'=>'required|string|min:3|max:50',
           'title'=>'required|string|min:3|max:255',
           'excerpt'=>'required|string|min:3|max:255',
        ]);

        Feature::create([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
        ]);

        return redirect()->back()->with('message', 'Feature add successful');
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
        $feature = Feature::find($id);
        return view('admin.feature.edit', [
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
            'icon'=>'required|string|min:3|max:50',
            'title'=>'required|string|min:3|max:255',
            'excerpt'=>'required|string|min:3|max:255',
        ]);

        Feature::where('id', $id)->update([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
        ]);

        return redirect()->back()->with('message', 'Feature updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feature::destroy($id);
        return redirect()->back()->with('message', 'Feature deleted successful');
    }
}
