<?php
use App\models\City;use Illuminate\Support\Facades\Session;
$cities = City::get();
?>

<li class="nav-item dropdown">
    @if(Session::get('country')  == 0 )
        <a href="" class=" nav-link navColor "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="align-middle">Select Country</span>
        </a>
    @else
        <?php
        $active_city = City::find(Session::get('country'));
        ?>
            <a href="" class=" nav-link navColor "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{asset('assets/images/cities/'.$active_city['flag'])}}" alt="user-image" style="height: 35px;width:60px">
            </a>

    @endif
    <div class="dropdown-menu text-center" style="overflow-x:scroll;height: 500px;font-size:12px">
        <a class="link_dropdown" style="cursor:pointer;" href="{{route('country.change.dropdown.destroy')}}">
            <img src="{{asset('assets/images/cities/123')}}" alt="user-image" style="height: 35px;width:60%">
            <br>
            <span class="align-middle">
                {{__('All Countries')}}
            </span>
        </a>
        <hr>
        @foreach($cities as $city)
        <a class="link_dropdown" style="cursor:pointer;" href="{{route('country.change.dropdown.post',['country'=>$city->id])}}">
            <img src="{{asset('assets/images/cities/'.$city['flag'])}}" alt="user-image" style="height: 35px;width:60%">
            <br>
            <span class="align-middle">
                {{$city['Title_'. App::getlocale()]}}
            </span>
        </a>
        <hr>
        @endforeach

    </div>
</li>
