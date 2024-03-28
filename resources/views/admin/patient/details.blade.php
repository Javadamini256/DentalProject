@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin-top: 2%;">
            @include('common.alert')
            <div class="card-box main-row" style="border-radius: 10px;">
                <div class="bg-picture card-box">
                    <div class="profile-info-name d-inline-block align-right">
                        <img src="@if ($patient->image) {{ $patient->image }}
                        @else
                            {{ asset('admin-asset/src/images/empty.png') }} @endif"
                            class="rounded-circle avatar-xxl img-thumbnail float-left mr-3">

                        <div class="profile-info-detail overflow-hidden verticalline">
                            <h4 class="m-2 sansfont">{{ $patient->name . ' ' . $patient->lastName }}</h4>
                            <h4 class="m-2 sansfont"> پرونده: {{ $patient->regNumber }}</h4>
                            <h4 class="m-2 sansfont">داکتر معالج:
                                @if ($patient->doctor_id)
                                    {{ $patient->doctor->name . ' ' . $patient->doctor->lastName }}
                                @else
                                @endif
                            </h4>
                            <p class="font-13"></p>
                        </div>

                        {{-- <div class="clearfix"></div> --}}
                    </div>
                    <div class="profile-info-name d-inline-block detail-div">
                        <div class="profile-info-detail overflow-hidden verticalline">
                            <h4 class="m-2 sansfont">سن: {{ $patient->age }}</h4>
                            <h4 class="m-2 sansfont"> تماس: {{ $patient->phone }}</h4>
                            {{-- <h4 class="m-2 sansfont">تاریخ ثبت:{{ $patient->registrationDate }}</h4> --}}
                            <h4 class="m-2 sansfont">وضعیت:
                                @if ($patient->status == 1)
                                    <span class="badge badge-success badge-pill">فعال</span>
                                @else
                                    <span class="badge badge-danger badge-pill">غیرفعال</span>
                                @endif
                            </h4>


                            <a type="button" href="{{ route('patient.show', ['patient' => $patient->id]) }}"
                                class="btn btn-lighten-success waves-effect  width-lg waves-success">ویرایش</a>


                            <a type="button"
                                href="

                            @if ($patient->status == 1) {{ route('patient.changeStatus', ['id' => $patient->id, 'status' => 0]) }}
                            @else
                                {{ route('patient.changeStatus', ['id' => $patient->id, 'status' => 1]) }} @endif
                            "
                                @if ($patient->status == 1) class="btn btn-lighten-danger waves-effect waves-danger width-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="غیرفعال کردن بیمار">غیرفعال</a>                     
                            @else
                               class="btn btn-lighten-info waves-effect waves-info width-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="فعال کردن بیمار">فعال</a> @endif
                                </div>

                                <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
{{-- -----------------------------NEW TABS------------------ --}}
    @include('admin.layout.partials.tab-detail')
    @include('admin.patient.radiography.create-modal')
@endsection
