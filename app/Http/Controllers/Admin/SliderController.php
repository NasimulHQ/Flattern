<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->paginate(5);
        return view('admin.slider.index', [
            'sliders'=>$sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add');
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
            'paragraph'=>'required|string|min:5|max:255',
            'image'=>'required|mimes:jpeg,bmp,png,jpg|dimensions:min_width=1500,min_height=500',
        ]);


        $photo_name = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $photo_name);

        Slider::create([
            'title'=>$request->title,
            'paragraph'=>$request->paragraph,
            'image'=>$photo_name,
        ]);

        return redirect()->back()->with('message', 'Slider add successful');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit', [
            'slider'=>$slider
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
            'title'=>'required|string|min:5|max:255',
            'paragraph'=>'required|string|min:5|max:255',

        ]);
        $photo_name = $request->oldimage;
        if ($request->image)
        {
            $this->validate($request, [
                'image'=>'required|mimes:jpeg,bmp,png,jpg|dimensions:min_width=1500,min_height=500',
            ]);
            $photo_name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $photo_name);
        }



        Slider::where('id', $id)->update([
            'title'=>$request->title,
            'paragraph'=>$request->paragraph,
            'image'=>$photo_name,
        ]);

        return redirect()->back()->with('message', 'Slider edited successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::destroy($id);
        return redirect()->back()->with('message', 'Slider deleted successful');
    }
}
