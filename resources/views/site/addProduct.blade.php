<link rel="stylesheet" type="text/css" href="{{asset('assets/site/martina/css/styleForm.css')}}">
@extends('layouts.app')
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
                    <h2>Add Product For Sell</h2>
                    <input type="hidden" name="rent" value="0">
                @elseif($rent == 1)
                    <h2>Add Product For Rent</h2>
                    <input type="hidden" name="rent" value="1">
                @else
                    <h2>Add Wanted Product </h2>
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
                        Category Information
                    </h3>
                    <fieldset>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">Advertisement type</label>
                                <select class="form-control addDropdown" required id="sellTypeId" name="sellTypeId">
                                    <option value="sad">Default Type</option>
                                    @foreach($sellTypes as $selltypes)
                                        <option value="{{$selltypes['id']}}">
                                            {{$selltypes['Title_'.App::getLocale()]}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="sellTypeIdHeavey" id="sellTypeIdHeavey"
                                   value="{{\app\models\SellType::where('Title_en','heavy equipment')->first()->id}}">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">Section</label>
                                <select class="form-control addDropdown" required id="sectionId" name="sectionId">
                                    <option>Default Section</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">Category</label>
                                <select class="form-control addDropdown" required id="typeCategoriesId"
                                        name="typeCategoriesId">>
                                    <option>Default select</option>
                                </select>
                            </div>
                            @if($category != 2)

                                <div class="form-group col-6">
                                    {{--  <label for="exampleInputEmail1" class="font-weight-bold">Make</label>
                                      <select  required id="makesId" name="makesId" is="ms-dropdown">
                                      </select>--}}
                                    <label for="exampleInputEmail1" class="font-weight-bold">Mark</label>
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
                                <div class="form-group col-6">
                                    <label for="" class="font-weight-bold">Model</label>
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
                        Product Details
                    </h3>
                    @if($category == 1 )
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Status</label>
                                    <select class="form-control addDropdown" required name="statuses">
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}">{{$status['Title_' . App::getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="font-weight-bold">Year</label>
                                    <input type="number" placeholder="YYYY" min="1900" max="2100"
                                           class="form-control addDropdown" required name="year">
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Gear Box</label>
                                    <select class="form-control" id="gearbox_id" name="gearbox_id" required>
                                        @foreach($gearboxes as $gearbox)
                                            <option
                                                value="{{$gearbox->id}}">{{$gearbox['Title_'. App::getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Fuel Type</label>
                                    <select class="form-control addDropdown" required name="fuel_type_id">
                                        @foreach($fuels as $fuel)
                                            <option
                                                value="{{$fuel->id}}">{{$fuel['Title_'. App::getLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4" id="showDistance">
                                    <label for="" class="font-weight-bold">Distance Mileage - KM </label>
                                    <input type="number" class="form-control addDropdown" name="distance">
                                </div>
                                <div class="form-group col-4" id="showWork">
                                    <label for="" class="font-weight-bold">Work Hours</label>
                                    <input type="number" class="form-control addDropdown" name="workhours">
                                </div>
                                <div class="form-group col-4" id="showDistance">
                                    <label for="" class="font-weight-bold">Engine Capacity</label>
                                    <input type="number" class="form-control addDropdown" name="engine_capacity">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Color</label>
                                    <div class="row">
                                        <div class="col-8">Select Your Car Color</div>
                                        <div class="col-4">
                                            <input type="color" class="form-control form-control-color addColor"
                                                   id="exampleColorInput" value="#FF85D8" title="Choose your color"
                                                   name="color">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="font-weight-bold">Payment Method</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="cash">كاش</option>
                                        <option value="installment">اقساط</option>
                                    </select>

                                </div>
                                <div class="form-group col-4" id="showDistance">
                                    <label for="" class="font-weight-bold">Cylinders Number</label>
                                    <select class="form-control addDropdown" id="user_id" name="slinder_number"
                                            required>
                                        <option value="1 سلندر">1 سلندر</option>
                                        <option value="2 سلندر">2 سلندر</option>
                                        <option value="4 سلندر">4 سلندر</option>
                                        <option value="6 سلندر">6 سلندر</option>
                                        <option value="8 سلندر">8 سلندر</option>
                                        <option value="10 سلندر">10 سلندر</option>
                                        <option value="12 سلندر">12 سلندر</option>

                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Country</label>
                                    <select class="form-control addDropdown" required id="cityId" name="cityId">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city['Title_'.App::getlocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">City</label>
                                    <select class="form-control addDropdown" required id="districtId" name="districtId">
                                        <option>Default select</option>
                                    </select>
                                </div>

                                @if($rent == 1)
                                    <div class="form-group col-4">
                                        <label for="exampleInputEmail1" class="font-weight-bold">Rent Period</label>
                                        <select class="form-control addDropdown" required id="rent_type"
                                                name="rent_type">
                                            <option value="hour">ساعه</option>
                                            <option value="day">يوم</option>
                                            <option value="week">اسبوع</option>
                                            <option value="month">شهر</option>
                                            <option value="year">سنه</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Interior Brushes</label>
                                    <select class="form-control" id="interior_brush" name="interior_brush" required>
                                        <option value="leather">جلد</option>
                                        <option value="cloth">قماش</option>
                                        <option value="both of them">كلايهما</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Interior Color</label>
                                    <div class="row">
                                        <div class="col-8">Select Your IInterior Color</div>
                                        <div class="col-4">
                                            <input type="color" class="form-control form-control-color addColor"
                                                   id="exampleColorInput" value="#939DFF" title="Choose your color"
                                                   name="Interior_color">
                                        </div>
                                    </div>
                                </div>

                                @if($rent == 1)
                                    <div class="form-group col-4">
                                        <label for="exampleInputEmail1" class="font-weight-bold">Rent</label>
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
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Status</label>
                                    <select class="form-control addDropdown" required name="statuses">
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}">{{$status['Title_' . App::getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="font-weight-bold">Year</label>
                                    <input type="number" placeholder="YYYY" min="1900" max="2100"
                                           class="form-control addDropdown" required name="year">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="font-weight-bold">Payment Method</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="cash">كاش</option>
                                        <option value="installment">اقساط</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Country</label>
                                    <select class="form-control addDropdown" required id="cityId" name="cityId">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city['Title_'.App::getlocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">City</label>
                                    <select class="form-control addDropdown" required id="districtId" name="districtId">
                                        <option>Default select</option>
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
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Status</label>
                                    <select class="form-control addDropdown" required name="statuses">
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}">{{$status['Title_' . App::getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="font-weight-bold">Year</label>
                                    <input type="number" placeholder="YYYY" min="1900" max="2100"
                                           class="form-control addDropdown" required name="year">
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Capacity "استطاعه"</label>
                                    <input type="number" class="form-control addDropdown" name="capacity">
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Ability "القدرة"</label>
                                    <input type="number" class="form-control addDropdown" name="ability">
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Tank Size</label>
                                    <input type="number" class="form-control addDropdown" name="fuel_tank_size">
                                </div>

                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Engine Type </label>
                                    <input type="text" class="form-control addDropdown" name="engine_type">
                                </div>

                                <div class="form-group col-4" id="showDistance">
                                    <label for="" class="font-weight-bold">Engine Capacity</label>
                                    <input type="number" class="form-control addDropdown" name="engine_capacity">
                                </div>

                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Faz Number </label>
                                    <input type="number" class="form-control addDropdown" name="number_of_phase">
                                </div>


                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">معدل التردد </label>
                                    <input type="number" class="form-control addDropdown" name="frequency_rate">
                                </div>

                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">صندوق الكاتم </label>
                                    <input type="number" class="form-control addDropdown" name="muffler_box">
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Fuel Type</label>
                                    <select class="form-control addDropdown" required name="fuel_type_id">
                                        @foreach($fuels as $fuel)
                                            <option
                                                value="{{$fuel->id}}">{{$fuel['Title_'. App::getLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="font-weight-bold">Payment Method</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="cash">كاش</option>
                                        <option value="installment">اقساط</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-4" id="showDistance">
                                    <label for="" class="font-weight-bold">Cylinders Number</label>
                                    <select class="form-control addDropdown" id="user_id" name="slinder_number"
                                            required>
                                        <option value="1 سلندر">1 سلندر</option>
                                        <option value="2 سلندر">2 سلندر</option>
                                        <option value="4 سلندر">4 سلندر</option>
                                        <option value="6 سلندر">6 سلندر</option>
                                        <option value="8 سلندر">8 سلندر</option>
                                        <option value="10 سلندر">10 سلندر</option>
                                        <option value="12 سلندر">12 سلندر</option>

                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Country</label>
                                    <select class="form-control addDropdown" required id="cityId" name="cityId">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city['Title_'.App::getlocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1" class="font-weight-bold">City</label>
                                    <select class="form-control addDropdown" required id="districtId" name="districtId">
                                        <option>Default select</option>
                                    </select>
                                </div>


                            </div>

                            <div class="row">
                                <hr class="col-12">
                            </div>
                        </fieldset>
                    @endif
                    <h3>
                        Product Description
                    </h3>
                    <fieldset>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">Title</label>
                                <input type="text" class="form-control addDropdown" name="title">

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">Price</label>
                                <input type="number" class="form-control addDropdown" name="price">
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center alert-danger form-group col-6 pt-2">
                                Set Your product price in dollars
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="exampleInputEmail1" class="font-weight-bold">Description</label>
                                <textarea class="form-control addDropdown" id="exampleFormControlTextarea1" rows="3"
                                          id="Description" name="Description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1" class="font-weight-bold">Image</label>
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
                            Advantages
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
                            sectionId.innerHTML += "<option value='sad'>There is no sections yet!</option>";
                        }

                        var typeCategoriesId = document.getElementById('typeCategoriesId');
                        typeCategoriesId.innerHTML = "";
                        if (data['typeCategories'].length != 0) {
                            data['typeCategories'].forEach(typeCategories => typeCategoriesId.innerHTML += "<option value=" + typeCategories.id + ">" + typeCategories[name] + "</option>");
                        } else {
                            typeCategoriesId.innerHTML += "<option value='sad'>There is no Types  yet!</option>";
                        }

                        var makesId = document.getElementById('makesId');
                        makesId.innerHTML = "";
                        if (data['makes'].length != 0) {
                            data['makes'].forEach(makes => makesId.innerHTML += "" + " <img src='http://127.0.0.1:8000/assets/images/makes/" + makes.image + " '  alt='' style='height:70px;width:100px'>" +
                                "  <br> " + makes['Title_ar'] + " <input type='radio' class='form-control dropdown-item' name='makes' value='" + makes.id + "' onclick='myfun123()'>" + " <hr> ");

                            alert(makes.id);
                        } else {
                            makesId.innerHTML += "<option value='sad'>There is no Types  yet!</option>";
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
                            districtId.innerHTML += "<option value='sad'>There is no districts yet!</option>";
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
            active_make.innerHTML = "<span class='mt-4 btn btn-success'> You have select your mark successfully ! </span>";
            }
    </script>
@stop
