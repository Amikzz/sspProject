<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ openAdd: false, openEdit: false, openShow: false, editUser: null, showUser: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Add User Button -->
                <div class="p-5">
                    <button @click="openAdd = true" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Add User</button>
                </div>

                <!-- Add User Modal -->
                <div x-show="openAdd" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-end min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Overlay -->
                        <div x-show="openAdd" @click="openAdd = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <!-- Modal Content -->
                        <div x-show="openAdd" @click.away="openAdd = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Add New User
                                        </h3>
                                        <div class="mt-2">
                                            <form method="POST" action="{{ route('users.store') }}">
                                                @csrf
                                                <!-- Name -->
                                                <div class="p-3">
                                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                                    <input type="text" name="name" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500" required>
                                                </div>
                                                <!-- Email -->
                                                <div class="p-3">
                                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                                    <input type="email" name="email" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500" required>
                                                </div>
                                                <!-- Password -->
                                                <div class="p-3">
                                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                                    <input type="password" name="password" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500" required>
                                                </div>
                                                <!-- Phone -->
                                                <div class="p-3">
                                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                                    <input type="number" name="phone" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500">
                                                </div>
                                                <!-- Address -->
                                                <div class="p-3">
                                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                                    <input type="text" name="address" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500">
                                                </div>
                                                <!-- Gender -->
                                                <div class="p-3">
                                                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                                                    <select name="gender" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <!-- User Type -->
                                                <div class="p-3">
                                                    <label for="userType" class="block text-sm font-medium text-gray-700 mb-2">User Type</label>
                                                    <select name="userType" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500">
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                </div>
                                                <div class="p-3">
                                                    <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Add User</button>
                                                    <button type="button" @click="openAdd = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded ml-2">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit User Modal -->
                <div x-show="openEdit" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Overlay -->
                        <div x-show="openEdit" @click="openEdit = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <!-- Modal Content -->
                        <div x-show="openEdit" @click.away="openEdit = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Edit User
                                        </h3>
                                        <div class="mt-2">
                                            <form method="POST" :action="'/users/' + editUser.id">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-3">
                                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                                    <input type="text" name="name" x-model="editUser.name" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                                    <input type="email" name="email" x-model="editUser.email" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone number</label>
                                                    <input type="number" name="phone" x-model="editUser.phone" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                                    <input type="text" name="address" x-model="editUser.address" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                                                    <select name="gender" x-model="editUser.gender" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="p-3">
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update User</button>
                                                    <button type="button" @click="openEdit = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded ml-2">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Show User Modal -->
                <div x-show="openShow" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Overlay -->
                        <div x-show="openShow" @click="openShow = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <!-- Modal Content -->
                        <div x-show="openShow" @click.away="openShow = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            User Details
                                        </h3>
                                        <div class="mt-2">
                                            <p><strong>ID:</strong> <span x-text="showUser.id"></span></p>
                                            <p><strong>Name:</strong> <span x-text="showUser.name"></span></p>
                                            <p><strong>Email:</strong> <span x-text="showUser.email"></span></p>
                                            <p><strong>Gender:</strong> <span x-text="showUser.gender"></span></p>
                                            <p><strong>Phone:</strong> <span x-text="showUser.phone"></span></p>
                                            <p><strong>Address:</strong> <span x-text="showUser.address"></span></p>
                                            <p><strong>Created At:</strong> <span x-text="showUser.created_at"></span></p>
                                            <p><strong>Updated At:</strong> <span x-text="showUser.updated_at"></span></p>
                                            <p><strong>User Type:</strong> <span x-text="showUser.userType"></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-4 sm:ml-4 sm:flex">
                                    <button type="button" @click="openShow = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table showing the list of users -->
                <div class="p-5">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 border-b-2 border-gray-300">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">User Type</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $user->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $user->userType }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <!-- Open Edit Modal Button -->
                                    <button @click="openEdit = true; editUser = {{ $user }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mr-2 rounded">Edit</button>
                                    <!-- Open Show Modal Button -->
                                    <button @click="openShow = true; showUser = {{ $user }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 mr-2 rounded">Show</button>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mr-2 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-5">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
