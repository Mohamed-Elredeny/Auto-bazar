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
                        <label class="col-sm-2 col-form-label">نوع الوقود</label>
                        <div class="col-sm-10">
                            {{$product->fuelType->Title_ar}}
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">بلد الصنع</label>
                        <div class="col-sm-10">
                            {{$product->country}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">القدرة KVA</label>
                        <div class="col-sm-10">
                            {{$product->ability}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الاستطاعة KW</label>
                        <div class="col-sm-10">
                            {{$product->capacity}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">حجم تانك الوقود</label>
                        <div class="col-sm-10">
                            {{$product->fuel_tank_size}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع المحرك</label>
                        <div class="col-sm-10">
                            {{$product->engine_type}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عدد الفاز</label>
                        <div class="col-sm-10">
                            {{$product->number_of_phase}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">معدل التردد</label>
                        <div class="col-sm-10">
                            {{$product->frequency_rate}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">صندول الكاتم</label>
                        <div class="col-sm-10">
                            @if($product->muffler_box == '1')
                            موجود
                            @elseif($product->muffler_box == '0')
                            غير موجود
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">التاجر</label>
                        <div class="col-sm-10">
                            {{$product->user->fname}} {{$product->user->lname}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            {{$product->price}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تفاصيل المنتج</label>
                        <div class="col-sm-10">
                            {{$product->description}}
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

