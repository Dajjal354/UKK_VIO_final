// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Alumni Status Chart Class
class AlumniStatusChart {
    constructor() {
        this.ctx = document.getElementById("alumniStatusChart");
        if (!this.ctx) return;
        
        // Get data from data attributes
        this.workingCount = this.ctx.dataset.working;
        this.studyingCount = this.ctx.dataset.studying;
        
        this.initChart();
    }

    initChart() {
        new Chart(this.ctx, {
            type: 'pie',
            data: {
                labels: ["Bekerja", "Kuliah"],
                datasets: [{
                    data: [this.workingCount, this.studyingCount],
                    backgroundColor: ['#0d6efd', '#198754'],
                    hoverBackgroundColor: ['#0b5ed7', '#157347'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    }
}

// Initialize chart when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new AlumniStatusChart();
});
