<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Welcome Section -->
                <div class="p-8 text-center">
                    <h1 class="text-4xl font-bold mb-4">Welcome {{ $username }} !</h1>
                    <p class="text-gray-600">
                        @if($role == 'sadmin')
                            You are logged in as a Super Admin.
                        @endif
                        @if($role == 'admin')
                            You are logged in as an Admin.
                        @endif
                    </p>
                    <br>
                    <a href="/skills" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Get Started</a>
                </div>

                <!-- Dashboard Metrics -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Total Skills -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-indigo-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m-4-2h8"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total Skills</h3>
                                <p class="text-gray-600 mt-2">{{ $totalSkills }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total System Users -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-pink-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8 8 0 1118.879 6.196a8 8 0 01-13.758 11.608z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total System Users</h3>
                                <p class="text-gray-600 mt-2">{{ $totalUsers }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Earnings -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-teal-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3.314 0-6 2.686-6 6h6v-6z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total Earnings</h3>
                                <p class="text-gray-600 mt-2">Rs. {{ number_format($totalEarnings, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Total Super Admin -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-red-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total Super Admins</h3>
                                <p class="text-gray-600 mt-2">{{ $totalsadmin }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Admins -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-orange-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10v6M8 10v6m2-4h4"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total Admins</h3>
                                <p class="text-gray-600 mt-2">{{ $totaladmin }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Customers -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-purple-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18m-9 4h5m-5 0v4m-7-4H5"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total Customers</h3>
                                <p class="text-gray-600 mt-2">{{ $totalcustomer }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Recent Activities -->
                <div class="p-8">
                    <h2 class="text-xl font-semibold mb-4">Recent Activities</h2>
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <ul class="space-y-4">
                            @foreach ($recentActivities as $activity)
                                <li class="flex items-center">
                                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-500 rounded-full">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16m-7 4h7"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-gray-800 font-medium">{{ $activity['message'] }}</p>
                                        <p class="text-gray-600 text-sm">{{ $activity['timestamp'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">User Growth Over Time</h3>
                    <canvas id="userGrowthChart" width="400" height="200"></canvas>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('userGrowthChart').getContext('2d');

            fetch('/user-growth-data')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.date); // X-axis (Dates)
                    const userCounts = data.map(item => item.count); // Y-axis (Number of users)

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Users',
                                data: userCounts,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderWidth: 2,
                                fill: true
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Date',
                                    },
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Number of Users',
                                    },
                                }
                            }
                        }
                    });
                });
        });
    </script>
</x-app-layout>
