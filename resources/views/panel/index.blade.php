<x-panel-layout>
    <x-slot name="title">
        - صفحه اصلی
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row no-gutters font-size-13 margin-bottom-10">
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> تعداد کاربران </p>
                <p>20 نفر</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>تعداد پست ها</p>
                <p>20 پست</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>تعداد نظرات</p>
                <p>300 نظر</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white  margin-bottom-10">
                <p>تعداد دسته بندی ها</p>
                <p>300 نظر</p>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col-6 margin-left-10 margin-bottom-20">
                <p class="box__title">درحال یادگیری</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                            <tr role="row" class="title-row">
                                <th>شناسه</th>
                                <th>نام دوره</th>
                                <th>نام مدرس</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="">
                                <td><a href="">1</a></td>
                                <td><a href="">دوره لاراول</a></td>
                                <td><a href="">صیاد اعظمی</a></td>
                            </tr>
                            <tr role="row" class="">
                                <td><a href="">1</a></td>
                                <td><a href="">دوره لاراول</a></td>
                                <td><a href="">صیاد اعظمی</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6 margin-bottom-20">
                <p class="box__title">دوره های مدرس</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                            <tr role="row" class="title-row">
                                <th>شناسه</th>
                                <th>نام دوره</th>
                                <th>نام مدرس</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="">
                                <td><a href="">1</a></td>
                                <td><a href="">دوره لاراول</a></td>
                                <td><a href="">صیاد اعظمی</a></td>
                            </tr>
                            <tr role="row" class="">
                                <td><a href="">1</a></td>
                                <td><a href="">دوره لاراول</a></td>
                                <td><a href="">صیاد اعظمی</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-panel-layout>
