<link rel="stylesheet" type="text/css" href="{{asset('assets/site/martina/css/styleForm.css')}}">

@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{asset('assets\dropdown1\ms-Dropdown-master\ms-Dropdown-master\dist\css\dd.css')}}" />

@section('content')
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <div  style="direction: ltr;text-align: left">
            <style>
                body{margin-top:20px;}

            </style>
            <div class="container bootdey">
                <hr>
                <center>
                    <h2>{{__('product.edit_product_details')}}  <label style="color:#17286E;font-weight: bolder"> {{$product->category['Title_'. App::getlocale()]}}</label></h2>
                </center>
                <hr>
                <form method="post" action="{{route('product.details.update')}}" enctype="multipart/form-data">
                    @csrf
                    @if($product->sellType->id == 5)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('product.heavy_equip_sections')}}</label>
                            <div class="col-sm-10">
                                <select  required id="rent" name="section_id" class="form-control">
                                    @if(isset($product->section['id']))
                                    <option value="{{$product->section['id']}}" >{{$product->section['Title_'. App::getlocale()]}}</option>
                                    @endif
                                @foreach($sections as $sec)
                                            @if(isset($product->section['id']))
                                                @if($sec->id != $product->section['id'])
                                                    <option value="{{$sec['id']}}" >{{$sec['Title_'. App::getlocale()]}}</option>
                                                @endif
                                            @else
                                                <option value="{{$sec['id']}}" >{{$sec['Title_'. App::getlocale()]}}</option>

                                            @endif

                                   @endforeach
                                </select>
                            </div>
                        </div>

                    @endif
                    <input type="hidden" name="product_id" value="{{$id}}">
                    {{-- 1 for cars and heavy equipment --}}
                    <input type="hidden" name="category_id" value="{{$id}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.purpose_of_product')}}</label>
                        <div class="col-sm-10">
                            <select  required id="rent" name="rent" is="ms-dropdown">
                                @if($rent == 0 )
                                    <option value="0" >{{__('product.for_sell')}}</option>
                                    <option value="1" >{{__('product.for_rent')}}</option>
                                    <option value="2" >{{__('product.for_wanted')}}</option>
                                @elseif($rent == 1)
                                    <option value="1" >{{__('product.for_rent')}}</option>
                                    <option value="2" >{{__('product.for_wanted')}}</option>
                                    <option value="0" >{{__('product.for_sell')}}</option>
                                @else
                                    <option value="2" >{{__('product.for_wanted')}}</option>
                                    <option value="0" >{{__('product.for_sell')}}</option>
                                    <option value="1" >{{__('product.for_rent')}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.sell_type')}}</label>
                        <div class="col-sm-10">

                                <a class="col-sm-4"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  style="cursor:pointer;">
                                    <img src="{{asset('assets/images/icons/blue/'.$product->SellType['image'])}}" alt="user-image" style="height: 100px;width:100px">
                                    <span class="align-middle">
                                             {{$product->SellType['Title_'. App::getlocale()]}}
                                        </span>
                                </a>


                                <div class="dropdown-menu text-center" style="overflow-x:scroll;height: 500px;font-size:15px;width:300px">
                                    @foreach($sellTypes as $city)
                                        <a class="link_dropdown" style="cursor:pointer;" href="{{route('change.sellType.product',['proId'=>$product->id,'sellTypeId'=>$city->id])}}">
                                            <img src="{{asset('assets/images/icons/blue/'.$city['image'])}}" alt="user-image" style="height: 75px;width:60%">
                                            <br>
                                            <span class="align-middle">
                                              {{$city['Title_'. App::getlocale()]}}
                                              </span>
                                        </a>
                                        <hr>
                                    @endforeach

                                </div>


                            {{--
                                                        <select  required id="sell_type" name="sell_type" is="ms-dropdown">
                                                            @foreach($sellTypes as $sell_type)
                                                                @if($product->sellType->id == $sell_type->id)
                                                                    <option value="{{$sell_type->id}}" data-image="{{asset('assets/images/icons/blue/'.$sell_type->image)}}" selected  >{{$sell_type['Title_'.App::getlocale()]}}</option>
                                                                @else
                                                                    <option value="{{$sell_type->id}}" data-image="{{asset('assets/images/icons/blue/'.$sell_type->image)}}"  >{{$sell_type['Title_'.App::getlocale()]}}</option>

                                                                @endif

                                                            @endforeach
                                                        </select>
                            --}}
                        </div>
                    </div>
                    @if($type != 2)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('product.mark')}} </label>
                            <div class="col-sm-10">
                                <select  required id="makesId" name="makesId" is="ms-dropdown" onclick="myfun123()">
                                    @foreach($product->sellType->makes as $make)
                                        @if($make->id == $product->make_id)
                                            <option value="{{$make->id}}" data-image="{{asset('assets/images/makes/'.$product->make->image)}}" selected >{{$make['Title_'.App::getlocale()]}}</option>
                                        @else
                                            <option value="{{$make->id}}" data-image="{{asset('assets/images/makes/'.$make->image)}}" >{{$make['Title_'.App::getlocale()]}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.model')}}</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="model" value="{{$product->model}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> {{__('product.product_status')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status_id" name="status_id" required>
                                @foreach($statuses as $status)
                                    @if($status->id == $product->status_id)
                                        <option value="{{$status->id}}" selected>{{$status->Title_ar}}</option>
                                    @else
                                        <option value="{{$status->id}}">{{$status->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.year_of_made')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="year" name="year" required>
                                @for($i = date('Y')-50 ; $i <= date('Y'); $i++ )
                                    @if($i == $product->year)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    @if($product->sellType->id != 7 && $product->sellType->id != 6  && $product->category->id !=2 && $product->category->id !=4)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.gear_box')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gearbox_id" name="gearbox_id" required>
                                @foreach($gearboxes as $gearbox)
                                    @if($gearbox->id == $product->gearbox_id)
                                        <option value="{{$gearbox->id}}" selected>{{$gearbox->Title_ar}}</option>
                                    @else
                                        <option value="{{$gearbox->id}}">{{$gearbox->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
            @if($product->sellType->id != 6 &&  $product->category->id !=2)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.fuelType')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="fuel_type_id" name="fuel_type_id" required>
                                @foreach($fuels as $fuel)
                                    @if($fuel->id == $product->fuel_type_id)
                                        <option value="{{$fuel->id}}" selected>{{$fuel->Title_ar}}</option>
                                    @else
                                        <option value="{{$fuel->id}}">{{$fuel->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
@endif
                    @if($product->sellType->id != 6 &&  $product->category->id !=2 && $product->category->id !=4)
                    <div class="form-group row" id="distance">
                        @if($product->distance == null)
                            <label class="col-sm-2 col-form-label"> {{__('product.work_hours') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="work_hour" value="{{$product->work_hour}}">
                            </div>
                        @elseif($product->work_hour == null)
                            <label class="col-sm-2 col-form-label">{{__('product.distance')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="distance" value="{{$product->distance}}">
                            </div>
                        @endif
                    </div>
                    @endif
                @if( $product->category->id !=2 )
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.color')}}</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="color" id="example-text-input" name="color" value="{{$product->color}}" required>
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.payment_method')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                @if($product->payment_method == 'cash')
                                    <option value="cash" selected>{{__('product.cash')}}</option>
                                    <option value="installment">{{__('product.installment')}}</option>
                                @elseif($product->payment_method == 'installment')
                                    <option value="installment" selected>{{__('product.installment')}}</option>
                                    <option value="cash">{{__('product.cash')}}</option>
                                @else
                                    <option value="cash">{{__('product.cash')}}</option>
                                    <option value="installment" selected>{{__('product.installment')}}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.country')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city_id" name="city_id" required>
                                <option>{{__('product.select_country')}}</option>
                                @foreach($cities as $city)
                                    @if($city->id == $product->city_id)
                                        <option value="{{$city->id}}" selected>{{$city->Title_ar}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.city')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="district_id" name="district_id" required>
                                @foreach($product->city->districts as $district)
                                    @if($district->id == $product->district_id)
                                        <option value="{{$district->id}}" selected>{{$district->Title_ar}}</option>
                                    @else
                                        <option value="{{$district->id}}">{{$district->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if($type == 2)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('product.country_creation')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="country" value="{{$product->country}}" required>

                            </div>
                        </div>
                    @endif
                    @if( $product->category->id !=2 && $product->category->id !=4)
                    <div class="form-group row">
                        <label class="control-label col-sm-2">{{__('product.advantages')}}</label>
                        <div class="col-sm-10">
                            <select class="select2 form-control select2-multiple" multiple="multiple" name="advandage_id[]" multiple data-placeholder="اختر الإضافات">
                                <?php $adv = explode('|', $product->advandage_id) ;?>
                                @foreach($advandages as $advandage)
                                    @if(in_array($advandage->id ,$adv))
                                        <option value="{{$advandage->id}}" selected>{{$advandage['Title_'. App::getlocale()]}}</option>
                                    @else
                                        <option value="{{$advandage->id}}" >{{$advandage['Title_'. App::getlocale()]}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                    @if($product->sellType->id != 7 && $product->sellType->id != 6 &&  $product->category->id !=2 && $product->category->id !=4)

                    <div class="form-group row">
                        <label class="control-label col-sm-2">{{__('product.interior_brush')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="interior_brush" name="interior_brush" required>
                                @if($product->interior_brush == 'leather')
                                    <option value="leather" selected>{{__('product.leather')}}</option>
                                    <option value="cloth">{{__('product.cloth')}}</option>
                                    <option value="bothOfThem">{{__('product.bothOfThem')}}</option>
                                @elseif($product->interior_brush == 'cloth')
                                    <option value="leather">{{__('product.leather')}}</option>
                                    <option value="cloth" selected>{{__('product.cloth')}}</option>
                                    <option value="bothOfThem">{{__('product.bothOfThem')}}</option>
                                @elseif($product->interior_brush == 'bothOfThem')
                                    <option value="leather">{{__('product.leather')}}</option>
                                    <option value="cloth">{{__('product.cloth')}}</option>
                                    <option value="bothOfThem" selected>{{__('product.bothOfThem')}}</option>
                                @else
                                    <option value="leather">{{__('product.leather')}}</option>
                                    <option value="cloth">{{__('product.cloth')}}</option>
                                    <option value="bothOfThem" selected>{{__('product.bothOfThem')}}</option>
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.interior_color')}}</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="color" id="example-text-input" name="interior_color" value="{{$product->interior_color}}" required>
                        </div>
                    </div>
                    @endif

                    @if($type != 2 && $product->sellType->id != 6)
                        <div  id="notformqtwra" style="display:block">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.engine_capacity')}}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="example-text-input"  name="engine_capacity" value="{{$product->engine_capacity}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">{{__('product.slinder_number')}}</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="user_id" name="slinder_number" required>
                                        <option value="{{$product->slinder_number}}" selected>{{$product->slinder_number}}</option>
                                        @if($product->slinder_number != '1 سلندر')
                                            <option value="1 سلندر">1 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '2 سلندر')
                                            <option value="2 سلندر">2 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '4 سلندر')
                                            <option value="4 سلندر">4 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '6 سلندر')
                                            <option value="6 سلندر">6 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '8 سلندر')
                                            <option value="8 سلندر">8 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '10 سلندر')
                                            <option value="10 سلندر">10 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '12 سلندر')
                                            <option value="12 سلندر">12 {{__('product.slinder')}}</option>
                                        @endif

                                    </select>
                                </div>
                            </div>

                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.price')}}</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" value="{{$product->price}}" id="example-text-input" name="price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.title')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="example-text-input" name="title">{{$product->title}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.description')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="example-text-input" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>
                    @if($type == 4)
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.ability')}} KVA</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="ability" required value="{{$product->ability}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.capacity')}} KW</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="capacity" required value="{{$product->capacity}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.fuel_tank_size')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="fuel_tank_size" required value="{{$product->fuel_tank_size}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.engine_type')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="engine_type" required value="{{$product->engine_type}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.number_of_phase')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="number_of_phase" required value="{{$product->number_of_phase}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.frequency_rate')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="frequency_rate" required value="{{$product->frequency_rate}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.muffler_box')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="muffler_box" name="muffler_box" required>
                                    @if($product->muffler_box == 1)
                                        <option value="1">{{__('product.exist')}}</option>
                                        <option value="0">{{__('product.not_exist')}}</option>
                                    @else
                                        <option value="0">{{__('product.not_exist')}}</option>
                                        <option value="1">{{__('product.exist')}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.add_new_image')}} </label>
                        <div class="col-sm-10">
                            <input type="file" class="filestyle" accept="image/*" multiple data-buttonname="btn-secondary" name="images[]">

                        </div>
                        <alert class="col-sm-12 btn btn-danger h6">{{__('product.you_have_to_select_all_images')}}</alert>

                    </div>
                    <div class="row">

                        @foreach($images as $img)
                            <div class="col-sm-4 text-center">

                                <img src="{{asset('assets/images/products/'.$img)}}" style="height: 300px;width: 100%">
                                {{-- <a href=""  style="text-decoration: none" class="btn btn-danger mt-1">
                                     Delete Image
                                 </a>--}}
                            </div>

                        @endforeach
                    </div>
                    <hr>
                    <br>

                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark w-25">{{__('product.edit_product_details')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div  style="direction: rtl;text-align: right">
            <style>
                body{margin-top:20px;}

            </style>
            <div class="container bootdey">
                <hr>
                <center>
                    <h2>{{__('product.edit_product_details')}}  <label style="color:#17286E;font-weight: bolder"> {{$product->category['Title_'. App::getlocale()]}}</label></h2>
                </center>
                <hr>
                <form method="post" action="{{route('product.details.update')}}" enctype="multipart/form-data">
                    @csrf
                    @if($product->sellType->id == 5)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('product.heavy_equip_sections')}}</label>
                            <div class="col-sm-10">
                                <select  required id="rent" name="section_id" class="form-control">
                                    @if(isset($product->section['id']))
                                        <option value="{{$product->section['id']}}" >{{$product->section['Title_'. App::getlocale()]}}</option>
                                    @endif
                                    @foreach($sections as $sec)
                                        @if(isset($product->section['id']))
                                            @if($sec->id != $product->section['id'])
                                                <option value="{{$sec['id']}}" >{{$sec['Title_'. App::getlocale()]}}</option>
                                            @endif
                                        @else
                                            <option value="{{$sec['id']}}" >{{$sec['Title_'. App::getlocale()]}}</option>

                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>

                    @endif
                    <input type="hidden" name="product_id" value="{{$id}}">
                    {{-- 1 for cars and heavy equipment --}}
                    <input type="hidden" name="category_id" value="{{$id}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.purpose_of_product')}}</label>
                        <div class="col-sm-10">
                            <select  required id="rent" name="rent" is="ms-dropdown">
                                @if($rent == 0 )
                                    <option value="0" >{{__('product.for_sell')}}</option>
                                    <option value="1" >{{__('product.for_rent')}}</option>
                                    <option value="2" >{{__('product.for_wanted')}}</option>
                                @elseif($rent == 1)
                                    <option value="1" >{{__('product.for_rent')}}</option>
                                    <option value="2" >{{__('product.for_wanted')}}</option>
                                    <option value="0" >{{__('product.for_sell')}}</option>
                                @else
                                    <option value="2" >{{__('product.for_wanted')}}</option>
                                    <option value="0" >{{__('product.for_sell')}}</option>
                                    <option value="1" >{{__('product.for_rent')}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.sell_type')}}</label>
                        <div class="col-sm-10">

                            <a class="col-sm-4"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  style="cursor:pointer;">
                                <img src="{{asset('assets/images/icons/blue/'.$product->SellType['image'])}}" alt="user-image" style="height: 100px;width:100px">
                                <span class="align-middle">
                                             {{$product->SellType['Title_'. App::getlocale()]}}
                                        </span>
                            </a>


                            <div class="dropdown-menu text-center" style="overflow-x:scroll;height: 500px;font-size:15px;width:300px">
                                @foreach($sellTypes as $city)
                                    <a class="link_dropdown" style="cursor:pointer;" href="{{route('change.sellType.product',['proId'=>$product->id,'sellTypeId'=>$city->id])}}">
                                        <img src="{{asset('assets/images/icons/blue/'.$city['image'])}}" alt="user-image" style="height: 75px;width:60%">
                                        <br>
                                        <span class="align-middle">
                                              {{$city['Title_'. App::getlocale()]}}
                                              </span>
                                    </a>
                                    <hr>
                                @endforeach

                            </div>


                            {{--
                                                        <select  required id="sell_type" name="sell_type" is="ms-dropdown">
                                                            @foreach($sellTypes as $sell_type)
                                                                @if($product->sellType->id == $sell_type->id)
                                                                    <option value="{{$sell_type->id}}" data-image="{{asset('assets/images/icons/blue/'.$sell_type->image)}}" selected  >{{$sell_type['Title_'.App::getlocale()]}}</option>
                                                                @else
                                                                    <option value="{{$sell_type->id}}" data-image="{{asset('assets/images/icons/blue/'.$sell_type->image)}}"  >{{$sell_type['Title_'.App::getlocale()]}}</option>

                                                                @endif

                                                            @endforeach
                                                        </select>
                            --}}
                        </div>
                    </div>
                    @if($type != 2)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('product.mark')}} </label>
                            <div class="col-sm-10">
                                <select  required id="makesId" name="makesId" is="ms-dropdown" onclick="myfun123()">
                                    @foreach($product->sellType->makes as $make)
                                        @if($make->id == $product->make_id)
                                            <option value="{{$make->id}}" data-image="{{asset('assets/images/makes/'.$product->make->image)}}" selected >{{$make['Title_'.App::getlocale()]}}</option>
                                        @else
                                            <option value="{{$make->id}}" data-image="{{asset('assets/images/makes/'.$make->image)}}" >{{$make['Title_'.App::getlocale()]}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.model')}}</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="model" value="{{$product->model}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> {{__('product.product_status')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status_id" name="status_id" required>
                                @foreach($statuses as $status)
                                    @if($status->id == $product->status_id)
                                        <option value="{{$status->id}}" selected>{{$status->Title_ar}}</option>
                                    @else
                                        <option value="{{$status->id}}">{{$status->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.year_of_made')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="year" name="year" required>
                                @for($i = date('Y')-50 ; $i <= date('Y'); $i++ )
                                    @if($i == $product->year)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    @if($product->sellType->id != 7 && $product->sellType->id != 6  && $product->category->id !=2 && $product->category->id !=4)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('product.gear_box')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="gearbox_id" name="gearbox_id" required>
                                    @foreach($gearboxes as $gearbox)
                                        @if($gearbox->id == $product->gearbox_id)
                                            <option value="{{$gearbox->id}}" selected>{{$gearbox->Title_ar}}</option>
                                        @else
                                            <option value="{{$gearbox->id}}">{{$gearbox->Title_ar}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($product->sellType->id != 6 &&  $product->category->id !=2)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('product.fuelType')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="fuel_type_id" name="fuel_type_id" required>
                                    @foreach($fuels as $fuel)
                                        @if($fuel->id == $product->fuel_type_id)
                                            <option value="{{$fuel->id}}" selected>{{$fuel->Title_ar}}</option>
                                        @else
                                            <option value="{{$fuel->id}}">{{$fuel->Title_ar}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($product->sellType->id != 6 &&  $product->category->id !=2 && $product->category->id !=4)
                        <div class="form-group row" id="distance">
                            @if($product->distance == null)
                                <label class="col-sm-2 col-form-label"> {{__('product.work_hours') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="work_hour" value="{{$product->work_hour}}">
                                </div>
                            @elseif($product->work_hour == null)
                                <label class="col-sm-2 col-form-label">{{__('product.distance')}}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="distance" value="{{$product->distance}}">
                                </div>
                            @endif
                        </div>
                    @endif
                    @if( $product->category->id !=2 )
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.color')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="color" id="example-text-input" name="color" value="{{$product->color}}" required>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.payment_method')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                @if($product->payment_method == 'cash')
                                    <option value="cash" selected>{{__('product.cash')}}</option>
                                    <option value="installment">{{__('product.installment')}}</option>
                                @elseif($product->payment_method == 'installment')
                                    <option value="installment" selected>{{__('product.installment')}}</option>
                                    <option value="cash">{{__('product.cash')}}</option>
                                @else
                                    <option value="cash">{{__('product.cash')}}</option>
                                    <option value="installment" selected>{{__('product.installment')}}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.country')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city_id" name="city_id" required>
                                <option>{{__('product.select_country')}}</option>
                                @foreach($cities as $city)
                                    @if($city->id == $product->city_id)
                                        <option value="{{$city->id}}" selected>{{$city->Title_ar}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{__('product.city')}}</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="district_id" name="district_id" required>
                                @foreach($product->city->districts as $district)
                                    @if($district->id == $product->district_id)
                                        <option value="{{$district->id}}" selected>{{$district->Title_ar}}</option>
                                    @else
                                        <option value="{{$district->id}}">{{$district->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if($type == 2)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('product.country_creation')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="country" value="{{$product->country}}" required>

                            </div>
                        </div>
                    @endif
                    @if( $product->category->id !=2 && $product->category->id !=4)
                        <div class="form-group row">
                            <label class="control-label col-sm-2">{{__('product.advantages')}}</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control select2-multiple" multiple="multiple" name="advandage_id[]" multiple data-placeholder="اختر الإضافات">
                                    <?php $adv = explode('|', $product->advandage_id) ;?>
                                    @foreach($advandages as $advandage)
                                        @if(in_array($advandage->id ,$adv))
                                            <option value="{{$advandage->id}}" selected>{{$advandage['Title_'. App::getlocale()]}}</option>
                                        @else
                                            <option value="{{$advandage->id}}" >{{$advandage['Title_'. App::getlocale()]}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($product->sellType->id != 7 && $product->sellType->id != 6 &&  $product->category->id !=2 && $product->category->id !=4)

                        <div class="form-group row">
                            <label class="control-label col-sm-2">{{__('product.interior_brush')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="interior_brush" name="interior_brush" required>
                                    @if($product->interior_brush == 'leather')
                                        <option value="leather" selected>{{__('product.leather')}}</option>
                                        <option value="cloth">{{__('product.cloth')}}</option>
                                        <option value="bothOfThem">{{__('product.bothOfThem')}}</option>
                                    @elseif($product->interior_brush == 'cloth')
                                        <option value="leather">{{__('product.leather')}}</option>
                                        <option value="cloth" selected>{{__('product.cloth')}}</option>
                                        <option value="bothOfThem">{{__('product.bothOfThem')}}</option>
                                    @elseif($product->interior_brush == 'bothOfThem')
                                        <option value="leather">{{__('product.leather')}}</option>
                                        <option value="cloth">{{__('product.cloth')}}</option>
                                        <option value="bothOfThem" selected>{{__('product.bothOfThem')}}</option>
                                    @else
                                        <option value="leather">{{__('product.leather')}}</option>
                                        <option value="cloth">{{__('product.cloth')}}</option>
                                        <option value="bothOfThem" selected>{{__('product.bothOfThem')}}</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.interior_color')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="color" id="example-text-input" name="interior_color" value="{{$product->interior_color}}" required>
                            </div>
                        </div>
                    @endif

                    @if($type != 2 && $product->sellType->id != 6)
                        <div  id="notformqtwra" style="display:block">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.engine_capacity')}}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="example-text-input"  name="engine_capacity" value="{{$product->engine_capacity}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">{{__('product.slinder_number')}}</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="user_id" name="slinder_number" required>
                                        <option value="{{$product->slinder_number}}" selected>{{$product->slinder_number}}</option>
                                        @if($product->slinder_number != '1 سلندر')
                                            <option value="1 سلندر">1 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '2 سلندر')
                                            <option value="2 سلندر">2 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '4 سلندر')
                                            <option value="4 سلندر">4 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '6 سلندر')
                                            <option value="6 سلندر">6 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '8 سلندر')
                                            <option value="8 سلندر">8 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '10 سلندر')
                                            <option value="10 سلندر">10 {{__('product.slinder')}}</option>
                                        @endif
                                        @if($product->slinder_number != '12 سلندر')
                                            <option value="12 سلندر">12 {{__('product.slinder')}}</option>
                                        @endif

                                    </select>
                                </div>
                            </div>

                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.price')}}</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" value="{{$product->price}}" id="example-text-input" name="price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.title')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="example-text-input" name="title">{{$product->title}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.description')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="example-text-input" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>
                    @if($type == 4)
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.ability')}} KVA</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="ability" required value="{{$product->ability}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.capacity')}} KW</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="capacity" required value="{{$product->capacity}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.fuel_tank_size')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="fuel_tank_size" required value="{{$product->fuel_tank_size}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.engine_type')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="engine_type" required value="{{$product->engine_type}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.number_of_phase')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="number_of_phase" required value="{{$product->number_of_phase}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.frequency_rate')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="frequency_rate" required value="{{$product->frequency_rate}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.muffler_box')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="muffler_box" name="muffler_box" required>
                                    @if($product->muffler_box == 1)
                                        <option value="1">{{__('product.exist')}}</option>
                                        <option value="0">{{__('product.not_exist')}}</option>
                                    @else
                                        <option value="0">{{__('product.not_exist')}}</option>
                                        <option value="1">{{__('product.exist')}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">{{__('product.add_new_image')}} </label>
                        <div class="col-sm-10">
                            <input type="file" class="filestyle" accept="image/*" multiple data-buttonname="btn-secondary" name="images[]">

                        </div>
                        <alert class="col-sm-12 btn btn-danger h6">{{__('product.you_have_to_select_all_images')}}</alert>

                    </div>
                    <div class="row">

                        @foreach($images as $img)
                            <div class="col-sm-4 text-center">

                                <img src="{{asset('assets/images/products/'.$img)}}" style="height: 300px;width: 100%">
                                {{-- <a href=""  style="text-decoration: none" class="btn btn-danger mt-1">
                                     Delete Image
                                 </a>--}}
                            </div>

                        @endforeach
                    </div>
                    <hr>
                    <br>

                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark w-25">{{__('product.edit_product_details')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    @endif
    <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets\dropdown1\ms-Dropdown-master\ms-Dropdown-master\dist\js\dd.min.js')}}"></script>



    <script>
        $('#sellTypeId').on('change', function () {
            var SellType = $(this).val();
            var sellTypeIdHeavey = document.getElementById('sellTypeIdHeavey').value;
            //alert(sellTypeIdHeavey);
            if({{$category}} == 1) {
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
            var name = 'Title_'+locale;
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
                    if(data['sections'].length != 0) {
                        data['sections'].forEach(sections => sectionId.innerHTML += "<option value=" + sections.id + ">" + sections[name] + "</option>");
                    }else{
                        sectionId.innerHTML += "<option value='sad'>There is no sections yet!</option>";
                    }

                    var typeCategoriesId = document.getElementById('typeCategoriesId');
                    typeCategoriesId.innerHTML = "";
                    if(data['typeCategories'].length != 0) {
                        data['typeCategories'].forEach(typeCategories => typeCategoriesId.innerHTML += "<option value=" + typeCategories.id + ">" + typeCategories[name] + "</option>");
                    }else{
                        typeCategoriesId.innerHTML += "<option value='sad'>There is no Types  yet!</option>";
                    }

                    var makesId = document.getElementById('makesId');
                    makesId.innerHTML = "";
                    if(data['makes'].length != 0) {
                        data['makes'].forEach(makes => makesId.innerHTML += "<option   value=" + makes.id + "  data-image=" + "http://127.0.0.1:8000/assets/images/makes/" +  makes.image + " >" + makes[name] + "</option>");
                    }else{
                        makesId.innerHTML += "<option value='sad'>There is no Types  yet!</option>";
                    }


                }
            });



        });

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
    <script src="{{asset('assets\dropdown1\ms-Dropdown-master\ms-Dropdown-master\dist\js\dd.min.js')}}"></script>

@endsection
