@extends('layouts.app_martina')
<?php
$sellTypesCount = count($sellTypes);

$sellTypesCount /=6;
$cycles = round($sellTypesCount);
/*if($cycles == 0 ){
    $cycles = 1;
}*/
?>
@section('content')
    @if($id != 3)
    <!-- ======= Hero Section ======= -->
    <section id="hero" >
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
            <?php
            $start = 992784213;
            ?>
            @for($i=0;$i<count($slider);$i++)

                <?php
                $advCat = strval($slider[$i]["advCat"]);
                $advArr = ["all", $id ];
                ?>
                @if(in_array( $advCat,$advArr))
                    @if($start == 992784213)
                        <!-- Slide 1 -->
                            <style>
                                .carousel-inner {
                                    height :550px;
                                    background-image: url({{asset('assets/images/advertisements/'.$slider[$i]['image'])}});
                                    background-size: 50% 100%;
                                    object-fit: contain;
                                    background-repeat: no-repeat;
                                }

                                @media (min-width: 360px) {
                                    #hero {
                                        height: 35vh;
                                    }
                                    .my_slider_btn{
                                        position:relative;
                                        top: 250px;
                                    }

                                }
                                @media (min-width: 1496px) {
                                    #hero {
                                        height: 70vh;
                                    }
                                    .my_slider_btn{
                                        position:relative;
                                        top: 150px;
                                    }
                                }
                                .row{
                                    margin-right:-19px;
                                }

                            </style>
                            @if($slider[$i]['version'] == 1)
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
                                                        <div class="row" style="height:13%" >
                                                            <div class="col-sm-12 h1 text-center">
                                                                {{$slider[$i]['advName']}}
                                                            </div>

                                                        </div>
                                                        <div class="row" style="height:33%;">


                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/2.png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advFullType'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/calendar (1).png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advYear'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/gearshift (1).png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advGear'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/makes')}}/{{$slider[$i]->mark->image}}"  height="70" class="d-inline-block align-top w-100" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <br>
                                                                    <h6 class="" style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advCondition}}</h6>

                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/gearshift (1).png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    <h6 class="" style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advSlinder . ' Slender'}} </h6>
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/665.png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    <h6 class="" style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advEngineCapacity . ' hp'}} </h6>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="row my_slider_btn" style="height:33%;display: block">
                                                            <div class="col-sm-12 h5 text-center">
                                                                <a class="btn color_site_btn animate__animated animate__fadeInUp scrollto " href="{{$slider[$i]['advLink']}}">Show More</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @elseif($slider[$i]['version'] == 2)
                                <div class="carousel-item active" style="background-image: url({{asset('assets/images/advertisements/'.$slider[$i]['image'])}});background-size: 100% 100%;object-fit: contain;">
                                    <div class="carousel-container">
                                        <div class="container">

                                            <div class="row ">
                                                <div class="col-sm-12" style="cursor:pointer">
                                                    <div class="row" style="height:33%">
                                                        <div class="col-sm-12 h5 text-center">
                                                            <a class="btn color_site_btn animate__animated animate__fadeInUp scrollto " href="">Show More</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="carousel-item active" style="background-image: url('{{asset('assets/images/advertisements/'.$slider[$i]['image'])}}');background-size: 50% 100%;object-fit: contain;">
                                    <div class="carousel-container">
                                        <div class="container">
                                            <div class="row ">
                                                <div class="col-sm-6">
                                                    {{--
                                                                                                        <img src="{{asset('assets/images/profileMaintenance/1629833203_mohamed.jpg')}}" alt="" style="height:500px;width:100%">
                                                    --}}
                                                </div>
                                                <div class="col-sm-6 p-4 " style="height:500px">
                                                    <div class="container">
                                                        <div class="row" style="height:13%" >
                                                            <div class="col-sm-12 h1 text-center">
                                                                Name
                                                            </div>
                                                        </div>
                                                        <div class="row" style="height:33%;">
                                                            <div class="col-sm-12  text-left p-5">
                                                                Details Details DetailsDetailsD
                                                                etailsDetailsDetailsDetailsDetailsDetailsDetailsDetailsDetailsDetailsD
                                                                etailsDetailsDetailsDetailsDetailsDetailsDetails
                                                            </div>
                                                        </div>

                                                        <div class="row" style="height:33%">
                                                            <div class="col-sm-12 h5 text-center">
                                                                <a class="btn color_site_btn animate__animated animate__fadeInUp scrollto " href="">Show More</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <?php  $start = 1; ?>
                        @else
                            @if($slider[$i]['version'] == 1)
                                <div class="carousel-item  " style="">
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
                                                        <div class="row" style="height:13%" >
                                                            <div class="col-sm-12 h1 text-center">
                                                                {{$slider[$i]['advName']}}
                                                            </div>

                                                        </div>
                                                        <div class="row" style="height:33%;">


                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/2.png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advFullType'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/calendar (1).png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advYear'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/gearshift (1).png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    {{$slider[$i]['advGear'] }}
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/makes')}}/{{$slider[$i]->mark->image}}"  height="70" class="d-inline-block align-top w-100" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <br>
                                                                    <h6 class="" style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advCondition}}</h6>

                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/gearshift (1).png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    <h6 class="" style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advSlinder . ' Slender'}} </h6>
                                                                </div>
                                                            </div>
                                                            <div class="logo_slider col-sm-4 col-lg-3  mb-3">
                                                                <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                                                                    <img  src="{{asset('assets/images/icons/last_part/665.png')}}"  height="45" class="d-inline-block align-top w-100" alt="">
                                                                    <br>
                                                                    <h6 class="" style="vertical-align: middle; color: #17286E;">{{$slider[$i]->advEngineCapacity . ' hp'}} </h6>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="row my_slider_btn" style="height:33%;display: block">
                                                            <div class="col-sm-12 h5 text-center">
                                                                <a class="btn color_site_btn animate__animated animate__fadeInUp scrollto " href="{{$slider[$i]['advLink']}}">Show More</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @elseif($slider[$i]['version'] == 2)
                                <div class="carousel-item " style="background-image: url({{asset('assets/images/advertisements/'.$slider[$i]['image'])}});background-size: 100% 100%;object-fit: contain;">
                                    <div class="carousel-container">
                                        <div class="container">

                                            <div class="row ">
                                                <div class="col-sm-12" style="cursor:pointer">
                                                    <div class="row" style="height:33%">
                                                        <div class="col-sm-12 h5 text-center">
                                                            <a class="btn color_site_btn animate__animated animate__fadeInUp scrollto " href="">Show More</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="carousel-item " style="background-image: url('{{asset('assets/images/advertisements/'.$slider[$i]['image'])}}');background-size: 50% 100%;object-fit: contain;">
                                    <div class="carousel-container">
                                        <div class="container">
                                            <div class="row ">
                                                <div class="col-sm-6">
                                                    {{--
                                                                                                        <img src="{{asset('assets/images/profileMaintenance/1629833203_mohamed.jpg')}}" alt="" style="height:500px;width:100%">
                                                    --}}
                                                </div>
                                                <div class="col-sm-6 p-4 " style="height:500px">
                                                    <div class="container">
                                                        <div class="row" style="height:13%" >
                                                            <div class="col-sm-12 h1 text-center">
                                                                Name
                                                            </div>
                                                        </div>
                                                        <div class="row" style="height:33%;">
                                                            <div class="col-sm-12  text-left p-5">
                                                                Details Details DetailsDetailsD
                                                                etailsDetailsDetailsDetailsDetailsDetailsDetailsDetailsDetailsDetailsD
                                                                etailsDetailsDetailsDetailsDetailsDetailsDetails
                                                            </div>
                                                        </div>

                                                        <div class="row" style="height:33%">
                                                            <div class="col-sm-12 h5 text-center">
                                                                <a class="btn color_site_btn animate__animated animate__fadeInUp scrollto " href="">Show More</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    </section><!-- End Hero -->
    <br>
    <main id="main">

        <center>

                <div class="row">
                    <div class="col-md-12">
                            <!-- Carousel indicators -->
                            <!-- Wrapper for carousel items -->
                                    <div class="item carousel-item active  team ">
                                        <div class="row p3">
                                            @for($j=0;$j< count($sellTypes);$j++)
                                                <div class="col-sm-3  col-lg-2 align-items-stretch " onMouseOver="myfuncMouseOver({{$sellTypes[$j]['id']}},'{{$sellTypes[$j]['image']}}')" onMouseOut="myfuncMouseOut({{$sellTypes[$j]['id']}},'{{$sellTypes[$j]['image']}}')" >
                                                    <div class="member color_site_card p3" data-aos="fade-up" data-aos-delay="100" style="width: 250px;height:230px;cursor:pointer;"   >
                                                        <a href="{{route('type.subcategory',['type_category'=>$sellTypes[$j]['id'] ] )}}" style="text-decoration:none">
                                                            <div class="member-img">
                                                                <img id="moka_cars_{{$sellTypes[$j]['id']}}" src="{{asset('assets/images/icons/blue/'.$sellTypes[$j]['image'])}}" class="img-fluid" alt="" style="height:100px;width:100%;">
                                                            </div>
                                                            <div class="member-info color_site_card_member_font">
                                                                <h4 id="textmyfuncMouseOver{{$sellTypes[$j]['id']}}">{{$sellTypes[$j]['Title_'. App::getlocale()]}}</h4>
                                                            </div>
                                                        </a>

                                                    </div>

                                                </div>
                                            @endfor
                                        </div>
                                     </div>
                            <!-- Carousel controls -->


                    </div>
                </div>

        </center>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
          {{--  <div class="section-title" data-aos="fade-up">
                <h2>Recommended Products</h2>
            </div>--}}
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                @foreach($products as $product)
                    <?php
                    $images = explode('|',$product->images);
                    $rand = rand(0,count($images)-1);
                    ?>
                    <a href="{{route('product.details',['product'=>$product->id])}}">
                        <div class="col-lg-3 col-md-4 portfolio-item filter-{{$product->category->id}}" style="margin-top: 0;padding-top: 0">
                            <div class="box"  style="margin-top: 0;padding-top: 0">
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
                                <img src="{{asset('assets/images/products/'.$images[$rand])}}" style="width:150%;height:200px;margin-left:-40px">
                                <img src="{{asset('assets/site/images/site/logo.png')}}" style="width:50px;height:50px;position:relative;top:-50px;left:90px">
                                @if($product->payment_method == 'installment')
                                    <div class="sell_type pt-1" style="position:relative;right:20px;top:-80px;background:#17286E;color:white;width:100px;height:30px">
                                        {{__('products.installment')}}
                                    </div>
                                @else
                                    <div class="sell_type pt-1" style="position:relative;right:20px;top:-80px;color:white;width:100px;height:30px">
                                    </div>
                                @endif

                                <div class="row" style="height:40px;margin-top: -90px">
                                    <div class="col-sm-2">
                                        <br>
                                        <i class="fa fa-heart pl-2" style="font-size:30px;color:#17286E"></i>
                                        <br>
                                        <center>
                                            <label style="padding-left: 5px;font-size:18px;color:#17286E" class="pt-1">
                                                {{$product->price .  $product->user->city->currency}}
                                            </label>
                                        </center>
                                    </div>
                                    <div class="col-sm-8 " style="direction:ltr;text-align:right">
                                        <div class="row mt-4">
                                            @if($product->category->id == 2 )
                                                <div class="col-12 text-center h5 pt-4" style="margin-left:15px;color:#17286E;font-weight: bolder">
                                                    <center>
                                                        {{$product->title}}

                                                    </center>
                                                </div>
                                            @endif

                                            @if($product->category->id != 2 )
                                                <div class="col-10 " style="font-size:16px;direction:rtl;text-align:right;color:#17286E;font-weight: bolder">
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
                                                        <img style="height:40px;width:40px" src="{{asset('assets/images/makes/'.$product->make->image)}}" alt="">
                                                    </div>
                                                @else
                                                    <div class="col-1 pl-2">
                                                        <img style="height:40px;width:40px" src="{{asset('assets/images/makes/default.png')}}" alt="">
                                                    </div>
                                                @endif

                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="btn-wrap">
                                    <a href="https://wa.me/{{ $product->user->city->code .$product->user->phone1 }}?text=product%20link%20:%20http://127.0.0.1:8000/product/details/{{$product->id}}" data-action="share/whatsapp/share" target="_blank" class=" text-white text-decoration-none">
                                        <img src="{{asset('assets/site/images/site/whatapp.png')}}" height="30" width="30" alt="...">
                                    </a>
                                    &#160;

                                    <a href="tel:+{{$product->user->phone1}}" target="_blank" class=" text-white text-decoration-none">
                                        <img src="{{asset('assets/site/images/site/phone.png')}}" height="30" width="30" alt="...">
                                    </a>

                                    <span style="float: right;margin-top: -20px">
                                        <a class="loc" style="font-size:13px">
                                            <i class="bi bi-geo-alt-fill"></i><br>
                                            {{$product->district['Title_'.App::getlocale()] }}
                                        </a>
                                        <img src="{{asset('assets/images/cities/'.$product->city->flag)}}" alt="" style="width:25px;height:25px">
                                        </span>
                                </div>
                            </div>
                        </div>
                    </a>


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



</main>
    @else
        <main id="main">
            <!-- ======= Auto Shops Section ======= -->
            <section id="team" class="team section-bg">
                <div class="container">
                    <div class="section-title" data-aos="fade-up">
                        <h2>{{__('home.maintenance_center')}}</h2>
                    </div>
                    <div class="row">
                    @foreach($specialization as $spec)
                            <a onMouseOver="myfuncMouseOver({{$spec['id']}},'{{$spec['image']}}')" onMouseOut="myfuncMouseOut({{$spec['id']}},'{{$spec['image']}}')" class="col-lg-3 col-sm-4" href="{{route('type.ProfileWithCat',['type'=>$spec->id])}}" style="text-decoration:none;display:inline-block">
                            <div class="col-sm-3 align-items-stretch " onMouseOver="myfuncMouseOver({{$spec->id}})" onMouseOut="myfuncMouseOut({{$spec->id}})"  >
                                <div class="member color_site_card p3" data-aos="fade-up" data-aos-delay="100" style="width: 250px;height:180px;cursor:pointer;"   >
                                    <div>
                                        <div class="member-img">
                                            <img id="moka_cars_{{$spec['id']}}" src="{{asset('assets/images/icons/blue/'.$spec['image'])}}" class="img-fluid" alt="" style="height:100px;width:100%;">
                                        </div>
                                        <h4 id="textmyfuncMouseOver{{$spec->id}}">{{$spec['Title_'. App::getlocale()]}}</h4>
                                    </div>
                                </div>
                            </div>
                            </a>

                    @endforeach
                    </div>


                    <hr>

                    <br>
                    <div class="row">

                        @foreach($autoShops as $shop)
                            <div class="col-lg-3 col-sm-4 d-flex align-items-stretch" style='cursor:pointer;'>
                                <a  href="{{route('profile-index',['type'=>'maintenance','id'=>$shop->id])}}">
                                    <div class="member" data-aos="fade-up" data-aos-delay="100" style="padding:0px;width:250px">
                                        <div class="member-img" >
                                            <img src="{{asset('assets/images/autoShops/'.$shop->cover)}}" class="img-fluid" alt="" style="height:200px;width:100%;padding:0">
                                        </div>
                                        <div class="member-info" style="width:100%;padding:0" >
                                            <div class="row" style="padding:0">
                                                <ul class="col-sm-12 pb-5" >
                                                    <br>
                                                    <h6>{{$shop->name}}</h6>

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
                    </div>

                </div>
            </section><!-- End Auto Shops Section -->

        </main>
    @endif

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

    <script>
        function myfuncMouseOver(id,image) {
           // alert(id);
            //alert(image);
            document.getElementById('textmyfuncMouseOver'+id).style.color = 'white';
            document.getElementById('moka_cars_'+id).src = '{{asset('assets/images/icons/white/')}}'+'/'+image;
        }
        function myfuncMouseOut(id,image){
            //alert(id);
            document.getElementById('textmyfuncMouseOver'+id).style.color = "#17286E";
            document.getElementById('moka_cars_'+id).src = '{{asset('assets/images/icons/blue/')}}'+'/'+image;


        }
    </script>

@stop
