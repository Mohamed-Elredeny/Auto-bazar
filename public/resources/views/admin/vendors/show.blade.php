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
                    <h5 class="mb-5 mt-3">تفاصيل التاجر</h5>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">اسم التاجر</label>
                        <div class="col-sm-10">
                            {{$product->name}}
                        </div>
                    </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">البلد </label>
                            <div class="col-sm-10">
                                {{$product->city->Title_ar}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">المدينة</label>
                            <div class="col-sm-10">
                                {{$product->district->Title_ar}}
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">رقم الهاتف الاول</label>
                            <div class="col-sm-10">
                                {{$product->phone1}}
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">رقم الهاتف الثاني</label>
                            <div class="col-sm-10">
                                {{$product->phone2}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-10">
                                {{$product->email}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> رابط وتساب</label>
                            <div class="col-sm-10">
                                <a href="{{$product->email}}">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> حساب فيسبوك </label>
                            <div class="col-sm-10">
                                <a href="{{$product->facebook}}">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> حساب انستغرام</label>
                            <div class="col-sm-10">
                                <a href="{{$product->instgram}}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> حساب تويتر</label>
                            <div class="col-sm-10">
                                <a href="{{$product->twitter}}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>






                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

