@extends('front.include.master')

@section('content')

    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                        <h2>Portfolio</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li><a href="#">Portfolio</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <ul class="portfolio-categ filter">
                        <li class="all active"><a href="#">All</a></li>
                        @foreach($categories as $category)
                        <li class="{{ str_slug($category->title) }}"><a href="#" title="">{{ $category->title }}</a></li>
                            @endforeach
                    </ul>
                    <div class="clearfix">
                    </div>
                    <div class="row">
                        <section id="projects">
                            <ul id="thumbs" class="portfolio">
                                @foreach($portfilos as $portfilo)
                                    @php
                                        $images = json_decode($portfilo->image);
                                    @endphp
                                    <!-- Item Project and Filter Name -->
                                        <li class="item-thumbs span3 design" data-url="{{ url('/portfolio-details/'.$portfilo->slug) }}" data-id="id-{{$portfilo->iteration}}" data-type="{{ str_slug($portfilo->portfilocategory->title) }}">
                                            <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="{{ $portfilo->title }}" url="{{ url('/portfolio-details/'.$portfilo->slug) }}" href="{{ asset('upload/'.$images[0]) }}">
                                                <span class="overlay-img"></span>
                                                <span class="overlay-img-thumb font-icon-plus"></span>
                                            </a>
                                            <!-- Thumb Image and Description -->
                                            <img src="{{ asset('upload/'.$images[0]) }}" alt="{{ str_limit($portfilo->excerpt, 100) }}">
                                        </li>
                                        <!-- End Item Project -->
                                    @endforeach
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
