<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">لوحة التحكم</li>

        <li class="">
            <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                <i class="dripicons-network-1"></i>
                <span>المستخدمين</span>
            </a>
            <ul class="sub-menu mm-collapse" aria-expanded="true" style="">
                <li><a href="javascript: void(0);" class="has-arrow" aria-expanded="true">المسؤولين</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.admins.index')}}" style="padding: .4rem 4.5rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.admins.create')}}" style="padding: .4rem 4.5rem .4rem 1.5rem">اضافة مسؤول جديد</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" aria-expanded="true">التجار</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.vendors.index')}}" style="padding: .4rem 4.5rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.vendors.create')}}" style="padding: .4rem 4.5rem .4rem 1.5rem">اضافة تاجر جديد</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" aria-expanded="true">اصحاب مراكز الصيانة</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.profileMaintenance.index')}}" style="padding: .4rem 4.5rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.profileMaintenance.create')}}" style="padding: .4rem 4.5rem .4rem 1.5rem">اضافة صاحب مركز جديد</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">الاختصاصات الصيانة</a>
                            <ul class="mm-collapse" aria-expanded="true">
                                <li><a href="{{route('admin.specializations.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                                <li><a href="{{route('admin.specializations.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة اختصاص</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                <i class="dripicons-network-1"></i>
                <span>الاليات الثقيلة</span>
            </a>
            <ul class="sub-menu mm-collapse" aria-expanded="true" style="">
                <li><a href="javascript: void(0);" class="has-arrow" >منتجات البيع</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.products.index',['category_id'=>1,'rent'=>0])}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.products.create',['rent'=>0,'category_id'=>1])}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة منتج</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" >منتجات الايجار</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.products.index',['category_id'=>1,'rent'=>1])}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.products.create',['rent'=>1,'category_id'=>1])}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة منتج</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" aria-expanded="true">اضافات الاليات الثقيله </a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">الاقسام</a>
                            <ul class="mm-collapse" aria-expanded="true">
                                <li><a href="{{route('admin.sections.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                                <li><a href="{{route('admin.sections.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة نوع اعلان</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                <i class="dripicons-network-1"></i>
                <span> منتجات القطع</span>
            </a>
            <ul class="sub-menu " aria-expanded='false' style="">
                <li><a href="{{route('admin.products.index',['category_id'=>2,'rent'=>0])}}" >عرض الكل</a></li>
                <li><a href="{{route('admin.products.create',['rent'=>0,'category_id'=>2])}}" >اضافة منتج</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-exclamation-triangle"></i>
                <span> منتجات المولدات الكهربائية </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.generators.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.generators.create")}}">اضافة منتج جديد</a></li>
            </ul>
        </li>

        <li>
        <ul class="mm-collapse" aria-expanded="true">
            <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">نوع الاعلان</a>
                <ul class="mm-collapse" aria-expanded="true">
                    <li><a href="{{route('admin.categories.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                    <li><a href="{{route('admin.categories.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة نوع اعلان</a></li>
                </ul>
            </li>
        </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow plus" aria-expanded="true">
                <i class="dripicons-network-1"></i>
                <span>الاضافات</span>
            </a>


            <ul class="mm-collapse" aria-expanded="true">
                <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">نوع الاعلان</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.sellTypes.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.sellTypes.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة نوع اعلان</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">التصنيفات</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.typeCategories.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.typeCategories.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة تصنيف</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">الانواع</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.makes.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.makes.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة نوع</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">انواع الوقود</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.fuelTypes.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.fuelTypes.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة نوع وقود</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">ناقل الحركة</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.gearboxes.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.gearboxes.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة ناقل</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">حالات المنتج</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.statuses.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.statuses.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة حالة</a></li>
                    </ul>
                </li>

                <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">المميزات</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.advandages.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.advandages.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة ميزة</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" style="padding: .4rem 4.5rem .4rem 1.5rem">نوع المتجر</a>
                    <ul class="mm-collapse" aria-expanded="true">
                        <li><a href="{{route('admin.shopTypes.index')}}" style="padding: .4rem 6rem .4rem 1.5rem">عرض الكل</a></li>
                        <li><a href="{{route('admin.shopTypes.create')}}" style="padding: .4rem 6rem .4rem 1.5rem">اضافة ميزة</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-exclamation-triangle"></i>
                <span> البلاد </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.cities.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.cities.create")}}">اضافة مدينة جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-exclamation-triangle"></i>
                <span> المدن </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.districts.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.districts.create")}}">اضافة حي جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-school"></i>
                <span>الفئات الرئيسية</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.categories.index")}}">عرض الكل</a></li>
                <li><a href="{{route("admin.categories.create")}}">اضافة اعلان جديد</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fas fa-school"></i>
                <span>الاعلانات</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route("admin.advertisements.create")}}">اضافة اعلان جديد</a></li>
                <li><a href="{{route("admin.advertisements.index")}}">عرض كل الاعلانات</a></li>
            </ul>
        </li>


    </ul>
</div>
<!-- Sidebar -->
