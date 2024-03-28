/*
Template Name: Adminto - قالب مدیریتی واکنش گرا
Author: CoderThemes
File: draggable init js
*/

$(function () {
    // sortable
    $(".sortable").sortable({
        connectWith: '.sortable',
        items: '.card-draggable',
        revert: true,
        placeholder: 'card-draggable-placeholder',
        forcePlaceholderSize: true,
        opacity: 0.77,
        cursor: 'move'
    });
});