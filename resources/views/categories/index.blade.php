<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ openAdd: false, openEdit: false, openShow: false, editCategory: null, showCategory: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Button to open Add Category modal -->
                <div class="p-5">
                    <button @click="openAdd = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Category</button>
                </div>

                <!-- Add Category Modal -->
                <div x-show="openAdd" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Overlay -->
                        <div x-show="openAdd" @click="openAdd = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <!-- Modal Content -->
                        <div x-show="openAdd" @click.away="openAdd = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Create New Category
                                        </h3>
                                        <div class="mt-2">
                                            <form method="POST" action="{{ route('categories.store') }}">
                                                @csrf
                                                <div class="p-3">
                                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                                    <input type="text" name="name" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Category</button>
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

                <!-- Edit Category Modal -->
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
                                            Edit Category
                                        </h3>
                                        <div class="mt-2">
                                            <form method="POST" :action="'/categories/' + editCategory.id">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-3">
                                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                                    <input type="text" name="name" x-model="editCategory.name" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Category</button>
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

                <!-- Show Category Modal -->
                <div x-show="openShow" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Overlay -->
                        <div x-show="openShow" @click="openShow = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <!-- Modal Content -->
                        <div x-show="openShow" @click.away="openShow = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-text="showCategory.name"></h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-700"><strong>ID:</strong> <span x-text="showCategory.id"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Slug:</strong> <span x-text="showCategory.slug"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Created at:</strong> <span x-text="showCategory.created_at"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Updated at:</strong> <span x-text="showCategory.updated_at"></span></p>
                                            <button type="button" @click="openShow = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table of Categories -->
                <div class="p-5">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 border-b-2 border-gray-300">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Category Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Slug</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $category->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $category->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $category->slug }}</td>
                                <td class="px-6 py-4 text-sm font-medium">
                                    <button @click="openEdit = true; editCategory = {{ $category->toJson() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mr-2 rounded">Edit</button>
                                    <button @click="openShow = true; showCategory = {{ $category->toJson() }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 mr-2 rounded">Show</button>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
