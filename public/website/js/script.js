// password visible and not visibleStart
$(document).ready(function() {
    $(".input_box_zee i").on("click", function() {
        // alert('this');
        var passInput = $("#password_field");
        if (passInput.attr("type") === "password") {
            passInput.attr("type", "text");
        } else {
            passInput.attr("type", "password");
        }
    });
});
$(document).ready(function() {
    $(".signUpinput_box_zee i").on("click", function() {
        // alert('this');
        var passInput = $("#password_field_signUp");
        if (passInput.attr("type") === "password") {
            passInput.attr("type", "text");
        } else {
            passInput.attr("type", "password");
        }
    });
});

// password visible and not visibleENd
$("#property").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
        },
        600: {
            items: 3,
            nav: false,
        },
        1000: {
            items: 4,
            nav: true,
            loop: true,
        },
    },
});
$("#news_slider").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
        },
        600: {
            items: 1,
            nav: false,
        },
        1000: {
            items: 2,
            nav: true,
            loop: true,
        },
    },
});
$("#guide_slider").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 2,
            nav: true,
            loop: true,
        },
    },
});

$(".share_pannel span:nth-child(1) i").click(function() {
    $(document).find(".hover_social_link").toggleClass("visible_link");
});

$(document).ready(function() {
    $("#tabs_gs li a:first").addClass("active");
    $(".get_contenter").hide();
    $(".get_contenter:first").show();
    $("#tabs_gs li a").click(function() {
        var t = $(this).attr("id");
        $("#tabs_gs li a").removeClass("active");
        $(this).addClass("active");
        $(".get_contenter").hide();
        $("#" + t + "C").fadeIn("slow");
    });
});
$(document).ready(function() {
    $("#tabs_gs_1 li a:first").addClass("active");
    $(".get_contenter_1").hide();
    $(".get_contenter_1:first").show();
    $("#tabs_gs_1 li a").click(function() {
        var t = $(this).attr("id");
        $("#tabs_gs_1 li a").removeClass("active");
        $(this).addClass("active");
        $(".get_contenter_1").hide();
        $("#" + t + "C").fadeIn("slow");
    });
});
$(document).ready(function() {
    $("#tabs_gs_100 li a:first").addClass("active");
    $(".get_contenter_100").hide();
    $(".get_contenter_100:first").show();
    $("#tabs_gs_100 li a").click(function() {
        var t = $(this).attr("id");
        $("#tabs_gs_100 li a").removeClass("active");
        $(this).addClass("active");
        $(".get_contenter_100").hide();
        $("#" + t + "C").fadeIn("slow");
    });
});
$(document).ready(function() {
    $("#tabs_gs_22 li a:first").addClass("active");
    $(".get_contenter_1000").hide();
    $(".get_contenter_1000:first").show();
    $("#tabs_gs_22 li a").click(function() {
        var t = $(this).attr("id");
        $("#tabs_gs_22 li a").removeClass("active");
        $(this).addClass("active");
        $(".get_contenter_1000").hide();
        $("#" + t + "C").fadeIn("slow");
    });
});
$(document).ready(function() {
    $("#tabs_gs_33 li a:first").addClass("active");
    $(".get_contenter_33").hide();
    $(".get_contenter_33:first").show();
    $("#tabs_gs_33 li a").click(function() {
        var t = $(this).attr("id");
        $("#tabs_gs_33 li a").removeClass("active");
        $(this).addClass("active");
        $(".get_contenter_33").hide();
        $("#" + t + "C").fadeIn("slow");
    });
});
$(document).ready(function() {
    $("#tabs_gs_44 li a:first").addClass("active");
    $(".get_contenter_44").hide();
    $(".get_contenter_44:first").show();
    $("#tabs_gs_44 li a").click(function() {
        var t = $(this).attr("id");
        $("#tabs_gs_44 li a").removeClass("active");
        $(this).addClass("active");
        $(".get_contenter_44").hide();
        $("#" + t + "C").fadeIn("slow");
    });
});

$("#service_slider").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    nav: false,
    loop: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,
        },
    },
});

$(".ribbon_menu a").click(function() {
    $(this).parent().toggleClass("change_xs");
    $(document).find(".mega_menu").toggle();
});

// lightbox trigger
$(document).ready(function() {
    var $gallery = new SimpleLightbox(".gallery a", {});
});

// scroll spy detal page
$(function() {
    var link = $("#navbar_scroll_spy a.dot");

    // Move to specific section when click on menu link
    link.on("click", function(e) {
        var target = $($(this).attr("href"));
        $("html, body").animate({
                scrollTop: target.offset().top,
            },
            600
        );
        $(this).addClass("active");
        e.preventDefault();
    });

    // Run the scrNav when scroll
    $(window).on("scroll", function() {
        scrNav();
    });

    // scrNav function
    // Change active dot according to the active section in the window
    function scrNav() {
        var sTop = $(window).scrollTop();
        $(".section").each(function() {
            var id = $(this).attr("id"),
                offset = $(this).offset().top - 1,
                height = $(this).height();
            if (sTop >= offset && sTop < offset + height) {
                link.removeClass("active");
                $("#navbar_scroll_spy")
                    .find('[data-scroll="' + id + '"]')
                    .addClass("active");
            }
        });
    }
    scrNav();
});
//   end scroll spy

$("#apartment_thumb").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    nav: false,
    loop: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 2,
        },
    },
});
$("#locality_nearby_slider").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    nav: false,
    loop: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 3,
        },
    },
});
$("#nearby_slider").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    nav: true,
    loop: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 3,
        },
    },
});

$(".button_show").each(function() {
    $(this).click(function(event) {
        $(event.target)
            .parents(".property_detail_")
            .find(".property_text")
            .toggleClass("show_text");
        $(this).toggleClass("toggle_class");
    });
});

$(function() {
    $("#post_pp_property_id").css("display", "none");
});
$(".post_input_field").click(function() {
    var value = $(".post_input_field:checked").val();
    if (value == "owner") {
        $("#post_pp_property_id").css("display", "block");
    } else {
        $("#post_pp_property_id").css("display", "none");
    }
});

$("#price_plan").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    nav: true,
    loop: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 3,
        },
    },
});

// search bar toggle js

$(".multi_select_option p").click(function() {
    $(this).toggleClass("for_rotation");
});

$(".property_type").click(function() {
    $(this).toggleClass("for_rotation");
    // $(document).find('.property_type_menu').toggle();
});
$(".Budget_type").click(function() {
    $(this).toggleClass("for_rotation");
    // $(document).find('.Budget_type_menu').toggle();
});

$(document).ready(function() {
    $(".multi_select_dropdown").click(function(event) {
        if ($(event.target).parents(".child_dropdown").length <= 0) {
            $(this).children(".child_dropdown").toggle();
            $(".multi_select_dropdown")
                .not(this)
                .children(".child_dropdown")
                .hide();
        }
    });
});

$(document.body).click(function(event) {
    if ($(event.target).parents(".multi_select_dropdown").length <= 0) {
        $(".multi_select_dropdown").children(".child_dropdown").hide();
    }
});


$('.linked_hill_button_wraper').click(function() {
    $(document).find('.for_toggle_view').toggle();
})




$('#click').click(function() {
    // console.log("search option:"+$('#click').text())

    if ($('#click').text() == "Less Search Option") {
        $(this).text("More Search Option")
    } else {
        $(this).text("Less Search Option")
    }
});

$('.advance-search').click(function() {
    $(document).find('.advance_options').toggle();
})

// // range slider js
// window.onload = function() {
//     slideOne();
//     slideTwo();
// }

// let sliderOne = document.getElementById("slider-1");
// let sliderTwo = document.getElementById("slider-2");
// let displayValOne = document.getElementById("range1");
// let displayValTwo = document.getElementById("range2");
// let minGap = 1
// let sliderTrack = document.querySelector(".slider-track");
// let sliderMaxValue = document.getElementById("slider-1").max;

// function slideOne() {
//     if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
//         sliderOne.value = parseInt(sliderTwo.value) - minGap;
//     }
//     displayValOne.textContent = sliderOne.value;
//     fillColor();
// }

// function slideTwo() {
//     if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
//         sliderTwo.value = parseInt(sliderOne.value) + minGap;
//     }
//     displayValTwo.textContent = sliderTwo.value;
//     fillColor();
// }

// function fillColor() {
//     percent1 = (sliderOne.value / sliderMaxValue) * 100;
//     percent2 = (sliderTwo.value / sliderMaxValue) * 100;
//     sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
// }
// range slider script end// range slider script end