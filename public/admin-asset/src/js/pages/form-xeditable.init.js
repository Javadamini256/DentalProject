
/*
Template Name: Adminto - قالب مدیریتی واکنش گرا
Author: CoderThemes
File: X editable init js
*/

$(function(){

    //modify buttons style
    $.fn.editableform.buttons =
        '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>' +
        '<button type="button" class="btn btn-secondary editable-cancel btn-sm waves-effect"><i class="mdi mdi-close"></i></button>';

    //Inline editables
    $('#inline-username').editable({
        type: 'text',
        pk: 1,
        name: 'username',
        title: 'نام کاربری را وارد کنید',
        mode: 'inline',
        inputclass: 'form-control-sm'
    });

    $('#inline-firstname').editable({
        validate: function(value) {
            if($.trim(value) == '') return 'این زمینه الزامی است';
        },
        mode: 'inline',
        inputclass: 'form-control-sm'
    });

    $('#inline-sex').editable({
        prepend: "انتخاب نشده",
        mode: 'inline',
        source: [
            {value: 1, text: 'مرد'},
            {value: 2, text: 'زن'}
        ],
        inputclass: 'form-control-sm',
        display: function(value, sourceData) {
            var colors = {"": "gray", 1: "green", 2: "blue"},
                elem = $.grep(sourceData, function(o){return o.value == value;});

            if(elem.length) {
                $(this).text(elem[0].text).css("color", colors[value]);
            } else {
                $(this).empty();
            }
        }
    });

    $('#inline-group').editable({
        showbuttons: false,
        mode: 'inline',
        inputclass: 'form-control-sm'
    });

    $('#inline-status').editable({
        mode: 'inline',
        inputclass: 'form-control-sm'
    });

    $('#inline-dob').editable({
        mode: 'inline',
        inputclass: 'form-control-sm'
    });

    $('#inline-event').editable({
        placement: 'right',
        mode: 'inline',
        combodate: {
            firstItem: 'name'
        },
        inputclass: 'form-control-sm'
    });

    $('#inline-comments').editable({
        showbuttons: 'bottom',
        mode: 'inline',
        inputclass: 'form-control-sm'
    });

    $('#inline-fruits').editable({
        pk: 1,
        limit: 3,
        mode: 'inline',
        inputclass: 'form-control-sm',
        source: [
            {value: 1, text: 'موز'},
            {value: 2, text: 'هلو'},
            {value: 3, text: 'سیب'},
            {value: 4, text: 'هندوانه'},
            {value: 5, text: 'پرتقال'}
        ]
    });

    $('#inline-tags').editable({
        inputclass: 'input-large',
        mode: 'inline',
        inputclass: 'form-control-sm',
        select2: {
            tags: ['html', 'javascript', 'css', 'ajax'],
            tokenSeparators: [",", " "]
        }
    });

});