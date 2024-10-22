<x-html-head/>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Admin Review Manager</h1>

    @foreach($review as $reviews)
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <h2 class="font-semibold text-xl text-gray-800">{{ $reviews->user->name }}</h2>
            <h3 class="text-lg text-gray-600 mb-2">{{ $reviews->game->name }}</h3>
            <p class="text-gray-700 mb-4">{{ $reviews->review }}</p>

            <form action="{{ route('admin-reviews.destroy', $reviews->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-primary-button type="submit" class="bg-red-500 hover:bg-red-600 text-white">Verwijder</x-primary-button>
            </form>
        </div>
    @endforeach
</div>
