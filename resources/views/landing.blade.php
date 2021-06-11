<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME')}} | Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
            <div class="container">
                <a class="navbar-brand" href="#page-top">{{env('APP_NAME')}}TUWA KAWA</a>
                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="nav-link page-scroll" href="#page-top">Home</a></li>
                        <li><a class="nav-link page-scroll" href="#features">Features</a></li>
                        <li><a class="nav-link page-scroll" href="#contact">Contact</a></li>
                        @if(auth()->check())
                            <li><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
                            <li><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                        @else
                            <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel slide" data-ride="carousel" >
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Tuwa Kawa</h1>
                    <p>Coffee & Roastery Nusa Tenggara Barat</p>
                </div>
                <div class="carousel-image wow zoomIn">
                    <img src="img/landing/logo.png" alt="logo" width="300px"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>Tuwa Kawa</h1>
                    <p>I Only Drink the Best</p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2>Inventory Management</h2>
            <p>We have created nice inventory management, and you could customize the way you want it to be.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Strategic Dashboard</h2>
            <p>We use analytical and reasonable data for our dashboard, and of course you could customize it also.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Custom Feature</h2>
            <p>We open to custom feature, just request what do you want.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Customer Service</h2>
            <p>We provide 24h customer service, so you should not worry too much for technical problems.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
    </div>
</section>

<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contact Us</h1>
                <p>If you have problem about anything and want to contact us. Here we provide the best way to contact
                us.</p>
            </div>
        </div>
        <div class="row m-b-lg justify-content-center">
            <div class="col-lg-3 ">
                <address>
                    <strong><span class="navy">Tuwa Kawa, Inc.</span></strong><br/>
                    Mataram ,West Lombok<br/>
                    West Nusa Tenggara, ID<br/>
                    <abbr title="Phone">P:</abbr> (+62) xxx-xxxx-xxxx
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                Please send us message, and wait for answer from our cs. Continue to contact our cs until your problem
                is solved. Thank you for your kindness :)
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:cs@ordsoft.id" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2021 Tuwa Kawa</strong><br/> Specialized to make coffee from fresh coffee bean</p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('js/plugins/wow/wow.min.js')}}"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '#navbar',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

var cbpAnimatedHeader = (function() {
    var docElem = document.documentElement,
        header = document.querySelector( '.navbar-default' ),
        didScroll = false,
        changeHeaderOn = 200;
    function init() {
        window.addEventListener( 'scroll', function( event ) {
            if( !didScroll ) {
                didScroll = true;
                setTimeout( scrollPage, 250 );
            }
        }, false );
    }
    function scrollPage() {
        var sy = scrollY();
        if ( sy >= changeHeaderOn ) {
            $(header).addClass('navbar-scroll')
        }
        else {
            $(header).removeClass('navbar-scroll')
        }
        didScroll = false;
    }
    function scrollY() {
        return window.pageYOffset || docElem.scrollTop;
    }
    init();

})();

// Activate WOW.js plugin for animation on scrol
new WOW().init();

</script>

</body>
</html>
