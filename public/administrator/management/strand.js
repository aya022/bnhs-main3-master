let cancelStrand = $(".cancelStrand");
cancelStrand.hide();
const strandTable = () => {
    let htmlHold = "";
    let i = 1;
    $.ajax({
        url: `strand/list`,
        type: "GET",
        dataType: "json",
        beforeSend: function () {
            $("#strandTable").html(
                `<tr>
                        <td colspan="5" class="text-center">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </td>
                    </tr>
                    `
            );
        },
    })
        .done(function (data) {
            if (data.length > 0) {
                data.forEach((val) => {
                    htmlHold += `
                        <tr>
                            <td>
                                ${i++}
                            </td>
                            <td>
                                ${val.strand}
                            </td>
                            <td>
                                ${val.description}
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" style="font-size:13px" class="btn btn-sm btn-info text-white pl-3 pr-3 editStrand editStrand_${val.id}" id="${val.id}">Update</button>
                                </div>
                            </td>
                        </tr>
                    `;
                    // htmlHold += `
                    //     <tr>
                    //         <td>
                    //             ${i++}
                    //         </td>
                    //         <td>
                    //             ${val.strand}
                    //         </td>
                    //         <td>
                    //             ${val.description}
                    //         </td>
                    //         <td>
                    //             <div class="btn-group" role="group" aria-label="Basic example">
                    //                 <button type="button" style="font-size:13px" class="btn btn-sm btn-info text-white pl-3 pr-3 editStrand editStrand_${val.id}" id="${val.id}">Update</button>
                    //                 <button type="button" style="font-size:13px" class="btn btn-sm btn-danger text-white deleteStrand deleteStrand_${val.id}" id="${val.id}">Delete</button>
                    //             </div>
                    //         </td>
                    //     </tr>
                    // `;
                });
            } else {
                htmlHold = `
                            <tr>
                                <td colspan="5" class="text-center">No available data</td>
                            </tr>`;
            }
            $("#strandTable").html(htmlHold);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            getToast("error", "Error", errorThrown);
        });
};
strandTable();
$("#strandForm").submit(function (e) {
    $(".btnSaveStrand").attr("disabled", true);
    e.preventDefault();
    $.ajax({
        url: "strand/save",
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function (data) {
            $(".btnSaveStrand")
                .html(`Saving <div class="spinner-border spinner-border-sm" role="status">
            <span class="sr-only">Loading...</span>
        </div>`);
        },
    })
        .done(function (data) {
            if (data.warning) {
                getToast("warning","Warning",data.warning + ", Please contact the School Administrator");
            } else {
                $(".btnSaveStrand").html("Submit");
                $(".btnSaveStrand").attr("disabled", false);
                cancelStrand.hide();
                getToast("success","Successfully", "Added new Record");
                strandTable();
                $("#idForStrand").val("");
                $("#strandForm")[0].reset();
            }
            // document.getElementById("strandForm").reset();
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            $(".btnSaveStrand").html("Submit");
            $(".btnSaveStrand").attr("disabled", false);
            getToast("error", "Error", errorThrown);
        });
});

$(document).on("click", ".editStrand", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "strand/edit/" + id,
        type: "GET",
        data: { _token: $('input[name="_token"]').val() },
        beforeSend: function () {
            $(".editStrand_" + id).html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
        },
    })
        .done(function (data) {
            cancelStrand.show();
            // console.log(data.id);
            $(".editStrand_" + id).html(`<i class="fas fa-edit"></i>  `);
            $(".btnSaveStrand").html("Update");
            $("#idForStrand").val(data.id);
            $('input[name="strand"]').val(data.strand);
            $('input[name="description"]').val(data.description);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
        });
});

$(document).on("click", ".deleteStrand", function () {
    let id = $(this).attr("id");
    $('.deleteYes').val(id)
    $("#teacherDeleteModal").modal("show");
});

$(".deleteYes").on('click', function () {
    $.ajax({
        url: "strand/delete/" + $(this).val(),
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
            strandTable();
            $(this).val('')
            $("#teacherDeleteModal").modal("hide");
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
            $(".deleteYes").html("Yes");
        });
})
