const table_teacher = $("#teacherTable").DataTable({
    // lengthChange: false,
    pageLenth: 6,
    processing: true,
    language: {
        processing: `
                <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`,
    },

    ajax: `teacher/list`,
    columns: [
        { data: "roll_no" },
        {
            data: null,
            render: function (data) {
                return (
                    data.teacher_lastname +
                    ", " +
                    data.teacher_firstname +
                    " " +
                    data.teacher_middlename
                );
            },
        },
        { data: "teacher_gender" },
        { data: "username" },
        // { data: "orig_password" },
        {
            data: null,
            render: function (data) {
                let fullname =  data.teacher_lastname+", "+data.teacher_firstname+" "+data.teacher_middlename
                return `
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" style="font-size:13px" class="btn btn-sm btn-info text-white tedit btnEdit_${data.id}" id="${data.id}">Update</button>
                        <button type="button" style="font-size:13px" class="btn btn-sm btn-dark pl-3 pr-3 tdelete btnDelete_${data.id}" id="${data.id}">Archive</button>
                        <button type="button" class="btn btn-sm btn-info text-white treset btnReset_${data.id} pl-3 pr-3" value="${fullname}" id="${data.id}">Reset</button>
                    </div>
                    `;
            },
        },
    ],
});

// reset password
$(document).on('click', '.treset', function (e) {
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
        url: `reset/password/${$(this).val()}/teacher`,
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
// end

$("#teacherForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "teacher/store",
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $("#btnSave").html(`Saving 
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
        },
    })
        .done(function (response) {
            $("#btnSave").html("Save");
            getToast("success", "Successfully", "Added new teacher");
            $("#teacherForm")[0].reset();
            table_teacher.ajax.reload();
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
        });
});

// $(document).on("click", ".tdelete", function () {
//     let id = $(this).attr("id");
//     $.ajax({
//         url: "teacher/delete/" + id,
//         type: "DELETE",
//         data: { _token: $('input[name="_token"]').val() },
//         beforeSend: function () {
//             $(".btnDelete_" + id)
//                 .html(
//                     `
//                 <div class="spinner-border spinner-border-sm" role="status">
//                     <span class="sr-only">Loading...</span>
//                 </div>`
//                 )
//                 .attr("disabled", true);
//         },
//     })
//         .done(function (response) {
//             $(".btnDelete_" + id)
//                 .html(`<i class="fas fa-user-times"></i>`)
//                 .attr("disabled", false);
//             getToast("success", "Successfully", "Deleted one record");
//             $("#teacherForm")[0].reset();
//             table_teacher.ajax.reload();
//         })
//         .fail(function (jqxHR, textStatus, errorThrown) {
//             console.log(jqxHR, textStatus, errorThrown);
//             $(".btnDelete_" + id)
//                 .html(`<i class="fas fa-user-times"></i>`)
//                 .attr("disabled", false);
//             getToast("error", "Error", errorThrown);
//         });
// });

// info
$(document).on("click", ".tInfo", function (e) {
    e.preventDefault();
    let fullname = $(this).val();
    let id = $(this).attr("id");
    $(".showName").text(fullname);
    $(".textshow").text("Are you sure you want to reset password?");
    $("#tInfoModal").modal("show");
});

// delete Modal
$(document).on("click", ".tdelete", function () {
    let id = $(this).attr("id");
    $('.deleteTeacher').val(id)
    $("#teachertDeleteModal").modal("show");
});

$(document).on("click", ".deleteTeacher", function () {
    $.ajax({
        url: "teacher/delete/" + $(this).val(),
        type: "DELETE",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".deleteTeacher").html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
        },
    })
    .done(function (response) {
        $(".deleteTeacher").html("Yes");
        $(this).val('')
        $("#teachertDeleteModal").modal("hide");
        getToast("success", "Successfully", "Archive one record");
        $("#teacherForm")[0].reset();
        table_teacher.ajax.reload();
    })
    .fail(function (jqxHR, textStatus, errorThrown) {
        console.log(jqxHR, textStatus, errorThrown);
        getToast("error", "Error", errorThrown);
        $(".deleteTeacher").html("Yes");
    });
})

// update
$(document).on("click", ".tedit", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "teacher/edit/" + id,
        type: "GET",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".btnEdit_" + id).html(`
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
        },
    })
        .done(function (data) {
            $(".modal-title").text("Update Teacher");
            $(".btnEdit_" + id).html(`Update`);
            $("#staticBackdrop").modal("show");
            $("input[name='roll_no']").val(data.roll_no);
            $("input[name='firstname']").val(data.teacher_firstname);
            $("input[name='middlename']").val(data.teacher_middlename);
            $("input[name='lastname']").val(data.teacher_lastname);
            $("select[name='gender']").val(data.teacher_gender);
            $("input[name='id']").val(data.id);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            $(".btnEdit_" + id).html(`<i class="fas fa-edit"></i>`);
            console.log(jqxHR, textStatus, errorThrown);
        });
});
$("#btnMidalTeacher").on("click", function () {
    $(".modal-title").text("New Teacher");
    $("#teacherForm")[0].reset();
    $("#staticBackdrop").modal("show");
});

// show print
$("#printTeacher").on("click", function () {
    popupCenter({
        url: "print/report",
        title: "report",
        w: 1400,
        h: 800,
    });
});

// export
$("#btnModalExport").on('click', function () {
    $("#importModal").modal("show")
})

$("#importForm").submit(function (e) {
    e.preventDefault()
  
    $.ajax({
        url: "teacher/import",
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $(".btnImportNow").html(
                `Importing...  <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>
                    `
            );
        },
    }).done(function (data) {
        $('input[name="file"]').val("")
        $(".btnImportNow").html('Import')
        table_teacher.ajax.reload();
    }).fail(function (jqxHR, textStatus, errorThrown) {
         $(".btnImportNow").html('Import')
        console.log(jqxHR, textStatus, errorThrown);
    });
})