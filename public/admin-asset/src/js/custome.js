
$(".pdpBig").persianDatepicker({
    formatDate: "YYYY-0M-0D",
    theme: 'dark',
    selectedBefore: !0,
    cellWidth: 55,
    cellHeight: 38,
    fontSize: 14,
});


// -----------------------------------Get Data of Patient----------------------------------
$('#customer_table').DataTable({
    // "aLengthMenu": [
    //     [5, 10, 25, -1],
    //     [5, 10, 25, "All"]
    // ],
    // "iDisplayLength": 10,

    "language": {
        "sProcessing": "در حال جستجو ...",
        "sLengthMenu": "نمایش _MENU_ مورد",
        "sZeroRecords": "هیچ موردی یافت نشد",
        "sInfo": "نمایش _START_ تا _END_  از _TOTAL_ مورد",
        "sInfoEmpty": "نمایش 0 از 0 تا  0 مورد",
        "sInfoFiltered": "(فیلتر شده از_MAX_ مورد)",
        "sInfoPostFix": "",
        "sSearch": "جستجو:",
        "sUrl": "",
        "oPaginate": {
            "sFirst": "اول",
            "sPrevious": "قبلی",
            "sNext": "بعدی",
            "sLast": "اخر"
        }
    },
    "processing": true,
    "order": [
        [0, 'desc']
    ],
    "serverSide": true,
    "ajax": "Patient/getData",
    "columns": [{
        "data": "id",
        render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },
    {
        data: 'name',
    },
    {
        data: 'lastName'
    },
    {
        data: 'phone'
    },
    {
        data: 'age'
    },
    {
        data: 'status',
        data: function (data, type, row, meta) {
            if (data.status == 1) {
                return '<span class="badge badge-success status-patient">فعال</span>';
            }
            return '<span class="badge badge-danger status-patient">غیرفعال</span>';
        }
    },

    {
        data: 'registrationDate'
    },
    {
        data: 'action',
        orderable: false,
        searchable: false
    },
    ]
});



// ---------------------------------------------Add New Patient fast------------------------------
var form = '#patientForm';

$("#savePatient").click(function (event) {
    event.preventDefault();
    var name = $("#name").val();
    var lastName = $("#lastName").val();
    var phone = $("#phone").val();
    var registrationDate = $("#registrationDate").val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: "Patient/newPatient",
        method: 'post',
        type: 'json',
        data: {
            name: name,
            lastName: lastName,
            phone: phone,
            registrationDate: registrationDate,
            _token: _token
        },
        success: function (response) {
            // $('#newPatientModal').modal('hide');
            $(form).trigger("reset");
            $('#customer_table').DataTable().ajax.reload();
        },
        error: function (response) {
            console.log('errrrror');
        }
    });
});


// // ----------------------------------------------------------  delete patient ajax request------------------------------------
$(document).on('click', '.deleteIcon', function (e) {
    e.preventDefault();
    let id = $(this).attr('id');
    Swal.fire({
        title: 'آیا از حذف این بیمار مطمئن هستید؟',
        text: "این کار قابل بازگشت نیست",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#17a2b7',
        cancelButtonColor: '#ff4c4c',
        confirmButtonText: 'بله, حذف کن!'

    }).then((result) => {

        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "Patient/delete",
                method: 'delete',
                data: {
                    id: id,

                },
                success: function (response) {

                    console.log(response);
                    Swal.fire(
                        'حذف شد!',
                        'این بیمار با موفقیت حذف گردید.',
                        'success'
                    )
                    $('#customer_table').DataTable().ajax.reload();
                }
            });
        } else {
            result.dismiss === Swal.DismissReason.cancel &&
                Swal.fire({
                    title: "لغو شد",
                    text: "بیمار انتخاب شده حذف نگردید:)",
                    type: "error",
                });
        }
    })
});

// --------------------------------------------Patien Payment Table--------------------------------------
var id = $("#patient_id").val();
$('#patientPayment_table').DataTable({
    "processing": true,
    "serverSide": true,
    "searching": false,
    "paging": false,
    "ajax": {
        "url": route('patientPayment.data'),
        "data": {
            "id": id
        }
    },
    columns: [
        {
            "data": "id",
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'debit'
        },
        {
            data: 'credit'
        },
        {
            data: 'date'
        },
        {
            data: 'description'
        },
        {
            data: 'action'
        },
    ]

});


// --------------------------------------- Save Debit payment Modal --------------------------
var debitForm = '#debitForm';
var table = '#paymentTable';
var modal = '#debitModal';

$(debitForm).on('submit', function (event) {
    event.preventDefault();

    var patient = $("#patient").val();
    var debit = $("#debit").val();
    var debitDate = $("#debitDate").val();
    var description = $("#debitDescription").val();
    let _token = $("input[name=_token]").val();
    var url = $(this).attr('data-action');

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            patient_id: patient,
            // credit: 0,
            debit: debit,
            date: debitDate,
            description: description,
            _token: _token
        },
        dataType: 'JSON',

        success: function (response) {
            $('#patientPayment_table').DataTable().ajax.reload();
            $('#debitClosemodal').click();
        },
        error: function (response) {
            alert('errorr');
        }
    });
});


// --------------------------------------- Save Credit payment Modal --------------------------
var creditForm = '#creditForm';
// var table = '#paymentTable';
// var modal = '#debitModal';

$(creditForm).on('submit', function (e) {
    e.preventDefault();

    var patient = $("#patient").val();
    var credit = $("#credit").val();
    var creditDate = $("#creditDate").val();
    var description = $("#creditDescription").val();
    let _token = $("input[name=_token]").val();
    var url = $(this).attr('data-action');

    if (credit) {
        $.ajax({
            url: url,
            method: 'POST',
            // data: new FormData(this),
            data: {
                patient_id: patient,
                credit: credit,
                // debit: debit,
                date: creditDate,
                description: description,
                _token: _token
            },
            dataType: 'JSON',

            success: function (response) {
                $('#patientPayment_table').DataTable().ajax.reload();
                $('#creditClosemodal').click();
            },
            error: function (response) {
                console.log('errrrrrrrrror');

            }
        });
    } else {
        alert('مقدار مبلغ را لطفا وارد کنید!');

    }

});





// ----------------------------------------Delete Payment Patient ----------------------------
$(document).on('click', '.deletePayment', function (event) {
    // alert('test');
    event.preventDefault();

    var id = $(this).attr('id');
    console.log(id);
    let csrf = '{{ csrf_token() }}';
    Swal.fire({
        title: 'آیا از حذف این مبلغ مطمئن هستید؟',
        text: "این کار قابل بازگشت نیست",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#17a2b7',
        cancelButtonColor: '#ff4c4c',
        confirmButtonText: 'بله, حذف کن!'

    }).then((result) => {

        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route('patientPayment.delete'),
                method: 'delete',
                data: {
                    id: id,

                },
                success: function (response) {

                    console.log(response);
                    $('#patientPayment_table').DataTable().ajax
                        .reload();
                    Swal.fire(
                        'حذف شد!',
                        'این ردیف با موفقیت حذف گردید.',
                        'success'
                    )
                    // $('#customer_table').DataTable().ajax.reload();
                }
            });
        } else {
            result.dismiss === Swal.DismissReason.cancel &&
                Swal.fire({
                    title: "لغو شد",
                    text: "مبلغ انتخاب شده حذف نگردید:)",
                    type: "error",
                });
        }
    })
});

$(document).on('click', '.editPayment', function (event) {
    var getId = $(this).data('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: route('patientPayment.showDetails'),
        method: 'POST',
        // data: new FormData(this),
        data: {
            id: getId,

        },
        dataType: 'JSON',

        success: function (response) {
            jQuery.noConflict();
            $('#editPaymentModal').modal('toggle');
        },
        error: function (response) {
            console.log('errrrrrrrrror');

        }
    });
    console.log(getId);

});
