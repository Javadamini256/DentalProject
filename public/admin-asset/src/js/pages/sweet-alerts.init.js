/*
Template Name: Adminto - قالب مدیریتی واکنش گرا
Author: CoderThemes
File: Sweet Alerts init js
*/

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {
        

        //Basic
        $('#sa-basic').on('click', function () {
            Swal.fire({
                title: 'لورم ایپسوم متنی ساختگی!',
                confirmButtonClass: 'btn btn-confirm mt-2'
            })
        });

        //A title with a text under
        $('#sa-title').click(function () {
            Swal.fire(
                {
                    title: "اینترنت؟",
                    text: 'مگه هنوز هست؟',
                    type: 'question',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }
            )
        });

        //Success Message
        $('#sa-success').click(function () {
            Swal.fire(
                {
                    title: 'کارت خوب بود!',
                    text: 'روی دکمه کلیک کردی!',
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }
            )
        });

        //Error Message
        $('#sa-error').click(function () {
            Swal.fire({
                type: 'error',
                title: 'اوپس...',
                text: 'یه چیزی اشتباهه!',
                confirmButtonClass: 'btn btn-confirm mt-2',
                footer: '<a href="">با این مشکل چکار کنم؟</a>'
            })
        });

        //Long content image
        $('#sa-long-content').click(function () {
            Swal.fire({
                imageUrl: 'https://placeholder.pics/svg/300x1500',
                imageHeight: 1500,
                imageAlt: 'یک تصویر طولانی',
                confirmButtonClass: 'btn btn-confirm mt-2',
            })
        });

        //Custom Position
        $('#sa-custom-position').click(function () {
            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'کار شما ذخیره شد',
                showConfirmButton: false,
                timer: 1500
            })
        });

        //Warning Message
        $('#sa-warning').click(function () {
            Swal.fire({
                title: "مطمئنی؟",
                text: "این کار قابل بازگشت نیست!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله حذفش کن!"
              }).then(function (result) {
                if (result.value) {
                  Swal.fire("حذف شد!", "فایل شما حذف شد.", "success");
                }
            });
        });


        //Parameter
        $('#sa-params').click(function () {
            Swal.fire({
                title: 'مطمئنی؟',
                text: "این کار قابل بازگشت نیست!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله حذفش کن!',
                cancelButtonText: 'نه لغو کن!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                      title: 'حذف شد!',
                      text: 'فایل شما حذف شد.',
                      type: 'success'
                    })
                  } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    Swal.fire({
                      title: 'لغو شد',
                      text: 'فایل خیالی شما امنه :)',
                      type: 'error'
                    })
                  }
            });
        });

        //Custom Image
        $('#sa-image').click(function () {
            Swal.fire({
                title: 'ادمین تو',
                text: 'قالب مدیریتی واکنش گرا',
                imageUrl: 'assets/images/logo-sm.png',
                imageHeight: 50,
                animation: false,
                confirmButtonClass: 'btn btn-confirm mt-2'
            })
        });

        var timerInterval;

        //Auto Close Timer
        $('#sa-close').click(function () {
            var timerInterval;
            Swal.fire({
            title: 'بسته شدن خودکار هشدار!',
            html: 'من بعد از <strong></strong> ثانیه بسته میشم.',
            timer: 2000,
            onBeforeOpen:function () {
                Swal.showLoading()
                timerInterval = setInterval(function() {
                Swal.getContent().querySelector('strong')
                    .textContent = Swal.getTimerLeft()
                }, 100)
            },
            onClose: function () {
                clearInterval(timerInterval)
            }
            }).then(function (result) {
            if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.timer
            ) {
                console.log('من توسط تایمر بسته شدم')
            }
            })
        });

        //custom html alert
        $('#custom-html-alert').click(function () {
            Swal.fire({
                title: '<u>مثال</u> <i>اچ تی ام ال</i>',
                type: 'info',
                html: 'شما می توانید از <b>متن تو پر</b>، ' +
                '<a href="mailto:ghaemomidi@yahoo.com">لینک ها</a> ' +
                'و تگ های دیگر اچ تی ام ال استفاده کنید.',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: '<i class="mdi mdi-thumb-up-outline"></i> عالی!',
                cancelButtonText: '<i class="mdi mdi-thumb-down-outline"></i>'
            })
        });

        //Custom width padding
        $('#custom-padding-width-alert').click(function () {
            Swal.fire({
                title: 'عرض، پدینگ و پس زمینه دلخواه',
                width: 600,
                padding: 100,
                confirmButtonClass: 'btn btn-confirm mt-2',
                background: '#fff url(//subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/geometry.png)'
            })
        });

        //Ajax
        $('#ajax-alert').click(function () {
            Swal.fire({
                title: 'نام کاربری گیت هاب خود را ارسال کنید',
                input: 'text',
                inputAttributes: {
                  autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'جست و جو',
                showLoaderOnConfirm: true,
                preConfirm: function (login) {
                  return fetch('//api.github.com/users/' + login)
                    .then( function(response) {
                      if (!response.ok) {
                        throw new Error(response.statusText)
                      }
                      return response.json()
                    })
                    .catch(function (error) {
                      Swal.showValidationMessage(
                        'درخواست انجام نشد: ' + error
                      )
                    })
                },
                allowOutsideClick: function() { !Swal.isLoading()}
              }).then(function(result) {
                if (result.value) {
                  Swal.fire({
                    title: "آواتار " + result.value.login,
                    imageUrl: result.value.avatar_url
                  })
                }
              })
        });

        //chaining modal alert
        $('#chaining-alert').click(function () {
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'بعدی &rarr;',
                showCancelButton: true,
                progressSteps: ['1', '2', '3']
              }).queue([
                {
                  title: 'سوال 1',
                  text: 'لورم ایپسوم متنی ساختگی است'
                },
                'سوال 2',
                'سوال 3'
              ]).then( function (result) {
                if (result.value) {
                  Swal.fire({
                    title: 'تمام شد!',
                    html:
                      'پاسخ های شما: <pre><code>' +
                        JSON.stringify(result.value) +
                      '</code></pre>',
                    confirmButtonText: 'دوست داشتنی!'
                  })
                }
              })
        });

        //Danger
        $('#dynamic-alert').click(function () {
            swal.queue([{
                title: 'آی پی پابلیک شما',
                confirmButtonText: 'آی پی منو نشون بده',
                confirmButtonClass: 'btn btn-confirm mt-2',
                text: 'آی پی پابلیک شما با استفاده از درخواست ای جکس دریافت خواهد شد',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        $.get('https://api.ipify.org?format=json')
                            .done(function (data) {
                                swal.insertQueueStep(data.ip)
                                resolve()
                            })
                    })
                }
            }])
        });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);