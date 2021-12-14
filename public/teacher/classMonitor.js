let myClassTable = $("#myClassTable").DataTable({
    // lengthChange: false,
    pageLenth: 6,
    processing: true,
    language: {
        processing: `
            <div class="spinner-border spinner-border-sm" role="status">
            <span class="sr-only">Loading...</span>
            </div>`,
    },

    ajax: "monitor/list",
    columns: [
        { data: "roll_no" },
        { data: "fullname" },
        { data: "gender" },
        { data: "student_contact" },
        {
            data: null,
            render: function (data) {
                return data.enroll_status == "Dropped"
                    ? `<span class="badge bg-danger" style="font-size: 13px;">${data.enroll_status}</span>`
                    : `<span class="badge bg-success" style="font-size: 13px;">${data.enroll_status}</span>`;
            },
        },
        {
            data: null,
            render: function (data) {
                if (data.enroll_status != "Dropped") {
                    return `<button type="button" class="btn btn-sm btn-warning text-white dropped btnDropped_${data.id}  pt-0 pb-0 pl-2 pr-2" id="${data.id}">
                    <i class="fas fa-user-times"></i> Drop
                    </button>
                    `;
                } else {
                    return `<button type="button" class="btn btn-sm btn-info text-white dropped btnDropped_${data.id}  pt-0 pb-0 pl-2 pr-2" id="${data.id}">
                    <i class="fas fa-user-times"></i> Undrop
                    </button>
                    `;
                }
            },
        },
    ],
});

$(document).on("click", ".deleteSection", function () {
    let id = $(this).attr("id");
    $('.deleteYes').val(id)
    $("#teacherDeleteModal").modal("show");
});

$(".deleteYes").on('click', function () {
    $.ajax({
        url: "section/delete/" + $(this).val(),
        type: "DELETE",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".deleteYes").html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
        },
    })
        .done(function (response) {
            $(".deleteYes").html("Yes");
            getToast("success", "Success", "deleted one record");
            sectioTable($("#selectedGL").val());
            $(this).val('')
            $("#teacherDeleteModal").modal("hide");
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
            $(".deleteYes").html("Yes");
        });
})

// $(document).on("click", ".dropped", function () {
//     if (confirm("Are you sure you want drop this student?")) {
//     let id = $(this).attr("id");
//     $.ajax({
//         url: "monitor/dropped/" + id,
//         type: "POST",
//         data: { _token: $('input[name="_token"]').val() },
//         beforeSend: function () {
//             $(".btnDropped_" + id).html(`
//                 <div class="spinner-border spinner-border-sm" role="status">
//                     <span class="sr-only">Loading...</span>
//                 </div>`);
//         },
//     })
//         .done(function (response) {
//             $(".btnDropped_" + id).html("loading...");

//             getToast("success", "Successfully", "Change one record");
//             myClassTable.ajax.reload();
//         })
//         .fail(function (jqxHR, textStatus, errorThrown) {
//             console.log(jqxHR, textStatus, errorThrown);
//             getToast("error", "Error", errorThrown);
//         });
//     } else {
//         return false;
//     }
// });

$(document).on("click", ".dropped", function () {
    let id = $(this).attr("id");
    $('.deleteClass').val(id)
    $("#classDeleteModal").modal("show");
});

$(".deleteClass").on('click', function () {
    $.ajax({
        url: "monitor/dropped/" + $(this).val(),
        type: "POST",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".deleteClass").html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
        },
    })
        .done(function (response) {
            $(".deleteClass").html("Yes");
            getToast("info", "Successfully", "Change one record");
            myClassTable.ajax.reload();
            $(this).val('')
            $("#classDeleteModal").modal("hide");
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
            $(".deleteClass").html("Yes");
        });
})
