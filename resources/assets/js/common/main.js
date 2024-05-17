import $ from "jquery";
window.$ = window.jQuery = $;

require("bootstrap/dist/js/bootstrap.min.js");

$(window).on("load", () => {
    "use strict";

    $("input:file").on("change", function () {
        $("button:submit").attr("disabled", $(this).val() ? false : true);
    });
    $("form").on("submit", function () {
        $("button:submit").attr("disabled", true);
    });
});
