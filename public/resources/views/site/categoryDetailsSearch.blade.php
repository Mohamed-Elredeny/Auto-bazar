@extends('layouts.app_martina')
<?php

?>
<link rel="stylesheet" href="{{asset('assets/dropdown/css/dd.css?v=4.0')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/dropdown/css/flags.css?v=1.0')}}" >
@section('content')
    <section>
        <div class="container mt-2">
            <div class="checkRadioContainer justify-content-around text-center" >
                @foreach($sellTypes as $sell)
                    @if($sell['id'] == $sell_type_id)
                            <a  class="col-4 col-lg-2 m-1 m-lg-3" style="background:#17286E;color:white;cursor: pointer" >
                                <span>{{$sell['Title_'. App::getlocale()]}}</span>
                            </a>
                        </a>


                    @else
                        <a id="radio11" class="col-4 col-lg-2 m-1 m-lg-3" style="color:black;border:1px solid #17286E;cursor: pointer" href="{{route('type.subcategory',['type_category'=>$sell['id']])}}">
                                <span>{{$sell['Title_'. App::getlocale()]}}</span>
                        </a>
                    @endif
                @endforeach
            </div>
            <br>
            <hr>
            <form action="{{route('subcategory-search-products')}}" method="post">
                @csrf
                <input type="hidden" name="sell_type_id" value="{{$sell_type_id}}">
                <div class="row mt-4">

                    <input type="hidden" name="category" value="{{$sell_type_id}}">
                    <input type="hidden" name="sell_type" value="{{$sell['id']}}">

                    <div class="form-group col-12 col-lg-4">
                        <label for="exampleInputEmail1" >Payment Method</label>
                        <select class="form-control catDrop" name="payment_method">
                            <option value="cash">كاش</option>
                            <option value="installment">اقساط</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label for="exampleInputEmail1" >Country</label>
                        <select class="form-control catDrop" id="city_id" name="city_id" >
                        <option value="sad">Select City</option>
                         @foreach($cities as $city)
                                <option value="{{$city['id']}}">{{$city['Title_'. App::getlocale()]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label for="exampleInputEmail1">City</label>
                        <select class="form-control" id="district_id" name="district_id" >

                        </select>
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label for="exampleInputEmail1" >Status</label>
                        <select class="form-control" id="status_id" name="status_id" >
                            @foreach($statuses as $status)
                                    <option value="{{$status->id}}">
                                        {{$status['Title_'. App::getlocale()]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label for="exampleInputEmail1" >Price Range</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control catDrop" placeholder="From" name="priceFrom">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control catDrop" placeholder="To" name="priceTo">
                            </div>

                        </div>

                    </div>
{{--
                    <div class="form-group col-4">
                        <label for="exampleInputEmail1">Year</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control catDrop" placeholder="From" name="year_from">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control catDrop" placeholder="To"  name="year_to">
                            </div>
                        </div>
                    </div>
--}}
                    {{--       <div class="row">

                 <div class="form-group col-2">
                     <label for="payments">Marks</label>
                     <select id="payments" name="marks" is="ms-dropdown"  class="form-control catDrop">
                         <option value="" data-description="Choose your Mark">Select  Your mark</option>
                          @foreach($marks as $mark)
                             <option value="amex" data-image="{{asset('assets/images/makes/'.$mark->image)}}" data-description="BMW">{{$mark['Title_'. App::getlocale()]}}</option>
                         @endforeach
                     </select>
                 </div>

             </div>--}}
                </div>




            <button type="submit" class="btn w-100 mt-5 backgroundColor" style=" color: #fff;">Apply Changes</button><br><br>

            </form>
        </div>

        <section id="portfolio" class="portfolio">
            <div class="container">


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
                                        <div class="col-2">
                                            <br>
                                            <i class="fa fa-heart pl-2" style="font-size:30px;color:#17286E"></i>
                                            <br>
                                            <center>
                                                <label style="padding-left: 5px;font-size:18px;color:#17286E" class="pt-1">
                                                    {{$product->price .  $product->user->city->currency}}
                                                </label>
                                            </center>
                                        </div>
                                        <div class="col-9 " style="direction:ltr;text-align:right">
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

    </section>

@stop

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/dropdown/js/dd.min.js?ver=4.0')}}"></script>

<script>
    $(document).ready(function(){

        $('#city_id').on('change', function() {
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url:'http://127.0.0.1:8000/getDistricts',
                method:"get",
                data:{cityId:id},
                dataType:"json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){

                    var districts = document.getElementById('district_id');

                    districts.innerHTML = "";

                    data.forEach(district => districts.innerHTML += "<option value="+district.id+">"+district.{{'Title_'. App::getlocale() }}+"</option>");

                    //console.log(typeof data);

                    // console.log(data);
                }
            });

        });
    });

</script>
