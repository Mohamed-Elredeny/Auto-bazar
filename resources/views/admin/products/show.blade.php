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
                <h5 class="mb-5 mt-3">تفاصيل المنتج</h5>

                    {{-- 1 for cars and heavy equipment --}}
                    <?php $images = explode('|', $product->images) ;?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">صور المنتج</label>
                        <div class="col-sm-10" >
                            @foreach($images as $image)
                                <img class="col-sm-4" height="300" src="{{asset('assets/images/products')}}/{{$image}}">
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">القسم الرئيسي</label>
                        <div class="col-sm-10">
                            {{$product->category->Title_ar}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الاعلان</label>
                        <div class="col-sm-10">
                            {{$product->sellType->Title_ar}}
                        </div>
                    </div>
                    @if($product->section)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">القسم</label>
                        <div class="col-sm-10">
                            {{$product->section->Title_ar}}
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">التصنيف</label>
                        <div class="col-sm-10">
                            {{$product->typeCategory->Title_ar}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">النوع</label>
                        <div class="col-sm-10">
                            {{$product->make->Title_ar}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الفئة</label>
                        <div class="col-sm-10">
                            {{$product->model}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الحالة</label>
                        <div class="col-sm-10">
                            {{$product->status->Title_ar}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">سنة الصنع</label>
                        <div class="col-sm-10">
                            {{$product->year}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ناقل الحركة</label>
                        <div class="col-sm-10">
                            {{$product->gearbox->Title_ar}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الوقود</label>
                        <div class="col-sm-10">
                            {{$product->fuelType->Title_ar}}
                        </div>
                    </div>

                    @if($product->distance != null)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ساعات العمل</label>
                            <div class="col-sm-10">
                                {{$product->distance}}
                            </div>
                        </div>
                    @elseif($product->work_hour != null)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">المسافة المقطوعة</label>
                            <div class="col-sm-10">
                                {{$product->work_hour}}
                            </div>
                        </div>
                    @endif


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">اللون</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="color" id="example-text-input" name="color" value="{{$product->color}}" disabled>
                        </div>
                    </div>

                    @if($product->payment_method == 'cash')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">طرق الدفع</label>
                            <div class="col-sm-10">
                                كاش
                            </div>
                        </div>
                    @elseif($product->payment_method == 'installment')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">طرق الدفع</label>
                            <div class="col-sm-10">
                                اقساط
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">المدينة</label>
                        <div class="col-sm-10">
                            {{$product->city->Title_ar}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الحي</label>
                        <div class="col-sm-10">
                            {{$product->district->Title_ar}}
                        </div>
                    </div>

                    <?php $adv = explode('|', $product->advandage_id) ;?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الاضافات</label>
                        <div class="col-sm-10" >
                        @foreach($advandages as $advandage)
                            @if(in_array($advandage->id ,$adv))
                                    {{$advandage->Title_ar}}
                            <br>
                            @endif
                        @endforeach
                    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الفرش الداخلي</label>
                        <div class="col-sm-10">
                            @if($product->interior_brush == 'leather')
                            جلد
                            @elseif($product->interior_brush == 'cloth')
                            قماش
                            @elseif($product->interior_brush == 'bothOfThem')
                            جلد و قماش كلايهما
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">اللون الداخلي</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="color" id="example-text-input" name="interior_color" value="{{$product->interior_color}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            {{$product->price}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل المنتج</label>
                        <div class="col-sm-10">
                            {{$product->description}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">التاجر</label>
                        <div class="col-sm-10">
                            {{$product->user->fname}} {{$product->user->lname}}
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

