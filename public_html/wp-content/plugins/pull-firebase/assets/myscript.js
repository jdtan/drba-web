(function ($) {
  "use strict";
  $(document).ready(function () {
    // $("#firebase-plugin-button").on("click", function () {
    //   // $("#firebase-plugin-button").on("click", function () {
    //   // console.log("button pressed");
    //   jQuery.post(
    //     ajaxurl,
    //     { action: "get_fb_data", db_data: "testing data" },
    //     function (data) {
    //       console.log("success??");
    //     }
    //   );
    //   console.log("in function");
    //   // $.ajax({
    //   //   type: "POST",
    //   //   url: "/wp-admin/admin-ajax.php",
    //   //   data: {
    //   //     action: "get_fb_data",
    //   //     db_data: "testing data",
    //   //   },
    //   //   success: function (data) {
    //   //     console.log("success");
    //   //   },
    //   // });
    // });
    $("#firebase-plugin-button").click(function (e) {
      console.log("clicked");
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "GET",
        data: { action: "get_fb_data", db_data: "testing data" },
      })
        .success(function (data) {
          console.log("success");
        })
        .done(function () {
          console.log("done");
        })
        .fail(function () {
          console.log("fail");
        });
    });
    console.log("before post");
  });
})(jQuery);
