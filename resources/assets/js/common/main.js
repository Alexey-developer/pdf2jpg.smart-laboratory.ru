import $ from "jquery";
window.$ = window.jQuery = $;

require("bootstrap/dist/js/bootstrap.min.js");
// import Inputmask from "inputmask";

$(window).on("load", () => {
    "use strict";

    // Make anchor scroll upper
    //   $('a[href^="#"]').bind('click.smoothscroll', function() {
    //     let target = this.hash;
    //     let $target = $(target);
    //     $('html, body').stop().animate(
    //       {
    //       'scrollTop': $target.offset().top - 0
    //       },
    //       100,
    //       'swing',
    //       () => {
    //         window.location.hash = target;
    //       }
    //     );
    //   });
});
