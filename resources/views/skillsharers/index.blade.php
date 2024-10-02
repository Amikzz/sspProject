<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skill Sharers') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ openAdd: false}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Button to open Add skill sharer modal -->
                <div class="p-5">
                    <button @click="openAdd = true" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Add Skill Sharer</button>
                </div>

                <!-- Add Skill sharer Modal -->
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
                                            <form method="POST" action="{{ route('skillsharers.store') }}">
                                                @csrf
                                                <!-- Name Field -->
                                                <div class="p-3">
                                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                                    <input type="text" name="name" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                                </div>

                                                <!-- Email Field -->
                                                <div class="p-3">
                                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                                    <input type="email" name="email" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                                </div>

                                                <!-- Password Field -->
                                                <div class="p-3">
                                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                                    <input type="password" name="password" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                                </div>

                                                <!-- Phone Field -->
                                                <div class="p-3">
                                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                                    <input type="text" name="phone" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                                </div>

                                                <!-- Address Field -->
                                                <div class="p-3">
                                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                                    <input type="text" name="address" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                                </div>

                                                <!-- Gender Field -->
                                                <div class="p-3">
                                                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                                                    <select name="gender" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>

                                                <!-- Skill Field -->
                                                <div class="p-3">
                                                    <label for="skills" class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
                                                    <select name="skills[]" id="skills" multiple class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                                        @foreach ($skills as $skill)
                                                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Skill Level Field -->
                                                <div class="p-3">
                                                    <label for="skill_level" class="block text-sm font-medium text-gray-700 mb-2">Skill Level</label>
                                                    <select name="skill_level" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                                        <option value="beginner">Beginner</option>
                                                        <option value="intermediate">Intermediate</option>
                                                        <option value="advanced">Advanced</option>
                                                    </select>
                                                </div>

                                                <!-- Years of Experience Field -->
                                                <div class="p-3">
                                                    <label for="years_of_experience" class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                                                    <input type="number" name="years_of_experience" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" min="0" required>
                                                </div>

                                                <!-- Availability Field -->
                                                <div class="p-3">
                                                    <label for="availability" class="block text-sm font-medium text-gray-700 mb-2">Availability</label>
                                                    <select name="availability" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                                        <option value="full_time">Full Time</option>
                                                        <option value="part_time">Part Time</option>
                                                        <option value="freelance">Freelance</option>
                                                    </select>
                                                </div>

                                                <!-- Submit and Cancel Buttons -->
                                                <div class="p-3">
                                                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Add Skill Sharer</button>
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

                <!-- Table showing the list of skill sharers -->
                <div class="p-5">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 border-b-2 border-gray-300">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Skill Sharer Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Skills</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($skillSharers as $skillSharer)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $skillSharer->id }}</td>

                                <!-- Assuming 'user' is a relation that provides the user's name -->
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $skillSharer->user->name }}</td>

                                <!-- Showing multiple skills -->
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    @foreach (json_decode($skillSharer->skills, true) as $skill)
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $skill }}</span>
                                    @endforeach
                                </td>

                                <!-- Phone number -->
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $skillSharer->user->phone }}</td>

                                <!-- Address -->
                                <!-- Phone number -->
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $skillSharer->user->address }}</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-5">{{ $skillSharers->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
