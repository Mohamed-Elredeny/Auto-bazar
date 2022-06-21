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
                        <label class="col-sm-2 col-form-label">نوع الاعلان</label>
                        <div class="col-sm-10">
                            {{$product->sellType->Title_ar}}
                        </div>
                    </div>

                    @if($product->sellType->Title_ar == "آليات ثقيلة للايجار")
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
                        <label class="col-sm-2 col-form-label">سنة الصنع</label>
                        <div class="col-sm-10">
                            {{$product->year}}
                        </div>
                    </div>

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

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الفرش الداخلي</label>
                        <div class="col-sm-10">
                            @if($product->rent_period == 'hour')
                            ساعي
                            @elseif($product->rent_period == 'daily')
                            يومي
                            @elseif($product->rent_period == 'weekly')
                            اسبوعي
                            @elseif($product->rent_period == 'yearly')
                            سنوي
                            
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            {{$product->price}}
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

