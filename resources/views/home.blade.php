@extends('layouts.admin')
@section('content')
<div class="container-fluid" style="margin: 0%; padding: 3px;">
    <div class="row">
        <div class="col-12">
            <!-- Carousel inside a Card -->
            <div class="card shadow-lg mb-4" style="border-radius: 15px; overflow: hidden;">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="1500">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/1.jpg') }}" class="d-block w-100" style="height: 300px; object-fit: cover;" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/2.jpg') }}" class="d-block w-100" style="height: 300px; object-fit: cover;" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/3.jpg') }}" class="d-block w-100" style="height: 300px; object-fit: cover;" alt="Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row">
        <!-- Large Grid (Left) -->
        <div class="col-lg-6 mb-3">
            <div class="card shadow-sm text-center" style="background-color: #8DA290; border-radius: 15px; color: black;">
                <div class="card-body">
                    <i class="fas fa-chart-line mb-2" style="font-size: 2rem; color: #3A583E;"></i>
                    <h1 style="font-size: 8rem;">{{$orders_count}}</h1>
                    <p class="h5 mt-3">Orders Count</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <!-- Total Products -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm text-center" style="background-color: #DCCFB1; border-radius: 15px; color: black;">
                        <div class="card-body">
                            <i class="fas fa-box mb-2" style="font-size: 2rem; color: #6A6351;"></i>
                            <h3>{{$products_count}}</h3>
                            <p class="h6 mt-3">Total Products</p>
                        </div>
                    </div>
                </div>
                <!-- Total Customers -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm text-center" style="background-color: #D1D6CD; border-radius: 15px; color: black;">
                        <div class="card-body">
                            <i class="fas fa-users mb-2" style="font-size: 2rem; color: #575E51;"></i>
                            <h3>{{$customers_count}}</h3>
                            <p class="h6 mt-3">Total Customers</p>
                        </div>
                    </div>
                </div>
                <!-- Today's Income -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm text-center" style="background-color: #DBBAAC; border-radius: 15px; color: black;">
                        <div class="card-body">
                            <i class="fas fa-money-check-alt mb-2" style="font-size: 2rem; color: #664B4B;"></i>
                            <h3>{{config('settings.currency_symbol')}} {{number_format($income_today, 2)}}</h3>
                            <p class="h6 mt-3">Today's Income</p>
                        </div>
                    </div>
                </div>
                <!-- Total Income -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm text-center" style="background-color: #CAD2D5; border-radius: 15px; color: black;">
                        <div class="card-body">
                            <i class="fas fa-dollar-sign mb-2" style="font-size: 2rem; color: #566064;"></i>
                            <h3>{{config('settings.currency_symbol')}} {{number_format($total_income, 2)}}</h3>
                            <p class="h6 mt-3">Total Income</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Sales Charts Section -->
          <div class="row">
            <div class="col-md-4">
                <div class="card mt-4" style="border-radius: 15px; background-color: #F8F9FA; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #003c2f; color: white; border-radius: 15px 15px 0 0;">
                        Sales Today
                    </div>
                    <div class="card-body">
                        <canvas id="salesTodayChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mt-4" style="border-radius: 15px; background-color: #F8F9FA; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #003c2f; color: white; border-radius: 15px 15px 0 0;">
                        Sales This Week
                    </div>
                    <div class="card-body">
                        <canvas id="salesWeekChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mt-4" style="border-radius: 15px; background-color: #F8F9FA; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #003c2f; color: white; border-radius: 15px 15px 0 0;">
                        Sales This Month
                    </div>
                    <div class="card-body">
                        <canvas id="salesMonthChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card shadow-sm text-center" style="background-color: #DBBAAC; border-radius: 15px; color: black;">
                        <div class="card-body">
                            <h3 class="card-title mb-3" style="font-size: 1.5rem;">Predicted Income for Next Week</h3>
                            @if($predicted_income_next_week)
                                <h2>{{ config('settings.currency_symbol') }}{{ number_format($predicted_income_next_week, 2) }}</h2>
                            @else
                                <p>Not enough data to make predictions.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <section class="intro">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <h3 class="mt-4 mb-3">Latest Orders</h3>
                                <div class="card shadow-sm">
                                    <div class="card-body p-0">
                                        <div class="table-responsive table-scroll" style="position: relative;">
                                            <table class="table table-striped mb-0">
                                                <thead style="background-color: #003c2f; color: white;">
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Customer Name</th>
                                                        <th>Order Date</th>
                                                        <th>Total</th>
                                                        <th>Received Amount</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($latest_orders as $order)
                                                    <tr>
                                                        <td>{{ $order->id }}</td>
                                                        <td>{{ $order->customer->first_name ?? ''}}</td>
                                                        <td>{{ $order->created_at->format('d M, Y h:i A') }}</td>
                                                        <td>{{ config('settings.currency_symbol') }} {{ number_format($order->total(), 2) }}</td>
                                                        <td>{{ config('settings.currency_symbol') }} {{ number_format($order->receivedAmount(), 2) }}</td>
                                                        <td>
                                                            <a href="{{ route('orders.index', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

     </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if($isMonthEnd)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Monthly Suggestion",
                text: "{{ $suggestion }}",
                icon: "info",
                confirmButtonText: "Understood",
            });
        });
    </script>
@endif
<script>
    // Sales Today Chart
    var ctx1 = document.getElementById('salesTodayChart').getContext('2d');
    var salesTodayChart = new Chart(ctx1, {
        type: 'bar', // Use bar chart
        data: {
            labels: ['Today'],
            datasets: [{
                label: 'Sales Today',
                data: [{{ $income_today }}],
                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Light blue
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        beginAtZero: true
                    },
                    title: {
                        display: true,
                        text: 'Amount'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Period'
                    }
                }
            }
        }
    });

    // Sales This Week Chart
    var ctx2 = document.getElementById('salesWeekChart').getContext('2d');
    var salesWeekChart = new Chart(ctx2, {
        type: 'bar', // Use bar chart
        data: {
            labels: ['This Week'],
            datasets: [{
                label: 'Sales This Week',
                data: [{{ $income_week }}],
                backgroundColor: 'rgba(153, 102, 255, 0.5)', // Purple
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        beginAtZero: true
                    },
                    title: {
                        display: true,
                        text: 'Amount'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Period'
                    }
                }
            }
        }
    });

    // Sales This Month Chart
    var ctx3 = document.getElementById('salesMonthChart').getContext('2d');
    var salesMonthChart = new Chart(ctx3, {
        type: 'bar', // Use bar chart
        data: {
            labels: ['This Month'],
            datasets: [{
                label: 'Sales This Month',
                data: [{{ $income_month }}],
                backgroundColor: 'rgba(255, 159, 64, 0.5)', // Orange
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        beginAtZero: true
                    },
                    title: {
                        display: true,
                        text: 'Amount'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Period'
                    }
                }
            }
        }
    });
</script>
@endsection
