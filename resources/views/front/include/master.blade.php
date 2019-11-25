<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Flattern - Flat and trendy bootstrap site template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- css -->
    <link href="{{ asset('front') }}/https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('front') }}/css/bootstrap.css" rel="stylesheet" />
    <link href="{{ asset('front') }}/css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="{{ asset('front') }}/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/jcarousel.css" rel="stylesheet" />
    <link href="{{ asset('front') }}/css/flexslider.css" rel="stylesheet" />
    <link href="{{ asset('front') }}/css/style.css" rel="stylesheet" />
    <!-- Theme skin -->
    <link href="{{ asset('front') }}/skins/default.css" rel="stylesheet" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('front') }}/ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('front') }}/ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('front') }}/ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('front') }}/ico/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="{{ asset('front') }}/ico/favicon.png" />
    <style>
        .twitter-typeahead,
        .tt-hint,
        .tt-input,
        .tt-menu{
            width: auto ! important;
            font-weight: normal;

        }
    </style>
    <!-- =======================================================
      Theme Name: Flattern
      Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<div id="wrapper">
    <!-- toggle top area -->
    <div class="hidden-top">
        <div class="hidden-top-inner container">
            <div class="row">
                <div class="span12">
                    <ul>
                        <li><strong>We are available for any custom works this month</strong></li>
                        <li>Main office: Springville center X264, Park Ave S.01</li>
                        <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end toggle top area -->
    @include('front.include.header')


    @yield('content')
    @include('front.include.footer')
</div>
<a href="{{ asset('front') }}/#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
<!-- javascript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('front') }}/js/jquery.js"></script>
<script src="{{ asset('front') }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('front') }}/js/bootstrap.js"></script>
<script src="{{ asset('front') }}/js/jcarousel/jquery.jcarousel.min.js"></script>
<script src="{{ asset('front') }}/js/jquery.fancybox.pack.js"></script>
<script src="{{ asset('front') }}/js/jquery.fancybox-media.js"></script>
<script src="{{ asset('front') }}/js/google-code-prettify/prettify.js"></script>
<script src="{{ asset('front') }}/js/portfolio/jquery.quicksand.js"></script>
<script src="{{ asset('front') }}/js/portfolio/setting.js"></script>
<script src="{{ asset('front') }}/js/jquery.flexslider.js"></script>
<script src="{{ asset('front') }}/js/jquery.nivo.slider.js"></script>
<script src="{{ asset('front') }}/js/modernizr.custom.js"></script>
<script src="{{ asset('front') }}/js/jquery.ba-cond.min.js"></script>
<script src="{{ asset('front') }}/js/jquery.slitslider.js"></script>
<script src="{{ asset('front') }}/js/animate.js"></script>

<!-- Template Custom JavaScript File -->
<script src="{{ asset('front') }}/js/custom.js"></script>
<!-- Import typeahead.js -->
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

<!-- Initialize typeahead.js on the input -->
<script>
    $(document).ready(function() {
        var bloodhound = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '/blog/search?q=%QUERY%',
                wildcard: '%QUERY%'
            },
        });

        $('#search').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'blogs',
            source: bloodhound,
            display: function(data) {
                return data.title  //Input value to be set when you select a suggestion.
            },
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function(data) {
                    return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.title + '</div></div>'
                }
            }
        });
    });
</script>

</body>
</html>
