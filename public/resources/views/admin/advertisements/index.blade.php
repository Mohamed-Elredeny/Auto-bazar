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
