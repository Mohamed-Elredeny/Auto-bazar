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
                <h5 class="mb-5 mt-3">تعديل تفاصيل المسئول </h5>

                    <form method="post" action="{{route('admin.admins.update',['admin'=>$city->id])}}" enctype="multipart/form-data">
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
                            <label for="example-text-input" class="col-sm-2 col-form-label"> البلد</label>
                            <div class="col-sm-10">
                                <select class="form-control"  name="city_id" required >
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
                            <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="phone" required value="{{$city->phone}}">
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
                                <input class="form-control" type="text" id="example-text-input" name="instgram" required value="{{$city->instgram}}">
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
