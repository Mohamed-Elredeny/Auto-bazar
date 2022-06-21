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
                <h5 class="mb-5 mt-3">تعديل القسم الفرعي {{$subcategory->Title_ar}}</h5>

                <form method="post" action="{{route('subcategories.update',['subcategory'=>$subcategory->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">القسم الفرعي باللغة العربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$subcategory->Title_ar}}" name="Title_ar" type="text" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">القسم الفرعي باللغة الانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$subcategory->Title_en}}" name="Title_en" type="text" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">القسم الفرعي باللغة الكردية</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{$subcategory->Title_ku}}" name="Title_ku" type="text" id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">القسم الرئيسي</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    @if($category->id == $subcategory->category->id)
                                        <option value="{{$category->id}}" selected>{{$category->Title_ar}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->Title_ar}}</option>
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