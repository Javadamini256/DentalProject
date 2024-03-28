
/*
Template Name: Adminto - قالب مدیریتی واکنش گرا
Author: CoderThemes
File: Countdown init js
*/

$('[data-countdown]').each(function () {
    var $this = $(this), finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function (event) {
        $(this).html(event.strftime(''
        + '<div class="coming-box">%D <span>روز</span></div> '
        + '<div class="coming-box">%H <span>ساعت</span></div> '
        + '<div class="coming-box">%M <span>دقیقه</span></div> '
        + '<div class="coming-box">%S <span>ثانیه</span></div> '));
    });
});
