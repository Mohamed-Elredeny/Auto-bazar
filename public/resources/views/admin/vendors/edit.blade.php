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
                <h5 class="mb-5 mt-3">تعديل بيانات التاجر </h5>

                    <form method="post" action="{{route('admin.vendors.update',['vendor'=>$city->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاسم </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="name" required value="{{$city->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="example-text-input" name="email" required value="{{$city->email}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> رقم الهاتف 1</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="phone1" required value="{{$city->phone1}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف 2</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="phone2"  value="{{$city->phone2}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> البلد</label>
                            <div class="col-sm-10">
                                <select class="form-control"  name="city_id" required id="city_id">
                                    <option value="{{$city->city->id}}">{{$city->city->Title_ar}}</option>
                                    @foreach($allCities as $oneCity)
                                        @if($oneCity->id != $city->id)
                                        <option value="{{$oneCity->id}}">{{$oneCity->Title_ar}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> المدينة</label>
                            <div class="col-sm-10">
                                <select class="form-control"  name="district_id" required id="district_id">
                                    <option value="{{$city->district->id}}">{{$city->district->Title_ar}}</option>

                                </select>
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">حساب فيسبوك</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="facebook" required value="{{$city->facebook}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">حساب تويتر </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="twitter" required value="{{$city->twitter}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">حساب انستغرام </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="instgram" required value="{{$city->instgram}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-dark w-25">تعديل</button>
                            </div>
                        </div>
                    </form>

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
                url:'http://127.0.0.1:8000/getDistricts',
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
