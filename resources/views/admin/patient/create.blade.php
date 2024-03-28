@extends('admin.layout.index')
@section('content')
    <div class="row">

        <div class="col-xl-12">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                </div>
                <h4 class="header-title mt-0 mb-3">{{ $page_title }}</h4>

                <form method="POST" action="{{ route('patient.store') }}"enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name" class="col-form-label">اسم:</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="نام بیمار را وارد کنید">
                            @error('name')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastName" class="col-form-label">تخلص:</label>
                            <input type="text" name="lastName" class="form-control" id="lastName"
                                placeholder="تخلص بیمار را وارد کنید">
                            @error('lastName')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fatherName" class="col-form-label">پدر:</label>
                            <input type="text" name="fatherName" class="form-control" id="fatherName"
                                placeholder="نام پدر را وارد کنید">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="doctor_id" class="col-form-label">دکتر معالج:</label>
                            <select id="doctor_id" name="doctor_id" class="form-control">
                                @foreach ($doctor as $value)
                                    <option style="font-family: iransans;" value="{{ $value->id }}">
                                        {{ $value->name . ' ' . $value->lastName }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone" class="col-form-label">تماس:</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="شماره تماس را وارد کنید" required>
                            @error('phone')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="age" class="col-form-label">سن:</label>
                            <input type="number" name="age" class="form-control" id="age"
                                placeholder="سن  را وارد کنید">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="IDNumber" class="col-form-label">شماره تذکره:</label>
                            <input type="text" name="IDNumber" class="form-control" id="IDNumber"
                                placeholder="شماره تذکره را وارد کنید">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bloodType" class="col-form-label">گروه خونی:</label>
                            <select id="bloodType" name="bloodType" class="form-control">
                                <option value="نامشخص">نامشخص</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address" class="col-form-label">آدرس:</label>
                            <input type="text" name="address" class="form-control" id="address"
                                placeholder="نام بیمار را وارد کنید">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="education" class="col-form-label">تحصیلات:</label>
                            <select id="education" name="education" class="form-control">
                                <option style="font-family: iransans;" value="نامشخص">نامشخص</option>
                                <option style="font-family: iransans;" value="بی سواد">بی سواد</option>
                                <option style="font-family: iransans;" value="دیپلوم">دیپلوم</option>
                                <option style="font-family: iransans;" value="نیمه عالی">نیمه عالی</option>
                                <option style="font-family: iransans;" value="لیسانس">لیسانس</option>
                                <option style="font-family: iransans;" value="ماستر">ماستر</option>
                                <option style="font-family: iransans;" value="دکترا">دکترا</option>
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="registrationDate" class="col-form-label persianDate">تاریخ ثبت:</label>
                            <input type="text" name="registrationDate" class="form-control pdpBig"
                                id="registrationDate" placeholder="تاریخ ثبت بیمار">
                            @error('registrationDate')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">تصویر:</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="systemic_id" class="col-form-label">بیماری سیستیمیک:</label>
                            <select id="systemic_id" name="systemic_id" class="form-control">
                                @foreach ($systemic as $value)
                                    <option style="font-family: iransans;" value="{{ $value->id }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-8">
                            <label for="systemicDisease_description" class="col-form-label">شرح بیماری:</label>
                            <input type="text" name="systemicDisease_description" class="form-control"
                                id="systemicDisease_description">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="surgeryHistory" class="col-form-label">سابقه جراحی:</label>
                            <input type="text" name="surgeryHistory" class="form-control" id="surgeryHistory">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="gender" class="col-form-label">جنسیت:</label>
                            <div class="col-sm-6">
                                <div class="radio radio-primary">
                                    <input type="radio" name="gender" id="radio1" value="1">
                                    <label for="radio1">
                                        مرد
                                    </label>
                                </div>
                                <div class="radio radio-pink">
                                    <input type="radio" name="gender" id="radio2" value="0">
                                    <label for="radio2">
                                        زن
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="inputPassword4" class="col-form-label"> بارداری:</label>
                            <div class="col-sm-6">

                                <div class="radio">
                                    <input type="radio" name="pregnant" id="radio3" value="1">
                                    <label for="radio3">
                                        بله
                                    </label>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="pregnant" id="radio4" value="0">
                                    <label for="radio4">
                                        خیر
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-1">
                            <label for="inputPassword4" class="col-form-label">تاهل:</label>
                            <div class="col-sm-6">

                                <div class="radio">
                                    <input type="radio" name="marriage" id="radio5" value="1">
                                    <label for="radio5">
                                        مجرد
                                    </label>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="marriage" id="radio6" value="0">
                                    <label for="radio6">
                                        متاهل
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" style=""
                                class="btn btn-success waves-effect waves-light width-lg">
                                <img src="{{ asset('admin-asset/src/images/save.png') }}" alt=""><span>
                                    ثبت</span>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="form-group">

                </div>


            </div>
        </div>

    </div>
@endsection
