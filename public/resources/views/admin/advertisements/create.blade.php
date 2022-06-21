@extends("layouts.admin")

@section("pageTitle", "Instructors")
@section("content")
    <link rel="stylesheet" type="text/css" href="{{asset('assets\dropdown1\ms-Dropdown-master\ms-Dropdown-master\dist\css\dd.css')}}" />

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
                    <h5 class="mb-5 mt-3">اضافة اعلان جديد</h5>

                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">اختر النموذج</label>
                            <div class="col-sm-10">
                                <select class="form-control" type="text" id="selectModel" name="model" onchange="SelectModel()">
                                    <option value="1" selected>النموذج الاول</option>
                                    <option value="2">النموذج الثاني</option>
                                    <option value="3">النموذج الثالث</option>
                                </select>
                            </div>
                        </div>



                        <form id="Model1Adv" method="post" action="{{route('admin.advertisements.store')}}" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="version" value="1">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">اختر الفئة</label>
                                <div class="col-sm-10">
                                    <select class="form-control" type="text" id="selectModel" name="advCat" >
                                        @foreach($categories as  $cat)
                                            @if($cat->id != 3 )
                                                <option value="{{$cat->id}}" selected>{{ 'اعلان  ' . ' '.$cat['Title_ar']}}</option>
                                            @endif
                                        @endforeach
                                            <option value="{{'home'}}" selected>{{ 'الصفحة الرئيسية'}}</option>
                                            <option value="{{'all'}}" selected>{{ 'الكل'}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">اسم الاعلان</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advName" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">رابط الاعلان</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advLink" required>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">نوع الوقود</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advFullType" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">سنه الصنع</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advYear" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">ناقل الحركه</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advGear" required>
                                </div>
                            </div>
{{--
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">نوع الماركه</label>
                                <div class="col-sm-10">
                                    <select class="form-control" type="text" id="example-text-input" name="adv_name" is="ms-dropdown">
                                        <option >أختر نوع الماركه</option>
                                    @foreach($makes as $make)
                                            <option  data-image="{{asset('assets/images/makes')}}/{{$make->image}}" >{{$make['Title_'. App::getlocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
--}}
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">نوع الماركه</label>
                                <div class="col-sm-10">
                                    <select class="form-control" type="text" id="selectModel" required name="advMark">
                                        <option >أختر نوع الماركه</option>
                                    @foreach($makes as $make)
                                            <option  value="{{$make->id}}">{{$make['Title_'. App::getlocale()]}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">حالة المنتج</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advCondition" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">عدد السلندر</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advSlinder" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">قدرة المحرك </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advEngineCapacity" required>
                                </div>
                            </div>
                            <hr>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                                <div class="custom-file col-sm-10">
                                    <input name="image" type="file" class="custom-file-input" id="customFileLangHTML" required>
                                    <label class="custom-file-label" for="customFileLangHTML" data-browse="رفع صورة"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-dark w-25">اضافة</button>
                                </div>
                            </div>

                        </form>
                        <form id="Model2Adv" method="post" action="{{route('admin.advertisements.store')}}" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="version" value="2">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">اختر الفئة</label>
                                <div class="col-sm-10">
                                    <select class="form-control" type="text" id="selectModel" name="advCat" >
                                        @foreach($categories as  $cat)
                                            @if($cat->id != 3 )
                                                <option value="{{$cat->id}}" selected>{{ 'اعلان  ' . ' '.$cat['Title_ar']}}</option>
                                            @endif
                                        @endforeach
                                        <option value="{{'home'}}" selected>{{ 'الصفحة الرئيسية'}}</option>
                                        <option value="{{'all'}}" selected>{{ 'الكل'}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">رابط الاعلان </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advLink">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                                <div class="custom-file col-sm-10">
                                    <input name="image" type="file" class="custom-file-input" id="customFileLangHTML" required>
                                    <label class="custom-file-label" for="customFileLangHTML" data-browse="رفع صورة"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-dark w-25">اضافة</button>
                                </div>
                            </div>
                        </form>
                        <form id="Model3Adv" method="post" action="{{route('admin.advertisements.store')}}" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="version" value="3">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">اختر الفئة</label>
                                <div class="col-sm-10">
                                    <select class="form-control" type="text" id="selectModel" name="advCat" >
                                        @foreach($categories as  $cat)
                                            @if($cat->id != 3 )
                                                <option value="{{$cat->id}}" selected>{{ 'اعلان  ' . ' '.$cat['Title_ar']}}</option>
                                            @endif
                                        @endforeach
                                        <option value="{{'home'}}" selected>{{ 'الصفحة الرئيسية'}}</option>
                                        <option value="{{'all'}}" selected>{{ 'الكل'}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">اسم الاعلان الاعلان </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل الاعلان </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advDetails">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">رابط الاعلان </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-text-input" name="advLink">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                                <div class="custom-file col-sm-10">
                                    <input name="image" type="file" class="custom-file-input" id="customFileLangHTML" required>
                                    <label class="custom-file-label" for="customFileLangHTML" data-browse="رفع صورة"></label>
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
    <script>
        function SelectModel() {
            var moka = document.getElementById('selectModel').value;
            switch(moka){
                case '1':
                    document.getElementById('Model1Adv').style.display = 'block';
                    document.getElementById('Model2Adv').style.display = 'none';
                    document.getElementById('Model3Adv').style.display = 'none';
                    break;
                case '2':
                    document.getElementById('Model1Adv').style.display = 'none';
                    document.getElementById('Model2Adv').style.display = 'block';
                    document.getElementById('Model3Adv').style.display = 'none';
                    break;
                case '3':
                    document.getElementById('Model1Adv').style.display = 'none';
                    document.getElementById('Model2Adv').style.display = 'none';
                    document.getElementById('Model3Adv').style.display = 'block';
                    break;
            }
        }
        SelectModel();
    </script>

    <script src="{{asset('assets\dropdown1\ms-Dropdown-master\ms-Dropdown-master\dist\js\dd.min.js')}}"></script>


@endsection
