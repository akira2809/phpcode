document.addEventListener('DOMContentLoaded', function() {
    const ctxArea = document.getElementById('myAreaChart').getContext('2d');
    const myAreaChart = new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov"],
            datasets: [{
                label: "Earnings",
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000],
            }],
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                },
                y: {
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    },
                },
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return '$' + tooltipItem.parsed.y.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    const ctxPie = document.getElementById('myPieChart').getContext('2d');
    const myPieChart = new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ["Direct", "Social", "Referral"],
            datasets: [{
                data: [55, 30, 15],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            }],
        },
        options: {
            maintainAspectRatio: false,
            cutout: '80%',
        }
    });
});
