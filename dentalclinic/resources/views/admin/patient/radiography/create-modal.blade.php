    <div class="modal fade bs-example-modal-xl" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="myLargeModalLabel">ثبت عکس رادیوگرافی</p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="col-xl-12">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a href="#permanent" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">دندان های دائمی</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#milk" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">دندان های شیری</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="permanent">

                                <form role="form" action="{{ route('radiography.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    {{-- Permanent Teeth --}}
                                    @include('admin.layout.partials.dental-chart')

                                    <div class="form-group">
                                        <label for="discription">توضیحات:</label>
                                        <input type="text" class="form-control" id="discription">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">عکس</label>
                                        <input type="file" id="fileInput" accept="image/*"
                                            onchange="previewImage(event)">
                                    </div>
                                    <div class="text-left" id="image-container">
                                        <img id="preview-image">
                                    </div>
                                    <br>

                                    <button
                                        type="submit"class="btn btn-success waves-effect waves-light width-lg">ذخیره</button>
                                </form>
                            </div>

                            {{-- Milk Teeth --}}
                            <div role="tabpanel" class="tab-pane fade" id="milk">
                                <form role="form" action="{{ route('radiography.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    {{-- Milk Teeth --}}
                                    @include('admin.layout.partials.dentalMilk-chart')
                                    <div class="form-group">
                                        <label for="discription">توضیحات:</label>
                                        <input type="text" class="form-control" id="discription">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">عکس</label>
                                        <input type="file" id="fileInput2" accept="image/*"
                                            onchange="previewImage(event)">
                                    </div>
                                    <div class="text-left" id="image-container2">
                                        <img id="preview-image2">
                                    </div>
                                    <br>

                                    <button type="submit"
                                        class="btn btn-success waves-effect waves-light width-lg">ذخیره</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
