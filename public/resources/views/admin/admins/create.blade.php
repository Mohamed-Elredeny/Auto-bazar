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
                <h5 class="mb-5 mt-3">اضافة مسئول جديد</h5>

                <form method="post" action="{{route('admin.admins.store')}}" enctype="multipart/form-data">
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
                            <select class="form-control"  name="city_id" required>
                                @foreach($allCities as $oneCity)
                                    <option value="{{$oneCity->id}}">{{$oneCity->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="phone" required>
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
                            <input class="form-control" type="text" id="example-text-input" name="instgram" required>
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
