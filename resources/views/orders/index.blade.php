<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ openOrderShow: false, showOrders: null}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Show Order Modal -->
                <div x-show="openOrderShow" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Overlay -->
                        <div x-show="openOrderShow" @click="openOrderShow = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <!-- Modal Content -->
                        <div x-show="openOrderShow" @click.away="openOrderShow = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-text="showOrders.id"></h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-700"><strong>Order ID:</strong> <span x-text="showOrders.id"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Customer ID:</strong> <span x-text="showOrders.customerID"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Supplier ID:</strong> <span x-text="showOrders.supplierID"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Skill ID:</strong> <span x-text="showOrders.skillID"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Number of Hours:</strong> <span x-text="showOrders.no_of_hours"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Total Amount:</strong> Rs. <span x-text="showOrders.total_amount"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Status:</strong> <span x-text="showOrders.status"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Created at:</strong> <span x-text="showOrders.created_at"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Updated at:</strong> <span x-text="showOrders.updated_at"></span></p>
                                        </div>
                                        <div class="p-3 mt-4">
                                            <button @click="openOrderShow = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table showing the list of skill sharers -->
                <div class="p-5">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 border-b-2 border-gray-300">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Customer ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Customer Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Skill Sharer ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Skill Sharer Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Total Amount</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $order->customerID }}</td>

                                <!-- Assuming 'user' is a relation that provides the user's name -->
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $order->user->name }}</td>

                                <td class="px-6 py-4 text-sm text-gray-700">{{ $order->supplierID }}</td>

                                <!-- Assuming 'supplier' is a relation that provides the supplier's name -->
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $order->supplier }}</td>

                                <td class="px-6 py-4 text-sm text-gray-700">Rs. {{ $order->total_amount }}</td>

                                <!-- Action buttons-->
                                <td class="px-6 py-4 text-sm">
                                    <!-- Open Show Modal Button -->
                                    <button @click="openOrderShow = true; showOrders = {{ $order }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 mr-2 rounded">Show Order</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-5">{{ $orders->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
