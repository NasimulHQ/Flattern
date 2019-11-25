<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Portfilo;
use App\PortfiloCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfiloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfilos = Portfilo::orderBy('id', 'desc')
            ->with(['client', 'portfilocategory'])
            ->paginate(10);
        return view('admin.portfilo.index', [
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
        $clients = Client::all();
        $category = PortfiloCategory::all();
        return view('admin.portfilo.add',[
            'clients'=>$clients,
            'categories'=>$category,
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
           'url'=>'required|url',
           'project_date'=>'required|date',
           'excerpt'=>'required|string|min:5|max:255',
           'description'=>'required|string',
           'images'=>'required',
        ]);

        $data =[];
        foreach($request->file('images') as $image)
        {
            $name=time().'.'.$image->getClientOriginalName();
            $image->move(public_path().'/upload/', $name);
            $data[] = $name;
        }

        Portfilo::create([
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
            'url'=>$request->url,
            'project_date'=>$request->project_date,
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'image'=>json_encode($data),
            'client_id'=>$request->client_id,
            'portfilo_category_id'=>$request->portfilo_category_id,
        ]);
        return redirect()->back()->with('message', 'Protfilo item added successful');

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
        $clients = Client::all();
        $category = PortfiloCategory::all();
        $portfilo = Portfilo::find($id);
        return view('admin.portfilo.edit',[
            'clients'=>$clients,
            'categories'=>$category,
            'portfilo'=>$portfilo
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
            'url'=>'required|url',
            'project_date'=>'required|date',
            'excerpt'=>'required|string|min:5|max:255',
            'description'=>'required|string',
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


        Portfilo::where('id', $id)->update([
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
            'url'=>$request->url,
            'project_date'=>$request->project_date,
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'image'=>$allimages,
            'client_id'=>$request->client_id,
            'portfilo_category_id'=>$request->portfilo_category_id,
        ]);
        return redirect()->back()->with('message', 'Protfilo item edited successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portfilo::destroy($id);

        return redirect()->back()->with('message', 'Protfilo item deleted successful');
    }
}
