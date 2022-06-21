<style>
    .font_mob{
        font-size:25px;
        font-weight: bolder;
    }
    .navbar-toggler{
        background:white
    }

</style>
@if(LaravelLocalization::getCurrentLocale() == 'en')
    <div class="navbar-light m-2 " style="overflow-x: hidden;">
        <div class="row">
            <div class="col-5 text-left">
                <a class="logo ml-2" href="{{route('home')}}" style="color: #17286E;font-size:25px;font-family:'Bauhaus 93' !important;">&#160;&#160;Auto Bazaar </a>
            </div>
            <div class="col-6 text-right font_mob" >

                <a style="color:#17286E" href="{{LaravelLocalization::getLocalizedURL('ar') }}">ar</a>  | <a style="color:#17286E" href="{{LaravelLocalization::getLocalizedURL('en') }}">en</a> | <a style="color:#17286E" href="{{LaravelLocalization::getLocalizedURL('ku') }}">ku</a>
            </div>
        </div>
    </div>
<nav class="navbar navbar-expand-lg navbar-light color_site_bg" id="navToty" style="padding: 0px !important; justify-content:space-around">

    <a class="navbar-brand logo" href="{{route('home')}}">
        <img src="{{asset('assets/site/images/site/logo.png')}}" width="60" height="60" class="d-inline-block align-top" alt="">
    </a>
    <div>
        <form class="">
            <div class="input-group ">
                <input type="text" class="form-control " placeholder="{{__('nav.LookingForSomeThing')}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="form-control " type="button" id="button-addon2" style="width: 50px;">
                        <i class="fa fa-search maincolor" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <ul class="navbar-nav mr-auto">
           {{-- <li class="nav-item">
                <a class="nav-link navColor" id="Home" onClick="localStorage.setItem('name', $(this).text());" href="{{route('home')}}">{{__('nav.Home')}}</a>
            </li>--}}
            <li class="nav-item">
                <a class="nav-link navColor" id="Carsandheavyequipment"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('subcategory',['name'=>1])}}">{{__('nav.CarsAndHeavyEquipment')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" id="Spareparts" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('subcategory',['name'=>2])}}">{{__('nav.SpareParts')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" id="ElectricGenerators"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('subcategory',['name'=>4])}}">{{__('nav.ElectricGenerators')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" id="MaintenanceCenters" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('subcategory',['name'=>3])}}">{{__('nav.MaintenanceCenters')}}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link navColor"  href="{{route('about')}}">{{__('nav.AboutUs')}} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" href="{{route('contact')}}">{{__('nav.Contact')}} </a>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            @if(auth()->user())
                @if(auth('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link navColor" id="MyDashboard"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('admin.admin.home')}}">{{__('nav.MyDashboard')}} </a>
                    </li>
                @elseif(auth('vendor')->check())
                    <li class="nav-item">
                        <a class="nav-link navColor" id="MyProfile" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('vendor.profile-index',['type'=>'vendor','id'=>auth()->user()->id])}}">{{__('nav.MyProfile')}} </a>
                    </li>
                @elseif(auth('profile_maintenance')->check())
                    <li class="nav-item">
                        <a class="nav-link navColor" id="My Profile"  onClick="localStorage.setItem('name',$(this).text().replace(/\s/g, ''));" href="{{route('maintenance.profile-index',['type'=>'maintenance','id'=>auth()->user()->id])}}">{{__('nav.MyProfile')}} </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link navColor" id="Wishlist" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('wishlist')}}"><i class="fas fa-heart"></i>
                        {{__('nav.wishlist')}} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor" id="Logout" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('logout')}}">{{__('nav.Logout')}}
                    </a>
                </li>
            @else

                @include('includes.countries')

                <li class="nav-item">
                    <a class="nav-link navColor"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('register',['type'=>'vendor'])}}">{{__('nav.Register')}} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('auth.login')}}">{{__('nav.Login')}} </a>
                </li>

            @endif

        </ul>
    </div>

</nav>
@else
    <style>
        *{
            font-family: cairo !important;
        }
        .navbar-toggler{
            background:white
        }



    </style>
    <div class="navbar-light m-2 " style="overflow-x: hidden;">
        <div class="row">
            <div class="col-5 text-left " >
                <a class="logo ml-2" href="{{route('home')}}" style="color: #17286E;font-size:25px;font-family:'Bauhaus 93' !important;">&#160;&#160;Auto Bazaar </a>

            </div>
            <div class="col-6 text-right font_mob" >
                <a style="color:#17286E" href="{{LaravelLocalization::getLocalizedURL('ar') }}">ar</a>  | <a style="color:#17286E" href="{{LaravelLocalization::getLocalizedURL('en') }}">en</a> | <a style="color:#17286E" href="{{LaravelLocalization::getLocalizedURL('ku') }}">ku</a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light color_site_bg" id="navToty" style="padding: 0px !important; justify-content:space-around;direction:rtl;text-align:right;">

        <a class="navbar-brand logo" href="{{route('home')}}">
            <img src="{{asset('assets/site/images/site/logo.png')}}" width="60" height="60" class="d-inline-block align-top" alt="">
        </a>
        <div>
            <form class="">
                <div class="input-group ">
                    <input type="text" class="form-control " placeholder="{{__('nav.LookingForSomeThing')}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="form-control " type="button" id="button-addon2" style="width: 50px;">
                            <i class="fa fa-search maincolor" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="navbar-nav mr-auto">
           {{--     <li class="nav-item">
                    <a class="nav-link navColor" id="Home" onClick="localStorage.setItem('name', $(this).text());" href="{{route('home')}}">{{__('nav.Home')}}</a>
                </li>--}}
                <li class="nav-item">
                    <a class="nav-link navColor" id="Carsandheavyequipment"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('subcategory',['name'=>1])}}">{{__('nav.CarsAndHeavyEquipment')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor" id="Spareparts" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('subcategory',['name'=>2])}}">{{__('nav.SpareParts')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor" id="ElectricGenerators"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('subcategory',['name'=>4])}}">{{__('nav.ElectricGenerators')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor" id="MaintenanceCenters" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('subcategory',['name'=>3])}}">{{__('nav.MaintenanceCenters')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link navColor"  href="{{route('about')}}">{{__('nav.AboutUs')}} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor" href="{{route('contact')}}">{{__('nav.Contact')}} </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                @if(auth()->user())
                    @if(auth('admin')->check())
                        <li class="nav-item">
                            <a class="nav-link navColor" id="MyDashboard"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('admin.admin.home')}}">{{__('nav.MyDashboard')}} </a>
                        </li>
                    @elseif(auth('vendor')->check())
                        <li class="nav-item">
                            <a class="nav-link navColor" id="MyProfile" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('vendor.profile-index',['type'=>'vendor','id'=>auth()->user()->id])}}">{{__('nav.MyProfile')}} </a>
                        </li>
                    @elseif(auth('profile_maintenance')->check())
                        <li class="nav-item">
                            <a class="nav-link navColor" id="My Profile"  onClick="localStorage.setItem('name',$(this).text().replace(/\s/g, ''));" href="{{route('maintenance.profile-index',['type'=>'maintenance','id'=>auth()->user()->id])}}">{{__('nav.MyProfile')}} </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link navColor" id="Wishlist" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('wishlist')}}"><i class="fas fa-heart"></i>
                            {{__('nav.wishlist')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navColor" id="Logout" onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('logout')}}">{{__('nav.Logout')}}
                        </a>
                    </li>
                @else

                    <li class="nav-item">
                        <a class="nav-link navColor"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('register',['type'=>'vendor'])}}">{{__('nav.Register')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navColor"  onClick="localStorage.setItem('name', $(this).text().replace(/\s/g, ''));" href="{{route('auth.login')}}">{{__('nav.Login')}} </a>
                    </li>
                @endif


            </ul>
        </div>

    </nav>

@endif
<script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navToty");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    document.getElementById(localStorage.getItem('name')).classList.add('activeToty');

</script>
