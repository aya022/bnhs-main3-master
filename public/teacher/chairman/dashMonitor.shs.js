const myAsset = [
    { font: "fas fa-atom", color: "bg-primary" },
    { font: "fas fa-users", color: "bg-danger" },
    { font: "fas fa-palette", color: "bg-warning" },
    { font: "fas fa-file-signature", color: "bg-success" },
];
let dashMonitor = () => {
    let dashHTML = "";
    $.ajax({
        url: `senior/dash/monitor`,
        type: "GET",
        dataType: "json",
    })
        .done(function (data) {
            data.forEach((val, i) => {
                dashHTML += `
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                        <div class="callout-icon ">
                            <i class="${myAsset[i].font} text-info" style="font-size: 25px;"></i>
                        </div>
                        <div class="callout-wrap">
                            <div class="callout-header">
                                <h4>${val.strand}</h4>
                            </div>
                            <div class="callout-body">
                                ${
                                    val.pending == 0
                                        ? `
                                        <div class="callout-body" style="font-size: 16px">
                                        <small class="m-0">Enrolled: <b> ${val.enrolled}</b></small>
                                        `
                                        : `
                                        ${
                                            val.enrolled == 0
                                                ? `
                                                <div class="callout-body" style="font-size: 16px">
                                                <small class="m-0">Pending: <b> ${val.pending}</b></small>
                                                `
                                                : `
                                                <div class="callout-body" style="font-size: 16px">
                                                <small class="m-0">Enrolled: <b> ${val.enrolled}</b></small>
                                                <small class="m-0">Pending: <b> ${val.pending}</b></small>
                                                `
                                        }

                                        `
                            }
                            </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                // dashHTML += `
                // <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                //     <div class="card">
                //         <div class="card-icon ${myAsset[i].color}">
                //             <i class="${myAsset[i].font}"></i>
                //         </div>
                //         <div class="card-wrap">
                //             <div class="card-header">
                //                 <h4>${val.strand}</h4>
                //             </div>
                //             <div class="card-body">
                //                 ${
                //                     val.pending == 0
                //                         ? `
                //                         <div class="card-body" style="font-size: 16px">
                //                         <small class="m-0">Enrolled: <b> ${val.enrolled}</b></small>
                //                         `
                //                         : `
                //                         ${
                //                             val.enrolled == 0
                //                                 ? `
                //                                 <div class="card-body" style="font-size: 16px">
                //                                 <small class="m-0">Pending: <b> ${val.pending}</b></small>
                //                                 `
                //                                 : `
                //                                 <div class="card-body" style="font-size: 16px">
                //                                 <small class="m-0">Enrolled: <b> ${val.enrolled}</b></small>
                //                                 <small class="m-0">Pending: <b> ${val.pending}</b></small>
                //                                 `
                //                         }

                //                         `
                //                 }
                //             </div>
                //             </div>
                //         </div>
                //     </div>
                // </div>
                // `;
            });
            $(".dashMonitor").html(dashHTML);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            getToast("error", "Error", errorThrown);
            $(".btnSaveSectionNow").html("Save").attr("disabled", false);
        });
};
dashMonitor();
