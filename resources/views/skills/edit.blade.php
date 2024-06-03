<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit skill: ') }}  {{$skill->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('skills.update', $skill->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="p-3">
                        <label for="name">Skill</label>
                        <input type="text" name="name" value="{{$skill->name}}" class="border-2 border-gray-500 rounded-lg p-2 w-full">
                    </div>
                    <div class="p-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="border-2 border-gray-500 rounded-lg p-2 w-full">{{$skill->description}}</textarea>
                    </div>
                    <div class="p-3">
                        <label for="name">Price Per hour</label>
                        <input type="number" name="priceperhour" value="{{$skill->priceperhour}}" class="border-2 border-gray-500 rounded-lg p-2 w-full">
                    </div>
                    <div class="p-3">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
