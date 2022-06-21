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
                <h5 class="mb-5 mt-3">تعديل المدينة </h5>

                <form method="post" action="{{route('admin.districts.update',['district'=>$district->id])}}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">المدينة باللغة العربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$district->Title_ar}}" name="Title_ar" type="text" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">المدينة باللغة الانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$district->Title_en}}" name="Title_en" type="text" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">المدينة باللغة الكردية</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$district->Title_ku}}" name="Title_ku" type="text" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">البلد</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="city_id">
                                @foreach($cities as $city)
                                    @if($city->id == $district->city->id)
                                        <option value="{{$city->id}}" selected>{{$city->Title_ar}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark w-25">تعديل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
