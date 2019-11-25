@extends('front.include.master')

@section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                        <h2>Post Details</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                        <li class="active">{{ $blog_header }}</li>
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
                    <article>
                        <div class="row">
                            <div class="span8">
                                <div class="post-image">
                                    <div class="post-heading">
                                        <h3>{{ $blog->title }}</h3>
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
                                </div>
                                <p>
                                {!! $blog->description !!}
                                </p>

                                <div class="bottom-article">
                                    <ul class="meta-post">
                                        <li><i class="icon-user"></i><a href="{{ url('/blog?user='.$blog->user_id) }}"> {{ $blog->user->name }}</a></li>
                                        <li><i class="icon-folder-open"></i><a href="{{ url('/blog?category='.$blog->category->slug) }}"> {{ $blog->category->title }}</a></li>
                                        <li><i class="icon-tags"></i>
                                            @foreach($blog->tags as $tag)
                                            <a href="{{ url('/blog?tag='.$tag->slug) }}">{{ $tag->title }} {{ !$loop->last?',':'' }}</a>
                                                @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- author info -->

                    <div class="comment-area">
                        @comments(['model' => $blog])
                        @endcomments
                        {{--
                        <h4>4 Comments</h4>
                        <div class="media">
                            <a href="#" class="thumbnail pull-left"><img src="{{ asset('front') }}/img/avatar.png" alt="" /></a>
                            <div class="media-body">
                                <div class="media-content">
                                    <h6><span>March 12, 2013</span> Karen medisson</h6>
                                    <p>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </p>
                                    <a href="#" class="align-right">Reply comment</a>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <a href="#" class="thumbnail pull-left"><img src="{{ asset('front') }}/img/avatar.png" alt="" /></a>
                            <div class="media-body">
                                <div class="media-content">
                                    <h6><span>March 12, 2013</span> Smith sanderson</h6>
                                    <p>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </p>
                                    <a href="#" class="align-right">Reply comment</a>
                                </div>
                                <div class="media">
                                    <a href="#" class="thumbnail pull-left"><img src="{{ asset('front') }}/img/avatar.png" alt="" /></a>
                                    <div class="media-body">
                                        <div class="media-content">
                                            <h6><span>March 12, 2013</span> Thomas guttenberg</h6>
                                            <p>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </p>
                                            <a href="#" class="align-right">Reply comment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <a href="#" class="thumbnail pull-left"><img src="{{ asset('front') }}/img/avatar.png" alt="" /></a>
                            <div class="media-body">
                                <div class="media-content">
                                    <h6><span>March 12, 2013</span> Vicky lumora</h6>
                                    <p>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </p>
                                    <a href="#" class="align-right">Reply comment</a>
                                </div>
                            </div>
                        </div>
                        <h4>Leave your comment</h4>
                        <form id="commentform" action="#" method="post" name="comment-form">
                            <div class="row">
                                <div class="span4">
                                    <input type="text" placeholder="* Enter your full name" />
                                </div>
                                <div class="span4">
                                    <input type="text" placeholder="* Enter your email address" />
                                </div>
                                <div class="span4 margintop10">
                                    <input type="text" placeholder="Enter your website" />
                                </div>
                                <div class="span8 margintop10">
                                    <p>
                                        <textarea rows="12" class="input-block-level" placeholder="*Your comment here"></textarea>
                                    </p>
                                    <p>
                                        <button class="btn btn-theme margintop10" type="submit">Submit comment</button>
                                    </p>
                                </div>
                            </div>
                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
