@extends('admin.layout.index')
@section('content')
    <div class="col-md-12">
        <div class="card-box">
            <div class="panel-heading">
                {{-- <h4>صورتحساب</h4> --}}
            </div>
            @include('common.alert')
            <div class="panel-body">
                <div class="clearfix">
                    <div class="float-left">
                        {{-- <h3 style="font-family: 'B mitra'; color: #176B87;">{{ $patient->name . ' ' . $patient->lastName }}</h3> --}}
                    </div>
                    {{-- <div class="float-right">
                        <h4 style="font-family: 'B mitra';">صورتحساب <br>
                            <br><strong>{{ $date }}</strong>
                        </h4>
                    </div> --}}
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                        <div class="float-left mt-1" style="display: inline;">
                            <address style=" font-family: 'Iransans'; font-size: 16px; color: #176B87;">
                                <strong style="font-family: 'Iransans'; font-size: 16px; color: #176B87;">مشخصات</strong><br>
                                نام :{{ $patient->name }}<br>
                                تخلص:{{ $patient->lastName }}<br>
                                تماس:{{ $patient->phone }}<br>

                            </address>
                        </div>
                        <div class="float-right mt-3" style="display: inline;">
                            <p><strong>تاریخ : </strong>{{ $date }}</p>
                            <p class="m-t-10"><strong>وضعیت سفارش: </strong> <span class="label label-pink">در انتظار</span>
                            </p>
                            <p class="m-t-10"><strong>شناسه سفارش: </strong> #123456</p>

                            <button type="button" class="btn btn-lighten-success waves-effect waves-success text-dark btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg" data-backdrop="static"
                                data-keyboard="false">دریافت مبلغ</button>

                            <button type="button" class="btn btn-lighten-purple waves-effect waves-purple text-dark btn-sm" data-toggle="modal" data-target="#debitModal" data-backdrop="static"
                                data-keyboard="false">ثبت هزینه </button>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="patient_id" value="{{ $patient->id }}">
                        <div class="table-responsive">

                            <table id="patientPayment_table" class=" table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>هزینه ها</th>
                                        <th>پرداخت ها</th>
                                        <th>تاریخ</th>
                                        <th>توضیحات</th>
                                        <th>ویرایش</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-6">
                        <div class="clearfix mt-4">
                            <h5 class="small text-dark">شرایط و ضوابط پرداخت</h5>

                            <small>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در
                                شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها
                                شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                                ایجاد کرد.
                            </small>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6 offset-xl-3">
                        <p class="text-right"><b>مجموع:</b> 2930.00</p>
                        <p class="text-right">تخفیف: 12.9%</p>
                        <p class="text-right">مالیات: 12.9%</p>
                        <hr>
                        <h3 class="text-right">2930 دلار</h3>
                    </div>
                </div>
                <hr>
                <div class="d-print-none">
                    <div class="float-right">
                        <a href="javascript:window.print()" class="btn btn-secondary waves-effect waves-light"><i class="fa fa-print"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="myLargeModalLabel">ثبت مبلغ دریافتی</p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- -----------------------------FORM------------------------- --}}
                    <form id="creditForm" data-action="{{ route('patientPayment.saveCredit') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <input type="hidden" id="patient" value="{{ $patient->id }}">
                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">مبلغ دریافتی :</label>
                            <div class="col-sm-10">
                                <input type="number" id="credit" name="credit" class="form-control" placeholder="مبلغ دریافتی را وارد کنید">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">تاریخ :</label>
                            <div class="col-sm-10">
                                <input type="text" id="creditDate" name="date" class="form-control pdpBig" placeholder="تاریخ ثبت مبلغ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">توضیحات :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="creditDescription" name="description" rows="5" id="example-textarea"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="creditClosemodal" class="btn btn-danger" data-dismiss="modal">بستن</button>
                            <button type="submit" id="saveCredit" class="btn btn-success">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- ------------------------------------------------------------------------------------------------------------------------------------------------ --}}

    <!--  Modal content for the above example -->
    <div class="modal fade debitModal" id="debitModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="myLargeModalLabel">ثبت هزینه بیمار </p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- -----------------------------FORM------------------------- --}}
                    <form id="debitForm" data-action="{{ route('patientPayment.saveDebit') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <input type="hidden" id="patient" value="{{ $patient->id }}">
                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">مبلغ هزینه :</label>
                            <div class="col-sm-10">
                                <input type="number" id="debit" name="debit" class="form-control" placeholder="مبلغ دریافتی را وارد کنید">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">تاریخ :</label>
                            <div class="col-sm-10">
                                <input type="text" id="debitDate" name="date" class="form-control pdpBig" placeholder="تاریخ ثبت مبلغ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">توضیحات :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="debitDescription" name="description" rows="5" id="example-textarea"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="debitClosemodal" class="btn btn-danger" data-dismiss="modal">بستن</button>
                            <button type="submit" id="saveDebit" class="btn btn-success">ذخیره</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- ----------------------------------------------------------Edit Modal Form---------------------------------------------------------------- --}}
    <!--  Modal content for the above example -->
    <div class="modal fade editModal" id="editPaymentModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="myLargeModalLabel">فرم ویرایش مبلغ</p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- -----------------------------FORM------------------------- --}}
                    <form id="debitForm" data-action="{{ route('patientPayment.showData') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="dataToken" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" id="patientPayment">
                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">هزینه :</label>
                            <div class="col-sm-10">
                                <input type="number" id="editDebit" class="form-control" placeholder="مبلغ دریافتی را وارد کنید">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">دریافتی :</label>
                            <div class="col-sm-10">
                                <input type="number" id="editCredit" class="form-control" placeholder="مبلغ دریافتی را وارد کنید">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">تاریخ :</label>
                            <div class="col-sm-10">
                                <input type="text" id="editDate" class="form-control pdpBig" placeholder="تاریخ ثبت مبلغ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2  col-form-label" for="example-input-normal">توضیحات :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="editDescription" rows="5" id="example-textarea"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="editClosemodal" class="btn btn-danger" data-dismiss="modal">بستن</button>
                            <button type="submit" id="saveedit" class="btn btn-success">ذخیره</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
