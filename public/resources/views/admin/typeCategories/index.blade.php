@extends("layouts.admin")
@section("pageTitle", "Ejada")
@section("style")
    <link href="{{asset("assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>

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
                <h5 class="">التصنيفات</h5>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>المدينة باللغة العربية</th>
                        <th>المدينة باللغة الانجليزية</th>
                        <th>المدينة باللغة الكردية</th>
                        <th>نوع الاعلان</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($typeCategories as $typeCategory)
                        <tr>
                            <th>
                                <a class="btn btn-dark col-sm-12" data-toggle="modal" data-target="#typeCategory{{$typeCategory->id}}">عرض</a><br>
                            </th>
                        <th>{{$typeCategory->Title_ar}}</th>
                        <th>{{$typeCategory->Title_en}}</th>
                        <th>{{$typeCategory->Title_ku}}</th>
                        <th>{{$typeCategory->sellType->Title_ar}}</th>
                        <th>
                            <center>
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            التحكم
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="btn btn-dark col-sm-12"  href="{{route('admin.typeCategories.edit',['typeCategory'=>$typeCategory->id])}}">تعديل</a>
                                            <form method="post" action="{{route('admin.typeCategories.destroy',['typeCategory'=>$typeCategory->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-dark col-sm-12" >حذف</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </th>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
@foreach($typeCategories as $typeCategoryy)
    <div class="modal fade" id="typeCategory{{$typeCategoryy->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="typeCategoryLabel{{$typeCategoryy->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header backgroundColor text-white" style="border:none">
                    <h5 class="modal-title" style="color: black" id="typeCategoryLabel{{$typeCategoryy->id}}">الصورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body backgroundColorSec p-5">
                    <img width="400" height="400" src="{{asset('assets/images/typeCategories')}}/{{$typeCategoryy->image}}">
                </div>

            </div>
        </div>
    </div>
@endforeach
@section("script")
<script src="{{asset("assets/admin/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/jszip/jszip.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/pdfmake/build/pdfmake.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/pdfmake/build/vfs_fonts.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.j")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/admin/js/pages/datatables.init.js")}}"></script>
@endsection
