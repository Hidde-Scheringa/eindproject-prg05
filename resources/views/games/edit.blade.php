<x-html-head/>
<h1>YOOOOOOO je bent er man</h1>

<form action="{{ route('games.update', $game->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <x-input-label for="name">Naam</x-input-label>
        <x-text-input name="name" id="name" value="{{ old('name', $game->name) }}"
                      class="mt-1 block w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
        />
        @if($errors->has('name'))
            <div class="text-red-500 mt-1">{{ $errors->first('name') }}</div>
        @endif
    </div>

    <!-- Publisher Invoerveld -->
    <div class="mb-4">
        <x-input-label for="publisher">Publisher</x-input-label>
        <x-text-input name="publisher" id="publisher" value="{{ old('publisher', $game->publisher) }}"
                      class="mt-1 block w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
        />
        @if($errors->has('publisher'))
            <div class="text-red-500 mt-1">{{ $errors->first('publisher') }}</div>
        @endif
    </div>

    <div class="mb-4">
        <x-input-label for="genre">Genre</x-input-label>
        <select name="genre[]" multiple>
            <option value="1" {{ in_array(1, old('genre', $activeGenre)) ? 'selected' : '' }}>Fantasy</option>
            <option value="2" {{ in_array(2, old('genre', $activeGenre)) ? 'selected' : '' }}>Adventure</option>
            <option value="3" {{ in_array(3, old('genre', $activeGenre)) ? 'selected' : '' }}>Simulation</option>
            <option value="4" {{ in_array(4, old('genre', $activeGenre)) ? 'selected' : '' }}>RPG</option>
            <option value="5" {{ in_array(5, old('genre', $activeGenre)) ? 'selected' : '' }}>Sport</option>
            <option value="6" {{ in_array(6, old('genre', $activeGenre)) ? 'selected' : '' }}>Strategy</option>
        </select>
        @if($errors->has('genre'))
            <div class="text-red-500 mt-1">{{ $errors->first('genre') }}</div>
        @endif
    </div>


    <div class="mb-4">
        <x-input-label for="cover_image">Cover Art</x-input-label>
        <x-text-input name="cover_image" id="cover_image" value="{{ old('cover_image', $game->cover_image) }}"
                      class="mt-1 block w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
        />
        @if($errors->has('cover_image'))
            <div class="text-red-500 mt-1">{{ $errors->first('cover_image') }}</div>
        @endif
    </div>


    <div class="flex justify-center">
        <x-primary-button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition duration-200">
            Bijwerken
        </x-primary-button>
    </div>
</form>

