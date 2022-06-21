@extends('layouts.app_martina')
@section('content')
    <div class="@desktop w-50 m-auto pt-5@elsedesktop  col-md-12  @enddesktop" >
        <div class="text-center mb-5">
            <div class="navbar-brand logo">
                <img src="{{asset('assets/site/images/site/logo.png')}}" width="45" height="45" class="d-inline-block align-top" alt="">
                <br>
                AutoBazar
            </div>
        </div>
        <form class="signform " id="signupform"  method="post" action="{{route('submit.register',['type'=>$type])}}" enctype="multipart/form-data">
            @csrf
            <div id="form1">
                <h5 class="text-center font-weight-bold mb-4">
                    Sign Up
                </h5>
                <input type="hidden" name="type"  value="{{$type}}">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control inputform" id="exampleInputEmail1" aria-describedby="emailHelp" required name="fname">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control inputform" id="exampleInputEmail1" aria-describedby="emailHelp" required name="lname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control inputform" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control inputform" id="exampleInputPassword1" required name="password">
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control inputform" id="exampleInputPassword1">
                </div> --}}
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input inputform" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Do you agree for all our rules and conditions,<a href="text-decoration-none" style="color:#17286E"> Click here to Show</a></label>
                </div>
                {{-- <a type="submit" class="btn btn-primary w-100 font-weight-bold" href="{{route('register.subscription')}}">Next</a><br><br> --}}
                <div type="submit" class="btn btn-primary w-100 font-weight-bold" style="background:#17286E" onclick="changSignup()">Next</div><br><br>
                <a class=" font-weight-bold" style="color:#17286E" href="{{route('auth.login')}}">Already have an account? Login here</a><br><br>
                @if($type == 'maintenance')
                    <a class=" font-weight-bold" style="color:#17286E" href="{{route('register',['type'=>'vendor'])}}">Are you vendor?</a><br><br>
                @else
                    <a class=" font-weight-bold" style="color:#17286E" href="{{route('register',['type'=>'maintenance'])}}">Do you have a maintenance center ? Create your store</a><br><br>
                @endif

            </div>

            <div id="form2" style="display: none; !important">
                <h5 class="text-center font-weight-bold mb-4">
                    Account / Subscription
                </h5>
                <div class="form-group">
                    <label for="input11"  class="font-weight-bold">Company’s Name</label>
                    <input type="text" class="form-control inputform" id="input11" aria-describedby="emailHelp" name="company_name">
                </div>
                @if($type != 'maintenance')

                <div class="form-group">
                    <label for="input12" class="font-weight-bold">Shop Type</label>
                    <select class="form-control inputform" id="input12" name="shopType">
                        @foreach($shopTypes as $shopType)
                        <option value="{{$shopType['id']}}">{{$shopType['Title_'.App::getlocale()]}}</option>
                        @endforeach
                    </select>
                </div>

                @endif


                <br>

                <div class="form-group">
                    <b>Subscription Plan</b>
                    <div class="form-check text-center">
                        <div class="row">
                            <div class="col-3 p-2">
                                <div>
                                    <label class="form-check-label" for="sub1">
                                        <img src="{{asset('assets/site/images/site/sub1.png')}}" width="70" height="70" class="d-inline-block align-top mb-2" alt="">
                                        <div>FREE Plan</div>
                                        <div><span class="maincolor">$00.00</span><sub>/month</sub></div>
                                    </label>
                                </div>
                                <input class="form-check-input" type="radio" id="sub1" name="subcription" >
                            </div>

                         {{--   <div class="col-3 p-2">
                                <div>
                                    <label class="form-check-label" for="sub2">
                                        <img src="{{asset('assets/site/images/site/sub2.png')}}" width="70" height="70" class="d-inline-block align-top mb-2" alt="">
                                        <div>LITE Plan</div>
                                        <div><span class="maincolor">$18.00</span><sub>/month</sub></div>
                                    </label>
                                </div>
                                <input class="form-check-input" type="radio" id="sub2" name="subcription" >
                            </div>

                            <div class="col-3 p-2">
                                <div>
                                    <label class="form-check-label" for="sub3">
                                        <img src="{{asset('assets/site/images/site/sub3.png')}}" width="70" height="70" class="d-inline-block align-top mb-2" alt="">
                                        <div>MEDIUM Plan</div>
                                        <div><span class="maincolor">$42.00</span><sub>/month</sub></div>
                                    </label>
                                </div>
                                <input class="form-check-input" type="radio" id="sub3" name="subcription" >
                            </div>

                            <div class="col-3 p-2">
                                <div>
                                    <label class="form-check-label" for="sub4">
                                        <img src="{{asset('assets/site/images/site/sub4.png')}}" width="70" height="70" class="d-inline-block align-top mb-2" alt="">
                                        <div>ULTIMATE Plan</div>
                                        <div><span class="maincolor">$80.00</span><sub>/month</sub></div>
                                    </label>
                                </div>
                                <input class="form-check-input" type="radio" id="sub4" name="subcription" >
                            </div>--}}

                        </div>
                    </div>
                </div>
                <br><br>
                <div class="btn btn-primary w-100 font-weight-bold" style="background:#17286E" id="submit" onclick="changSignup2()">Next</div><br><br>
                {{-- <div class="form-group">
                    <p class=""><a href="text-decoration-none"> Skip for Now > </a></p>
                </div> --}}
                {{-- <a type="submit" class="btn btn-primary w-100 font-weight-bold" href="{{route('register.address')}}">Next</a><br><br> --}}

            </div>
            <div id="form3" style="display: none">
                <h5 class="text-center font-weight-bold mb-4">
                    Address
                </h5>

                <div class="form-group">
                    <label >Choose Country</label>

                    <select type="text" class="form-control inputform" id="cityId" aria-describedby="emailHelp" name="city_id">
                        <option value="">Select Country</option>
                    @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city['Title_'. App::getlocale()]}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label >Choose City</label>
                    <select type="text" class="form-control inputform" id="districtId" aria-describedby="emailHelp" name="district_id" >
                        <option value="">Select City</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="input22">Mobile Number 1</label>
                    <input type="text" class="form-control inputform" id="input22" name="phone1">
                </div>
                <div class="form-group">
                    <label for="input22">Mobile Number 2</label>
                    <input type="text" class="form-control inputform" id="input22" name="phone2">
                </div>
                {{--
                <div class="form-group">
                    <p class=""><a href="text-decoration-none"> Skip for Now > </a></p>
                </div> --}}
                <div class="btn btn-primary w-100 font-weight-bold" style="background:#17286E" onclick="changSignup3()">Next</div><br><br>

            </div>

            <div id="form4" style="display: none">
                <h5 class="text-center font-weight-bold mb-4">
                    Social Media
                </h5>
                <div class="form-group">
                    <label for="input31">Profile Image</label>
                    <input type="file" class="form-control"   name="photo">
                </div>
                <div class="form-group">
                    <label for="input31">Cover Image</label>
                    <input type="file" class="form-control " name="cover">
                </div>
                <div class="form-group">
                    <label for="input31">Facebook</label>
                    <input type="text" class="form-control inputform" id="input31" aria-describedby="emailHelp" name="facebook">
                </div>
                <div class="form-group">
                    <label for="input32">Twitter</label>
                    <input type="text" class="form-control inputform" id="input32" name="twitter">
                </div>
                <div class="form-group">
                    <label for="input33">Instagram</label>
                    <input type="text" class="form-control inputform" id="input33" name="instgram">
                </div>

                @if($type == 'maintenance')
                    <div class="btn btn-primary w-100 font-weight-bold" style="background:#17286E" onclick="changSignup4()">Next</div><br><br>
                @else
                    <input class="btn btn-primary w-100 font-weight-bold" id="angry" type="submit" style="display: none;background:#17286E" value="Done">
                @endif
            </div>

            <div id="form5" style="display: none">
                <h5 class="text-center font-weight-bold mb-4">
                    Shop Specialization
                </h5>
                <div class="form-group">
                    <label for="input31">Shop Type  </label>
                    <select type="file" class="form-control inputform" id="sellTypeId" aria-describedby="emailHelp" name="sellTypeId">
                        <option value="">Select Type</option>
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat['Title_'. App::getlocale()]}}</option>
                        @endforeach
                    </select>
                </div>
               {{-- <div class="form-group">
                    <label for="input31">Shop Category  </label>
                    <select type="file" class="form-control inputform" id="typeCategoriesId" aria-describedby="emailHelp" name="type_category_id">
                    </select>
                </div>--}}
                <div class="form-group">
                    <label for="input31">Specialization   </label>
                    <select type="file" class="form-control inputform" id="specialization_id" aria-describedby="emailHelp" name="specialization_id">
                        @foreach($specialization as $spc)
                            <option value="{{$spc->id}}">{{$spc['Title_'. App::getlocale()]}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input32">Work hours </label>
                    <input type="text" class="form-control inputform" id="input32" name="work_hour">
                </div>
                <div class="form-group">
                    <label for="input33">Holidays</label>
                    </br>
                    <input type="checkbox" id="Sunday" name="holidays[]" value="Sunday">
                    <label for="Sunday">Sunday</label><br>

                    <input type="checkbox" id="Monday" name="holidays[]" value="Monday">
                    <label for="Monday">Monday</label><br>

                    <input type="checkbox" id="Tuesday" name="holidays[]" value="Tuesday">
                    <label for="Tuesday">Tuesday</label><br>


                    <input type="checkbox" id="Wednesday" name="holidays[]" value="Wednesday">
                    <label for="Wednesday">Wednesday</label><br>


                    <input type="checkbox" id="Thursday" name="holidays[]" value="Thursday">
                    <label for="Thursday">Thursday</label><br>

                    <input type="checkbox" id="Friday" name="holidays[]" value="Thursday">
                    <label for="Friday">Friday</label><br>

                    <input type="checkbox" id="Saturday" name="holidays[]" value="Saturday">
                    <label for="Saturday">Saturday</label><br>


                    <input class="btn btn-primary w-100 font-weight-bold" id="angry" type="submit" style="display: none" value="Done">


                </div>
            </div>

            <br><br>
            @if($errors->any())
                <center>
                    <h6 class="btn btn-danger">{{$errors->first()}}</h6>
                </center>
            @endif

        </form>
    </div>


    <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            $('#sellTypeId').on('change', function () {
                var SellType = $(this).val();

                var locale = '{{ Config::get('app.locale') }}';
                var name = 'Title_'+locale;
                $.ajax({
                    url: '{{route('getProductSections')}}',
                    method: "post",
                    data: {sellType: SellType},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {

                        var typeCategoriesId = document.getElementById('typeCategoriesId');
                        typeCategoriesId.innerHTML = "";
                        if(data['typeCategories'].length != 0) {
                            data['typeCategories'].forEach(typeCategories => typeCategoriesId.innerHTML += "<option value=" + typeCategories.id + ">" + typeCategories[name] + "</option>");
                        }else{
                            typeCategoriesId.innerHTML += "<option value='sad'>There is no Types  yet!</option>";
                        }


                    }
                });



            });

            $('#cityId').on('change', function () {
                var cityId = $(this).val();
                var locale = '{{ Config::get('app.locale') }}';
                var name = 'Title_'+locale;
               // alert(name);

                $.ajax({
                    url: '{{route('getDistricts')}}',
                    method: "post",
                    data: {cityId: cityId},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        //alert('moka');
                        var districtId = document.getElementById('districtId');
                        districtId.innerHTML = "";
                        if(data['districts'].length != 0) {
                            data['districts'].forEach(districts => districtId.innerHTML += "<option value=" + districts.id + ">" + districts[name] + "</option>");
                        }else{
                            districtId.innerHTML += "<option value='sad'>There is no districts yet!</option>";
                        }



                    }
                });



            });

        });
    </script>
    <script>
        function changSignup()
        {
            var $myForm = $('#signupform');

            if(! $myForm[0].checkValidity()) {
                $myForm.find(':submit').click();
            }
            else{
                document.getElementById("form1").style.display = "none";
                document.getElementById("form2").style.display = "block";
                document.getElementById("input11").required = true;
                document.getElementById("input12").required = true;
                document.getElementById("input13").required = true;
            }

        }

        function changSignup2()
        {
            var $myForm = $('#signupform');

            if($('input[type=radio][name=subcription]:checked').length == 0)
            {
                alert("Please select atleast one");
                console.log('if');
                return false;
            }
            else
            {
                if(! $myForm[0].checkValidity())
                {
                    $myForm.find(':submit').click();
                }
                else
                {
                    document.getElementById("form2").style.display = "none";
                    document.getElementById("form3").style.display = "block";
                    document.getElementById("input22").required = true;
                    document.getElementById("cityId").required = true;
                    document.getElementById("districtId").required = true;
                }
            }

        }

        function changSignup3()
        {
            var $myForm = $('#signupform');

            if(! $myForm[0].checkValidity()) {
                $myForm.find(':submit').click();
            }
            else{
                document.getElementById("form3").style.display = "none";
                document.getElementById("form4").style.display = "block";
                document.getElementById("angry").style.display = "block";

                document.getElementById("input31").required = true;
                document.getElementById("input32").required = true;
                document.getElementById("input33").required = true;

            }

        }

        function changSignup4()
        {
            var $myForm = $('#signupform');

            if(! $myForm[0].checkValidity()) {
                $myForm.find(':submit').click();
            }
            else{
                document.getElementById("form4").style.display = "none";
                document.getElementById("form5").style.display = "block";
                document.getElementById("angry").style.display = "block";

                document.getElementById("input31").required = true;
                document.getElementById("input32").required = true;
                document.getElementById("input33").required = true;
            }

        }


    </script>





@stop


