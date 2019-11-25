<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.client.index', [
            'clients'=>$clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.add');
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
            'image'=>'required|mimes:jpeg,bmp,png,jpg',
        ]);


        $photo_name = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $photo_name);

        Client::create([
            'title'=>$request->title,
            'image'=>$photo_name,
        ]);

        return redirect()->back()->with('message', 'Client add successful');
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
        $client = Client::find($id);
        return view('admin.client.edit', [
            'slider'=>$client
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

        ]);
        $photo_name = $request->oldimage;
        if ($request->image)
        {
            $this->validate($request, [
                'image'=>'required|mimes:jpeg,bmp,png,jpg',
            ]);
            $photo_name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $photo_name);
        }



        Client::where('id', $id)->update([
            'title'=>$request->title,
            'image'=>$photo_name,
        ]);

        return redirect()->back()->with('message', 'Client edited successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->back()->with('message', 'Client deleted successful');
    }
}
