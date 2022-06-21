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
                <h5 class="mb-5 mt-3">تعديل المنتج</h5>

                <form method="post" action="{{route('admin.generators.update',['generator'=>$product->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- 1 for cars and heavy equipment --}}
                    <input type="hidden" name="category_id" value="2">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الاعلان</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sellType" name="sell_type_id" required>
                                <option>اختر نوع الاعلان</option>
                                @foreach($sellTypes as $sellType)
                                    @if($sellType->id == $product->sell_type_id)
                                        <option value="{{$sellType->id}}" selected>{{$sellType->Title_ar}}</option>
                                    @else
                                        <option value="{{$sellType->id}}">{{$sellType->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">النوع</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="make_id" name="make_id" required>
                                @foreach($product->sellType->makes as $make)
                                    @if($make->id == $product->make_id)
                                        <option value="{{$make->id}}" selected>{{$make->Title_ar}}</option>
                                    @else
                                        <option value="{{$make->id}}">{{$make->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الفئة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="model" value="{{$product->model}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الحالة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status_id" name="status_id" required>
                                @foreach($statuses as $status)
                                    @if($status->id == $product->status_id)
                                        <option value="{{$status->id}}" selected>{{$status->Title_ar}}</option>
                                    @else
                                        <option value="{{$status->id}}">{{$status->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الوقود</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="fuel_type_id" name="fuel_type_id" required>
                                @foreach($fuels as $fuel)
                                    @if($fuel->id == $product->fuel_type_id)
                                        <option value="{{$fuel->id}}" selected>{{$fuel->Title_ar}}</option>
                                    @else
                                        <option value="{{$fuel->id}}">{{$fuel->Title_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">بلد الصنع</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="country" value="{{$product->country}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">القدرة KVA</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="ability" value="{{$product->ability}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاستطاعة KW</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="capacity" value="{{$product->capacity}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">حجم تانك الوقود</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="fuel_tank_size" value="{{$product->fuel_tank_size}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"> نوع المحرك</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="engine_type" value="{{$product->engine_type}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">عدد الفاز</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="number_of_phase" value="{{$product->number_of_phase}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">معدل التردد</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="frequency_rate" value="{{$product->frequency_rate}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">صندول الكاتم</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="muffler_box" name="muffler_box" required>
                                @if($product->muffler_box == 1)
                                    <option value="1" selected>موجود</option>
                                    <option value="0">غير موجود</option>
                                @elseif($product->muffler_box == 1)
                                    <option value="1">موجود</option>
                                    <option value="0" selected>غير موجود</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="price" value="{{$product->price}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل المنتج</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="example-text-input" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>
                        {{--
                          <div class="form-group row">
                                                <label class="control-label col-sm-2">نوع المنتج</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="product_type" name="product_type" required>
                                                        @if($product->product_type == 'single')
                                                            <option value="single" selected>قطعة منفردة</option>
                                                            <option value="sit">سيت كامل</option>
                                                            <option value="repair">طقم اصلاح</option>
                                                        @elseif($product->product_type == 'sit')
                                                        <option value="single">قطعة منفردة</option>
                                                        <option value="sit" selected>سيت كامل</option>
                                                        <option value="repair">طقم اصلاح</option>
                                                        @elseif($product->product_type == 'bothOfThem')
                                                        <option value="single">قطعة منفردة</option>
                                                        <option value="sit">سيت كامل</option>
                                                        <option value="repair" selected>طقم اصلاح</option>
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>

                        --}}


                    <div class="form-group row">
                        <label class="control-label col-sm-2">التاجر</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach($users as $user)
                                    @if($user->id == $product->user_id)
                                        <option value="{{$user->id}}" selected>{{$user->fname}}</option>
                                    @else
                                        <option value="{{$user->id}}">{{$user->fname}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">صور المنتج</label>
                        <div class="col-sm-10">
                            <input type="file" class="filestyle" accept="image/*" multiple data-buttonname="btn-secondary" name="images[]">
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

    <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#sellType').on('change', function() {
               var id = $(this).val();

               $.ajax({
               url:'https://autobazar.souqeljuma.com/getSections',
                   method:"get",
                   data:{sellTypeId:id},
                   dataType:"json",
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success:function(data){

                    var makes = document.getElementById('make_id');

                    makes.innerHTML = "";

                    data['makes'].forEach(make => makes.innerHTML += "<option value="+make.id+">"+make.Title_ar+"</option>");

                    //console.log(typeof data);

                   // console.log(data);
                   }
               });

           });

       });
   </script>

   @section('script')
   <script src="{{asset("assets/admin/libs/select2/js/select2.min.js")}}"></script>
   <script src="{{asset("assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js")}}"></script>
   @endsection
