let populationByGradeLevel = (data) => {
    var ctx = document.getElementById("myChart2").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: data.grade_level,
            datasets: [
                {
                    label: "Statistics",
                    data: data.population,
                    borderWidth: 2,
                    backgroundColor: "#6777ef",
                    borderColor: "#6777ef",
                    borderWidth: 2.5,
                    pointBackgroundColor: "#ffffff",
                    pointRadius: 4,
                },
            ],
        },
    });
};

let loadData = () => {
    $.ajax({
        url: "chart/population/by/level",
        type: "GET",
        dataType: "json",
    })
        .done(function (data) {
            populationByGradeLevel(data);
            console.table(data);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Eror", errorThrown);
        });
};
loadData();

let populationBySex = (data) => {
    var ctx = document.getElementById("myChart4").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            datasets: [
                {
                    data: [data.Male, data.Female],
                    backgroundColor: ["#008ae6", "#ff5050"],
                    label: "Dataset 1",
                },
            ],
            labels: ["Male", "Female"],
        },
        options: {
            responsive: true,
            legend: {
                position: "top",
            },
        },
    });
};

let loadDataSex = () => {
    $.ajax({
        url: "chart/population/by/sex",
        type: "GET",
        dataType: "json",
    })
        .done(function (data) {
            populationBySex(data[0]);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Eror", errorThrown);
        });
};
loadDataSex();
// let populationBySex = (data1,data2) => {
//     var ctx = document.getElementById("myChart4").getContext("2d");
//     var myChart = new Chart(ctx, {
//         type: "pie",
//         data: {
//             datasets: [
//                 {
//                     data: [data2.Male, data1.Female],
//                     backgroundColor: ["#008ae6", "#ff5050"],
//                     label: "Dataset 1",
//                 },
//             ],
//             labels: ["Male", "Female"],
//         },
//         options: {
//             responsive: true,
//             legend: {
//                 position: "bottom",
//             },
//         },
//     });
// };

// let loadDataSex = () => {
//     $.ajax({
//         url: "chart/population/by/sex",
//         type: "GET",
//         dataType: "json",
//     })
//         .done(function (data) {
//             populationBySex(data[0],data[1]);
//         })
//         .fail(function (jqxHR, textStatus, errorThrown) {
//             console.log(jqxHR, textStatus, errorThrown);
//             getToast("error", "Eror", errorThrown);
//         });
// };
// loadDataSex();

let populationByCurriculum = (data) => {
    var cbc = document.getElementById("myChart3").getContext("2d");
    return new Chart(cbc, {
        type: "pie",
        data: {
            datasets: [
                {
                    data: [data.stem, data.bec, data.spa, data.spj, data.grdE, data.grdT],
                    backgroundColor: [
                        "#ff9933",
                        "#ff5050",
                        "#00e673",
                        "#6666ff",
                        "#00ccff",
                        "#cc33ff",
                    ],
                    label: "Dataset 1",
                },
            ],
            // labels: ["GRADE-7", "GRADE-8", "GRADE-9", "GRADE-10"],
            labels: ["GRADE 7", "GRADE 8", "GRADE 9", "GRADE 10", "GRADE 11", "GRADE 12"],
        },
        options: {
            responsive: true,
            legend: {
                position: "bottom",
            },
        },
    });
};

// let populationByCurriculum = (data) => {
//     var cbc = document.getElementById("myChart3").getContext("2d");
//     return new Chart(cbc, {
//         type: "pie",
//         data: {
//             datasets: [
//                 {
//                     data: [data.stem, data.bec, data.spa, data.spj],
//                     backgroundColor: [
//                         "#ff5050",
//                         "#ff9933",
//                         "#009933",
//                         "#6666ff",
//                     ],
//                     label: "Dataset 1",
//                 },
//             ],
//             labels: ["SOC", "BEC", "SPA", "SPJ"],
//         },
//         options: {
//             responsive: true,
//             legend: {
//                 position: "bottom",
//             },
//         },
//     });
// };

let loadDataCurriculum = () => {
    $.ajax({
        url: "chart/population/by/curriculum",
        type: "GET",
        dataType: "json",
    })
        .done(function (data) {
            populationByCurriculum(data[0]);
        })
        .fail(function (jqxHR, textStatus, errorThrown) {
            console.log(jqxHR, textStatus, errorThrown);
            getToast("error", "Error", errorThrown);
        });
};
loadDataCurriculum();
