

    <div class="span4">
        <aside class="left-sidebar">
            <div class="widget">
                <form class="form-search" action="{{ url('/blog') }}" method="get">
                    <input placeholder="Type something" name="search" type="text" class="input-medium search-query" id="search" autocomplete="off">
                    <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                    @foreach($categories as $category)
                    <li><i class="icon-angle-right"></i><a href="{{ url('blog?category='.$category->slug) }}">{{ $category->title }}</a><span> ({{ \App\lib\Functions::countpostbycategory($category->id) }})</span></li>
                        @endforeach
                </ul>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                    @foreach($latest_posts as $latest_post)
                    <li>
                        @php
                        $latest_post_images= json_decode($latest_post->image);
                        @endphp
                        <img src="{{ asset('upload/'.$latest_post_images[0]) }}" class="pull-left" alt="{{ $latest_post->title }}" style="height: 70px;"/>
                        <h6><a href="{{ url('/blog-details/'.$latest_post->slug) }}">{{ str_limit($latest_post->title, 25) }}</a></h6>
                        <p>
                            {{ str_limit($latest_post->excerpt, 30) }}
                        </p>
                    </li>
                        @endforeach

                </ul>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                    @foreach($tags as $tag)
                    <li><a href="{{ url('/blog?tag='.$tag->slug) }}">{{ $tag->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
