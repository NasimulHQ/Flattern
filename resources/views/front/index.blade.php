@extends('front.include.master')
 @section('content')
     @include('front.include.slider', ['sliders'=>$sliders])

     <section class="callaction">
         <div class="container">
             <div class="row">
                 <div class="span12">
                     <div class="big-cta">
                         <div class="cta-text">
                             <h3>We've created more than <span class="highlight"><strong>5000 websites</strong></span> this year!</h3>
                         </div>
                         <div class="cta floatright">
                             <a class="btn btn-large btn-theme btn-rounded" href="{{ asset('front') }}/#">Request a quote</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section id="content">
         <div class="container">
             <div class="row">
                 <div class="span12">
                     <div class="row">

                         @foreach($fs as $feature)
                         <div class="span3">
                             <div class="box aligncenter">
                                 <div class="aligncenter icon">
                                     <i class="{{$feature->icon}} icon-circled icon-64 active"></i>
                                 </div>
                                 <div class="text">
                                     <h6>{{ $feature->title }}</h6>
                                     <p>
                                         {{ str_limit($feature->excerpt, 100) }}
                                     </p>
                                 </div>
                             </div>
                         </div>
                             @endforeach

                     </div>
                 </div>
             </div>
             <!-- divider -->
             <div class="row">
                 <div class="span12">
                     <div class="solidline">
                     </div>
                 </div>
             </div>
             <!-- end divider -->
             <!-- Portfolio Projects -->
             <div class="row">
                 <div class="span12">
                     <h4 class="heading">Some of recent <strong>works</strong></h4>
                     <div class="row">
                         <section id="projects">
                             <ul id="thumbs" class="portfolio">
                                 @foreach($portfilos as $portfilo)
                                     @php
                                     $images = json_decode($portfilo->image);
                                     @endphp
                                 <!-- Item Project and Filter Name -->
                                 <li class="item-thumbs span3 design" data-url="{{ url('/portfolio-details/'.$portfilo->slug) }}" data-id="id-{{$portfilo->iteration}}" data-type="web">
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
             <!-- End Portfolio Projects -->
             <!-- divider -->
             <div class="row">
                 <div class="span12">
                     <div class="solidline">
                     </div>
                 </div>
             </div>
             <!-- end divider -->
             <div class="row">
                 <div class="span12">
                     <h4>Very satisfied <strong>clients</strong></h4>
                     <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
                         @foreach($clients as $client)
                         <li>
                             <a href="#">
                                 <img src="{{ asset('upload/'.$client->image) }}" class="client-logo" alt="{{ $client->title }}" />
                             </a>
                         </li>
                             @endforeach

                     </ul>
                 </div>
             </div>
         </div>
     </section>
     <section id="bottom">
         <div class="container">
             <div class="row">
                 <div class="span12">
                     <div class="aligncenter">
                         <div id="twitter-wrapper">
                             <div id="twitter">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     @endsection
