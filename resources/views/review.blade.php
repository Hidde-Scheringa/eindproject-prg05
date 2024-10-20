<h1>Schrijf een review voor {{ $games->name }}</h1>

<form action="{{ route('reviews.store', ['game' => $games->id]) }}" method="post">
    @csrf
    <div>
        <x-input-label for="review">Review:</x-input-label>
        <x-textarea name="review" id="review" rows="4" class="mt-1 block w-full" />
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Verstuur Review</button>

</form>
