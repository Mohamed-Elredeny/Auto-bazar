@extends('layouts.app_martina')
@section('content')
    <div class="w-50 m-auto pt-5">
        <div class="text-center mb-5">
            <div class="navbar-brand logo">
                <img src="{{asset('assets/site/images/site/logo.png')}}" width="45" height="45" class="d-inline-block align-top" alt="">
                <br>
                AutoBazar
            </div>
        </div>
        <form class="signform m-5" id="signupform" >
            <div id="form1">
                <h5 class="text-center font-weight-bold mb-4">
                    Sign Up
                </h5>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control inputform" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control inputform" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control inputform" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control inputform" id="exampleInputPassword1" required>
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control inputform" id="exampleInputPassword1">
                </div> --}}
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input inputform" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Do you agree for all our rules and conditions,<a href="text-decoration-none"> Click here to Show</a></label>
                </div>
                {{-- <a type="submit" class="btn btn-primary w-100 font-weight-bold" href="{{route('register.subscription')}}">Next</a><br><br> --}}
                <div type="submit" class="btn btn-primary w-100 font-weight-bold" onclick="changSignup()">Next</div><br><br>
                <a class=" font-weight-bold" href="text-decoration-none">Already have an account? Login here</a><br><br>
            </div>

            <div id="form2" style="display: none; !important">
                <h5 class="text-center font-weight-bold mb-4">
                    Account / Subscription
                </h5>
                <div class="form-group">
                    <label for="input11"  class="font-weight-bold">Company’s Name</label>
                    <input type="text" class="form-control inputform" id="input11" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="input12" class="font-weight-bold">Jurisdiction</label>
                    <select class="form-control inputform" id="input12" required>
                        <option>Default select</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input13" class="font-weight-bold">Registration Type</label>
                    <select class="form-control inputform" id="input13" required>
                        <option>Default select</option>
                    </select>
                </div>
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

                            <div class="col-3 p-2">
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
                            </div>

                        </div>
                    </div>
                </div>
                <br><br>
                <div class="btn btn-primary w-100 font-weight-bold" id="submit" onclick="changSignup2()">Next</div><br><br>
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
                    <label for="input21">Choose City and Area</label>
                    <input type="text" class="form-control inputform" id="input21" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="input22">Mobile Number</label>
                    <input type="text" class="form-control inputform" id="input22">
                </div>
                {{--
                <div class="form-group">
                    <p class=""><a href="text-decoration-none"> Skip for Now > </a></p>
                </div> --}}
                <div class="btn btn-primary w-100 font-weight-bold" onclick="changSignup3()">Next</div><br><br>

            </div>

            <div id="form4" style="display: none">
                <h5 class="text-center font-weight-bold mb-4">
                    Social Media
                </h5>

                <div class="form-group">
                    <label for="input31">Facebook</label>
                    <input type="text" class="form-control inputform" id="input31" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="input32">Twitter</label>
                    <input type="text" class="form-control inputform" id="input32">
                </div>
                <div class="form-group">
                    <label for="input33">Instagram</label>
                    <input type="text" class="form-control inputform" id="input33">
                </div>
            </div>

            <input class="btn btn-primary w-100 font-weight-bold" id="angry" type="submit" style="display: none" value="Done">

        </form>
    </div>

@stop

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
                document.getElementById("input21").required = true;
                document.getElementById("input22").required = true;
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

</script>
