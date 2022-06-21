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
                <h5 class="mb-5 mt-3">اضافة نوع اعلان جديد</h5>

                <form method="post" action="{{route('admin.sellTypes.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نوع الاعلان باللغة العربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="Title_ar">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نوع الاعلان باللغة الانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="Title_en">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نوع الاعلان باللغة الكردية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="Title_ku">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">القسم الرئيسي</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="image">
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
