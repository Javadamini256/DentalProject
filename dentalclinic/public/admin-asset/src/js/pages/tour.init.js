
/*
Template Name: Adminto - قالب مدیریتی واکنش گرا
Author: CoderThemes
File: Tour init js
*/

$(document).ready(function () {

    // Define the tour!
    var tour = {
        id: "my-intro",
        steps: [
            {
                target: "logo-tour",
                title: "Logo Here",
                content: "لورم ایپسوم متنی ساختگی است.",
                placement: 'bottom',
                yOffset: 15,
                zindex: 999
            },
            {
                target: 'heading-title-tour',
                title: "متن عنوان",
                content: "لورم ایپسوم متنی ساختگی است.",
                placement: 'top',
                zindex: 999
            },
            {
                target: 'blockquote-title-tour',
                title: "Blockquotes",
                content: "لورم ایپسوم متنی ساختگی است.",
                placement: 'bottom',
                zindex: 999
            },
            {
                target: 'thankyou-tour',
                title: "متشکریم!",
                content: "لورم ایپسوم متنی ساختگی است.",
                placement: 'top',
                zindex: 999
            }
        ],
        showPrevButton: true
    };

    // Start the tour!
    hopscotch.startTour(tour);
});
