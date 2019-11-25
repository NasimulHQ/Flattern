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
                                <h3 class="card-title">All Blogs</h3>

                                <div class="card-tools">
                                    <a href="{{ url('/admin/blog/create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                @if(\Illuminate\Support\Facades\Session::get('message'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fa fa-check"></i> Success!</h5>
                                        {{ \Illuminate\Support\Facades\Session::get('message') }}
                                    </div>
                                @endif
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>User Name</th>
                                        <th>Category Name</th>
                                        <th>Tags</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($portfilos as $portfilo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $portfilo->title }}</td>
                                        <td>{{ $portfilo->user->name }}</td>
                                        <td>{{ $portfilo->category->title }}</td>
                                        <td>

                                            @foreach($portfilo->tags as $tag)
                                                {{ $tag->title }} {{ !$loop->last?',':'' }}
                                                @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/blog/'.$portfilo->id.'/edit') }}"><span class="btn btn-warning">Edit</span></a>
                                            <form action="{{ url('/admin/blog/'.$portfilo->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6">
                                                Sorry no portfilo item added yet
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                {{ $portfilos->links() }}
                            </div>
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
