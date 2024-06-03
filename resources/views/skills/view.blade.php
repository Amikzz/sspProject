<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $skill->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5">
                    <a href="{{ route('skills.edit', ['skill' => $skill->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <form action="{{route('skills.destroy', $skill->id)}}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Are you sure?')"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                    <a href="{{ route('skills.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
                <div class="p-5">
                    <p>ID:  {{ $skill->id }}</p>
                </div>
                <div class="p-5">
                    <p>Description:  {{ $skill->description }}</p>
                </div>
                <div class="p-5">
                    <p>Price per hour: Rs. {{ $skill->priceperhour }}</p>
                </div>
                <div class="p-5">
                    <p>Created at: {{ $skill->created_at }}</p>
                </div>
                <div class="p-5">
                    <p>Updated at: {{ $skill->updated_at }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
