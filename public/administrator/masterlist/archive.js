let archiveTable = (type) => {
    $("#archiveTable").dataTable().fnDestroy();
    $("#archiveTable").DataTable({
        pageLenth: 6,
        processing: true,
        language: {
            processing: `
                <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
              </div>`,
        },

        ajax: `archive/list/${type}`,
        columns: [
            { data: "roll_no" },
            { data: "fullname" },
            { data: "gender" },
            // {
            //     data: null,
            //     render: function (data) {
            //         let fullname =  data.fullname
            //         return `
            //         <div class="btn-group" role="group" aria-label="Basic example">
            //             <button type="button" class="btn btn-sm btn-info text-white srestore btnRestore_${data.id} pt-0 pb-0 " id="${data.id}">Restore</span>
            //             </button>
            //             <button type="button" class="btn btn-sm btn-danger text-white Studdelete btnDelete_${data.id}  pt-0 pb-0 pl-2 pr-2" id="${data.id}" value="${fullname}">Delete</span>
            //             </button>
            //         </div>
            //         `;
            //     },
            // },
            {
                data: null,
                render: function (data) {
                    let fullname =  data.fullname
                    return `
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-sm btn-info text-white srestore btnRestore_${data.id} pt-0 pb-0 " id="${data.id}">Restore</span>
                        </button>
                    </div>
                    `;
                },
            },
        ],
    });
};
/**
 *
 * DELETE
 *
 */
// delete Modal

// info
// $(document).on("click", ".Studdelete", function () {
//     let fullname = $(this).val();
//     let id = $(this).attr("id");
//     $(".showName").text(fullname)
//     $("#sDeleteModal").modal("show");
//     $(".yesDelete").val(id);
// });


$(document).on("click", ".Studdelete", function () {
    let id = $(this).attr("id");
    let type = $("select[name='archiveType']").val();
    $.ajax({
        url: `archive/force/delete/${type}/${id}`,
        type: "DELETE",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".btnDelete_" + id)
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
            $(".btnDelete_" + id)
                .html("Delete")
                .attr("disabled", false);
            getToast("success", "Successfully", "deleted one record");
            $("#studentForm")[0].reset();
            archiveTable($("select[name='archiveType']").val());
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            $(".btnDelete_" + id)
                .html("Delete")
                .attr("disabled", false);
            getToast("error", "Error", errorThrown);
        });
});

$(document).on("click", ".srestore", function () {
    let id = $(this).attr("id");
    let type = $("select[name='archiveType']").val();
    $.ajax({
        url: `archive/restore/${type}/${id}`,
        type: "POST",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".btnRestore_" + id)
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
            $(".btnRestore_" + id)
                .html(`<Restore</span>`)
                .attr("disabled", false);
            getToast("success", "Successfully", "restored one record");
            $("#studentForm")[0].reset();
            archiveTable($("select[name='archiveType']").val());
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            $(".btnRestore_" + id)
                .html(`Restore</span>`)
                .attr("disabled", false);
            getToast("error", "Error", errorThrown);
        });
});

$("select[name='archiveType']").on("change", function () {
    archiveTable($(this).val());
});

archiveTable($("select[name='archiveType']").prop("selectedIndex", 0).val());
