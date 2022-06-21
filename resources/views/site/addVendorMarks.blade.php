@extends('layouts.app')

@section('content')
<div style="padding:10px">
    <center>
        <h6 style="font-weight:bolder">Avilable Marks Avilable {{ count($makes) }} Mark</h6>
        <hr>
        <input type="text" class="btn col-sm-6" id="filter" placeholder="Search About Your Mark" style="border:1px solid #17286E">
        <br><br>
        @if(count($makes) > 0 )
        @foreach($makes as $adv)
            <div class="card results"  style="width: 18rem;display:inline-block">
                <img class="card-img-top" src="{{asset('assets/images/makes/'.$adv->image)}}" alt="Card image cap" style="width: 100%;height:200px">
                <div class="card-body">
                    <h5 class="card-title">
                        {{$adv['Title_'. App::getlocale()]}}
                    </h5>
                    <p class="card-text"></p>
                    @if(!in_array($adv->id,$pure_marks))
                        <a class="form-data btn btn-dark" href="{{route('vendor.handle.mark',['process'=>'add','mark_id'=>$adv->id])}}">Add</a>
                    @else
                        <a class="form-data btn btn-danger" href="{{route('vendor.handle.mark',['process'=>'remove','mark_id'=>$adv->id])}}" >Remove</a>
                    @endif
                </div>
            </div>
        @endforeach
        @else
            <div class="btn btn-danger text-center">
                Your Maintenance Center Dont have any marks yet!
            </div>
        @endif

    </center>
</div>


<script type="text/javascript">
    window.onload=function(){
        $("#filter").keyup(function() {

            var filter = $(this).val(),
                count = 0;

            $('.results').each(function() {

                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide();

                } else {
                    $(this).show();
                    count++;
                }
            });
        });
    }
</script>
@endsection
