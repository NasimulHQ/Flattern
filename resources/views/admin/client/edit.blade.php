@extends('admin.include.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.include.breadcrumb', ['headerTitle'=>'Client'])
    <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Client</h3>

                                <div class="card-tools">
                                    <a href="{{ url('/admin/client') }}" class="btn btn-success"> <i class="fa fa-backward"></i> Back</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <form role="form" action="{{ url('/admin/client/'.$slider->id) }}" method="post" enctype="multipart/form-data">
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
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" value="{{ $slider->title }}" class="form-control" name="title" required id="exampleInputEmail1" placeholder="Enter title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                <input type="hidden" value="{{ $slider->image }}" name="oldimage">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset('upload/'.$slider->image) }}" style="height: 250px; width: 100%" alt="">
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
