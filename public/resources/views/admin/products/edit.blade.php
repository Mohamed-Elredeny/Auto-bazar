@extends("layouts.admin")
@section("pageTitle", "Instructors")
@section('styleChart')
<link href="{{asset("assets/admin/libs/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <h5 class="mb-5 mt-3">اضافة منتج جديد</h5>

                <form method="post" action="{{route('admin.products.update',['product'=>$product->id])}}" enctype="multipart/form-data"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- 1 for cars and heavy equipment --}}
                    <input type="hidden" name="category_id" value="{{$id}}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الاعلان</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sellType" name="sell_type_id" required>
                                <option>اختر نوع الاعلان</option>
                                @foreach($sellTypes as $sellType)
                                    @if($sellType->id == $product->sell_type_id)
                                        <option value="{{$sellType->id}}" selected>{{$sellType->Title_ar}}</option>
                                    @else
                                        <option value="{{$sellType->id}}">{{$sellType->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
{{--
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">القسم</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="section_id" name="section_id" required>
                                @foreach($product->sellType->sections as $section)
                                    @if($section->id == $product->section_id)
                                        <option value="{{$section->id}}" selected>{{$section->Title_ar}}</option>
                                    @else
                                        <option value="{{$section->id}}">{{$section->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
--}}

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">التصنيف</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="type_category_id" name="type_category_id" required>
                                @foreach($product->sellType->typeCategories as $typeCategory)
                                    @if($typeCategory->id == $product->type_category_id)
                                        <option value="{{$typeCategory->id}}" selected>{{$typeCategory->Title_ar}}</option>
                                    @else
                                        <option value="{{$typeCategory->id}}">{{$typeCategory->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">النوع</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="make_id" name="make_id" required>
                                @foreach($product->sellType->makes as $make)
                                    @if($make->id == $product->make_id)
                                        <option value="{{$make->id}}" selected>{{$make->Title_ar}}</option>
                                    @else
                                        <option value="{{$make->id}}">{{$make->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الفئة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="model" value="{{$product->model}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الحالة</label>
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
                        <label class="col-sm-2 col-form-label">سنة الصنع</label>
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

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ناقل الحركة</label>
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

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الوقود</label>
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

                    <div class="form-group row" id="distance">
                        @if($product->distance == null)
                            <label class="col-sm-2 col-form-label">ساعات العمل</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="work_hour" value="{{$product->work_hour}}">
                            </div>
                        @elseif($product->work_hour == null)
                            <label class="col-sm-2 col-form-label">المسافة المقطوعة</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="distance" value="{{$product->distance}}">
                            </div>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">اللون</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="color" id="example-text-input" name="color" value="{{$product->color}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">طرق الدفع</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                @if($product->payment_method == 'cash')
                                    <option value="cash" selected>كاش</option>
                                    <option value="installment">اقساط</option>
                                @elseif($product->payment_method == 'installment')
                                    <option value="cash">كاش</option>
                                    <option value="installment" selected>اقساط</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">البلد</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city_id" name="city_id" required>
                                <option>اختر المدينة</option>
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
                        <label class="col-sm-2 col-form-label">المدينة</label>
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

                    <div class="form-group row">
                        <label class="control-label col-sm-2">الإضافات</label>
                        <div class="col-sm-10">
                        <select class="select2 form-control select2-multiple" multiple="multiple" name="advandage_id[]" multiple data-placeholder="اختر الإضافات">
                            <?php $adv = explode('|', $product->advandage_id) ;?>

                            @foreach($advandages as $advandage)
                                @if(in_array($advandage->id ,$adv))
                                    <option value="{{$advandage->id}}" selected>{{$advandage->Title_ar}}</option>
                                @else
                                    <option value="{{$advandage->id}}">{{$advandage->Title_ar}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2">الفرش الداخلي</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="interior_brush" name="interior_brush" required>
                                @if($product->interior_brush == 'leather')
                                    <option value="leather" selected>جلد</option>
                                    <option value="cloth">قماش</option>
                                    <option value="bothOfThem">كلايهما</option>
                                @elseif($product->interior_brush == 'cloth')
                                    <option value="leather">جلد</option>
                                    <option value="cloth" selected>قماش</option>
                                    <option value="bothOfThem">كلايهما</option>
                                @elseif($product->interior_brush == 'bothOfThem')
                                    <option value="leather">جلد</option>
                                    <option value="cloth">قماش</option>
                                    <option value="bothOfThem" selected>كلايهما</option>
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">اللون الداخلي</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="color" id="example-text-input" name="interior_color" value="{{$product->interior_color}}" required>
                        </div>
                    </div>
                    <div  id="notformqtwra" style="display:block">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">قدرة المحرك</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input"  name="engine_capacity" value="{{$product->engine_capacity}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2">عدد السلندر</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="user_id" name="slinder_number" required>
                                    <option value="{{$product->slinder_number}}" selected>{{$product->slinder_number}}</option>
                                    @if($product->slinder_number != '1 سلندر')
                                    <option value="1 سلندر">1 سلندر</option>
                                    @endif
                                    @if($product->slinder_number != '2 سلندر')
                                    <option value="2 سلندر">2 سلندر</option>
                                    @endif
                                    @if($product->slinder_number != '4 سلندر')
                                    <option value=" سلندر">4 سلندر</option>
                                    @endif
                                    @if($product->slinder_number != '6 سلندر')
                                    <option value="6 سلندر">6 سلندر</option>
                                    @endif
                                    @if($product->slinder_number != '8 سلندر')
                                    <option value="8 سلندر">8 سلندر</option>
                                    @endif
                                    @if($product->slinder_number != '10 سلندر')
                                    <option value="10 سلندر">10 سلندر</option>
                                    @endif
                                    @if($product->slinder_number != '12 سلندر')
                                    <option value="12 سلندر">12 سلندر</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" value="{{$product->price}}" id="example-text-input" name="price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل المنتج</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="example-text-input" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2">التاجر</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach($users as $user)
                                    @if($user->id == $product->user_id)
                                        <option value="{{$user->id}}" selected>{{$user->fname}}</option>
                                    @else
                                        <option value="{{$user->id}}">{{$user->fname}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">صور المنتج</label>
                        <div class="col-sm-10">
                            <input type="file" class="filestyle" accept="image/*" multiple data-buttonname="btn-secondary" name="images[]">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark w-25">اضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

    <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#sellType').on('change', function() {
               var id = $(this).val();
               var text = $( "#sellType option:selected" ).text();
                if (text === "مقطورات") {
                    document.getElementById('notformqtwra').style.display = 'none';
                }else{
                    document.getElementById('notformqtwra').style.display = 'block';
                }
               if(text == "آليات ثقيلة")
               {
                   alert(1);
                    $("#distance").html(`<label class="col-sm-2 col-form-label">ساعات العمل</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="work_hour">
                        </div>`);
               }
               else
               {
                   alert(2);
                    $("#distance").html(`<label class="col-sm-2 col-form-label">المسافة المقطوعة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="distance">
                        </div>`);
               }

               //console.log(text);
               $.ajax({
                   url:'{{Session::get('host')}}/getSections',
                   method:"get",
                   data:{sellTypeId:id},
                   dataType:"json",
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success:function(data){

                    var sections = document.getElementById('section_id');
                    var typeCategories = document.getElementById('type_category_id');
                    var makes = document.getElementById('make_id');

                    sections.innerHTML = "";
                    typeCategories.innerHTML = "";
                    makes.innerHTML = "";

                    data['sections'].forEach(section => sections.innerHTML += "<option value="+section.id+">"+section.Title_ar+"</option>");
                    data['typeCategories'].forEach(typeCategory => typeCategories.innerHTML += "<option value="+typeCategory.id+">"+typeCategory.Title_ar+"</option>");
                    data['makes'].forEach(make => makes.innerHTML += "<option value="+make.id+">"+make.Title_ar+"</option>");

                    //console.log(typeof data);

                    console.log(data);
                   }
               });

           });

           $('#city_id').on('change', function() {
               var id = $(this).val();
               console.log(id);
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

                    data.forEach(district => districts.innerHTML += "<option value="+district.id+">"+district.Title_ar+"</option>");

                    //console.log(typeof data);

                   // console.log(data);
                   }
               });

           });
       });
   </script>

   @section('script')
   <script src="{{asset("assets/admin/libs/select2/js/select2.min.js")}}"></script>
   <script src="{{asset("assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js")}}"></script>
   @endsection
