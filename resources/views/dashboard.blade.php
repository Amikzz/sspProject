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
                    <h1 class="text-4xl font-bold mb-4">Welcome, Admin</h1>
                    <p class="text-gray-700 mb-6">We are glad to have you back. You are here because you verified your email. Thank you for that. Click on get started to start your journey as the Admin.</p>
                    <a href="/skills" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Get Started</a>
                </div>

                <!-- Dashboard Metrics -->
                <div class="p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Total Skills -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-blue-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h10m-5 4h5M3 6h18M3 10h18M3 14h18m-6 4h6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total Skills</h3>
                                <p class="text-gray-600 mt-2">{{ $totalSkills }}</p> <!-- Dynamic value -->
                            </div>
                        </div>
                    </div>

                    <!-- Total Users -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-green-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v5h5V3H5zM14 8v5h5V8h-5zM3 14v6h6v-6H3zM15 14v6h6v-6h-6z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total Users</h3>
                                <p class="text-gray-600 mt-2">{{ $totalUsers }}</p> <!-- Dynamic value -->
                            </div>
                        </div>
                    </div>

                    <!-- Total Earnings -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex items-center justify-center bg-yellow-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.742 5.8a2 2 0 11-3.484 0 2 2 0 013.484 0zm-1.742 2.3a6 6 0 100 12 6 6 0 000-12zm0 9a3 3 0 110-6 3 3 0 010 6z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold text-gray-800">Total Earnings</h3>
                                <p class="text-gray-600 mt-2">Rs. {{ number_format($totalEarnings, 2) }}</p> <!-- Dynamic value -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Bars -->
                <div class="p-8">
                    <h2 class="text-xl font-semibold mb-4">System Status</h2>
                    <div class="bg-gray-200 rounded-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-800">System Health</h3>
                            <div class="flex items-center mt-2">
                                <div class="w-1/2 bg-green-500 text-white text-center py-1 px-2 rounded-full">Good</div>
                                <div class="w-1/2 bg-gray-300 rounded-full ml-2" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-800">Server Uptime</h3>
                            <div class="flex items-center mt-2">
                                <div class="w-1/2 bg-yellow-500 text-white text-center py-1 px-2 rounded-full">Moderate</div>
                                <div class="w-1/2 bg-gray-300 rounded-full ml-2" style="width: 50%"></div>
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
            </div>
        </div>
    </div>
</x-app-layout>
