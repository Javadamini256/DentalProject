<div class="row">
    <div class="col-lg-12">
        <div class="card-box main-row" style="border-radius: 10px;">
            <div class="col-xl-12">
                <h5 class="mb-2 pt-2 pb-2 pl-2 rounded border" style="background: #EEF5FF;">اطلاعات و تداوی بیمار</h5>
                <ul class="nav nav-tabs ">
                    <li class="nav-item" active>
                        <a href="#information" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">اطلاعات</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#radiography" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">رادیوگرافی</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#photography" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">فتوگرافی</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#finance" data-toggle="tab" aria-expanded="true" class="nav-link">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">حسابداری</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#reservation" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">ملاقات ها</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                            <a href="#perio" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">پریو</span>
                            </a>
                        </li> --}}
                    {{-- <li class="nav-item">
                            <a href="#operation" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">جراحی</span>
                            </a>
                        </li> --}}
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active show" id="information">
                        <h5>اطلاعات بیمار</h5>


                        <div class="text-left d-inline-block">
                            <hr width="100%" size="1" noshade align="center">
                            <br>
                            <p class="text-muted font-13"><strong>پدر:</strong> <span
                                    class="ml-2">{{ $patient->fatherName }}</span>
                            </p>

                            <p class="text-muted font-13"><strong>تذکره:</strong><span
                                    class="ml-2">{{ $patient->IDNumber }}</span></p>

                            <p class="text-muted font-13"><strong>تاریخ معاینه:</strong> <span
                                    class="ml-2">{{ $patient->registrationDate }}</span></p>

                            <p class="text-muted font-13"><strong>تاهل:</strong> <span class="ml-2">
                                    @if ($patient->marriage == 1)
                                        متاهل
                                    @else
                                        مجرد
                                    @endif
                                </span></p>
                            <p class="text-muted font-13"><strong>جنسیت:</strong> <span class="ml-2">
                                    @if ($patient->gendeer == 1)
                                        مرد
                                    @else
                                        زن
                                    @endif
                                </span></p>
                            <p class="text-muted font-13"><strong>بارداری:</strong> <span class="ml-2">
                                    @if ($patient->pregnant == 1)
                                        باردار
                                    @else
                                        خیر
                                    @endif
                                </span></p>
                            <p class="text-muted font-13"><strong>تحصیلات:</strong> <span class="ml-2">
                                    {{ $patient->education }}
                                </span></p>
                        </div>
                        <div class=" d-inline-block center-float">
                            <hr width="80%" size="1" noshade align="center">
                            <br>
                            <p class="text-muted font-13"><strong>گروه خونی:</strong> <span
                                    class="ml-2">{{ $patient->bloodType }}</span>
                            </p>
                            <p class="text-muted font-13"><strong>سابقه جراحی:</strong><span
                                    class="ml-2">{{ $patient->surgeryHistory }}</span></p>

                            <p class="text-muted font-13"><strong>بیماری سیستمیک :</strong> <span class="ml-2">
                                    @if ($patient->systemic_id)
                                        {{ $patient->systemic->title }}
                                    @else
                                        ندارد
                                    @endif
                                </span></p>

                            <p class="text-muted font-13"><strong>شرح بیماری:</strong> <span class="ml-2">
                                    {{ $patient->systemicDisease_description }}
                                </span></p>
                            <p class="text-muted font-13"><strong>آدرس:</strong> <span class="ml-2">
                                    {{ $patient->address }}
                                </span></p>

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="radiography">
                        <button class="btn btn-success waves-effect waves-light" data-toggle="modal"
                            data-target=".bs-example-modal-xl">افزودن</button>

                        <ul class="radiography-ul">
                            <li>
                                <a class="radiography-a" href="{{ $patient->image }}">
                                    <figure>
                                        <img class="radiography-img" src='{{ $patient->image }}'
                                            alt='Volcano and lava field against a stormy sky'>
                                        <figcaption>{{ $patient->name }}</figcaption>
                                    </figure>
                                </a>

                            </li>
                            <li>
                                <a class="radiography-a" href="{{ $patient->image }}">
                                    <figure>
                                        <img class="radiography-img" src='{{ $patient->image }}'
                                            alt='Guy on a bike ok a wooden bridge with a forest backdrop'>
                                        <figcaption>{{ $patient->lastName }}</figcaption>
                                    </figure>
                                </a>
                            </li>
                            <li>
                                <a class="radiography-a" href="{{ $patient->image }}">
                                    <figure>
                                        <img class="radiography-img" src='{{ $patient->image }}'
                                            alt='Person standing alone in a misty forest'>
                                        <figcaption>{{ $patient->fatherName }}</figcaption>
                                    </figure>
                                </a>
                            </li>

                        </ul>
                        <!-- partial -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="photography">
                        <p>photography</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="finance">
                        <p>finance</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="reservation">
                        <p>reservation</p>
                    </div>
                    {{-- <div role="tabpanel" class="tab-pane fade" id="operation">
                            <p>operation</p>
                        </div> --}}
                </div>
            </div>

        </div>
    </div><!-- end col -->
</div>
