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
                <form method="POST" action="{{ route('patientPayment.savecredit',['patient'=>$patient])}}" role="form" class="form-horizontal">
                    @method('post')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="example-input-normal">مبلغ دریافتی :</label>
                        <div class="col-sm-10">
                            <input type="number" id="example-input-normal" name="credit" class="form-control"
                                placeholder="مبلغ دریافتی را وارد کنید">
                            @error('registrationDate')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="example-input-normal">تاریخ :</label>
                        <div class="col-sm-10">
                            <input type="text" name="date" class="form-control pdpBig"
                                placeholder="تاریخ ثبت مبلغ">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label" for="example-input-normal">توضیحات :</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" rows="5" id="example-textarea"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2  col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <button type="submit" class="btn btn-info waves-effect width-lg waves-light">
                                    <img src="{{ asset('admin-asset/src/images/save.png') }}" alt=""> ثبت</button>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="form-group">
                </div>
            </div>
        </div>
    </div>
@endsection
