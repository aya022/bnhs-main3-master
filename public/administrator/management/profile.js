$.uploadPreview({
    input_field: "#image-upload", // Default: .image-upload
    preview_box: "#image-preview", // Default: .image-preview
    label_field: "#image-label", // Default: .image-label
    label_default: "Choose File", // Default: Choose File
    label_selected: "Change File", // Default: Change File
    no_label: false, // Default: false
    success_callback: null, // Default: null
});

$("#schooProfileForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "profile/save",
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $("#btnSaveSP")
                .html(
                    `Saving ...
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`
                )
                .attr("disabled", true);
        },
    })
        .done(function (response) {
            $("#btnSaveSP").html("Save Changes").attr("disabled", false);
            getToast("success", "Successfully", "Added new School Profile");
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
        });
});

// deadline
$("#dealineform").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "grade/deadline",
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $("#btnSaveSP")
                .html(
                    `Saving ...
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`
                )
                .attr("disabled", true);
        },
    })
        .done(function (response) {
            $("#btnSaveSP").html("Save Changes").attr("disabled", false);
            getToast("success", "Successfully", "Added new Deadline");
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
        });
});

let eStatus = (value, id) => {
    console.log(value, id);
    $.ajax({
        url: `enrollment/status`,
        type: "POST",
        data: {
            id,
            value,
            _token: $('input[name="_token"]').val(),
        },
    })
        .done(function (data) {
            if (value == "no") {
                getToast("success", "Enrollment", "has been Ended!");
            } else {
                getToast("success", "Enrollment", "has been Activated!");
            }
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
        });
};

$(".btnClose").on("click", function () {
    $("#endModalOnlineENrollment").modal("hide");
    $("select[name='statusEnrollment']").prop("selectedIndex", 1).val();
});

$("select[name='statusEnrollment']").on("change", function () {
    let decide = $(this).val();
    if ($('input[name="id"]').val() != "") {
        if (decide != "") {
            if (decide == "yes") {
                eStatus(decide, $('input[name="id"]').val());
            } else {
                $("#endModalOnlineENrollment").modal("show");
                $(".showText").text(
                    "Are you sure you want to end Online Enrollment"
                );
                $(".btnYes")
                    .show()
                    .on("click", function () {
                        eStatus(decide, $('input[name="id"]').val());
                        $("#endModalOnlineENrollment").modal("hide");
                    });
            }
        } else {
            $("#endModalOnlineENrollment").modal("show");
            $(".showText").text("Please Select Enrollment Status!");
            $("select[name='statusEnrollment']").val("");
            $(".btnYes").hide();
        }
    } else {
        $("#endModalOnlineENrollment").modal("show");
        $(".showText").text("Please fill up the School Frofile first!");
        $(".btnYes").hide();
    }
});

// delete Modal
$(document).on("click", ".deleteAssign", function () {
    let id = $(this).attr("id");
    $('.deleteAssignYes').val(id)
    $("#AssignDeleteModal").modal("show");
});

$('input[name="grade_status"]').on('click', function () {
    // $(".badgeText").text(this.checked ? 'Disabled' : 'Enabled')
    if (this.checked) {
        $(".badgeText").addClass('bg-warning').removeClass('bg-success').text('Disabled')
    } else {
        $(".badgeText").addClass('bg-success').removeClass('bg-warning').text('Enabled')
        
    }
    $.ajax({
        url: `grade/update/status`,
        type: "PUT",
        data: {
            active:this.checked?1:0,
            _token: $('input[name="_token"]').val(),
        },
    })
        .done(function (data) {
            if (data) {
                getToast("info", "Done", "Grading status has been Changed!");
            } else {
                getToast("success", "Active", "Grade has been activated!");
            }
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error",  textStatus);
        });
})


let today = new Date().toISOString().slice(0, 16);
$("input[name='from']").attr('min', today);