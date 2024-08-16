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
                    position: "bottom", // Vị trí label
                },
            },
            cutout: "50%", // Độ rộng của lỗ donut
        },
        plugins: [
            {
                beforeDraw: function (chart) {
                    var width = chart.width,
                        height = chart.height,
                        ctx = chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 80).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";

                    var text = Math.round(completionPercentage) + "%",
                        textX = Math.round(
                            (width - ctx.measureText(text).width) / 2
                        ),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                },
            },
        ],
    });
});
