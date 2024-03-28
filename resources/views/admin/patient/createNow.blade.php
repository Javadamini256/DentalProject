
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="newPatientModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">ثبت بیمار جدید</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="patientForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">اسم:</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="نام بیمار را وارد کنید">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName" class="col-form-label">تخلص:</label>
                            <input type="text" name="lastName" class="form-control" id="lastName"
                                placeholder="تخلص بیمار را وارد کنید">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" class="col-form-label">تماس :</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="شماره تماس را وارد کنید">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="registrationDate" class="col-form-label persianDate">تاریخ ثبت:</label>
                            <input type="text" name="registrationDate" class="form-control pdpBig"
                                id="registrationDate" placeholder="تاریخ ثبت بیمار">
                        </div>
                        {{-- <button type="submit" id="savePatient" class="btn btn-info waves-effect width-lg waves-light">
                            <img src="{{ asset('admin-asset/src/images/save.png') }}" alt=""> ثبت</button>

                        <button type="button" id="savePatient">save</button> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                <button type="submit" id="savePatient" class="btn btn-success">ذخیره</button>
            </div>
        </div>
    </div>
</div>
