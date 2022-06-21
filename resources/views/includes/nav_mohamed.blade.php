<div class="navbar-light m-2 " style="overflow-x: hidden;">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-5 text-center">
                    <a class="navbar-brand logo" href="#">
                        <img src="{{asset('assets/site/images/site/logo.png')}}" width="45" height="45" class="d-inline-block align-top" alt="">
                        <!-- AutoBazar  -->
                    </a>
                </div>
                <div class="col-6">
                    <form>
                        <div class="input-group searchBtn">
                            <input type="text" class="form-control searchBtn" placeholder="Looking for something ? ...." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn searchBtn" type="button" id="button-addon2">
                                    <i class="fa fa-search maincolor" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 topnavIcon">
            <i class="fa fa-phone" aria-hidden="true"> +2001090387401</i>
        </div>
        <div class="col-12 col-lg-6 topnavIcon">
            <i class="fas fa-envelope"> AutoBazar@gmail.com</i>

        </div>
        <div class="col-12 col-lg-6 topnavIcon">
            ar | en
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1B65C5;">
    <a class="navbar-brand text-white logo ml-2" href="#">Auto Bazaar </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="margin: auto;">
            <li class="nav-item active">
                <a class="nav-link navColor" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" href="{{route('subcategory',['name'=>2])}}">Car Parts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" href="{{route('subcategory',['name'=>1])}}">Car Showrooms</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navColor" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" href="#">About </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" href="#">Contact </a>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link navColor" href="{{route('wishlist')}}"><i class="fas fa-heart"></i> Wishlist </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" href="{{route('register.info')}}">Register </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" href="{{route('login')}}">Login </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navColor" href="#">Logout </a>
            </li>
        </ul>

    </div>
</nav>
