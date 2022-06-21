@extends('layouts.app_martina')

@section('content')

    <main id="main" >


        <!-- ======= Auto Shops Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="row">
                    @foreach($specialization as $spec)
                        @if($spec->id != $type)
                            <div class="col-6 col-lg-3 " onMouseOver="myfuncMouseOver({{$spec->id}})" onMouseOut="myfuncMouseOut({{$spec->id}})"  >
                        <a class="" href="{{route('type.ProfileWithCat',['type'=>$spec->id])}}" style=text-decoration:none;display:inline-block">
                                <div class="member color_site_card p3" data-aos="fade-up" data-aos-delay="100" style="height:100px;cursor:pointer;"   >
                                    <div style="width: 100%; padding-top: 14%; ">
                                        <h4 style="font-size: 20px;" id="textmyfuncMouseOver{{$spec->id}}">{{$spec['Title_'. App::getlocale()]}}</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                        
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="section-title" data-aos="fade-up">
                    <h2> {{\App\models\Specialization::find($type)['Title_'. App::getlocale()]}}</h2>
                </div>
                <br>
                <div class="row">

                    @foreach($autoShops as $shop)
                        <div class="col-lg-3 col-12" style='cursor:pointer;'>
                            <a  href="{{route('profile-index',['type'=>'maintenance','id'=>$shop->id])}}">
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member-img" style="padding:0">
                                        <img src="{{asset('assets/images/autoShops/'.$shop->cover)}}" class="img-fluid" alt="" style="width:100%;height:150px;padding:0">
                                    </div>
                                    <div class="member-info" style="width:100%;padding:0" >
                                        <div class="" style="padding:0">
                                            <ul class="" style="padding:0">
                                                <br>
                                                <h6>{{$shop->name}}</h6>
                                                <hr>
                                                <h5 style="height:130px">
                                                    <li>
                                                        <i class="fas fa-briefcase"></i>
                                                        {{$shop->specialization['Title_'. App::getlocale()]}}
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <i class="fab fa-creative-commons-nd"></i>
                                                        {{$shop->selltype['Title_'. App::getlocale()]}}
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <i class="fab fa-creative-commons-nd"></i>
                                                        {{$shop->typecategory['Title_'. App::getlocale()]}}
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
