@extends('layouts.app_martina')

@section('content')

    <main id="main" >


        <!-- ======= Auto Shops Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">


                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h3>
                                {{__('home.shops')}}
                            </h3>
                            <hr>
                        </center>
                    </div>
                    @foreach($autoShops as $shop)
                        <div class="col-lg-3 col-sm-4  d-flex align-items-stretch" style='cursor:pointer;'>
                            <a  href="{{route('profile-index',['type'=>'maintenance','id'=>$shop->id])}}">
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member-img" style="padding:0">
                                        <img src="{{asset('assets/images/users/'.$shop->cover)}}" class="img-fluid" alt="" style="height:150px;width:200px;padding:0">
                                    </div>
                                    <div class="member-info" style="width:100%;padding:0" >
                                        <div class="row" style="padding:0">
                                            <ul class="col-sm-12" style="padding:0">
                                                <br>
                                                <h6>{{$shop->name}}</h6>
                                                <hr>
                                                <h5 style="height:130px">
                                                    <li>
                                                        <i class="fas fa-briefcase"></i>
                                                        @if(strlen($shop->company_name) > 12 )
                                                            {{substr($shop->company_name, 0, 14)}}
                                                        @else
                                                            {{$shop->company_name}}
                                                        @endif
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <i class="fas fa-briefcase"></i>
                                                        {{$shop->MyshopType['Title_'.App::getlocale()]}}
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <i class="fas fa-briefcase"></i>
                                                        {{$shop->city['Title_'. App::getlocale()]}}
                                                    </li>

                                                </h5>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Auto Shops Section -->






    </main><!-- End #main -->
    <!-- Template Main JS File -->

    <script>
        function myfuncMouseOver(id) {
            var image= '';
            //alert(id);
            switch(id){
                case 1:
                    image = 'cat1.png';
                    break;
                case 2:
                    image = 'cat2.png';
                    break;
                case 3:
                    image = 'cat3.png';
                    break;
                case 4:
                    image = 'cat4.png';
                    break;
            }
            document.getElementById('textmyfuncMouseOver'+id).style.color = 'white';
            document.getElementById('moka_cars_'+id).src = '{{asset('assets/images/icons/white/')}}'+'/'+image;
        }
        function myfuncMouseOut(id){
            //alert(id);
            var image= '';
            switch(id){
                case 1:
                    image = 'cat1.png';
                    break;
                case 2:
                    image = 'cat2.png';
                    break;
                case 3:
                    image = 'cat3.png';
                    break;
                case 4:
                    image = 'cat4.png';
                    break;
            }
            document.getElementById('textmyfuncMouseOver'+id).style.color = "#17286E";
            document.getElementById('moka_cars_'+id).src = '{{asset('assets/images/icons/blue/')}}'+'/'+image;


        }
    </script>

    <script src="{{asset('assets/site/homepage/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <script src="{{asset('assets/site/homepage/assets/vendor2/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/vendor2/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/js/main.js')}}"></script>
    <script src="{{asset('assets/site/homepage/assets/js/main2.js')}}"></script>

@stop
