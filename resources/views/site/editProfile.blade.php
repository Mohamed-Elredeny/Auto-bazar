@extends('layouts.app')
@section('content')
        <style>
            body{margin-top:20px;}

        </style>
            <div class="container bootstrap snippets ">
                <hr>
                @if($type == 'vendor')
                      <form action="{{route('edit.profile.now',['type'=>'vendor'])}}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{route('edit.profile.now',['type'=>'maintenance'])}}" method="post" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-3">
                            <center>
                                <h6>Profile Image</h6>
                                <hr>
                            </center>
                            <div class="text-center">
                                @if($type == 'vendor')
                                    <img width="90%" height="150" style="border-radius: 5px;" src="{{asset('assets/images/users')}}/{{auth::user()->image}}">
                                @else
                                    <img width="90%" height="150" style="border-radius: 5px;" src="{{asset('assets/images/users')}}/{{auth::user()->photo}}">
                                @endif

                                <input type="file" class="form-control" name="image">
                            </div>
                            <br>
                            <center>
                                <h6>Cover Image</h6>
                                <hr>
                            </center>
                            <div class="text-center">
                                    <img width="90%" height="150" style="border-radius: 5px;" src="{{asset('assets/images/users')}}/{{auth::user()->cover}}">

                                <input type="file" class="form-control" name="cover">
                            </div>
                            <center>
                                <br>

                                <input type="submit" value="Save Changes" class="btn btn-success">
                            </center>
                        </div>


                        <!-- edit form column -->
                        <div class="col-md-9 personal-info">

                            <h3>Edit Profile</h3>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" value="{{auth::user()->name}}" name="name">
                                </div>


                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{auth::user()->email}}" name="email">
                                    </div>
                                </div>
                                @if($type == 'vendor')
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Company Name:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{auth::user()->company_name}}" name="company_name">
                                    </div>
                                </div>
                                @endif
                                @if($type == 'vendor')
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Shop Type:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control inputform" id="input12" name="shopType" >
                                            <option value="{{auth::user()->MyshopType->id}}">{{auth::user()->MyshopType['Title_' . App::getlocale()]}}</option>
                                            @foreach($shopTypes as $shopType)
                                                @if($shopType->id != auth::user()->MyshopType->id )
                                                <option value="{{$shopType['id']}}">{{$shopType['Title_'.App::getlocale()]}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                @else
                                    <div class="form-group">

                                        <label class="col-lg-3 control-label">Shop Type:</label>
                                        <div class="col-lg-8">
                                            <select type="file" class="form-control inputform" id="specialization_id" aria-describedby="emailHelp" name="specialization_id">
                                                <option value="{{auth::user()->specialization->id}}">{{auth::user()->specialization['Title_'. App::getlocale()]}}</option>
                                            @foreach($specialization as $spc)
                                                 @if(auth::user()->specialization->id != $spc->id )
                                                    <option value="{{$spc->id}}">{{$spc['Title_'. App::getlocale()]}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-3 control-label">Sell Type:</label>
                                        <div class="col-lg-8">
                                            <select type="file" class="form-control inputform" id="sellTypeId" aria-describedby="emailHelp" name="sellTypeId">
                                                <option value="{{auth::user()->selltype->id}}">{{auth::user()->selltype['Title_'. App::getlocale()]}}</option>
                                               @foreach($category as $cat)
                                                   @if($cat->id != auth::user()->selltype->id)
                                                    <option value="{{$cat->id}}">{{$cat['Title_'. App::getlocale()]}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Work Hours:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control inputform"  name="work_hour" value="{{auth::user()->work_hour}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input33">Holidays</label>
                                        </br>
                                        <?php
                                        $user_holidays = explode('|', auth::user()->holidays);
                                        ?>
                                        @if(!in_array("Sunday",$user_holidays))
                                            <input type="checkbox" id="Sunday" name="holidays[]" value="Sunday">
                                            <label for="Sunday">Sunday</label><br>
                                        @else
                                            <input type="checkbox" id="Sunday" name="holidays[]" value="Sunday" checked>
                                            <label for="Sunday">Sunday</label><br>
                                        @endif

                                        @if(!in_array("Monday",$user_holidays))
                                            <input type="checkbox" id="Monday" name="holidays[]" value="Monday">
                                            <label for="Monday">Monday</label><br>
                                        @else
                                            <input type="checkbox" id="Monday" name="holidays[]" value="Monday" checked>
                                            <label for="Monday">Monday</label><br>
                                        @endif


                                        @if(!in_array("Tuesday",$user_holidays))
                                        <input type="checkbox" id="Tuesday" name="holidays[]" value="Tuesday">
                                        <label for="Tuesday">Tuesday</label><br>
                                        @else
                                            <input type="checkbox" id="Tuesday" name="holidays[]" value="Tuesday" checked>
                                            <label for="Tuesday">Tuesday</label><br>
                                        @endif

                                        @if(!in_array("Wednesday",$user_holidays))
                                        <input type="checkbox" id="Wednesday" name="holidays[]" value="Wednesday">
                                        <label for="Wednesday">Wednesday</label><br>
                                        @else
                                            <input type="checkbox" id="Wednesday" name="holidays[]" value="Wednesday" checked>
                                            <label for="Wednesday">Wednesday</label><br>
                                        @endif

                                        @if(!in_array("Thursday",$user_holidays))
                                            <input type="checkbox" id="Thursday" name="holidays[]" value="Thursday">
                                            <label for="Thursday">Thursday</label><br>
                                        @else
                                            <input type="checkbox" id="Thursday" name="holidays[]" value="Thursday" checked>
                                            <label for="Thursday">Thursday</label><br>
                                        @endif

                                        @if(!in_array("Friday",$user_holidays))
                                        <input type="checkbox" id="Friday" name="holidays[]" value="Friday">
                                        <label for="Friday">Friday</label><br>
                                        @else
                                            <input type="checkbox" id="Friday" name="holidays[]" value="Friday" checked>
                                            <label for="Friday">Friday</label><br>
                                        @endif

                                        @if(!in_array("Saturday",$user_holidays))
                                        <input type="checkbox" id="Saturday" name="holidays[]" value="Saturday">
                                        <label for="Saturday">Saturday</label><br>
                                        @else
                                            <input type="checkbox" id="Saturday" name="holidays[]" value="Saturday" checked>
                                            <label for="Saturday">Saturday</label><br>
                                        @endif

                                        <input class="btn btn-primary w-100 font-weight-bold" id="angry" type="submit" style="display: none" value="Done">


                                    </div>

                                @endif

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Country:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control"  name="city_id"  id="city_id" required>
                                            <option value="{{auth::user()->city->id }}">{{auth::user()->city['Title_'. App::getlocale()]}}</option>
                                            @foreach($cities as $oneCity)
                                                @if($oneCity->id !=auth::user()->city_id )
                                                    <option value="{{$oneCity->id}}">{{$oneCity['Title_' . App::getlocale()]}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">City:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control"  name="district_id" required id="district_id">
                                            <option value="{{auth::user()->district->id }}">{{auth::user()->district['Title_'. App::getlocale()]}}</option>

                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Phone 1:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{auth::user()->phone1}}" name="phone1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Phone 2:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{auth::user()->phone2}}" name="phone2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Facebook:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{auth::user()->facebook	}}" name="facebook">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Twitter:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{auth::user()->twitter}}" name="twitter">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Instagram:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="{{auth::user()->instgram}}" name="instgram">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    </div>
                    <hr>
                    <br><br><br>

@endsection
                    <script
                        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
                        crossorigin="anonymous">
                    </script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script>
                        $(document).ready(function(){
                            $('#city_id').on('change', function() {
                                var id = $(this).val();

                                $.ajax({
                                    url:'{{Session::get('host')}}/getDistricts',
                                    method:"get",
                                    data:{cityId:id},
                                    dataType:"json",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success:function(data){

                                        var districts = document.getElementById('district_id');

                                        districts.innerHTML = "";

                                        data.forEach(district => districts.innerHTML += "<option value="+district.id+">"+district.Title_{{App::getlocale()}}+"</option>");

                                        //console.log(typeof data);

                                        // console.log(data);
                                    }
                                });

                            });
                        });
                    </script>
