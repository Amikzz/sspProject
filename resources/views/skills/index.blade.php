<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5"><a href="{{route('skills.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Skill</a></div>
                <table class="table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="w-1/2 ...">ID</th>
                            <th class="w-1/2 ...">Skill</th>
                            <th class="w-1/4 ...">Price Per Hour</th>
                            <th class="w-1/4 ...">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skills as $skill)
                            <tr>
                                <td class="border px-4 py-2">{{ $skill->id }}</td>
                                <td class="border px-4 py-2">{{ $skill->name }}</td>
                                <td class="border px-4 py-2">{{ $skill->priceperhour }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{route('skills.edit', $skill->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 mr-2 mt-2 rounded cursor-pointer">Edit</a>
                                    <a href="{{route('skills.show', $skill->id)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 mr-2 rounded cursor-pointer">Show</a>
                                    <form action="{{route('skills.destroy', $skill->id)}}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Are you sure?')"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mr-2 mt-2 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="p-5">{{ $skills->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
