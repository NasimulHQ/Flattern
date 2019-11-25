    <!-- start header -->
<header>
    <div class="container ">
        <!-- hidden top area toggle link -->

        <!-- end toggle link -->
        <div class="row nomargin">
            <div class="span12">
                <div class="headnav">
                    <ul>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <li><a href="{{ url('/admin/home') }}">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a></li>
                            @else
                            <li><a href="{{ url('/admin/register') }}">Sign up</a></li>
                            <li><a href="{{ url('/admin/login') }}">Sign in</a></li>
                            @endif
                    </ul>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="span4">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('front') }}/img/logo.png" alt="" class="logo" /></a>
                    <h1>Flat and trendy bootstrap template</h1>
                </div>
            </div>
            <div class="span8">
                <div class="navbar navbar-static-top">
                    <div class="navigation">
                        <nav>
                            <ul class="nav topnav">
                                <li class="active">
                                    <a href="{{ url('/') }}">Home</a>

                                </li>


                                <li >
                                    <a href="{{ url('/portfolio') }}">Portfolio</a>
                                </li>
                                <li>
                                    <a href="{{ url('/blog') }}">Blog</a>

                                </li>
                                <li>
                                    <a href="{{ url('/contact-us') }}">Contact </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end navigation -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
