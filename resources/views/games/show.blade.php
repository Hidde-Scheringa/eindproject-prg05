<x-html-head/>

<div class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-4">{{ $game->name }}</h1>

        @if(Auth::check())
            <a href="{{ route('games.index') }}" class=" text-white font-semibold py-2 px-4 rounded transition duration-200">
                <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-1/2 h-auto mx-auto rounded-lg mb-4">
            </a>
        @else
            <a href="{{ route('index') }}" class=" text-white font-semibold py-2 px-4 rounded transition duration-200">
                <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-1/2 h-auto mx-auto rounded-lg mb-4">
            </a>
        @endif

        <p class="text-lg text-gray-700 mb-4">
            Uitgever: <span class="font-semibold text-blue-600">{{ $game->publisher }}</span>
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mb-3">Recensies</h2>

        @foreach($reviews as $review)
            <div class="border-b border-gray-300 mb-4 pb-4">
                <p class="font-medium text-gray-800">{{ $review->user->name }}</p>
                <p class="text-gray-600">{{ $review->review }}</p>
            </div>
        @endforeach

        @if ($reviews->isEmpty())
            <p class="text-gray-500">Geen recensies beschikbaar.</p>
        @endif
    </div>
</div>
