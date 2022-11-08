
function convertToSlug(title) {
    return title
        .toLowerCase()
        .replace(/ /g, "-")
        .replace(/&/g, "and")
        .replace(/[^\w-]+/g, "");
}

$("input[name='title'],input[name='name']").on("keyup", function () {
    var title = $(this).val();
    var slug = convertToSlug(title);
    $(this).closest("form").find('input[name="slug"]').val(slug)
});

// panel toggle in property create and property edit
function toggleIcon(e) {
    $(e.target)
        .prev(".panel-heading")
        .find(".more-less")
        .toggleClass("glyphicon-plus glyphicon-minus");
}
$(".panel-group").on("hidden.bs.collapse", toggleIcon);
$(".panel-group").on("shown.bs.collapse", toggleIcon);

$(document).ready(function () {
    $(".select2").select2();
});

function deleteDataById(id, url) {
    var csrf_token = $('meta[name="csrf-token"]').attr("content");
    swal({
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete it!",
    }).then(function () {
        axios
            .delete("/delete-my-agency", {
                data: {
                    _token: csrf_token,
                    id: id,
                },
            })
            .then((response) => {
                location.reload();
            })
            .catch((err) => {
                toastr.error("Something went Wrong", "", {
                    positionClass: "toast-bottom-left",
                });
            });
    });
}

$(function () {
    $("#parsleyValidationForm").parsley();
});

$(function () {
    $("#dropzoneForm")
        .parsley()
        .on("field:validated", function () {
            var ok = $(".parsley-error").length === 0;
            $(".bs-callout-info").toggleClass("hidden", !ok);
            $(".bs-callout-warning").toggleClass("hidden", ok);
        });
});
