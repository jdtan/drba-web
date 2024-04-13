(function ($) {
  "use strict";
  $(document).ready(function () {
    const db = firebase.firestore();

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
        return result;
      });
    };
    const retrieveGroups = (db, groupList = {}) => {
      // if (collectionName) {
      return readData(db.collection("Groups")).then((res) => {
        // return populateGroupList(res, groupList);
        for (const [key, val] of Object.entries(res)) {
          if (!(key in groupList)) {
            groupList[key] = val["Group Name"];
          }
        }
        return groupList;
      });
      // }
    };

    // var bigGroup;
    // console.log('db', db);
    // retrieveGroups(db).then((group_res) => {
    //   console.log('biggroup in promis', group_res)
    //   bigGroup = group_res;
    // });
    // console.log('big group', bigGroup);

    // const collectionName = "Newsfeed";
    // const collectionName = "Events";


    // const populateGroupList = (res, groupList) => {
    //   for (const [key, val] of Object.entries(res)) {
    //     if (!(key in groupList)) {
    //       groupList[key] = val['Group Name'];
    //     }
    //   }
    //   console.log('grouplist', groupList);
    //   return groupList;
    // }


    const formatDate = (date, weekday = false) => {
      let options = {
        ...(weekday && {weekday: "short"}),
        month: "numeric",
        day: "numeric",
        year: "numeric"
      };
      let d = new Date(date.toDate());
      return d.toLocaleDateString("en-US", options);
      // return d;
    };

    const formatDateRange = (startDate, endDate) => {
      let startDateObj = new Date(startDate.toDate());
      let endDateObj = new Date(endDate.toDate());

      let sameDay = (startDateObj.getDate() === endDateObj.getDate()
        && startDateObj.getMonth() === endDateObj.getMonth()
        && startDateObj.getFullYear() === endDateObj.getFullYear()
      );

      return `${formatDate(startDate, true)}${sameDay ? "" : " - " + formatDate(endDate, true)}`;
    };

    const formatTime = (startTime, endTime) => {
      let startTimeObj = new Date(startTime.toDate());
      let endTimeObj = new Date(endTime.toDate());

      let options = {hour: "numeric", minute: "numeric"};

      startTimeObj = startTimeObj.toLocaleTimeString("en-US", options);
      endTimeObj = endTimeObj.toLocaleTimeString("en-US", options);
      return `${startTimeObj} - ${endTimeObj}`;
    };


    // var fb_data = [];
    // var groupList = {};

    const organizeData = (res, collection = "Events", groups = {}) => {
      let fb_data = [];
      let pos = 0;
      // let group_name = "";
      const CategoryID = {
        // Events: 5,
        Events: 1,
        Newsfeed: 6,
        UnCategorized: 1,
      };
      const getGroupName = (group_id) => {
        if (collection === "Events") {
          if (group_id in groups) {
            return groups[group_id];
          } else {
            return retrieveGroups(db, groups).then((group_res) => {
              groups = group_res;
              return group_res[group_id];
            });
          }
        }
        return "";
      };

      let cnt = 0;
      for (const val of Object.values(res)) {

        // if (collection === "Events") {
        //   if (val["Group ID"] in groupList) {
        //     console.log("1", groupList[val["Group ID"]]);
        //     group_name = groupList[val["Group ID"]];
        //   } else {
        //     retrieveGroups(db, groupList).then((group_res) => {
        //       console.log("2", group_res[val["Group ID"]]);
        //       groupList = group_res;
        //       group_name = group_res[val["Group ID"]];
        //     });
        //   }
        // }
        fb_data.push({
          image: val["imageLink"],
          category: CategoryID[collection] ? CategoryID[collection] : 1,
        });

        if (collection === "Newsfeed") {
          // fb_data["news"] = val["News Name"];
          fb_data[pos] = {
            ...fb_data[pos],
            news: val["News Name"],
            story: val["Story"],
            date: formatDate(val["Time"])
          };
        } else if (collection === "Events") {
          fb_data[pos] = {
            ...fb_data[pos],
            name: val["Event Name"],
            description: val["Description"],
            date: formatDateRange(val["Time"], val["End Time"]),
            time: formatTime(val["Time"], val["End Time"]),
            group: getGroupName(val["Group ID"]),
            likes: val["Likes"],
            going: val["Student Name"].length,
            online: val["Is online"],
            link: val["Link"],
            location: val["Location"],
          };
        }
        pos += 1;

        // cnt += 1;
        // if (cnt === 3) {
        //   break;
        // }
        break;
      }
      return fb_data;
    };


    const retrieveCollection = (db, collectionName, groupList = {}) => {
      // let cData = {};
      if (collectionName) {
        return readData(db.collection(collectionName)).then((res) => {
          console.log("res", res);
          if (collectionName === "Events" || collectionName === "Newsfeed") {
            return organizeData(res, collectionName, groupList);
          }
        });
      }
      // return cData;
    };


    // retrieveCollection(db, "Events");
    // retrieveCollection(db, "Groups");


    $("#firebase-plugin-button").click(function (e) {
      retrieveGroups(db).then((group_res) => {
        // console.log('biggroup in promis', group_res)
        // bigGroup = group_res;
        retrieveCollection(db, "Events", group_res).then((send_data) => {
          console.log("senddata", send_data);
          if (send_data) {
            $.ajax({
              url: "/wp-admin/admin-ajax.php",
              type: "POST",
              data: {
                action: "get_fb_data",
                db_data: JSON.stringify(send_data),
              },
            })
              .success(function (res) {
                console.log("success");
                console.log(res);
              })
              .fail(function (res) {
                console.log("fail");
                console.log(res);
              })
              .done(function (res) {
                console.log("done");
                console.log(res);
              });
          }

        });

      });
      // console.log("clicked", fb_data);
      // console.log("date", fb_data[0]["date"]);

      // console.log('fb_data', fb_data);
      // let gList = retrieveCollection(db, "Groups");

      // $.ajax({
      //   url: "/wp-admin/admin-ajax.php",
      //   type: "POST",
      //
      //   data: {
      //     action: "get_fb_data",
      //     db_data: JSON.stringify(fb_data),
      //     // db_data: JSON.stringify({ data1: "data1", data2: "data2" }),
      //   },
      // })
      //   .success(function (res) {
      //     console.log("success");
      //   })
      //   .fail(function (res) {
      //     console.log("fail");
      //     console.log(res);
      //   })
      //   .done(function (res) {
      //     console.log("done");
      //     console.log(res);
      //   });

      e.preventDefault();
    });

  });
})(jQuery);
