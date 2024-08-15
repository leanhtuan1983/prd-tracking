document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("chartView").getContext("2d");
    var completionPercentage = (completeData / totalData) * 100;
    var remainingPercentage = 100 - completionPercentage;

    var completionChart = new Chart(ctx, {
        type: "doughnut", // Hoặc 'pie' nếu bạn muốn dạng tròn
        data: {
            labels: ["Completed", "Remaining"],
            datasets: [
                {
                    data: [completionPercentage, remainingPercentage],
                    backgroundColor: ["#4caf50", "#e0e0e0"], // Màu sắc phần hoàn thành và phần còn lại
                    hoverOffset: 4,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "bottom",
                },
            },
        },
    });
});
