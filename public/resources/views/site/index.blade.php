@extends('layouts.app_martina')
<style>
    .fas {
        color: #17286E
    }

    .fab {
        color: #17286E
    }
</style>
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <?php
                $start = 992784213;
                ?>
                @for($i=0;$i<count($slider);$i++)

                <?php
                $advCat = strval($slider[$i]["advCat"]);
                $advArr = ["all", "home"];
                ?>
                @if(in_array( $advCat,$advArr))
                    @if($start == 992784213)
                        <!-- Slide 1 -->
                            <style>
                                .carousel-inner {
                                    /* height: 550px; */
                                    background-image: url({{asset('assets/images/advertisements/one.png')}});
                                    background-size:100% 100%;
                                    object-fit: contain;
                                    background-repeat: no-repeat;
                                }


                                @media (min-width: 460px) {
                                    #hero {
                                        height: 90vh;
                                    }

                                    .my_slider_btn {
                                        position: relative;
                                        top: 250px;
                                    }

                                }

                                @media (min-width: 1496px) {
                                    #hero {
                                        height: 100%;
                                        width:100%
                                    }

                                    .my_slider_btn {
                                        position: relative;
                                        top: 10px;
                                    }

                                }
                                @media (max-width: 797px) {
                                    #hero {
                                        height: 30%;
                                        width:100%
                                    }

                                    .my_slider_btn {
                                        position: relative;
                                        top: 15px;
                                        bottom:140px;
                                        left:120px;
                                    }
                                    #portfolio-flters{

                                        width:100%;
                                    }
                                    #product_cat{
                                       font-size:12;
                                    }

                                }
                                .row {
                                    margin-right: -19px;
                                }
                                .align-items-stretch{

                                    width:50%;
                                }
                                #moka_cars_2{

                                    width:100%;
                                }
                            </style>
                                <div class="carousel-item active " style="">
                                    <div class="carousel-container">
                                        <div class="container">

                                            <div class="form-group row ">
                                                <div class="col-sm-6">
                                                    {{--
                                                        <img src="{{asset('assets/images/profileMaintenance/1629833203_mohamed.jpg')}}" alt="" style="height:500px;width:100%">
                                                    --}}
                                                </div>
                                                <div class="col-sm-6 p-4 " style="height:500px">
                                                    <div class="container">
                                                        <div class="row" style="height:13%">
                                                            <div class="col-sm-12 h1 text-center">
                                                                <!-- {{$slider[$i]['advName']}} -->
                                                            </div>

                                                        </div>
                                                        <div class="row" style="height:33%;">


                                                            <!-- <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle"
                                                                     style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img
                                                                        src="{{asset('assets/images/icons/last_part/2.png')}}"
                                                                        height="45"
                                                                        class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advFullType'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle"
                                                                     style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img
                                                                        src="{{asset('assets/images/icons/last_part/calendar (1).png')}}"
                                                                        height="45"
                                                                        class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advYear'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle"
                                                                     style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img
                                                                        src="{{asset('assets/images/icons/last_part/gearshift (1).png')}}"
                                                                        height="45"
                                                                        class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advGear'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle"
                                                                     style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img
                                                                        src="{{asset('assets/images/makes')}}/{{$slider[$i]->mark->image}}"
                                                                        height="70"
                                                                        class="d-inline-block align-top w-100" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle"
                                                                     style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <br>
                                                                    <h6 class=""
                                                                        style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advCondition}}</h6>

                                                                </div>
                                                            </div> -->
                                                            <!-- <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle"
                                                                     style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img
                                                                        src="{{asset('assets/images/icons/last_part/gearshift (1).png')}}"
                                                                        height="45"
                                                                        class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    <h6 class=""
                                                                        style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advSlinder . ' Slender'}} </h6>
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle"
                                                                     style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img
                                                                        src="{{asset('assets/images/icons/last_part/665.png')}}"
                                                                        height="45"
                                                                        class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    <h6 class=""
                                                                        style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advEngineCapacity . ' hp'}} </h6>
                                                                </div>
                                                            </div> -->


                                                        </div>

                                                        <!-- <div class="row my_slider_btn"
                                                             style="height:33%;display: block">
                                                            <div class="col-sm-12 h5 text-center">
                                                                <a class="btn color_site_btn animate__animated animate__fadeInUp scrollto "
                                                                   href="{{$slider[$i]['advLink']}}">
                                                                    {{__('home.show_more')}}

                                                                </a>
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                            <?php  $start = 1; ?>
                        @else
                            @if($slider[$i]['version'] == 1)
                            @else
                            @endif
                        @endif
                    @endif
                @endfor


            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section>
    <!-- End Hero -->
    <br>
    <main id="main">


        <!-- ======= Icon Boxes Section ======= -->
        <section id="team" class="team section-bg" style="padding:1px;background:#F3F3F3">
            <div class="container">

                @desktop
                <div class="row">
                    @foreach($categories as $cat)

                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

                            <div class="member color_site_card" data-aos="fade-up" data-aos-delay="100"
                                 style="width: 300px;height:270px;cursor:pointer;"
                                 onMouseOver="myfuncMouseOver({{$cat->id}})" onMouseOut="myfuncMouseOut({{$cat->id}})">
                                <a href="{{route('subcategory',['name'=>$cat->id])}}" style="text-decoration:none">
                                    <div class="member-img" >
                                        @if($cat->id == 1)
                                            <img id="moka_cars_{{$cat->id}}" class="car"
                                                 src="{{asset('assets/images/icons/blue/cat1.png')}}" class="img-fluid"
                                                 alt="" style="height:140px;width:80%;margin-bottom:20px;font-size:20px">
                                        @elseif($cat->id == 2)
                                            <img id="moka_cars_{{$cat->id}}"
                                                 src="{{asset('assets/images/icons/blue/cat2.png')}}" class="img-fluid"
                                                 alt=""style="height:140px;width:80%;margin-bottom:20px">
                                        @elseif($cat->id == 3)
                                            <img id="moka_cars_{{$cat->id}}"
                                                 src="{{asset('assets/images/icons/blue/cat3.png')}}" class="img-fluid"
                                                 alt="" style="height:140px;width:80%;margin-bottom:20px">
                                        @else
                                            <img id="moka_cars_{{$cat->id}}"
                                                 src="{{asset('assets/images/icons/blue/cat4.png')}}" class="img-fluid"
                                                 alt=""style="height:140px;width:80%;margin-bottom:20px">
                                        @endif
                                    </div>
                                    <div class="member-info color_site_card_member_font">
                                        <h4 id="textmyfuncMouseOver{{$cat->id}}">{{$cat['Title_'. App::getlocale()]}}</h4>
                                    </div>
                                </a>

                            </div>

                        </div>
                    @endforeach


                </div>
                @elsedesktop
                <div class="row">
                    @foreach($categories as $cat)

                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

                            <div class="member color_site_card" data-aos="fade-up" data-aos-delay="100"
                                 style="width: 300px;height:170px;cursor:pointer;"
                                 onMouseOver="myfuncMouseOver({{$cat->id}})" onMouseOut="myfuncMouseOut({{$cat->id}})">
                                <a href="{{route('subcategory',['name'=>$cat->id])}}" style="text-decoration:none">
                                    <div class="member-img" >
                                        @if($cat->id == 1)
                                            <img id="moka_cars_{{$cat->id}}" class="car"
                                                 src="{{asset('assets/images/icons/blue/cat1.png')}}" class="img-fluid"
                                                 alt="" style="height:74px;width:100%;;margin-bottom:20px">
                                        @elseif($cat->id == 2)
                                            <img id="moka_cars_{{$cat->id}}"
                                                 src="{{asset('assets/images/icons/blue/cat2.png')}}" class="img-fluid"
                                                 alt=""style="height:78px;width:100%;;margin-bottom:20px">
                                        @elseif($cat->id == 3)
                                            <img id="moka_cars_{{$cat->id}}"
                                                 src="{{asset('assets/images/icons/blue/cat3.png')}}" class="img-fluid"
                                                 alt="" style="height:83px;width:100%;margin-bottom:20px">
                                        @else
                                            <img id="moka_cars_{{$cat->id}}"
                                                 src="{{asset('assets/images/icons/blue/cat4.png')}}" class="img-fluid"
                                                 alt=""style="height:82px;width:100%;;margin-bottom:20px">
                                        @endif
                                    </div>
                                    <div class="member-info color_site_card_member_font">
                                        <h4 id="textmyfuncMouseOver{{$cat->id}}">{{$cat['Title_'. App::getlocale()]}}</h4>
                                    </div>
                                </a>

                            </div>

                        </div>
                    @endforeach


                </div>
             @enddesktop
            </div>
        </section>
        <!-- End Icon Boxes Section -->

        <!-- =====  == Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title" style="color:#17286E" data-aos="fade-up">
                    <h2 style="color:#17286E">
                        {{__('home.latest_products')}}
                    </h2>
                </div>


                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            @foreach($categories as $cat)
                                @if($cat->id != 3)
                                @desktop
                                <li data-filter=".filter-{{$cat->id}}" id="product_cat" style="font-size:25px;margin-right:30px;">
                                        <center>
                                            {{$cat['Title_'.App::getlocale()]}}
                                        </center>
                                    </li>
                                @elsedesktop
                                <li data-filter=".filter-{{$cat->id}}" id="product_cat" style="font-size:14px;">
                                        <center>
                                            {{$cat['Title_'.App::getlocale()]}}
                                        </center>
                                    </li>
                                @enddesktop

                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{-- {{ dd($products) }} --}}
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                    @foreach($products as $product)
                    
                        <?php
                        $images = explode('|', $product->images);
                        $rand = rand(0, count($images) - 1);
                        ?>
                            <div class="col-lg-3 col-md-4 portfolio-item filter-{{$product->category->id}}"
                                 style="margin-top: 0;padding-top: 0;">
                                <div class="box" style="margin-top: 0;padding-top: 0;height: 350px">
                                    @if(isset($product->rent))
                                        @if($product->rent == 0 )
                                            <div class="sell_type pt-1" style="position:absolute;right:0;
                                            background:#17286E;color:white;width:100px;height:30px">
                                                {{__('products.for_sell')}}
                                            </div>
                                        @else
                                            <div class="sell_type pt-1" style="position:absolute;right:0;
                                    background:#17286E;color:white;width:100px;height:30px">
                                                {{__('products.for_rent')}}
                                            </div>
                                        @endif
                                    @endif
                                    <div class="sell_type pt-1" style="position:absolute;left:0;
                                    background:#17286E;color:white;width:100px;height:30px">
                                        {{$product->status['Title_'.App::getlocale()]}}
                                    </div>
                                        <a href="{{route('product.details',['product'=>$product->id])}}">
                                        <img src="{{asset('assets/images/products/'.$images[$rand])}}"
                                         style="width:150%;height:200px;margin-left:-40px">
                                        </a>
                                    <img src="{{asset('assets/site/images/site/logo.png')}}"
                                         style="width:50px;height:50px;position:relative;top:-50px;left:90px">
                                    @if($product->payment_method == 'installment')
                                        <div class="sell_type pt-1"
                                             style="position:relative;right:20px;top:-80px;background:#17286E;color:white;width:100px;height:30px">
                                            {{__('products.installment')}}
                                        </div>
                                    @else
                                        <div class="sell_type pt-1"
                                             style="position:relative;right:20px;top:-80px;color:white;width:100px;height:30px">
                                        </div>
                                    @endif

                                    <div class="row" style="height:40px;margin-top: -90px">
                                        <div class="col-2">
                                            <br>
                                            @if(Auth::user())
                                                <a href="{{route('wishlist.action',['action'=>'add','product_id'=>$product->id])}}" style="z-index:999999999999">
                                                <i class="fa fa-heart pl-2" style="font-size:30px;color:#17286E"></i>
                                                </a>
                                            @else
                                                <a href="{{route('login')}}"  style="z-index:999999999999">
                                                    <i class="fa fa-heart pl-2" style="font-size:30px;color:#17286E"></i>
                                                </a>
                                            @endif
                                            <br>
                                            <center>
                                                <label style="padding-left: 5px;font-size:18px;color:#17286E"
                                                       class="pt-1">
                                                    {{$product->price .  $product->user->city->currency}}
                                                </label>
                                            </center>
                                        </div>
                                        <div class="col-8 " style="direction:ltr;text-align:right">
                                            <div class="row mt-4">
                                                @if($product->category->id == 2 )
                                                    <div class="col-12 text-center h5 pt-4"
                                                         style="margin-left:15px;color:#17286E;font-weight: bolder">
                                                        <center>
                                                            {{$product->title}}

                                                        </center>
                                                    </div>
                                                @endif

                                                @if($product->category->id != 2 )
                                                    <div class="col-10 "
                                                         style="font-size:16px;direction:rtl;text-align:right;color:#17286E;font-weight: bolder">
                                                        {{-- @if(isset($product->title))
                                                             {{$product->title}}
                                                         @else
                                                             Default Name
                                                         @endif--}}
                                                        @if(isset($product->make))
                                                            {{$product->make['Title_'.App::getlocale()]}}
                                                        @else
                                                            Default Name
                                                        @endif
                                                        <br>
                                                        {{$product->year}}

                                                    </div>
                                                @endif
                                                @if($product->category->id != 2 )

                                                    @if($product->make)
                                                        <div class="col-1 pl-2">
                                                            <img style="height:40px;width:40px"
                                                                 src="{{asset('assets/images/makes/'.$product->make->image)}}"
                                                                 alt="">
                                                        </div>
                                                    @else
                                                        <div class="col-1 pl-2">
                                                            <img style="height:40px;width:40px"
                                                                 src="{{asset('assets/images/makes/default.png')}}"
                                                                 alt="">
                                                        </div>
                                                    @endif

                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                    <div class="btn-wrap" style="margin-top: 45px;">
                                        <a href="https://wa.me/{{ $product->user->city->code .$product->user->phone1 }}?text=product%20link%20:%20http://127.0.0.1:8000/product/details/{{$product->id}}"
                                           data-action="share/whatsapp/share" target="_blank"
                                           class=" text-white text-decoration-none" >
                                            <img src="{{asset('assets/site/images/site/whatapp.png')}}" height="30"
                                                 width="30" alt="...">
                                        </a>
                                        &#160;

                                        <a href="tel:+{{$product->user->phone1}}" target="_blank"
                                           class=" text-white text-decoration-none">
                                            <img src="{{asset('assets/site/images/site/phone.png')}}" height="30"
                                                 width="30" alt="...">
                                        </a>

                                        <span style="float: right;margin-top: -20px">
                                        <a class="loc" style="font-size:13px">
                                            <i class="bi bi-geo-alt-fill"></i><br>
                                            {{$product->district['Title_'.App::getlocale()] }}
                                        </a>
                                        <img src="{{asset('assets/images/cities/'.$product->city->flag)}}" alt=""
                                             style="width:25px;height:25px">
                                        </span>
                                    </div>
                                </div>
                            </div>



                    @endforeach
                    {{--    <div class="row text-center">

                            <a href="{{route('subcategory',['name'=>1])}}" class="col-sm-12  portfolio-item   filter-{{1}} text-center" style="margin-top: 0;padding-top: 0;color:#17286E;cursor: pointer">
                                {{'Show More'}} {{\App\models\Category::find(1)['Title_'.App::getlocale()]}}
                            </a>
                            <a href="{{route('subcategory',['name'=>2])}}" class="col-sm-12  portfolio-item   filter-{{2}} text-center" style="margin-top: 0;padding-top: 0;color:#17286E;cursor: pointer">
                                {{'Show More'}} {{\App\models\Category::find(2)['Title_'.App::getlocale()]}}
                            </a>
                            <a href="{{route('subcategory',['name'=>4])}}" class="col-sm-12  portfolio-item   filter-{{4}} text-center" style="margin-top: 0;padding-top: 0;color:#17286E;cursor: pointer">
                                {{'Show More'}} {{\App\models\Category::find(4)['Title_'.App::getlocale()]}}
                            </a>
                            </center>

                        </div>--}}
                </div>


            </div>
        </section><!-- End Portfolio Section -->


        <!-- ======= Auto Shops Section ======= -->
        <section id="team" class="team section-bg" style="padding:1px;background:#F3F3F3">
            <div class="container">


                <div class="section-title" style="color:#17286E" data-aos="fade-up">
                    <h2 style="color:#17286E">{{__('home.shops')}}</h2>
                </div>
 
                <div class="row text-center">
                    @foreach($autoShops as $shop)
                        <div class="col-lg-4 col-sm-4 " style='cursor:pointer;'>
                            <a href="{{route('profile-index',['type'=>'vendor','id'=>$shop->id])}}">
                                <div class="member" data-aos="fade-up" data-aos-delay="100"
                                     style="padding:0px">
                                    <div class="member-img">
                                        <img src="{{asset('assets/images/users/'.$shop->cover)}}" class="img-fluid"
                                             alt="" style="height:200px;width:100%;padding:0">
                                    </div>
                                    <div class="member-info" style="width:100%;padding:0">
                                        <div class="row" style="padding:0">
                                            <ul class="col-sm-12 pb-5">
                                                <br>
                                                <h6 style="color:#17286E;font-weight: bolder">{{$shop->name}}</h6>
                                                <h5 style="height:130px;padding:30px">
                                                    <li>
                                                        <i class="fas fa-briefcase"></i>
                                                        @if(strlen($shop->company_name) > 12 )
                                                            {{substr($shop->company_name, 0, 14)}}
                                                        @else
                                                            {{$shop->company_name}}
                                                        @endif
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <i class="fas fa-briefcase"></i>
                                                        {{$shop->MyshopType['Title_'. App::getlocale()]}}
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <i class="fas fa-briefcase"></i>
                                                        {{$shop->city['Title_'. App::getlocale()]}}
                                                    </li>


                                                </h5>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                        @if(LaravelLocalization::getCurrentLocale() == 'en')

                            <a href="{{route('get_all_shops')}}"
                               class="col-sm-12  portfolio-item   filter-{{1}} text-left"
                               style="margin-top: 0;padding-top: 0;color:#17286E;cursor: pointer">
                                {{__('home.show_more')}}
                            </a>
                        @else

                            <a href="{{route('get_all_shops')}}"
                               class="col-sm-12  portfolio-item   filter-{{1}} text-right"
                               style="margin-top: 0;padding-top: 0;color:#17286E;cursor: pointer">
                                {{__('home.show_more')}}
                            </a>
                            @endif


                </div>

            </div>
        </section><!-- End Auto Shops Section -->


        <!-- =======  maintenance_center Section ======= -->
        <section id="team" class="team section-bg" style="padding:1px;background:#F3F3F3">
            <div class="container">
                <br><br>
                <div class="section-title" style="color:#17286E" data-aos="fade-up">
                    <h2 style="color:#17286E">{{__('home.maintenance_center')}}</h2>
                </div>

                <div class="row text-center">
                    @foreach($autoShopsCenters as $shop)
                        <div class="col-lg-4 col-sm-4 " style='cursor:pointer;'>
                            <a href="{{route('profile-index',['type'=>'maintenance','id'=>$shop->id])}}">
                                <div class="member" data-aos="fade-up" data-aos-delay="100"
                                     style="padding:0px">
                                    <div class="member-img">
                                        <img src="{{asset('assets/images/autoShops/'.$shop->cover)}}" class="img-fluid"
                                             alt="" style="height:200px;width:100%;padding:0">
                                    </div>
                                    <div class="member-info" style="width:100%;padding:0">
                                        <div class="row" style="padding:0">
                                            <ul class="col-sm-12 pb-5">
                                                <br>
                                                <h6 style="color:#17286E;font-weight: bolder">{{$shop->name}}</h6>

                                                <h5 style="height:130px;padding:30px">
                                                    <li>
                                                        <i class="fas fa-briefcase"></i>
                                                        {{$shop->specialization['Title_'. App::getlocale()]}}
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <i class="fab fa-creative-commons-nd"></i>
                                                        {{$shop->selltype['Title_'. App::getlocale()]}}
                                                    </li>
                                                    <br>
                                                    @if($shop->typecategory)
                                                    <li>
                                                        <i class="fab fa-creative-commons-nd"></i>
                                                        {{$shop->typecategory['Title_'. App::getlocale()]}}
                                                    </li>
                                                        @else
                                                        <li>
                                                            <i class="fab fa-creative-commons-nd"></i>
                                                            {{'Default'}}
                                                        </li>
                                                    @endif
                                                </h5>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                    @endforeach
                        @if(LaravelLocalization::getCurrentLocale() == 'en')
                            <a href="{{route('subcategory',['name'=>3])}}"
                               class="col-sm-12  portfolio-item   filter-{{1}} text-left"
                               style="margin-top: 0;padding-top: 0;color:#17286E;cursor: pointer">
                                {{__('home.show_more')}}
                            </a>
                            @else
                            <a href="{{route('subcategory',['name'=>3])}}"
                               class="col-sm-12  portfolio-item   filter-{{1}} text-right"
                               style="margin-top: 0;padding-top: 0;color:#17286E;cursor: pointer">
                                {{__('home.show_more')}}
                            </a>
                            @endif


                </div>

            </div>
        </section><!-- End Auto Shops Section -->


        <!-- ======= How To Use AutoBazar Section ======= -->
        <section id="services" class="services" style="padding:1px;background:#F3F3F3">
            <div class="container">
                <br>

                <div class="section-title" style="color:#17286E" data-aos="fade-up">
                    <h2 style="color:#17286E">{{__('home.how_to_user')}}</h2>
                </div>

                <div class="row m-2">
                    <div class="col-12 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><h2>1</h2></div>
                            <div ><img src="{{asset('assets/site/homepage/assets/img/shape1.png')}}" style="height:150px"></div>
                            <h4 class="title"><a href="">{{__('home.how_to_user_title_1')}}</a></h4>
                            <p class="description m-3" style="font-weight:bolder;font-size:17px">{{__('home.how_to_user_description_1')}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><h2>2</h2></div>
                            <div class=""><img src="{{asset('assets/site/homepage/assets/img/shape2.png')}}" style="height:150px"></div>
                            <h4 class="title"><a href="">{{__('home.how_to_user_title_2')}}</a></h4>
                            <p class="description m-3" style="font-weight:bolder;font-size:17px">{{__('home.how_to_user_description_2')}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><h2>3</h2></div>
                            <div class=""><img src="{{asset('assets/site/homepage/assets/img/shape3.png')}}" style="height:150px"></div>
                            <h4 class="title"><a href="">{{__('home.how_to_user_title_3')}}</a></h4>
                            <p class="description m-3" style="font-weight:bolder;font-size:17px">{{__('home.how_to_user_description_3')}}</p>
                        </div>
                    </div>


                </div>

            </div>
        </section><!-- End How To Use AutoBazar Section -->


        {{--      <!-- ======= Pricing Section ======= -->
              <section id="pricing" class="pricing" style="padding:1px;background:#F3F3F3">
                  <div class="container" data-aos="fade-up">
                      <br>
                      <div class="section-title">
                          <h2>Subscriptions / Pricing</h2>
                      </div>

                      <div class="row">

                          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                              <div class="box">
                                  <h3>LITE PLANE</h3>
                                  <img src="assets/img/dollar.png">
                                  <h4><sup>$</sup>18.99<span> / month</span></h4>
                                  <ul>
                                      <li>1. Lorem Ipusum</li>
                                      <li>2. Lorem Ipusum</li>
                                      <li>3. Lorem Ipusum</li>
                                  </ul>
                                  <div class="btn-wrap">
                                      <a href="#" class="btn-buy">Buy Now</a>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                              <div class="box">
                                  <span class="advanced">Most Popular</span>
                                  <h3>MEDIUM PLAN </h3>
                                  <img src="assets/img/dollar 2.png">
                                  <h4><sup>$</sup>42.99<span> / month</span></h4>
                                  <ul>
                                      <li>1. Lorem Ipusum</li>
                                      <li>2. Lorem Ipusum</li>
                                      <li>3. Lorem Ipusum</li>
                                  </ul>
                                  <div class="btn-wrap">
                                      <a href="#" class="btn-buy">Buy Now</a>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                              <div class="box">
                                  <h3>ULTIMATE PLAN</h3>
                                  <img src="assets/img/dollar 3.png">
                                  <h4><sup>$</sup>80.99<span> / month</span></h4>
                                  <ul>
                                      <li>1. Lorem Ipusum</li>
                                      <li>2. Lorem Ipusum</li>
                                      <li>3. Lorem Ipusum</li>
                                  </ul>
                                  <div class="btn-wrap">
                                      <a href="#" class="btn-buy">Buy Now</a>
                                  </div>
                              </div>
                          </div>

                      </div> <br><br>
                      <a href="#" class="btnkda">View In Full Pagee <i class="bi bi-arrow-right" ></i> </a>


                  </div>
              </section>
              <!-- End Pricing Section -->--}}


    </main><!-- End #main -->
    <!-- Template Main JS File -->

    <script>
        function myfuncMouseOver(id) {
            var image = '';
            //alert(id);
            switch (id) {
                case 1:
                    image = 'cat1.png';
                    break;
                case 2:
                    image = 'cat2.png';
                    break;
                case 3:
                    image = 'cat3.png';
                    break;
                case 4:
                    image = 'cat4.png';
                    break;
            }
            document.getElementById('textmyfuncMouseOver' + id).style.color = 'white';
            document.getElementById('moka_cars_' + id).src = '{{asset('assets/images/icons/white/')}}' + '/' + image;
        }

        function myfuncMouseOut(id) {
            //alert(id);
            var image = '';
            switch (id) {
                case 1:
                    image = 'cat1.png';
                    break;
                case 2:
                    image = 'cat2.png';
                    break;
                case 3:
                    image = 'cat3.png';
                    break;
                case 4:
                    image = 'cat4.png';
                    break;
            }
            document.getElementById('textmyfuncMouseOver' + id).style.color = "#17286E";
            document.getElementById('moka_cars_' + id).src = '{{asset('assets/images/icons/blue/')}}' + '/' + image;


        }
    </script>

    <script src="{{asset('assets/site/homepage/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <script src="{{asset('assets/site/homepage/assets/vendor2/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/js/main.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/js/main2.js')}}"></script>

@stop
