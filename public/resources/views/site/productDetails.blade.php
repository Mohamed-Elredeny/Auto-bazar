@extends('layouts.app_martina')
<style>
    img {
        vertical-align: middle;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;

    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;

    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */


    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }


    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column {
        float: left;
        width: 16%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }
</style>
@section('content')
    <?php $advs = explode('|', $product->advandage_id);?>

    <section style="padding:10px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="container">
                        <?php $images = explode('|', $product->images);?>
                        @for($i = 1; $i <= count($images); $i++)
                            <div class="mySlides">
                                <img src="{{asset('assets/images/products')}}/{{$images[$i-1]}}" height="350"
                                     class="d-block w-100">
                            </div>
                        @endfor
                        <center>
                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>
                        </center>


                        <div class="caption-container">
                            <p id="caption"></p>
                        </div>

                        <div class="row">
                            <center>


                                @for($i = 1; $i <= count($images); $i++)
                                    <div class="column ml-3 pb-1">
                                        <img class="demo cursor"
                                             src="{{asset('assets/images/products')}}/{{$images[$i-1]}}"
                                             style="width:100%;" onclick="currentSlide({{$i}})">
                                    </div>
                                @endfor
                            </center>
                        </div>
                    </div>
                    {{--Old Slider--}}
                    {{--
                                        <div id="carouselExampleCaptions" class="carousel slide m-5" data-ride="carousel">
                                            <ol class="carousel-indicators" style="bottom: -50px;">
                                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active backgroundColor" style="border-radius: 100%;
                                              height: 9px;
                                              width: 9px;
                                              "></li>
                                                <li data-target="#carouselExampleCaptions" data-slide-to="1" class="backgroundColor" style="border-radius: 100%;
                                              height: 9px;
                                              width: 9px;"></li>
                                            </ol>
                                            <div class="carousel-inner w-100 m-auto">
                                                <?php $images = explode('|', $product->images) ;?>
                                                <div class="carousel-item active">
                                                    <img src="{{asset('assets/images/products')}}/{{$images[0]}}" height="350" class="d-block w-100" alt="...">
                                                </div>
                                                @for($i = 1; $i < count($images); $i++)
                                                    <div class="carousel-item">
                                                        <img src="{{asset('assets/images/products')}}/{{$images[$i]}}" height="350" class="d-block w-100" alt="...">
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                    --}}
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="m-5">
                        <!--<div class="mb-4">-->
                        <!--    <a href="#" class="smallColor text-decoration-none">Car Showrooms</a> >-->
                        <!--    <a href="#" class="smallColor text-decoration-none">{{$product->category->Title_en}}</a>-->
                        <!--</div>-->
                        <div class="mb-3">
                            <h3>
                               {{-- @if(isset($product->make))
                                    {{$product->make->Title_en}}
                                @endif--}}
                                {{$product->title}}
                                <br>
                                {{--
                                                                    {{$product->model}} {{$product->year}}
                                --}}
                            </h3>
                            <h3 class="maincolor">${{$product->price}}</h3>
                            <div class="smallColor mt-3">
                                {{$product->description}}
                            </div>
                            <div class="smallColor mt-3">
                                <div class="wishBtn m-1 p-1 pr-2 pl-2" style="color:white">
                                    @if($product->rent == 1)
                                        <center>
                                            For Rent
                                            <br>
                                            <?php
                                            echo $product->rent_period;

                                            if ($product->rent_type == 'hour') {
                                                echo 'Hours';
                                            } elseif ($product->rent_type == 'day') {
                                                echo 'Days';
                                            } elseif ($product->rent_type == 'week') {
                                                echo 'Weeks';
                                            } elseif ($product->rent_type == 'month') {
                                                echo 'Months';
                                            } elseif ($product->rent_type == 'year') {
                                                echo 'Months';
                                            }
                                            ?>
                                        </center>
                                    @elseif($product->rent == 0)
                                        <center>
                                           {{__('product.for_sell')}}
                                        </center>
                                    @else
                                        <center>
                                            {{__('product.for_wanted')}}
                                        </center>
                                    @endif
                                </div>
                            </div>
                            <div class="  mb-3 justify-content-around d-flex" style="font-size:13px">
                                <div class="wishBtn m-1 p-1 pr-2 pl-2">
                                    <a href="#" class=" text-white text-decoration-none"> <i class="far fa-heart"> </i>
                                        {{__('product.add_to_wishlist')}}</a>
                                </div>
                                <div class="wishBtn m-1 p-1 pr-2 pl-2">
                                    <a href="https://wa.me/{{ $product->user->city->code .$product->user->phone1 }}?text=product%20link%20:%20http://127.0.0.1:8000/product/details/{{$product->id}}"
                                       data-action="share/whatsapp/share" target="_blank"
                                       class=" text-white text-decoration-none"> <img
                                            src="{{asset('assets/site/images/site/whatapp.png')}}" height="20"
                                            width="20" alt="..."> {{__('product.contact_watsapp')}}</a>
                                    {{-- <a href="https://wa.me/{{$product->user->phone}}?text=http://127.0.0.1:8000/product/details/{{$product->id}}" data-action="share/whatsapp/share" height="20" width="20" alt="...">Share Contact whatsapp</a> --}}
                                </div>
                                <div class="wishBtn m-1 p-1 pr-2 pl-2">
                                    <a href="tel:+{{$product->user->phone1}}" target="_blank"
                                       class=" text-white text-decoration-none"> <i class="fa fa-phone"> </i> {{__('product.Direct_connection')}}</a>
                                    {{-- <a href="tel:+900300400">Phone: 900 300 400</a> --}}
                                </div>

                            </div>
                            <div class="row d-flex justify-content-around d-flex align-items-center">

                                <div>
                                    <div style="width: 15px;
                                height: 15px;
                                border-radius:50%;
                                background: #FF9B40;
                                display: inline-block;"></div> {{$product->status->Title_en}}
                                </div>
                                <div>
                                    <i class="fas fa-map-marker-alt smallColor"></i> {{$product->user->city->Title_en}}
                                </div>
                            </div>
                            <div class="smallColor mt-3">{{__('product.Sold_By')}}</div>
                            <h5 class="mt-2">{{$product->user->fname}} {{$product->user->lname}}</h5>
                            <div>
                                <a href="{{$product->user->phone1}}">
                                    <img src="{{asset('assets/site/images/site/whatapp.png')}}" height="30" width="30"
                                         alt="...">
                                </a>
                                <a href="{{$product->user->facebook}}">
                                    <img src="{{asset('assets/site/images/site/face.png')}}" height="30" width="30"
                                         alt="...">
                                </a>
                                <a href="{{$product->user->instgram}}">
                                    <img src="{{asset('assets/site/images/site/insta.png')}}" height="30" width="30"
                                         alt="...">
                                </a>
                                <a href="{{$product->user->twitter}}">
                                    <img src="{{asset('assets/site/images/site/twitter.png')}}" height="30" width="30"
                                         alt="...">
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row m-4 ">
                <div class="col-12 mt-4">
                    <ul class="nav nav-tabs " id="myTab" role="tablist">
                        @if(isset($product->make) && $product->category->id != 2)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link  maincolor " id="home1-tab" data-toggle="tab" href="#home1" role="tab"
                               aria-controls="home1" aria-selected="false">{{__('product.Overviw')}}</a>
                        </li>
                        @endif
                        <li class="nav-item" role="presentation">
                            <a class="nav-link maincolor" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">{{__('product.Specifications')}}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link maincolor" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">{{__('product.Detailed_Specifications')}}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link maincolor" id="seller-tab" data-toggle="tab" href="#seller" role="tab"
                               aria-controls="seller" aria-selected="false">{{__('product.Seller_Information')}}</a>
                        </li>
                        @if($product->advandage_id  != '')
                        <li class="nav-item" role="presentation">
                                <a class="nav-link maincolor" id="seller-tab" data-toggle="tab" href="#adv" role="tab"
                                   aria-controls="adv" aria-selected="false">{{__('product.advantages')}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-12 mt-4">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home1-tab">

                        @if(isset($product->make) && $product->category->id != 2)
                                <div class="m-4 d-flex align-items-center">
                                    <img src="{{asset('assets/images/makes')}}/{{$product->make->image}}" height="70"
                                         width="70" class="rounded-circle" alt="...">
                                    <div class="p-2">
                                        <div class="font-weight-bold">{{$product->make->Title_en}}</div>
                                        <div class="smallColor">{{$product->model}} {{$product->year}}</div>
                                    </div>
                                </div>
                                <div class="m-4">
                                    {{$product->description}}
                                </div>

                        @endif
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="m-3 row">
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">{{__('product.sell_type')}}:</div>
                                    <div>{{$product->sellType['Title_'. App::getlocale()]}}</div>
                                </div>
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">{{__('product.mark')}}:</div>
                                    @if(isset($product->make))
                                        <div>{{$product->make['Title_'. App::getlocale()]}}</div>
                                    @else
                                        <div>There is no makes yet!</div>
                                    @endif
                                </div>
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">{{__('product.Category_Information')}}:</div>
                                    <div>{{$product->category['Title_'. App::getlocale()]}}</div>
                                </div>
                                @if($product->category->id != 2)
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">{{__('product.model')}}:</div>
                                    <div>{{$product->model}}</div>
                                </div>
                                    @endif
                                @if($product->category->id == 2)
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">{{__('product.Category_Information')}}:</div>
                                    <div>{{$product->type_category_id}}</div>
                                </div>
                                @endif

                            </div>
                            {{-- Generatores --}}
                            @if($product->category_id == 4)
                                <div class="m-4 row">
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">{{__('product.ability')}} :</div>
                                        <div>{{$product->ability}}</div>
                                    </div>
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">{{__('product.capacity')}}:</div>
                                        <div>{{$product->capacity}}</div>
                                    </div>
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">{{__('product.fuel_tank_size')}}:</div>
                                        <div>{{$product->fuel_tank_size}}</div>
                                    </div>

                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">{{__('product.engine_type')}} :</div>
                                        <div>{{$product->engine_type}}</div>
                                    </div>
                                </div>
                                <div class="m-4 row">
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">{{__('product.number_of_phase')}}:</div>
                                        <div>{{$product->number_of_phase}}</div>
                                    </div>
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">{{__('product.frequency_rate')}}:</div>
                                        <div>{{$product->frequency_rate	}}</div>
                                    </div>
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">{{__('product.muffler_box')}}:</div>
                                        <div>{{$product->muffler_box}}</div>
                                    </div>
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">{{__('product.price')}}:</div>
                                        <div>{{$product->price}}</div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="m-4 row">
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">Status:</div>
                                    <div>{{$product->status->Title_en}}</div>
                                </div>
                                @if($product->sellType->id != 5 && $product->sellType->id !=6 && $product->category->id != 4  && $product->category->id != 2 )
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">MileAge</div>
                                        <div>{{$product->distance}} KM</div>
                                    </div>
                                @endif
                                @if($product->sellType->id == 5)
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">Section</div>
                                        <div>{{$product->section['Title_'.App::getlocale()]}} </div>
                                    </div>
                                @endif
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">Country</div>
                                    <div>{{$product->city->Title_en}}</div>
                                </div>
                                @if($product->sellType->id != 6 && $product->sellType->id != 7 && $product->category_id != 4 && $product->category_id != 2)
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor">Interior Brushes </div>
                                    <div>{{$product->interior_brush}}</div>
                                </div>
                                    @endif
                            </div>
                            <div class="m-4 row">
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">Year</div>
                                    <div>{{$product->year}}</div>
                                </div>
                                @if($product->category->id != 2 && $product->category->id != 4)
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">Colors</div>
                                    <div>
                                        <div style="width: 15px;
                                            height: 15px;
                                            border-radius:50%;
                                            background: {{$product->color}};
                                            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                                            display: inline-block;"></div>
                                    </div>
                                </div>
                                 @endif
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">City</div>
                                    <div>{{$product->district->Title_en}}</div>
                                </div>
                                @if(( $product->sellType->id != 6 && $product->sellType->id != 7 ) && $product->category->id != 2 && $product->category->id != 4)
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">Interior Colors</div>
                                    <div>
                                        <div style="width: 15px;
                                            height: 15px;
                                            border-radius:50%;
                                            background: {{$product->interior_color}};
                                            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                                            display: inline-block;"></div>
                                    </div>
                                </div>
                                    @endif
                            </div>
                            <div class="m-4 row">
                                @if($product->sellType->id != 6 && $product->sellType->id != 7 && $product->category->id != 2 && $product->category->id != 4)
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">GearBox</div>
                                    @if(isset($product->gearbox))

                                        <div>{{$product->gearbox->Title_en}}</div>
                                    @else
                                        Default
                                    @endif
                                </div>
                                @endif
                                <div class="col-6 col-lg-3 p-2">
                                    <div class="smallColor font-weight-bold">Payment Methods</div>
                                    <div>{{$product->payment_method}}</div>
                                </div>
                            </div>
                            <div class="m-4 row">
                                @if($product->sellType->id != 6 && $product->category->id != 2)
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">Fuel Type</div>
                                        @if(isset($product->fuelType))
                                            <div>{{$product->fuelType->Title_en}}</div>
                                        @endif
                                    </div>
                                @endif
                                @if($product->category->id == 2)
                                        <div class="col-6 col-lg-3 p-2">
                                            <div class="smallColor font-weight-bold">Country of Origin</div>
                                            @if(isset($product->country))
                                                <div>{{$product->country}}</div>
                                            @endif
                                        </div>
                                @endif
                                @if( $product->category->id != 4 &&  $product->category->id != 2  && $product->sellType->id != 1 && $product->sellType->id != 3 && $product->sellType->id != 4 && $product->sellType->id != 6 && $product->sellType->id != 7 )
                                    <div class="col-6 col-lg-3 p-2">
                                        <div class="smallColor font-weight-bold">Work Hours</div>
                                        @if(isset($product->work_hour))
                                            <div>{{$product->work_hour}}</div>
                                        @else
                                            <div>{{0}}</div>
                                        @endif
                                    </div>
                                @endif
                                    @if($product->sellType->id != 6 && $product->category->id !=2)

                                        <div class="col-6 col-lg-3 p-2">
                                            <div class="smallColor font-weight-bold">Engine Power</div>
                                            @if(isset($product->engine_capacity))
                                                <div>{{$product->engine_capacity}} HP</div>
                                            @endif
                                        </div>
                                        <div class="col-6 col-lg-3 p-2">
                                            <div class="smallColor font-weight-bold">Cylinder Number</div>
                                            @if(isset($product->slinder_number))
                                                <div>{{$product->slinder_number}}</div>
                                            @endif
                                        </div>
                                    @endif

                            </div>
                        </div>
                        <div class="tab-pane fade" id="seller" role="tabpanel" aria-labelledby="seller-tab">
                            <div class="row w-75 m-auto">

                                <div class="col-12 col-lg-4 p-2">
                                    <a href="{{route('profile-index',['type'=>'vendor','id'=>$product->user->id])}}">
                                        <img src="{{asset('assets/images/users')}}/{{$product->user->image}}"
                                             height="100" width="100" class="rounded-circle" alt="...">
                                    </a>
                                    <div class="p-2">
                                        <div class="font-weight-bold"> {{ $product->user->name }}</div>
                                        <div class="smallColor"><i
                                                class="fas fa-map-marker-alt smallColor"></i> {{$product->user->city['Title_'. App::getlocale()]}}
                                        </div>
                                        <br>
                                    </div>
                                    {{--    <div class="smallColor">Phone Numbers </div>
                                        <div>{{$product->user->phone1}}</div>
                                        <div>{{$product->user->phone2}}</div>--}}

                                </div>
                                {{-- <div class="mt-4">
                                     <div class="smallColor">Jurisdiction</div>
                                     <div>{{$product->user->jurisdiction}}</div>
                                 </div>--}}
                                <div class="mt-4 col-12 col-lg-4 p-2">
                                    <div class="smallColor font-weight-bold">Company Name</div>
                                    <div>{{$product->user->company_name}}</div>
                                    <br>
                                    <div class="smallColor font-weight-bold">Shop Type</div>
                                    <div>{{$product->user->MyshopType['Title_'. App::getlocale()] }}</div>
                                </div>

                                <div class="col-12 col-lg-4 p-2">
                                    <div class="mt-4">
                                        <div class="smallColor font-weight-bold">Social Media Links</div>
                                        <div>
                                            <a href="{{$product->user->phone1}}">
                                                <img src="{{asset('assets/site/images/site/whatapp.png')}}" height="30"
                                                     width="30" alt="...">
                                            </a>
                                            <a href="{{$product->user->facebook}}">
                                                <img src="{{asset('assets/site/images/site/face.png')}}" height="30"
                                                     width="30" alt="...">
                                            </a>
                                            <a href="{{$product->user->instgram}}">
                                                <img src="{{asset('assets/site/images/site/insta.png')}}" height="30"
                                                     width="30" alt="...">
                                            </a>
                                            <a href="{{$product->user->twitter}}">
                                                <img src="{{asset('assets/site/images/site/twitter.png')}}" height="30"
                                                     width="30" alt="...">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="smallColor font-weight-bold">Call Him Now!</div>
                                        <div>{{$product->user->phone1}}</div>
                                        <div>{{$product->user->phone2}}</div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        @if($product->advandage_id  != '')
                            <div class="tab-pane fade" id="adv" role="tabpanel" aria-labelledby="adv-tab">
                                <div class="m-4 row">
                                    <?php $advs = explode(',', $product->advandage_id);?>

                                    @foreach($advs as $adv)
                                        <?php  $id = \App\models\Advandage::find($adv);
                                        ?>
                                        <div class="col-3 mb-3">
                                            <div>
                                                @if(isset($id))
                                                    <img src="{{asset('assets/images/advandages')}}/{{$id->image}}"
                                                         height="70" width="70" alt="...">
                                                    {{$id->Title_en}}
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                {{-- <div class="col-1 col-lg-1 col-md-2 mb-3">
                </div> --}}
                <div class="col-6 col-lg-2 col-md-4 mb-3">
                    <div class="p-4 text-center rounded-circle"
                         style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                        <img src="{{asset('assets/images/icons/last_part/2.png')}}" width="45" height="45"
                             class="d-inline-block align-top" alt="">
                        <br>
                        @if(isset($product->fuelType) && $product->sellType->id != 6)
                            {{$product->fuelType->Title_en}}
                        @else
                            Default
                        @endif
                    </div>
                </div>
                <div class="col-6 col-lg-2 col-md-4 mb-3">
                    <div class="p-4 text-center rounded-circle"
                         style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                        <img src="{{asset('assets/images/icons/last_part/calendar (1).png')}}" width="45" height="45"
                             class="d-inline-block align-top" alt="">
                        <br>
                        {{$product->year}}
                    </div>
                </div>
                <div class="col-6 col-lg-2 col-md-4 mb-3">
                    <div class="p-4 text-center rounded-circle"
                         style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                        <img src="{{asset('assets/images/icons/last_part/gearshift (1).png')}}" width="45" height="45"
                             class="d-inline-block align-top" alt="">
                        <br>
                        @if(isset($product->GearBox)  && $product->sellType->id != 6)
                            {{$product->GearBox->Title_en}}
                        @else
                            Default
                        @endif
                    </div>
                </div>
                @if(isset($product->make))
                    <div class="col-6 col-lg-2 col-md-4 mb-3">
                        <div class="p-2 text-center rounded-circle"
                             style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                            <img src="{{asset('assets/images/makes')}}/{{$product->make->image}}" width="60" height="60"
                                 class="d-inline-block align-top" alt="">
                            <br>
                            {{$product->make->Title_en}}
                        </div>
                    </div>
                @else
                    <div class="col-6 col-lg-2 col-md-4 mb-3">
                        <div class="p-2 text-center rounded-circle"
                             style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                            <img src="{{asset('assets/images/makes/default.png')}}" width="60" height="60"
                                 class="d-inline-block align-top" alt="">
                            <br>
                            Unknown
                        </div>
                    </div>
                @endif
                <div class="col-6 col-lg-2 col-md-4 mb-3">
                    <div class="p-4 text-center rounded-circle"
                         style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px; display: table;">
                        <!-- <img src="images/site/fuel-station1.png" width="45" height="45" class="d-inline-block align-top" alt="">
                        <br> -->
                        <h6 class=""
                            style="vertical-align: middle; display: table-cell; color: #17286E;font-weight: bolder">{{$product->status->Title_en}}</h6>

                    </div>
                </div>
                {{-- <div class="col-2 col-lg-2 col-md-4 mb-3">
                     <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: rgb(247, 150, 70); height: 120px; width: 120px; display: table;">
                         <!-- <img src="images/site/fuel-station1.png" width="45" height="45" class="d-inline-block align-top" alt="">
                         <br> -->
                         <h3 class="" style="vertical-align: middle; display: table-cell; color: green;">{{$product->status->Title_en}}</h3>

                     </div>
                 </div>


                 <div class="col-2 col-lg-2 col-md-4 mb-3">
                     <div class="p-4 text-center rounded-circle" style="border-width:2px ; border-style: solid; border-color: rgb(247, 150, 70); height: 120px; width: 120px; display: table;">
                         <!-- <img src="images/site/fuel-station1.png" width="45" height="45" class="d-inline-block align-top" alt="">
                         <br> -->
                         <h3 class="" style="vertical-align: middle; display: table-cell; color: green;">{{$product->status->Title_en}}</h3>

                     </div>
                 </div>
                 <div class="col-1 col-lg-1 col-md-2 mb-3">--}}
            {{-- </div>
            <div class="row text-center"> --}}
                {{-- <div class="col-lg-3">
                </div> --}}
                <div class="col-6 col-lg-2 col-md-4 mb-3">
                    <div class="p-4 text-center rounded-circle"
                         style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight:bolder; height: 120px; width: 120px;">
                        <img src="{{asset('assets/images/icons/last_part/1505576-1.png')}}" width="45" height="45"
                             class="d-inline-block align-top" alt="">
                        <br>
                        @if(isset($product->slinder_number)  && $product->sellType->id != 6)
                            {{$product->slinder_number}}
                        @else
                            Default
                        @endif
                    </div>
                </div>


                <div class="col-6 col-lg-2 col-md-4 mb-3">
                    <div class="p-4 text-center rounded-circle"
                         style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px;">
                        <img src="{{asset('assets/images/icons/last_part/665.png')}}" width="45" height="45"
                             class="d-inline-block align-top" alt="">

                        @if(isset($product->engine_capacity)  && $product->sellType->id != 6)
                            {{$product->engine_capacity .'Hp'}}
                        @else
                            Default
                        @endif
                    </div>
                </div>
                <div class="col-6 col-lg-2 col-md-4 mb-3">
                    <div class="p-4 text-center rounded-circle"
                         style="border-width:2px ; border-style: solid; border-color: #17286E;color:#17286E;font-weight: bolder; height: 120px; width: 120px; display: table;">
                        <!-- <img src="images/site/fuel-station1.png" width="45" height="45" class="d-inline-block align-top" alt="">
                        <br> -->
                        <h6 class="" style="vertical-align: middle; display: table-cell; color: green;">
                            @if(isset($product->type_category_id) && $product->category->id != 2 && $product->category->id != 4)
                                    <img src="{{asset('assets/images/typeCategories/'.$product->TypeCategory->image)}}"
                                         class="d-inline-block align-top" alt="" style="width:70px">
                            @else
                                Default
                            @endif
                        </h6>

                    </div>
                </div>
                {{-- <div class="col-3">
                </div> --}}
            </div>
        </div>
        <hr>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>{{'Related Products'}} </h2>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                @foreach($makes_products as $product)
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
                                <img src="{{asset('assets/images/products/'.$images[$rand])}}"
                                     style="width:150%;height:200px;margin-left:-40px">
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
                                        <i class="fa fa-heart pl-2" style="font-size:30px;color:#17286E"></i>
                                        <br>
                                        <center>
                                            <label style="padding-left: 5px;font-size:18px;color:#17286E"
                                                   class="pt-1">
                                                {{$product->price .  $product->user->city->currency}}
                                            </label>
                                        </center>
                                    </div>
                                    <div class="col-9 " style="direction:ltr;text-align:right">
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

                                <div class="btn-wrap">
                                    <a href="https://wa.me/{{ $product->user->city->code .$product->user->phone1 }}?text=product%20link%20:%20http://127.0.0.1:8000/product/details/{{$product->id}}"
                                       data-action="share/whatsapp/share" target="_blank"
                                       class=" text-white text-decoration-none">
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
            </div>
            <center>
                <a href="" style="color:#17286E">Show more products </a>
            </center>
        </div>
    </section><!-- End Portfolio Section -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Seller Related Products </h2>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                @foreach($vendor_products as $product)
                    <?php
                    $images = explode('|', $product->images);
                    $rand = rand(0, count($images) - 1);
                    ?>
                    <a href="{{route('product.details',['product'=>$product->id])}}">
                        <div class="col-lg-3 col-md-4 portfolio-item filter-{{$product->category->id}}"
                             style="margin-top: 0;padding-top: 0">
                            <div class="box" style="margin-top: 0;padding-top: 0">
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
                                <img src="{{asset('assets/images/products/'.$images[$rand])}}"
                                     style="width:150%;height:200px;margin-left:-40px">
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
                                        <i class="fa fa-heart pl-2" style="font-size:30px;color:#17286E"></i>
                                        <br>
                                        <center>
                                            <label style="padding-left: 5px;font-size:22px;color:#17286E" class="pt-1">
                                                {{$product->price ."$"}}
                                            </label>
                                        </center>
                                    </div>
                                    <div class="col-9 " style="direction:ltr;text-align:right">
                                        <div class="row mt-4">
                                            <div class="col-10 "
                                                 style="font-size:16px;direction:rtl;text-align:right;color:#17286E">
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

                                                {{$product->model}}

                                            </div>
                                            @if($product->make)
                                                <div class="col-1 pl-2">
                                                    <img style="height:40px;width:40px"
                                                         src="{{asset('assets/images/makes/'.$product->make->image)}}"
                                                         alt="">
                                                </div>
                                            @else
                                                <div class="col-1 pl-2">
                                                    <img style="height:40px;width:40px"
                                                         src="{{asset('assets/images/makes/default.png')}}" alt="">
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="btn-wrap">
                                    <a href="https://wa.me/{{ $product->user->city->code .$product->user->phone1 }}?text=product%20link%20:%20http://127.0.0.1:8000/product/details/{{$product->id}}"
                                       data-action="share/whatsapp/share" target="_blank"
                                       class=" text-white text-decoration-none">
                                        <img src="{{asset('assets/site/images/site/whatapp.png')}}" height="30"
                                             width="30" alt="...">
                                    </a>
                                    &#160;
                                    <a href="">
                                        <img src="{{asset('assets/site/images/site/phone.png')}}" height="30" width="30"
                                             alt="...">
                                    </a>

                                    <span style="float: right;margin-top: -20px">
                                        <a class="loc" style="font-size:13px">
                                            <i class="bi bi-geo-alt-fill"></i><br>
                                            {{$product->district['Title_'.App::getlocale()] }}
                                        </a>
                                        <img src="{{asset('assets/images/flags/'.$product->city->flag)}}" alt=""
                                             style="width:25px;height:25px">

                                        </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <center>
                <a href="" style="color:#17286E">Show more products </a>
            </center>

        </div>
    </section><!-- End Portfolio Section -->

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>

@stop
