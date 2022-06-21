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

                <form method="post" action="{{route('carsRentals.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الاعلان</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sellType" name="sell_type_id" required>
                                <option>اختر نوع الاعلان</option>
                                @foreach($sellTypes as $sellType)
                                    <option value="{{$sellType->id}}">{{$sellType->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="sections">

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">التصنيف</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="type_category_id" name="type_category_id" required>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">النوع</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="make_id" name="make_id" required>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">سنة الصنع</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="year" name="year" required>
                                @for($i = date('Y')-50 ; $i <= date('Y'); $i++ )
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="distance">
                        <label class="col-sm-2 col-form-label">مدة التأجير</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="rent_period" name="rent_period" required>
                                <option value="hour">ساعي</option>
                                <option value="daily">يومي</option>
                                <option value="weekly">اسبوعي</option>
                                <option value="yearly">سنوي</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">المدينة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city_id" name="city_id" required>
                                <option>اختر المدينة</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الحي</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="district_id" name="district_id" required>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2">التاجر</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->fname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">صور المنتج</label>
                        <div class="col-sm-10">
                            <input type="file" class="filestyle" accept="image/*" multiple data-buttonname="btn-secondary" name="images[]" required>
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

               console.log(text);
               $.ajax({
               url:'https://autobazar.souqeljuma.com/getSections',
                   method:"get",
                   data:{sellTypeId:id},
                   dataType:"json",
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success:function(data){
                    var sectionss = document.getElementById('sections');

                    if(text == "آليات ثقيلة للايجار")
                    {
                        sectionss.innerHTML = " <label class='col-sm-2 col-form-label'>القسم</label><div class='col-sm-10'><select class='form-control' id='section_id' name='section_id'></select></div>";
                        var sections = document.getElementById('section_id');

                        data['sections'].forEach(section => sections.innerHTML += "<option value="+section.id+">"+section.Title_ar+"</option>");

                    }
                    else
                    {
                        sectionss.innerHTML = "";
                    }

                    var typeCategories = document.getElementById('type_category_id');
                    var makes = document.getElementById('make_id');

                    typeCategories.innerHTML = "";
                    makes.innerHTML = "";

                    data['typeCategories'].forEach(typeCategory => typeCategories.innerHTML += "<option value="+typeCategory.id+">"+typeCategory.Title_ar+"</option>");
                    data['makes'].forEach(make => makes.innerHTML += "<option value="+make.id+">"+make.Title_ar+"</option>");

                    //console.log(typeof data);

                   // console.log(data);
                   }
               });

           });

           $('#city_id').on('change', function() {
               var id = $(this).val();
               console.log(id);
               $.ajax({
               url:'https://autobazar.souqeljuma.com/getDistricts',
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
