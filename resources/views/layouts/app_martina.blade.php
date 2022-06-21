<!DOCTYPE html>
<html>
<head>
    <title>AutoBazar</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/martina/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/martina/css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .content {
            padding: 16px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .sticky + .content {
            padding-top: 60px;
        }
    </style>
    {{--
        <link href="{{asset('assets/site/homepage/assets/vendor2/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/homepage/assets/vendor2/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/homepage/assets/vendor2/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/homepage/assets/vendor2/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/homepage/assets/vendor2/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/homepage/assets/vendor2/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/homepage/assets/vendor2/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    --}}

    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/martina/css/all.min.css')}}">
    <link href="{{asset('assets/site/homepage/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset("assets/admin/libs/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets\dropdown1\ms-Dropdown-master\ms-Dropdown-master\dist\css\dd.css')}}" />

    <link href='https://fonts.googleapis.com/css?family=Revalia' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <style>
        .color_site_bg{
            background: #17286E;
        }
        .color_site_btn{
            padding:10px;
            background: #17286E;
            color:white;
        }
        .color_site_btn:hover{
            padding:10px;
            background: white;
            color:#17286E;
            border:2px solid #17286E;
        }
        .color_site_card{
            background: white;
            color:#17286E;
        }
        .color_site_card:hover{
            background: #17286E;
            color:white !important;
            border:2px solid #17286E;
        }

        .color_site_f{
            color:#17286E;
        }


        .footer {
            background-color: #ecf0f4; }

        .socialMedia {
            font-size: 2em; }

        .footer .linkColor a {
            color: black !important; }

        .activeToty{
            color: #7882ff !important;
        }
        @if(LaravelLocalization::getCurrentLocale() != 'en')
       *{
            font-family: Cairo !important;
        }
        .navbar-toggler{
            background:white
        }
        @endif
    </style>
</head>
<body >
@include('includes.nav')

<!-- sign In -->

@yield('content')

<a href="https://wa.me/0201068298958?text=product%20link%20:%20http://127.0.0.1:8000/product/details/1" data-action="share/whatsapp/share" target="_blank" class=" " style="position: fixed; bottom:50px; right:50px">
    <img src="http://127.0.0.1:8000/assets/site/images/site/whatapp.png" height="50" width="50" alt="...">
</a>


<footer class="footer mt-5 pt-5" style="background: #F3F3F3">
    <div class="container ">
        <div class="row mx-auto">
            <div class="col-6 col-md-4 col-lg-3 mb-4 mb-lg-1 linkColor">
                <h6 class="text-dark font-weight-bold">About AutoBazar</h6>
                <a href="#" class="link h6 d-block text-gray mt-5">{{__('home.about_autobazar')}}</a>
                <a href="/terms" class="link h6 d-block text-gray mt-3">{{__('home.terms_cond')}}</a>
                <a href="/aboutus" class="link h6 d-block text-gray mt-3">{{__('About ')}}</a>
                <a href="/contact-us" class="link h6 d-block text-gray mt-3">{{__('Contact ')}}</a>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-4 mb-lg-1 linkColor">
                <h6 class="text-dark font-weight-bold">{{__('home.terms_cond')}}</h6>
                <a href="/" class="link h6 d-block text-gray mt-5">Home</a>
                <a href="/" class="link h6 d-block text-gray ">Cars and heavy equipment</a>
                <a href="/" class="link h6 d-block text-gray ">Spare parts</a>
                <a href="/" class="link h6 d-block text-gray ">Electric Generators</a>
                <a href="/" class="link h6 d-block text-gray ">Maintenance Centers</a>


            </div>

            <div class="col-6 col-md-4 col-lg-3">
                {{--     <h6 class="text-dark font-weight-bold">DOWNLOAD OUR APP</h6>
                    </a><div class="Download-Icons"><a>
                        </a><a href="" class="mr-2"><img src="/images/icons/Playstore.png" height="35" width="35" alt=""></a>
                        <a href="" class=" "><img src="/images/icons/appstore.png" height="35" width="35" alt=""></a>
                    </div> --}}
                {{-- <div class="AddSpace"></div> --}}

                <h6 class="text-dark font-weight-bold">{{__('home.follow_us_on')}}</h6>
                <div class="Download-Icons">
                    <a href="https://twitter.com/ownk11?s=11" class="h3 text-success mr-1"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/ownk11?s=11" class="h3 text-success mr-1"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com/ownk11?utm_medium=copy_link" class="h1"><img src="{{asset('assets/site/images/instagram.png')}}" height="28" width="28" alt=""></a>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 ">
                <h6 class="text-dark font-weight-bold ">PAYMENT METHODS</h6>
                <div class="Download-Icons">
                    <a href="" class="h3 text-primary mr-1"><i class="fab fa-cc-visa"></i></a>
                    <a href="" class="h3 text-primary "><i class="fab fa-cc-paypal"></i></a>
                </div>
            </div>

        </div>

    </div>
    <hr class="p-1 mt-5">
    <div class="container-fluid row">
        <p class="col-6 text-gray mt-1 mb-4">{{_('home.all_rights_saved')}} To AutoBazaar Website</p>
        <p class="col-4 text-left text-gray">
            Created By <a href="https://we-work.pro" target="_blank"> We-work Group</a>
        </p>
        <p class="col-2 text-center text-right text-gray">
            <a href="{{LaravelLocalization::getLocalizedURL('ar') }}">ar</a>  | <a href="{{LaravelLocalization::getLocalizedURL('en') }}">en</a> | <a href="{{LaravelLocalization::getLocalizedURL('ku') }}">ku</a>
        </p>
    </div>
</footer>

<script type="text/javascript" src="{{asset('assets/site/martina/js/jquery-3.3.1.slim.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/martina/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/martina/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/martina/js/script.js')}}"></script>
<script src="{{asset('assets/site/martina/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/site/martina/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/site/martina/js/additional-methods.min.js')}}"></script>
<script src="{{asset('assets/site/martina/js/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/site/martina/js/mainForm.js')}}"></script>
<script src="{{asset("assets/admin/libs/select2/js/select2.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js")}}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js"
        data-cf-beacon='{"rayId":"6598dfe1bd950fee","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.5.2","si":10}'></script>
<script>
    document.querySelector("input[type=number]")
        .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
</script>


</body>

</html>
