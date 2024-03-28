<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
</head>

<body dir="rtl">
    <div class="container">
        <div class="row">
            <h1 class="text-center">Laravel 9 Ajax Datatables Filter</h1>
            <hr>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    {{-- <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Standard</label>
                            </div>
                            <select class="custom-select form-select" id="select_std">
                                <option value="">Choose...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Result</label>
                            </div>
                            <select class="custom-select form-select" id="select_res">
                                <option value="">Choose...</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <div>
                    {{-- <button id="filter" class="btn btn-sm btn-outline-success">Filter</button>
                    <button id="reset_std" class="btn btn-sm btn-outline-success">Reset Standard</button>
                    <button id="reset_res" class="btn btn-sm btn-outline-success">Reset Result</button> --}}
                    <button id="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="display" id="record_table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم و تخلص</th>
                                <th>شماره پرونده</th>
                                <th>شماره تماس</th>
                                <th>تاریخ ثبت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    {{-- <script src="{{ asset('admin-asset/src/js/custome.js') }}"></script> --}}
    <script>
        // function fetch_std() {
        //     $.ajax({
        //         url: "{{ route('standards') }}",
        //         type: "GET",
        //         dataType: "json",
        //         success: function(data) {
        //             var stdBody = "";
        //             for (var key in data) {
        //                 stdBody += `<option value="${data[key]["standard"]}">${data[key]["standard"]}</option>`;
        //             }
        //             $("#select_std").append(stdBody);
        //         },
        //     });
        // }
        // fetch_std();
        // // Fetch Result
        // function fetch_res() {
        //     $.ajax({
        //         url: "{{ route('results') }}",
        //         type: "GET",
        //         dataType: "json",
        //         success: function(data) {
        //             var resBody = "";
        //             for (var key in data) {
        //                 resBody += `<option value="${data[key]["result"]}">${data[key]["result"]}</option>`;
        //             }
        //             $("#select_res").append(resBody);
        //         },
        //     });
        // }
        // fetch_res();
        // Fetch Records
        function fetch() {
            $.ajax({
                url: "{{ route('students/records') }}",
                type: "get",
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $("#record_table").DataTable({
                        data: data.students,
                        responsive: true,
                        columns: [{
                                data: "id",
                                name: "id"
                            },
                            {
                                data: "name",
                                name: "name"
                            },
                            {
                                data: "lastName",
                                name: "lastName"
                            },
                            {
                                data: "created_at",
                                name: "created_at"
                            },
                            {
                                data: "updated_at",
                                name: "updated_at"
                            },
                        ],
                        // columns: [{
                        //         data: "id",
                        //         render: function(data, type, row, meta) {
                        //             return i++;
                        //         },
                        //     },
                        //     {
                        //         data: "name",
                        //         render: function(data, type, row, meta) {
                        //             return `${row.name+' '+row.lastName}`;
                        //         },
                        //     },
                        //     {
                        //         data: "lastName",
                        //         render: function(data, type, row, meta) {
                        //             return `${row.lastName}`;
                        //         },
                        //     },
                        //     {
                        //         data: "phone",
                        //         render: function(data, type, row, meta) {
                        //             return `${row.phone}`;
                        //         },
                        //     },
                        //     {
                        //         data: "phone",
                        //         render: function(data, type, row, meta) {
                        //             return `${row.phone}`;
                        //         },
                        //     },
                        //     {
                        //        data: "phone",
                        //         render: function(data, type, row, meta) {
                        //             return `${row.phone}`;
                        //         }, 
                        //     },
                        // ],
                    });
                },
            });
        }
        fetch();
        // Filter
        // $(document).on("click", "#filter", function(e) {
        //     e.preventDefault();
        //     var std = $("#select_std").val();
        //     var res = $("#select_res").val();
        //     if (std !== "" && res !== "") {
        //         $("#record_table").DataTable().destroy();
        //         fetch(std, res);
        //     } else if (std !== "" && res == "") {
        //         $("#record_table").DataTable().destroy();
        //         fetch(std, "");
        //     } else if (std == "" && res !== "") {
        //         $("#record_table").DataTable().destroy();
        //         fetch("", res);
        //     } else {
        //         $("#record_table").DataTable().destroy();
        //         fetch();
        //     }
        // });
        // // Reset Standard
        // $(document).on("click", "#reset_std", function(e) {
        //     e.preventDefault();
        //     $("#select_std").html(`<option value="">Choose...</option>`);
        //     var res = $("#select_res").val();
        //     if (res == "") {
        //         $("#record_table").DataTable().destroy();
        //         fetch();
        //         fetch_std();
        //     } else {
        //         $("#record_table").DataTable().destroy();
        //         fetch("", res);
        //         fetch_std();
        //     }
        // });
        // // Reset Result
        // $(document).on("click", "#reset_res", function(e) {
        //     e.preventDefault();
        //     $("#select_res").html(`<option value="">Choose...</option>`);
        //     var std = $("#select_std").val();
        //     if (std == "") {
        //         $("#record_table").DataTable().destroy();
        //         fetch();
        //         fetch_res();
        //     } else {
        //         $("#record_table").DataTable().destroy();
        //         fetch(std, "");
        //         fetch_res();
        //     }
        // });
        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#select_std").html(`<option value="">Choose...</option>`);
            $("#select_res").html(`<option value="">Choose...</option>`);
            $("#record_table").DataTable().destroy();
            fetch();
            fetch_std();
            fetch_res();
        });
    </script>
</body>

</html>
