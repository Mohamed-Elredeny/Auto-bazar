@extends("layouts.admin")
@section("pageTitle", "Instructors")
@section('styleChart')
<link href="{{asset("assets/admin/libs/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection
@section("content")
    <style>
        .vodiapicker{
            display: none;
        }

        #a{
            padding-left: 0px;
        }

        #a img, .btn-select img{
            width: 12px;

        }

        #a li{
            list-style: none;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        #a li:hover{
            background-color: #F4F3F3;
        }

        #a li img{
            margin: 5px;
        }

        #a li span, .btn-select li span{
            margin-left: 30px;
        }

        /* item list */

        .b{
            display: none;
            width: 100%;
            max-width: 350px;
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 5px;

        }

        .open{
            display: show !important;
        }

        .btn-select{
            margin-top: 10px;
            width: 100%;
            max-width: 350px;
            height: 34px;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ccc;

        }
        .btn-select li{
            list-style: none;
            float: left;
            padding-bottom: 0px;
        }

        .btn-select:hover li{
            margin-left: 0px;
        }

        .btn-select:hover{
            background-color: #F4F3F3;
            border: 1px solid transparent;
            box-shadow: inset 0 0px 0px 1px #ccc;


        }

        .btn-select:focus{
            outline:none;
        }

        .lang-select{
            margin-left: 50px;
        }

    </style>

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
                    <?php if($rent == 1){ ?>
                    <input type="hidden" name="rent" value="1" id="rent">
                    <h5 class="mb-5 mt-3">اضافة منتج جديد  للايجار</h5>
                    <?php }else{ ?>
                    <input type="hidden" name="rent" value="0" id="rent">
                    <h5 class="mb-5 mt-3">اضافة منتج جديد  للبيع</h5>
                    <?php } ?>

                <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <select class="vodiapicker">
                        <option value="fr" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2000px-Google_%22G%22_Logo.svg.png">Greek</option>
                    </select>

                    <?php if($rent == 1){ ?>
                    <input type="hidden" name="rent" value="1">
                    <?php }else{ ?>
                    <input type="hidden" name="rent" value="0">
                    <?php } ?>

                    {{-- 1 for cars and heavy equipment --}}

                    <input type="hidden" name="category_id" value="{{$category_id}}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> نوع الاعلان  </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sellType" name="sell_type_id" required>
                                <option value="">اختر نوع الاعلان</option>
                                @foreach($sellTypes as $sellType)
                                    <option value="{{$sellType->id}}" >{{$sellType->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="sections">

                    </div>
                @if($category_id !=2)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">التصنيف</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="type_category_id" name="type_category_id" required>

                            </select>
                        </div>
                    </div>
                    @else
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">التصنيف</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="type_category_id" name="type_category_id_parts" required>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع الماركة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="make_id" name="make_id" required>

                            </select>
                        </div>
                    </div>


                    <div class="form-group row notfordraga notformqtwra"  >
                        <label class="control-label col-sm-2 ">الموديل</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="model" >
                        </div>
                    </div>




                <?php if($rent == 0){ ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الحالة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status_id" name="status_id" required>
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">الحالة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status_id" name="status_id" required>
                                @foreach($statuses as $status)
                                    @if($status->id == 1)
                                    <option value="{{$status->id}}">
                                        {{$status['Title_'. App::getlocale()]}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع المده</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="rent_type">
                                <option value="hour">ساعه</option>
                                <option value="day">يوم</option>
                                <option value="week">اسبوع</option>
                                <option value="month">شهر</option>
                                <option value="year">سنه</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">مدة الإيجار</label>
                        <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="rent_period" required>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">سنة الصنع</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="year" name="year" required>
                                @for($i = date('Y')-50 ; $i <= date('Y'); $i++ )
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    @if($category_id !=2)
                    <div class="form-group row  notfordraga notformqtwra" >
                        <label class="col-sm-2 col-form-label">ناقل الحركة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gearbox_id" name="gearbox_id" >
                                @foreach($gearboxes as $gearbox)
                                    <option value="{{$gearbox->id}}">{{$gearbox->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row notformqtwra">
                        <label class="col-sm-2 col-form-label  ">نوع الوقود</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="fuel_type_id" name="fuel_type_id" >
                                @foreach($fuels as $fuel)
                                    <option value="{{$fuel->id}}">{{$fuel->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                    <div class="form-group row notformqtwra" id="distance">

                    </div>
                    @if($category_id !=2)

                    <div class="form-group row ">
                        <label for="example-text-input" class="col-sm-2 col-form-label">اللون</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="color" id="example-text-input" name="color" required>
                        </div>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">طرق الدفع</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="cash">كاش</option>
                                <option value="installment">اقساط</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">البلد</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city_id" name="city_id" required>
                                <option>اختر المدينة</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->Title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">المدينة</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="district_id" name="district_id" required>

                            </select>
                        </div>
                    </div>
                    @if($category_id !=2)

                    <div class="form-group row notformqtwra">
                        <label class="control-label col-sm-2">الإضافات</label>
                        <div class="col-sm-10">
                        <select class="select2 form-control select2-multiple" multiple="multiple" name="advandage_id[]" multiple data-placeholder="اختر الإضافات">
                            @foreach($advandages as $advandage)
                                <option value="{{$advandage->id}}">{{$advandage->Title_ar}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group row notfordraga notformqtwra ">
                        <label class="control-label col-sm-2 ">الفرش الداخلي</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="interior_brush" name="interior_brush" >
                                <option value="leather">جلد</option>
                                <option value="cloth">قماش</option>
                                <option value="both of them">كلايهما</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row  notfordraga notformqtwra">
                        <label for="example-text-input" class="col-sm-2 col-form-label">اللون الداخلي</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="color" id="example-text-input" name="interior_color" >
                        </div>
                    </div>
                    @endif

                    <div  class="notformqtwra" >
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">قدرة المحرك</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input"  name="engine_capacity" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2">عدد السلندر</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="user_id" name="slinder_number" required>
                                    <option value="">عدد السلندرات</option>
                                    <option value="1 سلندر">1 سلندر</option>
                                    <option value="2 سلندر">2 سلندر</option>
                                    <option value=" سلندر">4 سلندر</option>
                                    <option value="6 سلندر">6 سلندر</option>
                                    <option value="8 سلندر">8 سلندر</option>
                                    <option value="10 سلندر">10 سلندر</option>
                                    <option value="12 سلندر">12 سلندر</option>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">اسم المنتج</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل المنتج</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="example-text-input" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2">التاجر</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->fname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">صور المنتج</label>
                        <div class="col-sm-10">
                            <input type="file" class="filestyle" accept="image/*" multiple data-buttonname="btn-secondary" name="images[]" required>
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
                var text = $("#sellType option:selected").text();
                var rent = document.getElementById('rent').value;
                //alert(text);
                alert(text);
                var notformqtwra = '';
                var notfordraga = '';

                if (text === "مقطورات" || text === "قطع مقطورات") {
                    notformqtwra = document.getElementsByClassName('notformqtwra');
                    for (var i = 0; i < notformqtwra.length; i++) {
                        notformqtwra[i].style.display = 'none';
                    }

                } else if(text === "دراجات نارية" || text === "قطع دراجات نارية") {
                    notfordraga = document.getElementsByClassName('notfordraga');
                    for (var i = 0; i < notfordraga.length; i++) {
                        notfordraga[i].style.display = 'none';
                    }
                }else{

                    notformqtwra = document.getElementsByClassName('notformqtwra');
                    notfordraga = document.getElementsByClassName('notfordraga');


                    for (var i = 0; i < notformqtwra.length; i++) {
                        notformqtwra[i].style.display = 'block';
                        notformqtwra[i].classList.add("form-group row");

                    }
                    for (var i = 0; i < notfordraga.length; i++) {
                        notfordraga[i].style.display = 'block';
                        notfordraga[i].classList.add("form-group row");

                    }

                }



                var current_cat  =  {{$category_id}};

                if(rent === '0' && current_cat == '1') {
                    if (text == "آليات ثقيلة") {
                        //alert(1);
                        $("#distance").html(`<label class="col-sm-2 col-form-label">ساعات العمل</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="work_hour">
                        </div>`);
                    } else {
                        //alert(2);
                        $("#distance").html(`<label class="col-sm-2 col-form-label">المسافة المقطوعة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="distance">
                        </div>`);
                    }
                }
                //console.log(text);
                $.ajax({
                    url:'http://127.0.0.1:8000/getSections',
                    method:"get",
                    data:{sellTypeId:id,rent:{{$rent}}},
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        if (text == "آليات ثقيلة" ) {
                            var sectionss = document.getElementById('sections');
                            var rent = document.getElementById('rent').value;
                            // alert(11);
                            //document.getElementById('section_id');
                            sectionss.innerHTML = " <label class='col-sm-2 col-form-label'>القسم</label><div class='col-sm-10'><select class='form-control' id='section_id' name='section_id'></select></div>";
                            var sections = document.getElementById('section_id');
                            data['sections'].forEach(section => sections.innerHTML += "<option value=" + section.id + ">" + section.Title_ar + "</option>");
                        }
                        //   alert(id + ' : '+{{$rent}});
                        var typeCategories = document.getElementById('type_category_id');
                        var makes = document.getElementById('make_id');

                        typeCategories.innerHTML = "";
                        makes.innerHTML = "";
                        data['typeCategories'].forEach(typeCategory => typeCategories.innerHTML += "<option value="+typeCategory.id+">"+typeCategory.Title_ar+"</option>");
                        data['makes'].forEach(make => makes.innerHTML += "<option value="+make.id+">"+make.Title_ar+"</option>");

                        //console.log(typeof data);

                        // console.log(data);
                    }
                });

            });

            $('#city_id').on('change', function() {
                var id = $(this).val();
                console.log(id);
                $.ajax({
                    url:'http://127.0.0.1:8000/getDistricts',
                    method:"get",
                    data:{cityId:id},
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){

                        var districts = document.getElementById('district_id');

                        districts.innerHTML = "";

                        data.forEach(district => districts.innerHTML += "<option value="+district.id+">"+district.Title_ar+"</option>");

                        //console.log(typeof data);

                        // console.log(data);
                    }
                });

            });
        });


        //test for getting url value from attr
        // var img1 = $('.test').attr("data-thumbnail");
        // console.log(img1);

        //test for iterating over child elements
        var langArray = [];
        $('.vodiapicker option').each(function(){
            var img = $(this).attr("data-thumbnail");
            var text = this.innerText;
            var value = $(this).val();
            var item = '<li><img src="'+ img +'" alt="" value="'+value+'"/><span>'+ text +'</span></li>';
            langArray.push(item);
        })

        $('#a').html(langArray);

        //Set the button value to the first el of the array
        $('.btn-select').html(langArray[0]);
        $('.btn-select').attr('value', 'en');

        //change button stuff on click
        $('#a li').click(function(){
            var img = $(this).find('img').attr("src");
            var value = $(this).find('img').attr('value');
            var text = this.innerText;
            var item = '<li><img src="'+ img +'" alt="" /><span>'+ text +'</span></li>';
            $('.btn-select').html(item);
            $('.btn-select').attr('value', value);
            $(".b").toggle();
            //console.log(value);
        });

        $(".btn-select").click(function(){
            $(".b").toggle();
        });

        //check local storage for the lang
        var sessionLang = localStorage.getItem('lang');
        if (sessionLang){
            //find an item with value of sessionLang
            var langIndex = langArray.indexOf(sessionLang);
            $('.btn-select').html(langArray[langIndex]);
            $('.btn-select').attr('value', sessionLang);
        } else {
            var langIndex = langArray.indexOf('ch');
            console.log(langIndex);
            $('.btn-select').html(langArray[langIndex]);
            //$('.btn-select').attr('value', 'en');
        }



    </script>
@endsection


   @section('script')
   <script src="{{asset("assets/admin/libs/select2/js/select2.min.js")}}"></script>
   <script src="{{asset("assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js")}}"></script>
   @endsection
