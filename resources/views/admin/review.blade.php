<x-html-head/>
<div class="container mx-auto p-6 bg-gray-100">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Admin Review Manager</h1>

    @foreach($review as $reviews)
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6 transition duration-200 hover:shadow-xl">
            <h2 class="font-semibold text-xl text-gray-800">{{ $reviews->user->name }}</h2>
            <h3 class="text-lg text-gray-600 mb-2">{{ $reviews->game->name }}</h3>
            <p class="text-gray-700 mb-4">{{ $reviews->review }}</p>

            <form action="{{ route('admin-reviews.destroy', $reviews->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    Verwijder
                </button>
            </form>
        </div>
    @endforeach
</div>
