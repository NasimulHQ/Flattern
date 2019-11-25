@extends('front.include.master')

@section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                        <h2>Blogs</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li><a href="#">Blogs</a><i class="icon-angle-right"></i></li>
                        <li><a href="#">{{ $blog_header }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                @include('front.include.blog-sidebar',[
                        'categories'=>$categories,
                        'latest_posts'=>$latest_posts,
                        'tags'=>$tags,
                    ])
                <div class="span8">

                    @forelse($blogs as $blog)
                    <article>
                        <div class="row">
                            <div class="span8">
                                <div class="post-slider">
                                    <div class="post-heading">
                                        <h3><a href="{{ url('/blog-deatils/'.$blog->slug) }}">{{ $blog->title }}</a></h3>
                                    </div>
                                    @php
                                    $blog_images = json_decode($blog->image);
                                    @endphp
                                    <!-- start flexslider -->
                                    <div class="flexslider">
                                        <ul class="slides">
                                            @foreach($blog_images as $image)
                                            <li>
                                                <img style="height: 400px; width: 100%" src="{{ asset('upload/'.$image ) }}" alt="{{ $blog->title }}" />
                                            </li>
                                                @endforeach

                                        </ul>
                                    </div>
                                    <!-- end flexslider -->
                                </div>
                                <p>
                                    {{ $blog->excerpt }}
                                </p>
                                <div class="bottom-article">
                                    <ul class="meta-post">
                                        <li><i class="icon-calendar"></i><a href="#">{{ date('M d, Y', strtotime($blog->created_at)) }} </a></li>
                                        <li><i class="icon-user"></i><a href="{{ url('/blog?user='.$blog->user_id) }}"> {{ $blog->user->name }}</a></li>
                                        <li><i class="icon-folder-open"></i><a href="{{ url('/blog?category='.str_slug($blog->category->slug)) }}"> {{ $blog->category->title }}</a></li>
                                        <li><i class="icon-comments"></i><a href="#">{{ \App\lib\Functions::commentcount($blog->id) }} Comments</a></li>
                                    </ul>
                                    <a href="{{ url('/blog-details/'.$blog->slug) }}" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </article>
                        @empty
                        <p>There is no post</p>
                    @endforelse

                    <div id="pagination">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
