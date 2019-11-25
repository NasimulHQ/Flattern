@extends('front.include.master')
@section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                        <h2>Portfolio detail</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li><a href="#">Portfolio</a><i class="icon-angle-right"></i></li>
                        <li class="active">{{ $portfilo->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <article>
                        <div class="top-wrapper">
                            <div class="post-heading">
                                <h3>{{ $portfilo->title }}</h3>
                            </div>
                            <!-- start flexslider -->
                            <div class="flexslider">
                                @php
                                $images = json_decode($portfilo->image);
                                @endphp
                                <ul class="slides">
                                    @foreach($images as $image)
                                    <li>
                                        <img src="{{ asset('upload/'.$image ) }}" style="height: 400px; width: 100%" alt="{{ $portfilo->title }}" />
                                    </li>
                                        @endforeach

                                </ul>
                            </div>
                            <!-- end flexslider -->
                        </div>
                        <p>
                            {!! $portfilo->description !!}
                        </p>
                    </article>
                </div>
                <div class="span4">
                    <aside class="right-sidebar">
                        <div class="widget">
                            <h5 class="widgetheading">Project information</h5>
                            <ul class="folio-detail">
                                <li><label>Category :</label> {{ $portfilo->portfilocategory->title }}</li>
                                <li><label>Client :</label> {{ $portfilo->client->title }}</li>
                                <li><label>Project date :</label> {{ date('d F,Y', strtotime($portfilo->project_date)) }}</li>
                                <li><label>Project URL :</label><a href="{{ $portfilo->url }}">{{ $portfilo->url }}</a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading">Short Description</h5>
                            <p>
                               {{ $portfilo->excerpt }}
                                </p>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection
