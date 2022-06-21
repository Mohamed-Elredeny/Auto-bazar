@extends('layouts.app_martina')


@section('content')
    <h4 class=" text-center pt-5 mt-d-5">
        My Wishlist
        <br>
    </h4>
    <center>
        <b> {{$count}} </b> products &#160; <b> ${{$total_price}} </b> Total

        <div class=" text_how_to_use">
        </div>
    </center>
    <!-- End of text -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                @foreach($products as $product)

                    <?php
                    $product = $product->product;
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

                                        <a href="{{route('wishlist.action',['action'=>'remove','product_id'=>$product->id])}}" style="z-index:999999999999">
                                            <i class="fa fa-heart-broken pl-2" style="font-size:30px;color:#17286E"></i>
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

            </div>
        </div>
    </section>
@stop
