<x-html-head/>

<div class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Schrijf een review voor {{ $games->name }}</h1>

        <form action="{{ route('reviews.store', ['game' => $games->id]) }}" method="post">
            @csrf
            <div class="mb-4">
                <x-input-label for="review">Review:</x-input-label>
                <x-textarea name="review" id="review" rows="4"
                            class="mt-1 block w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                />
                @if($errors->has('review'))
                    <div class="text-red-500 mt-1">{{ $errors->first('review') }}</div>
                @endif
            </div>

            <!-- Knop gecentreerd met aangepaste kleur -->
            <div class="flex justify-center">
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded mt-2 hover:bg-gray-700 transition duration-200">Verstuur Review</button>
            </div>
        </form>
    </div>
</div>
