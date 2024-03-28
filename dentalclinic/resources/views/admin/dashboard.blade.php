@extends('admin.layout.index')
@section('content')
<br>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user bg-blue">
                <div class="text-center">
                    <h2 class="font-weight-normal text-default" data-plugin="counterup">{{ $patient }}</h2>
                    <h5>تعداد بیماران ثبت شده</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="font-weight-normal text-pink" data-plugin="counterup">5894</h2>
                    <h5>بیماران فعال</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="font-weight-normal text-warning" data-plugin="counterup">{{ $today }}</h2>
                    <h5>تعداد پذیرش امروز</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="font-weight-normal text-info" data-plugin="counterup">1254</h2>
                    <h5>فروش روزانه</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
