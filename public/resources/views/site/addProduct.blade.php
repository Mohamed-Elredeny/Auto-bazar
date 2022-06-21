<link rel="stylesheet" type="text/css" href="{{asset('assets/site/martina/css/styleForm.css')}}">
@extends('layouts.app_martina')
<link rel="stylesheet" type="text/css"
      href="{{asset('assets/dropdown1/ms-Dropdown-master/ms-Dropdown-master/dist/css/dd.css')}}"/>
<!-- sign In -->
@section('content')

    <div class="m-auto">
        <div class="main">
            <div class="container">
                @if(!empty($message))
                    <div class="alert alert-success"> {{ $message }}</div>
                @endif
                @if($rent == 0)
                    <h2>{{__('product.Add_Product_For_Sell')}}</h2>
                    <input type="hidden" name="rent" value="0">
                @elseif($rent == 1)
                    <h2>{{__('product.Add_Product_For_Rent')}}</h2>
                    <input type="hidden" name="rent" value="1">
                @else
                    <h2>{{__('product.Add_Wanted_Product')}}</h2>
                    <input type="hidden" name="rent" value="2">
                @endif


                <form method="POST" id="signup-form" action="{{route('site-products.store')}}" class="signup-form"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="category_id" value="{{$category}}">
                    @if($rent == 0)
                        <input type="hidden" name="rent" value="0">
                    @elseif($rent == 1)
                        <input type="hidden" name="rent" value="1">
                    @else
                        <input type="hidden" name="rent" value="2">
                    @endif

                    <h3>
                        
                        {{__('product.Category_Information')}}
                    </h3>
                    <fieldset>
                        <div class="row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.Advertisement_type')}}</label>
                                <select class="form-control addDropdown" required id="sellTypeId" name="sellTypeId">
                                    <option value="sad">{{__('product.Advertisement_type')}}</option>
                                    @foreach($sellTypes as $selltypes)
                                        <option value="{{$selltypes['id']}}">
                                            {{$selltypes['Title_'.App::getLocale()]}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="sellTypeIdHeavey" id="sellTypeIdHeavey"
                                   value="{{\app\models\SellType::where('Title_en','heavy equipment')->first()->id}}">
                            <div class="form-group col-12 col-lg-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.Section')}}</label>
                                <select class="form-control addDropdown" required id="sectionId" name="sectionId">
                                    <option>{{__('product.Section')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.Category_Information')}}</label>
                                <select class="form-control addDropdown" required id="typeCategoriesId"
                                        name="typeCategoriesId">>
                                    <option>{{__('product.Category_Information')}}</option>
                                </select>
                            </div>
                            @if($category != 2)

                                <div class="form-group col-12 col-lg-6">
                                    {{--  <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.Make')}}</label>
                                      <select  required id="makesId" name="makesId" is="ms-dropdown">
                                      </select>--}}
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.mark')}}</label>
                                    <div class="dropdown col-sm-6">
                                        <select name="makesId" class="form-control addDropdown dropdown-toggle"
                                                type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                        </select>
                                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton"
                                             id="makesId" style="overflow-y: scroll;max-height:500px;width:100%">

                                        </div>
                                        <div id="active_make">

                                        </div>

                                    </div>

                                </div>
                            @endif
                        </div>
                        @if($category != 4 && $category != 2)
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="" class="font-weight-bold">{{__('product.model')}}</label>
                                    <input type="text" class="form-control addDropdown" id="model" name="model"
                                           required>
                                </div>

                            </div>
                        @endif
                        <div class="row">
                            <hr class="col-12">
                        </div>
                    </fieldset>

                    <h3>
                        {{__('product.product_details')}}
                    </h3>
                    @if($category == 1 )
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.product_status')}}</label>
                                    <select class="form-control addDropdown" required name="statuses">
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}">{{$status['Title_' . App::getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="" class="font-weight-bold">{{__('product.year_of_made')}}</label>
                                    <input type="number" placeholder="YYYY" min="1900" max="2100"
                                           class="form-control addDropdown" required name="year">
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.gear_box')}}</label>
                                    <select class="form-control" id="gearbox_id" name="gearbox_id" required>
                                        @foreach($gearboxes as $gearbox)
                                            <option
                                                value="{{$gearbox->id}}">{{$gearbox['Title_'. App::getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.fuelType')}}</label>
                                    <select class="form-control addDropdown" required name="fuel_type_id">
                                        @foreach($fuels as $fuel)
                                            <option
                                                value="{{$fuel->id}}">{{$fuel['Title_'. App::getLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4" id="showDistance">
                                    <label for="" class="font-weight-bold">{{__('product.distance')}} - KM </label>
                                    <input type="number" class="form-control addDropdown" name="distance">
                                </div>
                                <div class="form-group col-12 col-lg-4" id="showWork">
                                    <label for="" class="font-weight-bold">{{__('product.work_hours')}}</label>
                                    <input type="number" class="form-control addDropdown" name="workhours">
                                </div>
                                <div class="form-group col-12 col-lg-4" id="showDistance">
                                    <label for="" class="font-weight-bold">{{__('product.engine_capacity')}}</label>
                                    <input type="number" class="form-control addDropdown" name="engine_capacity">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.color')}}</label>
                                    <div class="row">
                                        <div class="col-8">{{__('product.color')}}</div>
                                        <div class="col-4">
                                            <input type="color" class="form-control form-control-color addColor"
                                                   id="exampleColorInput" value="#FF85D8" title="Choose your color"
                                                   name="color">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="" class="font-weight-bold">{{__('product.payment_method')}}</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="cash">{{__('product.cash')}}</option>
                                        <option value="installment">{{__('product.installment')}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-12 col-lg-4" id="showDistance">
                                    <label for="" class="font-weight-bold"> {{__('product.slinder_number')}}</label>
                                    <select class="form-control addDropdown" id="user_id" name="slinder_number"
                                            required>
                                        <option value="1 سلندر">1 {{__('product.slinder')}}


</option>
                                        <option value="2 سلندر">2 {{__('product.slinder')}}


</option>
                                        <option value="4 سلندر">4 {{__('product.slinder')}}


</option>
                                        <option value="6 سلندر">6 {{__('product.slinder')}}


</option>
                                        <option value="8 سلندر">8 {{__('product.slinder')}}


</option>
                                        <option value="10 سلندر">10 {{__('product.slinder')}}


</option>
                                        <option value="12 سلندر">12 {{__('product.slinder')}}


</option>

                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.country')}}</label>
                                    <select class="form-control addDropdown" required id="cityId" name="cityId">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city['Title_'.App::getlocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.city')}}</label>
                                    <select class="form-control addDropdown" required id="districtId" name="districtId">
                                        <option>{{__('product.city')}}</option>
                                    </select>
                                </div>

                                @if($rent == 1)
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="exampleInputEmail1" class="font-weight-bold">Rent Period</label>
                                        <select class="form-control addDropdown" required id="rent_type"
                                                name="rent_type">
                                            <option value="hour">{{__('product.hour')}}</option>
                                            <option value="day">{{__('product.day')}}</option>
                                            <option value="week">{{__('product.week')}}</option>
                                            <option value="month">{{__('product.month')}}</option>
                                            <option value="year">{{__('product.year')}}</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.interior_brush')}}</label>
                                    <select class="form-control" id="interior_brush" name="interior_brush" required>
                                        <option value="leather">{{__('product.leather')}}</option>
                                        <option value="cloth">{{__('product.cloth')}}</option>
                                        <option value="both of them">{{__('product.bothOfThem')}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.interior_color')}}</label>
                                    <div class="row">
                                        <div class="col-8">{{__('product.interior_color')}}</div>
                                        <div class="col-4">
                                            <input type="color" class="form-control form-control-color addColor"
                                                   id="exampleColorInput" value="#939DFF" title="Choose your color"
                                                   name="Interior_color">
                                        </div>
                                    </div>
                                </div>

                                @if($rent == 1)
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.rent')}}</label>
                                        <input class="form-control addDropdown" type="number" id="example-text-input"
                                               name="rent_period" required>
                                    </div>
                                @endif


                            </div>
                            <div class="row">
                                <hr class="col-12">
                            </div>
                        </fieldset>
                    @elseif($category == 2 )
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.product_status')}}</label>
                                    <select class="form-control addDropdown" required name="statuses">
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}">{{$status['Title_' . App::getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="" class="font-weight-bold">{{__('product.year')}}</label>
                                    <input type="number" placeholder="YYYY" min="1900" max="2100"
                                           class="form-control addDropdown" required name="year">
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="" class="font-weight-bold">{{__('product.payment_method')}}</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="cash">{{__('product.cash')}}</option>
                                        <option value="installment">{{__('product.installment')}}</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.country')}}</label>
                                    <select class="form-control addDropdown" required id="cityId" name="cityId">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city['Title_'.App::getlocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.city')}}</label>
                                    <select class="form-control addDropdown" required id="districtId" name="districtId">
                                        <option>{{__('product.city')}}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">


                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <hr class="col-12">
                            </div>
                        </fieldset>
                    @else
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.product_status')}}</label>
                                    <select class="form-control addDropdown" required name="statuses">
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}">{{$status['Title_' . App::getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="" class="font-weight-bold">{{__('product.year')}}</label>
                                    <input type="number" placeholder="YYYY" min="1900" max="2100"
                                           class="form-control addDropdown" required name="year">
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.capacity')}}</label>
                                    <input type="number" class="form-control addDropdown" name="capacity">
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.ability')}}</label>
                                    <input type="number" class="form-control addDropdown" name="ability">
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.fuel_tank_size')}}</label>
                                    <input type="number" class="form-control addDropdown" name="fuel_tank_size">
                                </div>

                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.engine_type')}}</label>
                                    <input type="text" class="form-control addDropdown" name="engine_type">
                                </div>

                                <div class="form-group col-12 col-lg-4" id="showDistance">
                                    <label for="" class="font-weight-bold">{{__('product.engine_capacity')}}</label>
                                    <input type="number" class="form-control addDropdown" name="engine_capacity">
                                </div>

                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.number_of_phase')}}</label>
                                    <input type="number" class="form-control addDropdown" name="number_of_phase">
                                </div>


                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.frequency_rate')}} </label>
                                    <input type="number" class="form-control addDropdown" name="frequency_rate">
                                </div>

                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.muffler_box')}} </label>
                                    <input type="number" class="form-control addDropdown" name="muffler_box">
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.fuelType')}}</label>
                                    <select class="form-control addDropdown" required name="fuel_type_id">
                                        @foreach($fuels as $fuel)
                                            <option
                                                value="{{$fuel->id}}">{{$fuel['Title_'. App::getLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="" class="font-weight-bold">{{__('product.payment_method')}}</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="cash">{{__('product.cash')}}</option>
                                        <option value="installment">{{__('product.installment')}}</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-12 col-lg-4" id="showDistance">
                                    <label for="" class="font-weight-bold">{{__('product.slinder_number')}}</label>
                                    <select class="form-control addDropdown" id="user_id" name="slinder_number"
                                            required>
                                        <option value="1 سلندر">1 {{__('product.slinder')}}


</option>
                                        <option value="2 سلندر">2 {{__('product.slinder')}}


</option>
                                        <option value="4 سلندر">4 {{__('product.slinder')}}


</option>
                                        <option value="6 سلندر">6 {{__('product.slinder')}}


</option>
                                        <option value="8 سلندر">8 {{__('product.slinder')}}


</option>
                                        <option value="10 سلندر">10 {{__('product.slinder')}}


</option>
                                        <option value="12 سلندر">12 {{__('product.slinder')}}


</option>


                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.country')}}</label>
                                    <select class="form-control addDropdown" required id="cityId" name="cityId">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city['Title_'.App::getlocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.city')}}</label>
                                    <select class="form-control addDropdown" required id="districtId" name="districtId">
                                        <option>{{__('product.city')}}</option>
                                    </select>
                                </div>


                            </div>

                            <div class="row">
                                <hr class="col-12">
                            </div>
                        </fieldset>
                    @endif
                    <h3>
                        {{__('product.product_specifications')}}
                    </h3>
                    <fieldset>
                        <div class="row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.title')}}</label>
                                <input type="text" class="form-control addDropdown" name="title">

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.price')}}</label>
                                <input type="number" class="form-control addDropdown" name="price">
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center alert-danger form-group col-12 col-lg-6 pt-2">
                                Set Your product price in dollars
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.product_specifications')}}</label>
                                <textarea class="form-control addDropdown" id="exampleFormControlTextarea1" rows="3"
                                          id="Description" name="Description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="exampleInputEmail1" class="font-weight-bold">{{__('product.add_new_image')}}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="images[]" multiple>
                                    <label class="custom-file-label" for="image" data-browse="Upload Image"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr class="col-12">
                        </div>
                    </fieldset>
                    @if($category == 1 )
                        <h3>
                            {{__('product.advantages')}}
                        </h3>
                        <fieldset>
                            <center>
                                <input type="text" class="" id="filter" placeholder="Search About Your Advantages"
                                       style="border:1px solid #17286E">
                                <br>
                                @foreach($advandages as $adv)
                                    <div class="card results" style="width: 18rem;display:inline-block">
                                        <img class="card-img-top"
                                             src="{{asset('assets/images/advandages/'.$adv->image)}}"
                                             alt="Card image cap" style="width: 100%;height:200px">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{$adv['Title_'. App::getlocale()]}}
                                            </h5>
                                            <p class="card-text"></p>
                                            <input class="form-control" type="checkbox" name="advandages[]"
                                                   value="{{$adv->id}}">
                                        </div>
                                    </div>
                                @endforeach

                            </center>

                        </fieldset>
                    @endif

                </form>
            </div>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>


        $(document).ready(function () {
            $('#sellTypeId').on('change', function () {
                var SellType = $(this).val();
                var sellTypeIdHeavey = document.getElementById('sellTypeIdHeavey').value;
                //alert(sellTypeIdHeavey);
                if ({{$category}} == 1) {
                    if (sellTypeIdHeavey == SellType) {
                        //alert(1);
                        document.getElementById('showDistance').style.display = 'none';
                        document.getElementById('showWork').style.display = 'block';

                    } else {
                        //alert(2);
                        document.getElementById('showWork').style.display = 'none';
                        document.getElementById('showDistance').style.display = 'block';
                    }
                }


                var locale = '{{ Config::get('app.locale') }}';

                var name = 'Title_' + locale;
                $.ajax({
                    url: '{{route('vendor.getProductSections')}}',
                    method: "post",
                    data: {sellType: SellType},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        var sectionId = document.getElementById('sectionId');

                        sectionId.innerHTML = "";
                        if (data['sections'].length != 0) {
                            data['sections'].forEach(sections => sectionId.innerHTML += "<option value=" + sections.id + ">" + sections[name] + "</option>");
                        } else {
                            sectionId.innerHTML += "<option value='sad'>{{__('product.There_is_no_sections_yet')}}</option>";
                        }

                        var typeCategoriesId = document.getElementById('typeCategoriesId');
                        typeCategoriesId.innerHTML = "";
                        if (data['typeCategories'].length != 0) {
                            data['typeCategories'].forEach(typeCategories => typeCategoriesId.innerHTML += "<option value=" + typeCategories.id + ">" + typeCategories[name] + "</option>");
                        } else {
                            typeCategoriesId.innerHTML += "<option value='sad'>{{__('product.There_is_no_Types_yet')}}</option>";
                        }

                        var makesId = document.getElementById('makesId');
                        makesId.innerHTML = "";
                        if (data['makes'].length != 0) {
                            data['makes'].forEach(makes => makesId.innerHTML += "" + " <img src='https://webautobazaar.com/assets/images/makes/" + makes.image + " '  alt='' style='height:70px;width:100px'>" +
                                "  <br> " + makes['Title_ar'] + " <input type='radio' class='form-control dropdown-item' name='makes' value='" + makes.id + "' onclick='myfun123()'>" + " <hr> ");

                            alert(makes.id);
                        } else {
                            makesId.innerHTML += "<option value='sad'>{{__('product.There_is_no_Types_yet')}}</option>";
                        }


                    }
                });


            });
            $('#cityId').on('change', function () {
                var cityId = $(this).val();
                //alert(SellType);
                var locale = '{{ Config::get('app.locale') }}';
                var name = 'Title_' + locale;
                $.ajax({
                    url: '{{route('vendor.getDistricts')}}',
                    method: "post",
                    data: {cityId: cityId},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        var districtId = document.getElementById('districtId');
                        districtId.innerHTML = "";
                        if (data['districts'].length != 0) {
                            data['districts'].forEach(districts => districtId.innerHTML += "<option value=" + districts.id + ">" + districts[name] + "</option>");
                        } else {
                            districtId.innerHTML += "<option value='sad'>{{__('product.There_is_no_districts_yet')}}</option>";
                        }


                    }
                });


            });

        });
        window.onload = function () {
            $("#filter").keyup(function () {

                var filter = $(this).val(),
                    count = 0;

                $('.results').each(function () {

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
    <script src="{{asset('assets\dropdown1\ms-Dropdown-master\ms-Dropdown-master\dist\js\dd.min.js')}}"></script>
    <script>
        function myfun123() {
            var active_make = document.getElementById('active_make');
            active_make.innerHTML += "";
            var x = document.querySelector('input[name="makes"]:checked').value;
            active_make.innerHTML = "<span class='mt-4 btn btn-success'> {{__('product.You_have_select_your_mark_successfully')}} </span>";
            }
    </script>







<a href="https://wa.me/0201068298958?text=product%20link%20:%20https://webautobazaar.com/product/details/1" data-action="share/whatsapp/share" target="_blank" class=" " style="position: fixed; bottom:50px; right:50px">
    <img src="https://webautobazaar.com/assets/site/images/site/whatapp.png" height="50" width="50" alt="...">
</a>

<footer class="footer mt-5 pt-5" style="background: #F3F3F3">
    <div class=" ">
        <div class="row mx-auto">
            <div class="col-6 col-md-4 col-lg-3 mb-4 mb-lg-1 linkColor">
                <h6 class="text-dark font-weight-bold">{{__('home.about_autobazar')}}</h6>
                <a href="{{route('home')}}" class="link h6 d-block text-gray mt-5">{{__('home.about_autobazar')}}</a>
                <a href="/terms" class="link h6 d-block text-gray mt-3">{{__('home.terms_cond')}}</a>
                <a href="{{route('about')}}" class="link h6 d-block text-gray mt-3">{{__('nav.AboutUs')}}</a>
                <a href="{{route('contact')}}" class="link h6 d-block text-gray mt-3">{{__('nav.Contact')}}</a>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-4 mb-lg-1 linkColor">
                <h6 class="text-dark font-weight-bold">{{__('home.terms_cond')}}</h6>
                <a href="{{route('home')}}" class="link h6 d-block text-gray mt-5">{{__('nav.Home')}}</a>
                <a href="{{route('subcategory',['name'=>1])}}" class="link h6 d-block text-gray ">{{__('nav.CarsAndHeavyEquipment')}}</a>
                <a href="{{route('subcategory',['name'=>2])}}" class="link h6 d-block text-gray ">{{__('nav.SpareParts')}}</a>
                <a href="{{route('subcategory',['name'=>4])}}" class="link h6 d-block text-gray ">{{__('nav.ElectricGenerators')}}</a>
                <a href="{{route('subcategory',['name'=>3])}}" class="link h6 d-block text-gray ">{{__('nav.MaintenanceCenters')}}</a>


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
                <h6 class="text-dark font-weight-bold ">{{__('home.payment_method')}}</h6>
                <div class="Download-Icons">
                    <a href="" class="h3 text-primary mr-1"><i class="fab fa-cc-visa"></i></a>
                    <a href="" class="h3 text-primary "><i class="fab fa-cc-paypal"></i></a>
                </div>
            </div>

        </div>

    </div>
    <hr class="p-1 mt-5">
    <div class="container-fluid row">
        <p class="col-6 text-gray mt-1 mb-4">{{__('home.all_rights_saved')}} To AutoBazaar Website</p>
        <p class="col-4 text-left text-gray">
            {{__('home.created_by')}}<a href="https://we-work.pro" target="_blank"> We-work Group</a>
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

<!-- @stop
