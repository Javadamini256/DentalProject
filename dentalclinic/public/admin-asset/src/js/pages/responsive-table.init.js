
/*
Template Name: Adminto - قالب مدیریتی واکنش گرا
Author: CoderThemes
File: Responsive tables init js
*/

!function($) {
    "use strict";

    var ResponsiveTable = function() {};

    ResponsiveTable.prototype.init = function () {
        $('.table-rep-plugin').responsiveTable('update');
    },
    $.ResponsiveTable = new ResponsiveTable, $.ResponsiveTable.Constructor = ResponsiveTable

}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.ResponsiveTable.init()
}(window.jQuery);