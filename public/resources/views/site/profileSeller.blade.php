@extends('layouts.app_martina')
@section('content')
    <style>
        .modal-dialog {
            width: 95%;
            margin: 0 auto;
        }
    </style>
    <!-- profile -->
    {{-- {{ dd(7) }} --}}
        <div class="card ">
            <img src="{{asset('assets/images/users/'.$profile->cover)}}" width="100%" height="320" class="card-img"/>
            <div class="card-img-overlay">
                <div class="" style="margin-top: 230px">
                    <div class="row align-items-center">
                        <img src="{{asset('assets/images/users/'.$profile->image)}}" width="200" height="200" class=""  style="margin-left: 5%;border-radius: 50%">

                        <div class="col-lg-3 col-6 mt-sm-5">
                            <ul><br>
                                <li style="font-size: 22px; font-weight: bold;"> {{$profile->name}}

                                <li><i class="fas fa-map-marker-alt maincolor"></i>
                                    {{$profile->city['Title_'. LaravelLocalization::setLocale()]}},
                                    {{$profile->district['Title_'. LaravelLocalization::setLocale()]}}

                                </li>
                                <li>
                                <a href="https://wa.me/{{$profile->city->code . $profile->phone1 }}?text=product%20link%20:%20{{$actual_link = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']}}" data-action="share/whatsapp/share" target="_blank" class=" ">
                                            <img src="{{asset('assets/site/images/site/whatapp.png')}}" height="40" width="40" alt="...">
                                             {{$profile->shopType}} {{__('site.shop')}}
                                </a>

                                </li>
                                @if(Auth::user() != null)
                                @if($id == Auth::user()->id)
                                <li>
                                    <br>
                                    <a class="btn " href="{{route('edit.profile',['type'=>'vendor'])}}" style="background:#19296f;color:white">{{__('public.editProfile')}}</a>
                                </li>
                                @endif
                                    @endif
                            </ul>
                        </div>


                        <div class="col-lg-3 col-12 mt-sm-5 ">
                            <div class="row">
                                <div class="col-4 col-lg-10 col-sm-3">
                                    <a href="{{$profile->facebook}}" class="text-decoration-none">
                                        <i class="fab fa-facebook-f maincolor">
                                            
                                        </i>
                                    </a>

                                </div>
                                <div class="col-4 col-lg-10 col-sm-3">
                                    <a href="{{$profile->instgram}}" class="text-decoration-none">
                                        <i class="fab fa-instagram maincolor">
                                            
                                        </i>
                                    </a>


                                </div>
                                <div class="col-4 col-lg-10 col-sm-3">
                                    <a href="{{$profile->twitter}}" class="text-decoration-none">
                                        <i class="fab fa-twitter maincolor">
                                          
                                        </i>
                                    </a>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-3 col-12 mt-sm-4 mt-lg-5 ">
                            <div class="row">
                                <div class="col-1 col-lg-2 col-sm-1">
                                </div>
                                <div class="col-12 col-lg-10 col-sm-3">
                                    <i class="fa fa-phone maincolor" aria-hidden="true"></i>
                                    +{{$profile->phone1}}
                                </div>
                                <div class="col-1 col-lg-2 col-sm-1">
                                </div>
                                <div class="col-12 col-lg-10 col-sm-3">
                                    <i class="fa fa-phone maincolor" aria-hidden="true"></i>

                                    +{{$profile->phone2}}
                                </div>
                                <div class="col-1 col-lg-2 col-sm-1">
                                </div>
                                <div class="col-12 col-lg-10 col-sm-3">
                                    <i class="fas fa-envelope maincolor"></i>
                                    {{$profile->email}}
                                </div>
                            </div>

                        </div>

                    </div>
                    @if(count($recent) > 0)
                    <div class="container">
                        <div class="sec2">
                        </div>
                        <br>
                    </div>
                        <div class="container">
                        <h5 class="hsec">{{__('public.RecentAddedProducts')}}</h5>
                        <section id="portfolio" class="portfolio">
                            <div class="container">

                                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                                    @foreach($recent as $product)
                                        <?php
                                        $images = explode('|',$product->images);
                                        $rand = rand(0,count($images)-1);
                                        ?>
                                        <a href="{{route('product.details',['product'=>$product->id])}}">
                                            <div class="col-lg-3 col-12 portfolio-item filter-{{$product->category->id}}" style="margin-top: 0;padding-top: 0">
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
                        </section>
                        </div>
                    @endif
                    <div class="container">

                        <div class="sec2">
                            <div class="d-flex justify-content-between">
                                <h5 class="hsec ">{{__('public.MyShop')}}  <span style="font-size: 12px;
								color: #626262;">{{__('public.ThereIs')}} {{count($products)}} {{__('public.products')}}</span> </h5>
                                @if(Auth::user() != null)
                                @if($id == Auth::user()->id)
                                    <h6 style="color:#19296f"><a class="nav-link" style="color:#19296f" href="#" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i> {{__('public.AddNewItem')}}</a></h6>
                                @endif
                                    @endif
                            </div>
                            <div class="container">
                                <div class="mt-4">
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <td colspan="7">
                                                <input type="text" class="btn col-sm-12" id="filter" placeholder="Search About Your Products" style="border:1px solid #17286E;">
                                            </td>

                                        </tr>
                                        <tr>
                                                <!-- <th scope="col">{{__('public.price')}}</th>
                                            <th scope="col">{{__('public.action')}}</th> -->

                                            <th scope="col" >{{__('public.image')}}</th>
                                            <th scope="col">{{__('public.type')}}</th>
                                            <th scope="col">{{__('public.status')}}</th>

                                            <th scope="col">{{__('public.condition')}}</th>
                                            <th scope="col">{{__('public.name')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($products) > 0 )
                                        @foreach($products as $rproduct)
                                            @if(count($recent) > 0 )
                                                <tr class="results">
                                                <?php
                                                $images = explode('|',$rproduct->images);
                                                $rand = rand(0,count($images)-1);
                                                ?>
                                                <td> <img src="{{asset('assets/images/products/'.$images[$rand])}}" width="100" height="100" class="card-img"></td>

                                                <td style=" vertical-align: middle;" class="font-weight-bold">{{$rproduct->category['Title_'. App::getlocale()]}}</td>
                                                @if($rproduct->rent == 0)
                                                    <td style="vertical-align: middle;">{{__('products.for_sell')}} </td>
                                                @elseif($rproduct->rent == 1)
                                                        <td style="vertical-align: middle;">{{__('products.for_rent')}} </td>
                                                @else
                                                        <td style="vertical-align: middle;">{{__('products.wanted')}} </td>
                                                @endif
                                                <td style=" vertical-align: middle;" class="font-weight-bold">{{$rproduct->status['Title_'. App::getlocale()]}}</td>
                                                <td style="vertical-align: middle;" class=""><h6 class="font-weight-bold">{{$rproduct->title}}</h6><p style="font-size: 14px;
													line-height: 19px;
													color: #6C6C6C;">
                                                        {{$rproduct->sellType['Title_'.App::getlocale()]}}

                                                    </p></td>
                                                <td class="maincolor" style=" vertical-align: middle;">{{$rproduct->price}}$</td>

                                                <td style=" vertical-align: middle;">
                                                    <div class="tdropdown">
                                                        <span><i class="fas fa-grip-vertical" style="font-size:24px"></i></span>
                                                        <div class="tdropdown-content">
                                                            <a class="text-decoration-none btn btn-dark" style="width:100%" href="{{route('product.details',['product'=>$rproduct->id])}}">{{__('public.show')}}</a>

                                                            @if(Auth::user() != null)
                                                            @if($id == Auth::user()->id)
                                                                    <hr>
                                                                    <a class="text-decoration-none btn btn-dark" style="width:100%"  href="{{route('product.edit',['id'=>$rproduct->id])}}">{{__('public.edit')}}</a><hr>

                                                            <form action="{{route('site-products.destroy',['site_product'=>$rproduct->id])}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="text-decoration-none btn btn-danger" >{{__('public.delete')}}</button>

                                                            </form>
                                                                @endif
                                                                @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            @endif
                                        @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">
                                                    <br>
                                                    <center>
                                                        There is no products yet!
                                                    </center>
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </div>


    <!-- Modal Add Product categtroy -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" >
                <div class="modal-header backgroundColor text-white" style="border:none;	background-color: #19296f  !important;
">
                    <h5 class="modal-title" id="staticBackdropLabel">Select Your Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body backgroundColorSec" >
                    <div class="row" >
                        <div class="col-6">

                            <button type="button" class="btn backgroundColor w-100" style="height: 210px;	background-color: #19296f !important;" data-dismiss="modal" data-toggle="modal" data-target="#car">
                                <img src="{{asset('assets/images/icons/white/cat1.png')}}" width="100" height="100" class="card-img m-1">
                                <div class="text-white">Cars and Heavy Equipments</div>
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn backgroundColor w-100" style="height: 210px;	background-color: #19296f !important;" data-dismiss="modal" data-toggle="modal" data-target="#spare">
                                <img src="{{asset('assets/images/icons/white/cat2.png')}}" width="100" height="100" class="card-img m-1">
                                <div class="text-white">Spare Parts</div>
                            </button>
                        </div>
                        <div class="col-6 mt-2">
                            <button type="button" class="btn backgroundColor w-100" style="height: 210px;	background-color: #19296f !important;" data-dismiss="modal" data-toggle="modal" data-target="#generator">
                                <img src="{{asset('assets/images/icons/white/cat4.png')}}" width="100" height="100" class="card-img m-1">
                                <div class="text-white">Generators</div>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Add Product generator -->
    <div class="modal fade" id="generator" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="generator" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header backgroundColor text-white" style="border:none;background-color: #19296f !important;">
                    <h5 class="modal-title" id="spareLabel">Select Your Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body backgroundColorSec p-5">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a  class="btn backgroundColor p-3" style="background-color: #19296f !important;" href="{{route('site-products.create',['category'=>4,'rent'=>0])}}">
                                <div class="text-white">For Sale</div>
                            </a>
                        </div>
                        <div class="col-6 text-center">
                            <a  class="btn backgroundColor p-3" style="background-color: #19296f !important;" href="{{route('site-products.create',['category'=>4,'rent'=>3])}}">
                                <div class="text-white">Wanted</div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Add Product spare -->
    <div class="modal fade" id="spare" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="spspareLabelare" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header backgroundColor text-white" style="border:none;background-color: #19296f !important;">
                    <h5 class="modal-title" id="spareLabel">Select Your Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body backgroundColorSec p-5">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a  class="btn backgroundColor p-3" style="background-color: #19296f !important;" href="{{route('site-products.create',['category'=>2,'rent'=>0])}}">
                                <div class="text-white">For Sale</div>
                            </a>
                        </div>
                        <div class="col-6 text-center">
                            <a  class="btn backgroundColor p-3" style="background-color: #19296f !important;" href="{{route('site-products.create',['category'=>2,'rent'=>3])}}">
                                <div class="text-white">Wanted</div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Add Product car -->
    <div class="modal fade" id="car" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="carLabelare" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header backgroundColor text-white" style="border:none;background-color: #19296f !important;">
                    <h5 class="modal-title" id="carLabel">Select Your Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body backgroundColorSec p-5">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a  class="btn backgroundColor p-3" style="background-color: #19296f !important;" href="{{route('site-products.create',['category'=>1,'rent'=>0])}}">
                                <div class="text-white">For Sale</div>
                            </a>
                        </div>
                        <div class="col-4 text-center">
                            <a  class="btn backgroundColor p-3" style="background-color: #19296f !important;" href="{{route('site-products.create',['category'=>1,'rent'=>1])}}">
                                <div class="text-white">For Rent</div>
                            </a>
                        </div>
                        <div class="col-4 text-center">
                            <a  class="btn backgroundColor p-3" style="background-color: #19296f !important;" href="{{route('site-products.create',['category'=>1,'rent'=>2])}}">
                                <div class="text-white">Wanted</div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload=function(){
            $("#filter").keyup(function() {

                var filter = $(this).val(),
                    count = 0;

                $('.results').each(function() {

                    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                        $(this).hide();

                    } else {
                        $(this).show();
                        count++;
                    }
                });
            });
        }
    </script>




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

<!-- @stop
