@extends('admin.include.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.include.breadcrumb', ['headerTitle'=>'Portfilos'])
    <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit portfilo item</h3>

                                <div class="card-tools">
                                    <a href="{{ url('/admin/portfilo') }}" class="btn btn-success"> <i class="fa fa-backward"></i> Back</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <form role="form" action="{{ url('/admin/portfilo/'.$portfilo->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    @if(\Illuminate\Support\Facades\Session::get('message'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fa fa-check"></i> Success!</h5>
                                            {{ \Illuminate\Support\Facades\Session::get('message') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" value="{{ $portfilo->title }}" class="form-control" name="title" required id="title" placeholder="Enter title">
                                    </div>

                                    <div class="form-group">
                                        <label for="client">Client</label>
                                        <select name="client_id" class="form-control" id="client">
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}" {{ $client->id == $portfilo->client_id?'selected':'' }}>{{ $client->title }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="portfilo_category_id" class="form-control" id="category">
                                            @foreach($categories as $client)
                                                <option value="{{ $client->id }}" {{ $client->id == $portfilo->portfilo_category_id?'selected':'' }}>{{ $client->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="url">Url</label>
                                        <input type="url" class="form-control" value="{{ $portfilo->url }}" name="url" required id="url" placeholder="Enter url">
                                    </div>

                                    <div class="form-group">
                                        <label for="project_date">Project date</label>
                                        <input type="date" class="form-control" name="project_date" value="{{ $portfilo->project_date }}" required id="project_date" placeholder="Enter project date">
                                    </div>

                                    <div class="form-group">
                                        <label for="excerpt">Excerpt</label>
                                        <input type="text" class="form-control" value="{{ $portfilo->excerpt }}" name="excerpt" required id="excerpt" placeholder="Enter excerpt">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                                            {!! $portfilo->description !!}
                                        </textarea>
                                    </div>




                                    <div class="form-group">
                                        <label for="exampleInputFile">Images</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="images[]" class="custom-file-input" multiple id="exampleInputFile">
                                                <input type="hidden" name="oldimage" value="{{ $portfilo->image }}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @foreach(json_decode($portfilo->image) as $image)
                                        <img src="{{asset('upload/'.$image )}}" alt="" style="height: 100px; width: 100px; float: left;padding: 5px">
                                            @endforeach
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
