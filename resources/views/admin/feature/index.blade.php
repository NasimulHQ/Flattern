@extends('admin.include.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.include.breadcrumb', ['headerTitle'=>'Feature Section'])
    <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Features Section</h3>

                                <div class="card-tools">
                                    <a href="{{ url('/admin/feature/create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add</a>
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
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Excerpt</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($features as $slider)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $slider->icon }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ str_limit($slider->excerpt, 50) }}</td>

                                            <td>
                                                <a href="{{ url('/admin/feature/'.$slider->id.'/edit') }}"><span class="btn btn-warning">Edit</span></a>
                                                <form action="{{ url('/admin/feature/'.$slider->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                Sorry no feature added yet
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                {{ $features->links() }}
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
