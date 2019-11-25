@extends('admin.include.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.include.breadcrumb', ['headerTitle'=>'Blogs'])
    <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add blog item</h3>

                                <div class="card-tools">
                                    <a href="{{ url('/admin/blog') }}" class="btn btn-success"> <i class="fa fa-backward"></i> Back</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <form role="form" action="{{ url('/admin/blog') }}" method="post" enctype="multipart/form-data">
                                @csrf
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
                                        <input type="text" class="form-control" name="title" required id="title" placeholder="Enter title">
                                    </div>


                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="portfilo_category_id" class="form-control" id="category">
                                                @foreach($categories as $client)
                                                    <option value="{{ $client->id }}">{{ $client->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tags">Tags</label>
                                            <select name="tags[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a tag" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>




                                        <div class="form-group">
                                            <label for="excerpt">Excerpt</label>
                                            <input type="text" class="form-control" name="excerpt" required id="excerpt" placeholder="Enter excerpt">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                        </div>




                                    <div class="form-group">
                                        <label for="exampleInputFile">Images</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="images[]" required class="custom-file-input" multiple id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
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
