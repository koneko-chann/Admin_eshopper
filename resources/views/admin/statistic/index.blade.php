<!-- resources/views/statistics/revenue.blade.php -->

@extends('layouts.admin')
@section('title')
    <title>Thống kê</title>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const topProductsCtx = document.getElementById('topProductsChart').getContext('2d');

    let revenueChart = new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Doanh Thu',
                data: [],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    let topProductsChart = new Chart(topProductsCtx, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                label: 'Sản phẩm bán chạy',
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.raw;
                            return label;
                        }
                    }
                }
            }
        }
    });

    document.getElementById('revenueFilterForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const startDate = document.getElementById('revenue_start_date').value;
        const endDate = document.getElementById('revenue_end_date').value;
        const period = document.getElementById('revenue_period').value;

        fetch(`/api/revenue-data?start_date=${startDate}&end_date=${endDate}&period=${period}`)
            .then(response => response.json())
            .then(data => {
                revenueChart.data.labels = data.labels;
                revenueChart.data.datasets[0].data = data.data;
                revenueChart.update();
            });
    });

    document.getElementById('topProductsFilterForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const startDate = document.getElementById('top_products_start_date').value;
        const endDate = document.getElementById('top_products_end_date').value;

        fetch(`/api/top-products-data?start_date=${startDate}&end_date=${endDate}`)
            .then(response => response.json())
            .then(data => {
                topProductsChart.data.labels = data.labels;
                topProductsChart.data.datasets[0].data = data.data;
                topProductsChart.update();
            });
    });

    // Trigger initial load
    document.getElementById('revenueFilterForm').dispatchEvent(new Event('submit'));
    document.getElementById('topProductsFilterForm').dispatchEvent(new Event('submit'));
});

    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partial.content-header', ['name' => 'Dashboard', 'key' => 'Thống kê'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thống Kê Doanh Thu</h3>
                            </div>
                            <div class="card-body">
                                <form id="revenueFilterForm" class="mb-4">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="revenue_start_date">Từ ngày:</label>
                                            <input type="date" class="form-control" id="revenue_start_date" name="start_date" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="revenue_end_date">Đến ngày:</label>
                                            <input type="date" class="form-control" id="revenue_end_date" name="end_date" required>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="revenue_period">Khoảng thời gian:</label>
                                            <select class="form-control" id="revenue_period" name="period">
                                                <option value="day">Ngày</option>
                                                <option value="month" selected>Tháng</option>
                                                <option value="year">Năm</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mb-3 align-self-end">
                                            <button class="btn btn-primary" type="submit">Lọc</button>
                                        </div>
                                    </div>
                                </form>
                                <canvas id="revenueChart" style="height: 300px; width: 100%;"></canvas>
                                <hr />
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h3 class="card-title">Sản Phẩm Bán Chạy</h3>
                            </div>
                            <div class="card-body">
                                <form id="topProductsFilterForm" class="mb-4">
                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <label for="top_products_start_date">Từ ngày:</label>
                                            <input type="date" class="form-control" id="top_products_start_date" name="start_date" required>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="top_products_end_date">Đến ngày:</label>
                                            <input type="date" class="form-control" id="top_products_end_date" name="end_date" required>
                                        </div>
                                        <div class="col-md-2 mb-3 align-self-end">
                                            <button class="btn btn-primary" type="submit">Lọc</button>
                                        </div>
                                    </div>
                                </form>
                                <canvas id="topProductsChart" style="height: 300px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
