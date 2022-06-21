@extends("layouts.admin")
@section("pageTitle", "Instructors")
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
                    <h5 class="mb-5 mt-3">اضافة مركز صيانة جديد</h5>

                    <form method="post" action="{{route('admin.profileMaintenance.store')}}" enctype="multipart/form-data" style="padding:10px">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاسم </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="example-text-input" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">كلمة المرور</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> البلد</label>
                            <div class="col-sm-10">
                                <select class="form-control"  name="city_id" required id="city_id">
                                    <option>اختر بلد</option>
                                    @foreach($allCities as $oneCity)
                                        <option value="{{$oneCity->id}}">{{$oneCity->Title_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> المدينة</label>
                            <div class="col-sm-10">
                                <select class="form-control"  name="district_id" required id="district_id">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف 1</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="phone1" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف 2</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="phone2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">حساب فيسبوك</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="facebook" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">حساب تويتر </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="twitter" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">حساب انستغرام </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input1" name="instgram" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">صوره المتجر</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="example-text-input1" name="photo" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">غلاف المتجر</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="example-text-input1" name="cover" required>
                            </div>
                        </div>
                        <br>
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
                        <div class="form-group">
                            <label for="input31">Shop Category  </label>
                            <select type="file" class="form-control inputform" id="typeCategoriesId" aria-describedby="emailHelp" name="type_category_id">
                            </select>
                        </div>
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
