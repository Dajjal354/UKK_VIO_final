// public/js/activity-chart.js
class UserActivityChart {
    constructor() {
        this.chartInstance = null;
    }

    async init() {
        await this.fetchActivityData();
    }

    createChart(data) {
        const ctx = document.getElementById('userActivityChart').getContext('2d');
        
        if (this.chartInstance) {
            this.chartInstance.destroy();
        }

        this.chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.dates,
                datasets: [{
                    label: 'Registered Users',
                    data: data.activeUsers,
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'User Login Activity'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    async fetchActivityData() {
        try {
            const response = await fetch('/api/user-activity');
            const data = await response.json();
            this.createChart(data);
        } catch (error) {
            console.error('Error fetching activity data:', error);
        }
    }

    async updateChart() {
        await this.fetchActivityData();
    }
}

export default UserActivityChart;