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
                                من نحن
                            </h1>
                            <p class="section-header__title white-style" style="color:#000000;">
                            <p>
                                اوتوبازار, هو موقع إلكتروني وتطبيق للهواتف الذكية مختص في الإعلانات المبوبة للمركبات
                                وقطع الغيار محليآ ودوليآ لجميع المستخدمين حول العالم, حيث يقوم بربط البائع والمشتري تحت
                                منصة واحدة لتسهيل عملية التبادل التجاري فيما بينهم

                            </p>
                            <p>
                                ينطلق اوتوبازار من بوابة منطقة الشرق الاوسط, ليكون الموقع الاول والوحيد في المنطقة كموقع
                                محلي ودولي مختص في تقديم الخدمات الإعلانية والتسويقية لجميع أنواع المركبات وقطع الغيار
                                من السيارات والشاحنات والمقطورات والمعدات الثقيلة والباصات والفانات

                            </p>
                            <p>
                                يتم استخدام موقع اوتوبازار محليآ ودوليآ, حيث يتمكن المستخدمون والزائرون من استخدام
                                الموقع بشكل محلي في الدولة التي يقطنون بها, أو بإمكانهم إستخدامه بشكل دولي حيث يتمكنون
                                من رؤية الإعلانات المختلفة في أي دولة حول العالم

                            </p>
                            <p>
                                يسعى دائمآ اوتوبازار من خلال ادارته المميزة وفريق عمليه المثابر, مواكبة التطور المستمر
                                في مجال تسويق المركبات وقطع الغيار إلكترونيآ من خلال منصاته المختلفة وتقديم جميع الأدوات
                                اللازمة في اتمام عملية الدعاية والإعلان بشكل مناسب

                            </p>
                            <p>
                                تتمحور أهداف اوتوبازار إلى ايجاد منصة متكاملة يصل من خلالها البائع إلى المشتري وإيصال
                                المشتري إلى البائع بكل سهولة وفي أسرع وقت
                                <h3>
                                رؤية اوتوبازار

                            </h3>
                            </p>
                            <p>
                                تتمحور رؤية اوتوبازار في تمكين الشركات والتجار لإيجاد المشتري المناسب في هذا المجال من
                                خلال منصة متكاملة يزورها جميع المستخدمين انطلاقا من منطقة الشرق الأوسط إلى جميع دول
                                العالم , أما بما يخص المشتري فتتمحور رؤيتنا بأن يكون لهم منصة متكاملة أيضآ لعرض جميع
                                المركبات وقطع الغيار التي يبحثون عنها بطريقة مثالية
                                <h3>
                                هدف اوتوبازار
                            </h3>
                            </p>
                            <p>
                                يهدف اوتوبازار إلى ربط البائع والمشتري في منطقة الشرق الأوسط بالبائع والمشتري في اوروبا
                                والعالم والعكس صحيح, كما يهدف ليكون منصة عالمية خاصة في تجارة المركبات وقطع الغيار

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
                                ئێمە کێین ئوتوبازار
                            </h1>
                            <p class="section-header__title white-style" style="color:#000000;">
                            <p>
                                ئۆتۆبازار وێبسایتێک و کاربەرنامەی تەلەفۆنی زیرەکی تایبەتە بە ڕیکلامی پۆلێنکراو بۆ ئۆتۆمبێلەکان و بەشە یەدەگەکان لە ناوخۆ و نێودەوڵەتی بۆ هەموو بەکارهێنەرانی جیهان، فرۆشیار و کڕیارەکان لە ژێر یەک پلاتفۆڕم بۆ ئاسانکردنی بازرگانی نێوانیان ئۆتۆبازار لە دەروازەی ڕۆژهەڵاتی ناوەڕاستەوە دەست پێدەکات، بۆ ئەوەی ببێتە یەکەم و تاکە سایت لە هەرێمەکە وەک ماڵپەڕێکی ناوخۆیی و نێودەوڵەتی تایبەت بە پێشکەشکردنی خزمەتگوزاری ڕیکلام و بازاڕکردن بۆ هەموو جۆرەکانی ئۆتۆمبێل و پارچەی یەدەگی ئۆتۆمبێل و لۆری و ترێل

                            </p>
                            <p>
                                ئۆتۆبازار لە ئاستی ناوخۆیی و نێودەوڵەتیدا بەکاردێت، کە بەکارهێنەران و سەردانکەران دەتوانن شوێنەکە بە شێوەی ناوخۆیی لە وڵاتی خۆیان بەکاربێنن، یان دەتوانن لە ئاستی نێودەوڵەتیدا بەکاری بهێنن کە دەتوانن ڕیکلامی جیاواز ببینن لە هەر وڵاتێکی جیهان ئۆتۆبازار لە ڕێگەی دەستەی بەڕێوەبردن و بەردەوامی دیارەکەیەوە هەمیشە لە هەوڵی ئەوەدایە کە لە ڕێگەی پلاتفۆرمە جۆراوجۆرەکانیەوە بەردەوام بێت لە پەرەسەندنە بەردەوامەکانی بواری بەبازاڕکردنی ئۆتۆمبێل و بەشە یەدەگەکان بە شێوەیەکی ئەلیکترۆنی و هەموو ئامرازە پێویست

                            </p>
                            <p>
                                ئامانجەکانی ئۆتۆبازار ئەوەیە کە پلاتفۆرمێکی یەکخراو بدۆزنەوە کە فرۆشیارەکە لە ڕێگەیەوە بگاتە کڕیارەکە و کڕیارەکە بە ئاسانی و بە زووترین کات بگەیەنێتە فرۆشیارەکە ڕوانگەی ئۆتۆبازار تێڕوانینی ئۆتۆبازار ئەوەیە کە کۆمپانیاکان و بازرگانان بتوانن کڕیاری دروست لەم بوارەدا بدۆزنەوە لە ڕێگەی پلاتفۆرمێکی یەکپارچەیی کە هەموو بەکارهێنەرانی ڕۆژهەڵاتی ناوەڕاستەوە سەردانیان کردووە بۆ هەموو وڵاتانی جیهان، بەڵام بۆ کڕیارەکە، بینینمان ئەوەیە کە پلاتفۆرمێکی یەک گۆلی ئۆتۆبازار ئوتوبازار ئامانجی ئەوەیە کە فرۆشیار و کڕیار لە ڕۆژهەڵاتی ناوەڕاست بە فرۆشیار و کڕیارەوە لە ئەوروپا و جیهان ببەستێتەوە و بە پێچەوانەوەش ببێتە پلاتفۆرمێکی جیهانی تایبەت لە بازرگانی ئۆتۆمبێل و پارچەی یەدەگ

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
