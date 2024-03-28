@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="responsive-table-plugin">
                    {{-- <div class="table-rep-plugin"> --}}
                    @include('common.alert')
                    <p class="page_title">{{ $page_title }}</p>
                    <div class="table-responsive" data-pattern="priority-columns">
                        <div class="card-box search-card">
                            <button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" data-backdrop="static" data-keyboard="false"
                                class="btn btn-sm btn-outline-success float-right mr-10">ثبت سریع</button>
                            <a href="{{ route('patient.create') }}" class="btn btn-sm btn-outline-primary float-right">بیمار
                                جدید</a>
                            <br>
                            <br>
                        </div>
                        <div class="dataTables_wrapper">
                            <table id="customer_table" style="width: 100%;" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم</th>
                                        <th>تخلص</th>
                                        <th>تماس</th>
                                        <th>سن</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ ثبت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        {{-- ----------------------------------End Table------------------------------- --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    @include('admin.patient.createNow')
@endsection
