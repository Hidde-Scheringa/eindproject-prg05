<x-html-head/>

<div class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Maak een Nieuwe Game Aan</h1>

        <form action="{{ route('games.store') }}" method="post">
            @csrf


            <div class="mb-4">
                <x-input-label for="name">Naam</x-input-label>
                <x-text-input name="name" id="name"
                              class="mt-1 block w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                />
                @if($errors->has('name'))
                    <div class="text-red-500 mt-1">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <!-- Publisher Invoerveld -->
            <div class="mb-4">
                <x-input-label for="publisher">Publisher</x-input-label>
                <x-text-input name="publisher" id="publisher"
                              class="mt-1 block w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                />
                @if($errors->has('publisher'))
                    <div class="text-red-500 mt-1">{{ $errors->first('publisher') }}</div>
                @endif
            </div>

            <div class="mb-4">
                <x-input-label for="genre">Genre</x-input-label>
                    <select name="genre[]">
                        <option value="1">Fantasy</option>
                        <option value="2">Adventure</option>
                        <option value="3">Simulation</option>
                        <option value="4">RPG</option>
                        <option value="5">Sport</option>
                        <option value="6">Strategy</option>
                    </select>
             @if($errors->has('genre'))
                    <div class="text-red-500 mt-1">{{ $errors->first('genre') }}</div>
                @endif
            </div>


            <div class="mb-4">
                <x-input-label for="cover_image">Cover Art</x-input-label>
                <x-text-input name="cover_image" id="cover_image"
                              class="mt-1 block w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                />
                @if($errors->has('cover_image'))
                    <div class="text-red-500 mt-1">{{ $errors->first('cover_image') }}</div>
                @endif
            </div>


            <div class="flex justify-center">
                <x-primary-button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition duration-200">
                    Maak aan
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
