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

                <form method="post" action="{{route('admin.generators.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="rent" value="0">
                    <input type="hidden" name="category_id" value="4">
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

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">النوع</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="make_id" name="make_id" required>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الفئة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="model" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الحالة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status_id" name="status_id" required>
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الوقود</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="fuel_type_id" name="fuel_type_id" required>
                                @foreach($fuels as $fuel)
                                    <option value="{{$fuel->id}}">{{$fuel->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">البلد</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city_id" name="city_id" required>
                                <option>اختر البلد</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">المدينة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="district_id" name="district_id" required>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">القدرة KVA</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="ability" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاستطاعة KW</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="capacity" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">حجم تانك الوقود</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="fuel_tank_size" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"> نوع المحرك</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="engine_type" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">عدد الفاز</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="number_of_phase" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">معدل التردد</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="frequency_rate" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">صندول الكاتم</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="muffler_box" name="muffler_box" required>
                                <option value="1">موجود</option>
                                <option value="0">غير موجود</option>
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
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">قدرة المحرك</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="engine_capacity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2">عدد السلندر</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="user_id" name="slinder_number" required>
                                <option value="">عدد سلندر</option>
                                <option value="">1 سلندر</option>
                                <option value="">2 سلندر</option>
                                <option value="">4 سلندر</option>
                                <option value="">6 سلندر</option>
                                <option value="">8 سلندر</option>
                                <option value="">10 سلندر</option>
                                <option value="">12 سلندر</option>


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">اسم المنتج</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل المنتج</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="example-text-input" name="description"></textarea>
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
            //alert(id);
               $.ajax({
               url:'https://autobazar.souqeljuma.com/generators/getSections',
                   method:"get",
                   data:{sellTypeId:id},
                   dataType:"json",
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success:function(data){

                    var makes = document.getElementById('make_id');

                    makes.innerHTML = "";

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
