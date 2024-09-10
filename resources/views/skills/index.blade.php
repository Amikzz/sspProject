<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skills') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ openAdd: false, openEdit: false, openShow: false, editSkill: null, showSkill: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Button to open Add Skill modal -->
                <div class="p-5">
                    <button @click="openAdd = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Skill</button>
                </div>

                <!-- Add Skill Modal -->
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
                                            Create New Skill
                                        </h3>
                                        <div class="mt-2">
                                            <form method="POST" action="{{ route('skills.store') }}">
                                                @csrf
                                                <div class="p-3">
                                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Skill</label>
                                                    <input type="text" name="name" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                                    <textarea name="description" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"></textarea>
                                                </div>
                                                <div class="p-3">
                                                    <label for="priceperhour" class="block text-sm font-medium text-gray-700 mb-2">Price Per Hour</label>
                                                    <input type="number" name="priceperhour" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                                    <select name="category_id" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="p-3">
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Skill</button>
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

                <!-- Edit Skill Modal -->
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
                                            Edit Skill
                                        </h3>
                                        <div class="mt-2">
                                            <form method="POST" :action="'/skills/' + editSkill.id">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-3">
                                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Skill</label>
                                                    <input type="text" name="name" x-model="editSkill.name" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                                    <textarea name="description" x-model="editSkill.description" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"></textarea>
                                                </div>
                                                <div class="p-3">
                                                    <label for="priceperhour" class="block text-sm font-medium text-gray-700 mb-2">Price Per Hour</label>
                                                    <input type="number" name="priceperhour" x-model="editSkill.priceperhour" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                </div>
                                                <div class="p-3">
                                                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                                    <select name="category_id" x-model="editSkill.category_id" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" :selected="editSkill.category_id == '{{ $category->id }}'">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="p-3">
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Skill</button>
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

                <!-- Show Skill Modal -->
                <div x-show="openShow" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Overlay -->
                        <div x-show="openShow" @click="openShow = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <!-- Modal Content -->
                        <div x-show="openShow" @click.away="openShow = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-text="showSkill.name"></h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-700"><strong>ID:</strong> <span x-text="showSkill.id"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Description:</strong> <span x-text="showSkill.description"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Price per hour:</strong> Rs. <span x-text="showSkill.priceperhour"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Category:</strong> <span x-text="showSkill.category_id"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Created at:</strong> <span x-text="showSkill.created_at"></span></p>
                                            <p class="text-sm text-gray-700 mt-2"><strong>Updated at:</strong> <span x-text="showSkill.updated_at"></span></p>
                                        </div>
                                        <div class="p-3 mt-4">
                                            <button @click="openShow = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table showing the list of skills -->
                <div class="p-5">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 border-b-2 border-gray-300">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Skill Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Price Per Hour</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($skills as $skill)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $skill->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $skill->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $skill->priceperhour }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <!-- Open Edit Modal Button -->
                                    <button @click="openEdit = true; editSkill = {{ $skill }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mr-2 rounded">Edit</button>
                                    <!-- Open Show Modal Button -->
                                    <button @click="openShow = true; showSkill = {{ $skill }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 mr-2 rounded">Show</button>
                                    <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="inline">
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
                <div class="p-5">{{ $skills->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
