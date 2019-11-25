<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="Flattern Admin panel" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Flattern</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('/admin/slider') }}" class="nav-link">
                        <i class="nav-icon fa fa-sliders"></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/feature') }}" class="nav-link">
                        <i class="nav-icon fa fa-file-excel-o"></i>
                        <p>Feature Section</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/client') }}" class="nav-link">
                        <i class="nav-icon fa fa-pagelines"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/users') }}" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-pied-piper-alt"></i>
                        <p>
                            Portfillo
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ url('/admin/portfilo-category') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Portfilo Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/portfilo') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Portfilo Item</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-podcast"></i>
                        <p>
                            Blog
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ url('/admin/blog-category') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/blog-tag') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Tag</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/blog') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Posts</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
