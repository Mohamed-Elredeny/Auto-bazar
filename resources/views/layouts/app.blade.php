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
        .activeToty{
            color: #7882ff !important;
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

    </style>
</head>
<body>
@include('includes.nav')

<!-- sign In -->

@yield('content')

<a href="https://wa.me/0201068298958?text=product%20link%20:%20http://127.0.0.1:8000/product/details/1" data-action="share/whatsapp/share" target="_blank" class=" " style="position: fixed; bottom:50px; right:50px">
    <img src="http://127.0.0.1:8000/assets/site/images/site/whatapp.png" height="50" width="50" alt="...">
</a>



<script type="text/javascript" src="{{asset('assets/site/martina/js/jquery-3.3.1.slim.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/martina/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/martina/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/martina/js/script.js')}}"></script>
<script src="{{asset('assets/site/martina/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/site/martina/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/site/martina/js/additional-methods.min.js')}}"></script>
<script src="{{asset('assets/site/martina/js/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/site/martina/js/mainForm.js')}}"></script>

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
