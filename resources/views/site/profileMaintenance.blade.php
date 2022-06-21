@extends('layouts.app')
@section('content')
    <div class="card ">
        <img src="{{asset('assets/images/users/'.$profile->cover)}}" width="100%" height="320" class="card-img" />
        <div class="card-img-overlay">
            <div class="" style="margin-top: 230px">
                <div class="row align-items-center">
                    <img src="{{asset('assets/images/users/'.$profile->photo)}}" width="200" height="200" class=""  style="margin-left: 5%;">
                    <div class="col-lg-3 col-sm-6 mt-sm-5">
                        <ul>
                            <br>
                            <li style="font-size: 22px; font-weight: bold;"> {{$profile->name}}
                            <li><i class="fas fa-map-marker-alt maincolor"></i>


                                {{$profile->city['Title_'. App::getlocale()]}},
                                {{$profile->district['Title_'. App::getlocale()]}}


                            </li>
                            <li>
                                <a href="https://wa.me/0201068298958?text=product%20link%20:%20http://127.0.0.1:8000/product/details/1" data-action="share/whatsapp/share" target="_blank" class=" ">
                                    Send Message

                                    <img src="{{asset('assets/site/images/site/whatapp.png')}}" height="20" width="20" alt="...">
                                </a>

                            </li>
                            @if(Auth::user() != null)
                                @if($id == Auth::user()->id)
                                    <li>
                                        <br>
                                        <a class="btn " href="{{route('edit.profile',['type'=>'maintenance'])}}" style="background:#19296f;color:white">{{__('public.editProfile')}}</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>


                    <div class="col-lg-3 col-sm-12 mt-sm-5 ">
                        <div class="row">
                            <div class="col-1 col-lg-2 col-sm-1">
                            </div>
                            <div class="col-3 col-lg-10 col-sm-3">
                                <a href="{{$profile->facebook}}" class="text-decoration-none">
                                    <i class="fab fa-facebook-f maincolor">
                                        Facebook Account
                                    </i>
                                </a>

                            </div>
                            <div class="col-1 col-lg-2 col-sm-1">
                            </div>
                            <div class="col-3 col-lg-10 col-sm-3">
                                <a href="{{$profile->instgram}}" class="text-decoration-none">
                                    <i class="fab fa-instagram maincolor">
                                        Instagram Account
                                    </i>
                                </a>


                            </div>
                            <div class="col-1 col-lg-2 col-sm-1">
                            </div>
                            <div class="col-3 col-lg-10 col-sm-3">
                                <a href="{{$profile->twitter}}" class="text-decoration-none">
                                    <i class="fab fa-twitter maincolor">
                                        Twitter Account
                                    </i>
                                </a>

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-sm-12 mt-sm-4 mt-lg-5 ">
                        <div class="row">
                            <div class="col-1 col-lg-2 col-sm-1">
                            </div>
                            <div class="col-3 col-lg-10 col-sm-3">
                                <i class="fa fa-phone maincolor" aria-hidden="true"></i>
                                +{{$profile->phone1}}
                            </div>
                            <div class="col-1 col-lg-2 col-sm-1">
                            </div>
                            <div class="col-3 col-lg-10 col-sm-3">
                                <i class="fa fa-phone maincolor" aria-hidden="true"></i>

                                +{{$profile->phone2}}
                            </div>
                            <div class="col-1 col-lg-2 col-sm-1">
                            </div>
                            <div class="col-3 col-lg-10 col-sm-3">
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
                            <div class="row m-2">
                                <div class="col-3 font-weight-bold">Department</div>
                                <div class="col-3">  {{$profile->selltype['Title_'. App::getlocale()] }}</div>
                            </div>
                            <div class="row m-2">
                                <div class="col-3 font-weight-bold">Specialization</div>
                                <div class="col-3">  {{$profile->specialization['Title_'. App::getlocale()] }}</div>
                            </div>

                            <div class="row m-2">
                                <div class="col-3 font-weight-bold">Country</div>



                                <div class="col-3">
                                    {{$profile->city['Title_'. LaravelLocalization::setLocale()]}},
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col-3 font-weight-bold">City</div>
                                <div class="col-3">
                                    {{$profile->district['Title_'. LaravelLocalization::setLocale()]}}
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col-3 font-weight-bold">work hour</div>
                                <div class="col-3">
                                    {{$profile->work_hour}} Hours
                                </div>
                            </div>

                            <div class="row m-2">
                                <div class="col-3 font-weight-bold">work Days</div>
                                <div class="col-3">
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
                                <div class="col-sm-6 col-lg-3">
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


@stop

