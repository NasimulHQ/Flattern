<section id="featured">
    <!-- start slider -->
    <!-- Slider -->
    <div id="nivo-slider">
        <div class="nivo-slider">
           @foreach($sliders as $slider)
            <img src="{{ asset('upload/'.$slider->image) }}" alt="{{ $slider->title }}" title="#caption-{{$loop->iteration}}" />
               @endforeach
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <!-- Slide #1 caption -->
                    @foreach($sliders as $slider)
                    <div class="nivo-caption" id="caption-{{ $loop->iteration }}">
                        <div>
                            <h2>{{ $slider->title }}</h2>
                            <p>
                            {{ str_limit($slider->paragraph, 100) }}
                            </p>
                            <a href="{{ url('/blog') }}" class="btn btn-theme">Read More</a>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- end slider -->
</section>
