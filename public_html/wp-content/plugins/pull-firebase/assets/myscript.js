(function ($) {
  "use strict";
  $(document).ready(function () {
    const db = firebase.firestore();
    const collectionName = "Newsfeed";
    // const collectionName = "Events";

    const readData = (dbCollection) => {
      // db.collection(collectionName)
      return dbCollection.get().then((querySnapshot) => {
        let result = {};
        querySnapshot.forEach((doc) => {
          result[doc.id] = doc.data();
        });
        if (Object.keys(result).length === 0) {
          result["error"] = "No results found.";
        }
        // appendData(collectionName, result, listElemnt)
        console.log("results", result);
        return result;
      });
    };
    const formatDate = (date) => {
      let d = new Date(date.toDate());
      return d.toLocaleDateString("en-CA");
      // return d;
    };
    var fb_data = [];
    if (collectionName) {
      readData(db.collection(collectionName)).then((res) => {
        // console.log("res", res);
        for (const val of Object.values(res)) {
          console.log(val);
          console.log(val["News Name"]);
          // fb_data["news"] = val["News Name"];
          fb_data.push({
            news: val["News Name"],
            story: val["Story"],
            date: formatDate(val["Time"]),
            image: val["imageLink"],
          });
          // break;
        }
      });
    }

    console.log("check", fb_data);

    console.log(db);
    $("#firebase-plugin-button").click(function (e) {
      console.log("clicked", fb_data);
      console.log("date", fb_data[0]["date"]);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",

        data: {
          action: "get_fb_data",
          db_data: JSON.stringify(fb_data),
          // db_data: JSON.stringify({ data1: "data1", data2: "data2" }),
        },
      })
        .success(function (res) {
          console.log("success");
        })
        .fail(function (res) {
          console.log("fail");
          console.log(res);
        })
        .done(function (res) {
          console.log("done");
          console.log(res);
        });
      e.preventDefault();
    });
    console.log("before post");
  });
})(jQuery);
