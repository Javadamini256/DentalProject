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
                {{-- -----------------------------FORM------------------------- --}}
                <form method="POST" action="{{ route('patient.update',['patient'=>$patient->id]) }}">
                    @method('put')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">اسم:</label>
                            <input type="text" value="{{ $patient->name }}" name="name" class="form-control" id="name"
                                placeholder="نام بیمار را وارد کنید">
                            @error('name')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname" class="col-form-label">تخلص:</label>
                            <input type="text"value="{{ $patient->lastName }}" name="lastName" class="form-control" id="lastname"
                                placeholder="تخلص بیمار را وارد کنید">
                            @error('lastName')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fathername" class="col-form-label">پدر:</label>
                            <input type="text" value="{{ $patient->fatherName }}" name="fatherName" class="form-control" id="fathername"
                                placeholder="نام پدر را وارد کنید">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="doctor_id" class="col-form-label">دکتر معالج:</label>
                            <select id="inputState" name="doctor_id" class="form-control">
                                @foreach ($doctor as $value)
                                    <option style="font-family: iransans;" value="{{ $value->id  }}"{{ $value->id==$patient->doctor_id ?'selected':'' }}>
                                        {{ $value->name . ' ' . $value->lastName  }}</option>
                                 @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone1" class="col-form-label">تماس:</label>
                            <input type="text"value="{{ $patient->phone }}" name="phone1" class="form-control" id="phone1"
                                placeholder="شماره تماس را وارد کنید">
                            @error('phone1')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone2" class="col-form-label">بیماری سیستیمیک:</label>
                            <input type="text"value="{{ $patient->phone }}" name="phone2" class="form-control" id="phone2"
                                placeholder="شماره تماس را وارد کنید">
                            @error('phone2')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date" class="col-form-label persianDate">تاریخ ثبت:</label>
                            <input type="text"value="{{ $patient->registrationDate }}" name="registrationDate" class="form-control pdpBig" 
                                placeholder="تاریخ ثبت بیمار">
                            @error('registrationDate')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label">جنسیت:</label>
                            <select id="inputState" name="gender" class="form-control">
                                @if ($patient->gender==1)
                                <option value="1" selected>مرد</option>
                                <option value="0" >زن</option>
                                @else
                                <option value="0" selected> زن</option>
                                <option value="1" > مرد</option>
                                @endif
                            </select>

                        </div>

                        <button type="submit" style="" class="btn btn-info waves-effect width-lg waves-light">
                            <img src="{{ asset('admin-asset/src/images/save.png') }}" alt=""> ویرایش</button>
                </form>

                <div class="form-group">

                </div>


            </div>
        </div>
    </div>
@endsection
