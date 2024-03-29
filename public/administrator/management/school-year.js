let school_year_Table = $("#school_year_Table").DataTable({
    order: [[0, "desc"]],
    lengthChange: false,
    searching: false,
    pageLength: 5,
    processing: true,
    language: {
        processing: `
            <div class="spinner-border spinner-border-sm" role="status">
            <span class="sr-only">Loading...</span>
        </div>`,
    },

    ajax: `academic-year/list`,
    columns: [
        {
            data: null,
            render: function (data) {
                return `${data.from}-${data.to}`;
            },
        },
        {
            data: null,
            render: function (data) {
                return `<div class="form-check form-switch form-switch-lg">
                            <input type="checkbox" name="option" class="form-check-input switchMe "
                            id="${data.id}" ${
                    data.status == "1" ? "checked" : ""
                }>
                        </div>
                        `;
            },
        },
        // {
        //     data: null,
        //     render: function (data) {
        //         return `<label class="custom-switch">
        //                     <input type="radio" name="semester" class="custom-switch-input clickSemester"
        //                     value="1st" ${
        //                         data.first_term == "Yes" ? "checked" : ""
        //                     }
        //         ${data.status != "1" ? "disabled" : ""}>
        //                     <span class="custom-switch-indicator"></span>
        //                 </label>
        //                 `;
        //     },
        // },
        // {
        //     data: null,
        //     render: function (data) {
        //         return `<label class="custom-switch">
        //                     <input type="radio" name="semester" class="custom-switch-input clickSemester"
        //                     value="2nd" ${
        //                         data.second_term == "Yes" ? "checked" : ""
        //                     }  ${data.status != "1" ? "disabled" : ""}>
        //                     <span class="custom-switch-indicator"></span>
        //                 </label>
        //                 `;
        //     },
        // },
        {
            data: null,
            render: function (data) {
                if (data.status == 1) {
                    return `
                    <button type="button" class="btn btn-sm btn-info text-white editAY edit_${data.id}  pl-5 pr-5" id="${data.id}">Update</button>`;
                } else {
                    return `
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-sm btn-info text-white pl-3 pr-3 editAY edit_${data.id}" id="${data.id}">Update</button>
                                <button type="button" class="btn btn-sm btn-danger text-white deleteAY delete_${data.id}" id="${data.id}">Delete</button>
                            </div>
                        `;
                    // return `
                    //         <div class="btn-group" role="group" aria-label="Basic example">
                    //             <button type="button" class="btn btn-sm btn-info text-white pl-3 pr-3 editAY edit_${data.id}" id="${data.id}">Update</button>
                    //         </div>
                    //     `;
                }
            },
        },
    ],
});

$(document).on("click", ".switchMe", function () {
    let id = $(this).attr("id");
    $("input:radio").each(function(){
        $(this).prop('checked',$(this).val()==0?false:true)
    });
   $("#syModal").modal("show")
   $(".confirmYes").val(id)
});

$(".confirmYes").on('click',function(){
     $.ajax({
        url: "academic-year/change/" + $(this).val(),
        type: "POST",
        data: { _token: $('input[name="_token"]').val() },
    })
    .done(function (response) {
        getToast("success", "Success", "Activated Academic Year </b>");
        school_year_Table.ajax.reload();
         $("#syModal").modal("hide")
    })
    .fail(function (jqxHR, textStatus, errorThrown) {
        console.log(jqxHR, textStatus, errorThrown);
        getToast("error", "Eror", errorThrown);
    });
})
// $(document).on("click", ".switchMe", function () {
//     let data = $(this).attr("id");
//     $.ajax({
//         url: "academic-year/change/" + data,
//         type: "POST",
//         data: { _token: $('input[name="_token"]').val() },
//     })
//         .done(function (response) {
//             getToast("success", "Successfully", "Activated Academic Year </b>");
//             school_year_Table.ajax.reload();
//         })
//         .fail(function (jqxHR, textStatus, errorThrown) {
//             console.log(jqxHR, textStatus, errorThrown);
//             getToast("error", "Eror", errorThrown);
//         });
// });

$(document).on("click", "input[name='semester']", function () {
    let data = $(this).val();
    $.ajax({
        url: "academic-year/change/semester/" + data,
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
        },
    })
        .done(function (response) {
            getToast(
                "success",
                "Success",
                data == "1st"
                    ? "First Semester is now open"
                    : "Second Semester is now open"
            );
            school_year_Table.ajax.reload();
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Eror", errorThrown);
        });
});

$(document).on("click", ".editAY", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "academic-year/edit/" + id,
        type: "GET",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".edit_" + id).html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
        },
    })
        .done(function (data) {
            $(".edit_" + id).html("Edit");
            $("input[name='id']").val(data.id);
            $("input[name='from']").val(data.from);
            $("input[name='to']").val(data.to);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Eror", errorThrown);
        });
});

$(document).on("click", ".deleteAY", function () {
    let id = $(this).attr("id");
    $(".deleteYes").val(id)
    $("#teacherDeleteModal").modal("show")
});

$(".deleteYes").on("click", function () {
    $.ajax({
        url: "academic-year/delete/" + $(this).val(),
        type: "DELETE",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".deleteYes").html(`Deleting..
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
        },
    })
        .done(function (response) {
            if (response) {
                getToast("success", "Successfully", "deleted one record");
            }
            school_year_Table.ajax.reload();

            $(".deleteYes").html(`<i class="far fa-trash-alt"></i>`);
            $("#teacherDeleteModal").modal("hide")
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            $(".deleteYes").html(`<i class="far fa-trash-alt"></i>`);
            getToast("error", "Eror", errorThrown);
        });
})
// $(document).on("click", ".deleteAY", function () {
//     let id = $(this).attr("id");
//     $.ajax({
//         url: "academic-year/delete/" + id,
//         type: "DELETE",
//         data: { _token: $('input[name="_token"]').val() },
//         beforeSend: function () {
//             $(".delete_" + id).html(`Deleting..
//             <div class="spinner-border spinner-border-sm" role="status">
//                 <span class="sr-only">Loading...</span>
//             </div>`);
//         },
//     })
//         .done(function (response) {
//             if (response) {
//                 getToast("success", "Success", "deleted one record");
//             }
//             school_year_Table.ajax.reload();

//             $(".delete_" + id).html("Delete");
//         })
//         .fail(function (jqxHR, textStatus, errorThrown) {
//             console.log(jqxHR, textStatus, errorThrown);
//             $(".delete_" + id).html("Delete");
//             // getToast("error", "Eror", errorThrown);
//             getToast(
//                 "warning",
//                 "Warning",
//                 "Sorry this Academic Year can't be deleted"
//             );
//         });
// });

$("#schoolYearForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: `academic-year/save`,
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $("#btnSaveAY")
                .html(
                    `
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`
                )
                .attr("disabled", true);
        },
    })
        .done(function (response) {
            $("#btnSaveAY").html("Save").attr("disabled", false);

            getToast("success", "Successfully", "added new academic year");
            school_year_Table.ajax.reload();
            $("input[name='from']").val("");
            $("input[name='to']").val("");
            $("input[name='id']").val("");
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            4;
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
        });
});

$("input[name='from']").on("blur", function () {
    $('input[name="to"]').val(parseInt($(this).val()) + 1);
});
