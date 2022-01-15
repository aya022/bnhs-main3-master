const studentTable = $("#studentTable").DataTable({
    // lengthChange: false,
    pageLenth: 6,
    processing: true,
    language: {
        processing: `
            <div class="spinner-border spinner-border-sm" role="status">
            <span class="sr-only">Loading...</span>
        </div>`,
    },

    ajax: `student/list`,
    columns: [
        { data: "roll_no" },
        {
            data: null,
            render: function (data) {
                return (
                    data.student_lastname +
                    ", " +
                    data.student_firstname +
                    " " +
                    data.student_middlename
                );
            },
        },
        { data: "gender" },
        { data: "student_contact" },
        {
            data: null,
            render: function (data) {
                return data.completer=='No'? `<span class="badge bg-info pt-1 pb-1">No</span>`: `<span class="badge bg-success pt-1 pb-1">Completer</span>`;
            }
        },
        { data: "username" },
        // { data: "orig_password" },
        {
            data: null,
            render: function (data) {
                let fullname =  data.student_lastname+", "+data.student_firstname+" "+data.student_middlename
                return `
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-sm btn-danger text-white sdelete btnDelete_${data.id}  pt-0 pb-0 pl-2 pr-2" id="${data.id}">Remove</button>
                    <button type="button" class="btn btn-sm btn-info  text-white sedit btnEdit_${data.id}  pt-0 pb-0 pl-2 pr-2" id="${data.id}">Update</button>
                    <button type="button" class="btn btn-sm btn-warning text-white sreset btnReset_${data.id} pl-3 pr-3" id="${data.id}" value="${fullname}">Reset</button>
                    ${active.filter(val => (val == data.id)) != '' ? `
                    <a href="student/view/record/${data.id}" class="btn btn-sm btn-secondary text-white vstudent btnView_${data.id} pt-0 pb-0 " id="${data.id}">View</a>
                    ` :""}
                </div>`;
            },
            /**
             *  <button type="button" class="btn btn-sm btn-info tedit btnEdit_${data.id} pt-0 pb-0 " id="${data.id}">
                <i class="fas fa-edit"></i>
                </button>
             * 
             */
        },
    ],
});

/**
 * reset student password
 */
 $(document).on('click', '.sreset', function (e) {
    e.preventDefault();
    $(".yesReset").show().text('Yes, reset password');
    let fullname = $(this).val();
    let id = $(this).attr("id");
    $(".showName").text(fullname)
    $(".textshow").text("Are you sure you want to reset password?")
    $("#resetModal").modal("show")
    $(".yesReset").val(id);
})

$(".yesReset").on('click', function (e) {
    e.preventDefault();
    $.ajax({
        url: `reset/password/${$(this).val()}/student`,
        type: "GET",
        beforeSend: function () {
            $(".yesReset").html(`Restting... 
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
        },
    })
        .done(function (response) {
            $(".yesReset").hide();
            getToast("success", "Successfully", "Reset password");
            $(".textshow").html(`New password: <b>${response}</b>`)
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            $(".yesReset").show().text('Yes, reset password');
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Eror", errorThrown);
        });
})
/**
 * end
 */

$("#btnStudentModal").on("click", function () {
    $(".modal-title").text("New Student");
    $("#studentForm")[0].reset();
    $("#staticBackdrop").modal("show");
    $("#forNew").show();
    $("#forUpdate").hide();
    $("select[name='region_text']").attr("required", true);
    $("select[name='province_text']").attr("required", true);
    $("select[name='city_text']").attr("required", true);
    $("select[name='barangay_text']").attr("required", true);
    $("input[name='last_schoolyear_attended']").attr("disabled", true);
});

$("select[name='isbalik_aral']").on("change", function () {
    $("input[name='last_schoolyear_attended']").attr(
        "disabled",
        $(this).val() == "Yes" ? false : true
    );
});

$("#studentForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "student/save",
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $("#btnSaveStudent")
                .html(
                    `Saving 
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`
                )
                .attr("disabled", true);
        },
    })
        .done(function (response) {
            $("#btnSaveStudent").html("Save").attr("disabled", false);
            getToast("success", "Successfully", "Added new Student");
            $("#studentForm")[0].reset();
            studentTable.ajax.reload();
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            $("#btnSaveStudent").html("Save").attr("disabled", false);
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
        });
});

// $(document).on("click", ".sdelete", function () {
//     let id = $(this).attr("id");
//     $.ajax({
//         url: "student/delete/" + id,
//         type: "DELETE",
//         data: { _token: $('input[name="_token"]').val() },
//         beforeSend: function () {
//             $(".btnDelete_" + id)
//                 .html(
//                     `
//             <div class="spinner-border spinner-border-sm" role="status">
//                 <span class="sr-only">Loading...</span>
//             </div>`
//                 )
//                 .attr("disabled", true);
//         },
//     })
//         .done(function (response) {
//             $(".btnDelete_" + id)
//                 .html("Delete")
//                 .attr("disabled", false);
//             getToast("success", "Successfully", "deleted one record");
//             $("#studentForm")[0].reset();
//             studentTable.ajax.reload();
//         })
//         .fail(function (jqxHR, textStatus, errorThrown) {
//             console.log(jqxHR, textStatus, errorThrown);
//             $(".btnDelete_" + id)
//                 .html("Delete")
//                 .attr("disabled", false);
//             getToast("error", "Error", errorThrown);
//         });
// });

// delete Modal
$(document).on("click", ".sdelete", function () {
    let id = $(this).attr("id");
    $('.deleteStudent').val(id)
    $("#studentDeleteModal").modal("show");
});

$(document).on("click", ".deleteStudent", function () {
    $.ajax({
        url: "student/delete/" + $(this).val(),
        type: "DELETE",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".deleteStudent").html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
        },
    })
    .done(function (response) {
        $(".deleteStudent").html("Yes");
        $(this).val('')
        $("#studentDeleteModal").modal("hide");
        getToast("success", "Successfully", "Deleted one record");
        $("#studentForm")[0].reset();
        studentTable.ajax.reload();
    })
    .fail(function (jqxHR, textStatus, errorThrown) {
        console.log(jqxHR, textStatus, errorThrown);
        getToast("error", "Error", errorThrown);
        $(".deleteStudent").html("Yes");
    });
})

/**
 *
 * EDIT
 *
 */

$(document).on("click", ".sedit", function () {
    $("#forNew").hide();
    $("select[name='region_text']").attr("required", false);
    $("select[name='province_text']").attr("required", false);
    $("select[name='city_text']").attr("required", false);
    $("select[name='barangay_text']").attr("required", false);
    let id = $(this).attr("id");
    $.ajax({
        url: "student/edit/" + id,
        type: "GET",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".btnEdit_" + id)
                .html(
                    `
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`
                )
                .attr("disabled", true);
        },
    })
        .done(function (data) {
            $("#forUpdate").show();
            $(".btnEdit_" + id)
                .html(`Update`)
                .attr("disabled", false);
            $("#studentForm")[0].reset();
            $(".modal-title").text("Update Student");
            // studentTable.ajax.reload();
            $("#staticBackdrop").modal("show");
            $('input[name="id"]').val(data.id);
            $('input[name="roll_no"]').val(data.roll_no);
            $('select[name="curriculum"]').val(data.curriculum);
            $('input[name="student_firstname"]').val(data.student_firstname);
            $('input[name="student_middlename"]').val(data.student_middlename);
            $('input[name="student_lastname"]').val(data.student_lastname);
            $('input[name="region"]').val(data.region);
            $('input[name="province"]').val(data.province);
            $('input[name="city"]').val(data.city);
            $('input[name="barangay"]').val(data.barangay);
            $('input[name="date_of_birth"]').val(data.date_of_birth);
            $('select[name="gender"]').val(data.gender);
            $('input[name="student_contact"]').val(data.student_contact);
            // $('input[name="last_school_attended"]').val(
            //     data.last_school_attended
            // );
            $('select[name="completer"]').val(data.completer);
            $('input[name="father_name"]').val(data.father_name);
            $('input[name="father_contact_no"]').val(data.father_contact_no);
            $('input[name="mother_name"]').val(data.mother_name);
            $('input[name="mother_contact_no"]').val(data.mother_contact_no);
            $('input[name="guardian_name"]').val(data.guardian_name);
            $('input[name="guardian_contact_no"]').val(
                data.guardian_contact_no
            );
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            $(".btnEdit_" + id)
                .html(`<i class="fas fa-edit"></i>`)
                .attr("disabled", false);
            getToast("error", "Error", errorThrown);
        });
});