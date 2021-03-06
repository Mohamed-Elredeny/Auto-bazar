@extends('layouts.app_martina')

@section('content')

    <section>
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>{{__('home.about_autobazar')}}</h2>
            </div>

            <div class="row">
                <!-- Gallery -->
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img
                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt=""
                        />

                        <img
                            src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt=""
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                            src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt=""
                        />

                        <img
                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt=""
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt=""
                        />

                        <img
                            src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt=""
                        />
                    </div>
                </div>
                <!-- Gallery -->
            </div>
        </div>
    </section>

    <section style="background-color: rgba(255,255,255,1) ">
        <div class="container">

            @if(LaravelLocalization::getCurrentLocale() == 'en')
                <div class="row ">
                    <div class="col-md-12">

                        <!-- section-header module -->
                        <br>
                        <div class="section-header h5 ">
                            <h1 class="section-header__title white-style abc"
                                style="color: #000000 ;">
                                About Us
                            </h1>
                            <p class="section-header__title white-style" style="color:#000000;">
                            <p>
                                Autobazaar is a website and smartphone application specialized in classified ads for vehicles and spare parts locally and internationally for all users around the world, as it connects the seller and buyer under one platform to facilitate the process of trade exchange between them


                            </p>
                            <p>
                                Autobazaar starts from the gateway to the Middle East, to be the first and only site in the region as a local and international site specialized in providing advertising and marketing services for all types of vehicles and spare parts from cars, trucks, trailers, heavy equipment, buses and vans
                            </p>
                            <p>
                                The Autobazar site is used locally and internationally, where users and visitors can use the site locally in the country in which they live, or they can use it internationally where they can see different ads in any country around the world
                            </p>
                            <p>
                                Autobazaar, through its distinguished management and diligent operation team, always strives to keep pace with the continuous development in the field of marketing vehicles and spare parts electronically through its various platforms and provide all the necessary tools to complete the advertising process appropriately.
                            </p>
                            <p>
                                The goals of Autobazaar are to create an integrated platform through which the seller reaches the buyer and the buyer to the seller easily and in the fastest time

                            <h3>
                                Vision of Autobazar


                            </h3>
                            </p>
                            <p>
                                The vision of Autobazar is to enable companies and traders to find the right buyer in this field through an integrated platform visited by all users from the Middle East to all countries of the world. in a perfect way
                            <h3>
                                Autobazaar
                            </h3>
                            </p>
                            <p>
                                Autobazaar aims to connect the seller and buyer in the Middle East with the seller and buyer in Europe and the world and vice versa. It also aims to be a global platform, especially in the trade of vehicles and spare parts.
                            </p>

                            </p>

                        </div>
                        <!-- end section-header module -->

                    </div>

                </div>
            @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                <div class="row text-right">
                    <div class="col-md-12">

                        <!-- section-header module -->
                        <br>
                        <div class="section-header h5 ">
                            <h1 class="section-header__title white-style abc"
                                style="color: #000000 ; font-family: Swis721_Hv_BT_Heavy">
                                ???? ??????
                            </h1>
                            <p class="section-header__title white-style" style="color:#000000;">
                            <p>
                                ??????????????????, ???? ???????? ???????????????? ???????????? ?????????????? ???????????? ???????? ???? ?????????????????? ?????????????? ????????????????
                                ???????? ???????????? ?????????? ???????????? ?????????? ???????????????????? ?????? ????????????, ?????? ???????? ???????? ???????????? ???????????????? ??????
                                ???????? ?????????? ???????????? ?????????? ?????????????? ?????????????? ???????? ??????????

                            </p>
                            <p>
                                ?????????? ?????????????????? ???? ?????????? ?????????? ?????????? ????????????, ?????????? ???????????? ?????????? ?????????????? ???? ?????????????? ??????????
                                ???????? ?????????? ???????? ???? ?????????? ?????????????? ?????????????????? ???????????????????? ?????????? ?????????? ???????????????? ???????? ????????????
                                ???? ???????????????? ?????????????????? ???????????????????? ???????????????? ?????????????? ???????????????? ????????????????

                            </p>
                            <p>
                                ?????? ?????????????? ???????? ?????????????????? ?????????? ????????????, ?????? ?????????? ???????????????????? ?????????????????? ???? ??????????????
                                ???????????? ???????? ???????? ???? ???????????? ???????? ???????????? ??????, ???? ???????????????? ???????????????? ???????? ???????? ?????? ??????????????
                                ???? ???????? ?????????????????? ???????????????? ???? ???? ???????? ?????? ????????????

                            </p>
                            <p>
                                ???????? ?????????? ?????????????????? ???? ???????? ???????????? ?????????????? ?????????? ?????????? ??????????????, ???????????? ???????????? ??????????????
                                ???? ???????? ?????????? ???????????????? ???????? ???????????? ?????????????????? ???? ???????? ???????????? ???????????????? ???????????? ???????? ??????????????
                                ?????????????? ???? ?????????? ?????????? ?????????????? ???????????????? ???????? ??????????

                            </p>
                            <p>
                                ???????????? ?????????? ?????????????????? ?????? ?????????? ???????? ?????????????? ?????? ???? ???????????? ???????????? ?????? ?????????????? ????????????
                                ?????????????? ?????? ???????????? ?????? ?????????? ?????? ???????? ??????
                                <h3>
                                ???????? ??????????????????

                            </h3>
                            </p>
                            <p>
                                ???????????? ???????? ?????????????????? ???? ?????????? ?????????????? ?????????????? ???????????? ?????????????? ?????????????? ???? ?????? ???????????? ????
                                ???????? ???????? ?????????????? ???????????? ???????? ???????????????????? ?????????????? ???? ?????????? ?????????? ???????????? ?????? ???????? ??????
                                ???????????? , ?????? ?????? ?????? ?????????????? ?????????????? ???????????? ?????? ???????? ?????? ???????? ?????????????? ???????? ???????? ????????
                                ???????????????? ???????? ???????????? ???????? ???????????? ???????? ???????????? ????????????
                                <h3>
                                ?????? ??????????????????
                            </h3>
                            </p>
                            <p>
                                ???????? ?????????????????? ?????? ?????? ???????????? ???????????????? ???? ?????????? ?????????? ???????????? ?????????????? ???????????????? ???? ????????????
                                ?????????????? ???????????? ????????, ?????? ???????? ?????????? ???????? ???????????? ???????? ???? ?????????? ???????????????? ???????? ????????????

                            </p>

                            </p>

                        </div>
                        <!-- end section-header module -->

                    </div>

                </div>

            @elseif(LaravelLocalization::getCurrentLocale() == 'ku')
                <div class="row text-right">
                    <div class="col-md-12">

                        <!-- section-header module -->
                        <br>
                        <div class="section-header h5 ">
                            <h1 class="section-header__title white-style abc"
                                style="color: #000000 ; font-family: Swis721_Hv_BT_Heavy">
                                ???????? ???????? ??????????????????
                            </h1>
                            <p class="section-header__title white-style" style="color:#000000;">
                            <p>
                                ?????????????????? ?????????????????? ?? ?????????????????????? ???????????????? ???????????? ?????????????? ???? ?????????????? ?????????????????? ???? ???????????????????????? ?? ???????? ?????????????????? ???? ?????????? ?? ???????????????????? ???? ?????????? ?????????????????????????? ???????????? ?????????????? ?? ?????????????????? ???? ?????? ?????? ???????????????? ???? ???????????????????? ???????????????? ???????????????? ?????????????????? ???? ???????????????? ?????????????????? ?????????????????????? ???????? ???????????????? ???? ?????????? ?????????? ?????????? ?? ???????? ???????? ???? ???????????????? ?????? ?????????????????? ?????????????? ?? ???????????????????? ???????????? ???? ?????????????????????? ?????????????????????? ???????????? ?? ?????????????????? ???? ?????????? ???????????????? ???????????????? ?? ???????????? ???????????? ???????????????? ?? ???????? ?? ????????

                            </p>
                            <p>
                                ?????????????????? ???? ?????????? ?????????????? ?? ???????????????????????? ?????????????????? ???? ???????????????????????? ?? ?????????????????????? ?????????????? ?????????????? ???? ?????????? ?????????????? ???? ?????????? ?????????? ???????????????????? ?????? ?????????????? ???? ?????????? ???????????????????????? ???????????? ?????????? ???? ?????????????? ?????????????? ???????????? ?????????? ???? ?????? ?????????????? ?????????? ?????????????????? ???? ?????????? ???????????? ???????????????????? ?? ?????????????????? ?????????????????????? ???????????? ???? ?????????? ???????????????? ???? ???? ?????????? ?????????????????? ???????????????????????????????? ???????????????? ?????? ???? ???????????????????? ?????????????????????????? ?????????? ???????????????????????? ???????????????? ?? ???????? ?????????????????? ???? ???????????????? ???????????????????? ?? ?????????? ?????????????? ????????????

                            </p>
                            <p>
                                ?????????????????????? ?????????????????? ???????????? ???? ?????????????????????? ?????????????? ???????????????? ???? ???????????????????? ???? ???????????????? ?????????? ???????????????? ?? ???????????????? ???? ???????????? ?? ???? ?????????????? ?????? ?????????????????? ???????????????????? ?????????????? ?????????????????? ?????????????????? ?????????????????? ???????????? ???? ?????????????????????? ?? ?????????????????? ???????????? ???????????? ?????????? ?????? ?????????????? ???????????????? ???? ?????????? ?????????????????????? ???????????????????? ???? ?????????? ?????????????????????????? ?????????????????? ?????????????????????? ?????????????????? ???????????? ???? ?????????? ?????????????? ???????????? ?????????? ???? ?????????????????? ???????????????? ???????????? ???? ?????????????????????? ?????? ???????? ?????????????????? ?????????????????? ?????????????? ???????????? ???? ?????????????? ?? ?????????? ???? ?????????????????? ???????????????? ???? ?????????????? ?? ???????????????? ???? ?????????????? ?? ?????????? ???????????????????? ?? ???? ?????????????????????? ?????????? ?????????????????????? ???????????? ???????????? ???? ???????????????? ???????????????? ?? ???????????? ??????????

                            </p>



                            </p>

                        </div>
                        <!-- end section-header module -->

                    </div>

                </div>

            @endif
        </div>
    </section>

    <!-- team-block
        ================================================== -->
    <!-- End team-block -->



@endsection
