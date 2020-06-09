// Basic syntax is: $(selector).action()

// You can initialize jquery with:
// $
// JQuery
// $(document).ready(function () {
//
//     // jQuery methods go here...
//
// })

// JQuery selectors:

// The element selector:
jQuery("h1").click(function () {
    alert("Hello! I am a h1!!");
});
// The #id selector:
$(document).ready(function () {

    $("#red").click(function () {
        alert("Hello! I am a div with an id!!");
    });

})

$("#red").click(function () {
    alert("Hello! I am a div with an id!!");
});
// The .class selector:
$(".red").click(function () {
    alert("Hello! I am a div with a class!!");
});
