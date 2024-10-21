<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<h1>{{ $game->name }}</h1>
<img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}">
<p>{{ $game->playtime }} uur</p>
<p>{{$game->publisher}}</p>


@foreach($reviews as $review)
    <p>{{ $review->user->name }}</p>
    <p>{{$review->review}}</p>
@endforeach


