@extends('layouts.app_martina')
@section('content')
    <style>
        .modal-dialog {
            width: 95%;
            margin: 0 auto;
        }
    </style>
@section('content')
<div class="card ">
    <img src="{{asset('assets/images/users/'.$profile->cover)}}" width="100%" height="320" class="card-img"/>
    <div class="card-img-overlay">
        <div class="" style="margin-top: 230px">
            <div class="row align-items-center">
                <img src="{{asset('assets/images/users/'.$profile->image)}}" width="200" height="200" class=""  style="margin-left: 5%;border-radius: 50%">

                <div class="col-lg-3 col-6 mt-sm-5">
                    <ul class=""><br>
                        <li style="font-size: 22px; font-weight: bold;"> {{$profile->name}}

                        <li><i class="fas fa-map-marker-alt maincolor"></i>
                            {{$profile->city['Title_'. LaravelLocalization::setLocale()]}},
                            {{$profile->district['Title_'. LaravelLocalization::setLocale()]}}

                        </li>
                        <li class="mt-2 mb-2">
                        <a href="https://wa.me/{{$profile->city->code . $profile->phone1 }}?text=product%20link%20:%20{{$actual_link = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']}}" data-action="share/whatsapp/share" target="_blank" class="mt-2 mb-2">
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

                <div class="col-lg-3 col-12 mt-sm-4 mt-sm-5 ">
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

                <div class="container">
                    <div class="sec2">
                        <h5 class="hsec">About</h5>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-6 col-lg-3 font-weight-bold">Department</div>
                                <div class="col-6 col-lg-3">  {{$profile->selltype['Title_'. App::getlocale()] }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-lg-3 font-weight-bold">Specialization</div>
                                <div class="col-6 col-lg-3">  {{$profile->specialization['Title_'. App::getlocale()] }}</div>
                            </div>

                            <div class="row">
                                <div class="col-6 col-lg-3 font-weight-bold">Country</div>

                                <div class="col-6 col-lg-3">
                                    {{$profile->city['Title_'. LaravelLocalization::setLocale()]}},
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-lg-3 font-weight-bold">City</div>
                                <div class="col-6 col-lg-3">
                                    {{$profile->district['Title_'. LaravelLocalization::setLocale()]}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-lg-3 font-weight-bold">work hour</div>
                                <div class="col-6 col-lg-3">
                                    {{$profile->work_hour}} Hours
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 col-lg-3 font-weight-bold">work Days</div>
                                <div class="col-6 col-lg-3">
                                    <?php $days = explode('|', $profile->holidays); ?>
                                    @foreach($days as $d)
                                    {{$d}} <br>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                </div>

                <div class="container">
                    <div class="sec2">
                        <div class="d-flex justify-content-between">
                            <h5 class="hsec ">Car Make</h5>
                        </div>
                        <div class="container">
                            @if(Auth::user() != null)
                                @if($id == Auth::user()->id)
                                        <br>
                                        <a class="btn " href="{{route('vendor.add.marks',['vendor'=>$id])}}" style="background:#19296f;color:white">Add Marks</a>
                                @endif
                            @endif
                            <div class="row">
                                @foreach($marks as $mark)
                                <div class="col-6 col-lg-3">
                                    <div class="m-4 d-flex align-items-center">
                                        <div class="p-2">
                                            <center>
                                                <img src="{{asset('assets/images/makes/'.$mark->mark->image)}}" height="100" width="100" class="rounded-circle" alt="...">
                                                <div class="font-weight-bold">{{$mark->mark['Title_'.App::getlocale()]}} </div>
                                                <div class="smallColor">
                                                    @if(Auth::user() != null)
                                                        @if($id == Auth::user()->id)
                                                    <a href="{{route('vendor.handle.mark',['process'=>'remove','mark_id'=>$mark->mark_id])}}" class="btn btn-danger" > Remove</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </center>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <br>
                </div>




            </div>

        </div>

    </div>


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
    
