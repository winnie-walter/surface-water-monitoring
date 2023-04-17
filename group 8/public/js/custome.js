// var elements = document.getElementsByClassName("luke");

// for(var i = 0; i < elements.length; i++) {
//     var element = elements[i];
//     element.onclick = function() {
//         var parent = document.getElementById("parent");
//         localStorage.setItem("data", parent);
//         var get = localStorage.getItem("data");
//         // get.classList.remove("menu-open");
//         get.classList.add("menu-open");
//     };
// };


$(function () {
    var params = window.location.pathname;
    params = params.toLowerCase();

    if (params != "/") {
        $(".nav-sidebar li a").each(function (i) {
            var obj = this;
            var url = $(this).attr("href");
            if (url == "" || url == "#") {
                return true;
            }
            url = url.toLowerCase();
            if (url.indexOf(params) > -1) {
                $(this).parent().addClass("active open menu-open");
                $(this).parent().parent().addClass("active open menu-open");
                $(this).parent().parent().parent().addClass("active open menu-open");
                $(this).parent().parent().parent().parent().addClass("active open menu-open");
                $(this).parent().parent().parent().parent().parent().addClass("active open menu-open");
                return false;
            }
        });
    }
});

