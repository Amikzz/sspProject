<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-md w-full bg-white p-8 rounded-lg text-center mx-auto">
                    <h1 class="text-4xl font-bold mb-4">Welcome, Admin</h1>
                    <p class="text-gray-700 mb-4">We are glad to have you back. You are here because you verified your email. Thank you for that. Click on get started to start your journey as the Admin.</p>
                    <a href="/skills" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    </body>
</x-app-layout>
