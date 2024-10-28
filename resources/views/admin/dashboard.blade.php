<x-html-head/>
<body class="bg-gray-100">
<div class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <div class="flex space-x-4">
            <form action="/profile" method="GET" class="inline">
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">Profiel</button>
            </form>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition duration-200">Uitloggen</button>
            </form>
        </div>
    </div>
</div>

<div class="container mx-auto my-10">
    <div class="text-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Beheer je content</h2>
        <p class="text-gray-600">Gebruik de onderstaande links om toegang te krijgen tot verschillende beheermogelijkheden.</p>
    </div>

    <div class="flex justify-center space-x-4">
        <a href="{{ route('admin-reviews') }}" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition duration-200">
            Review Manager
        </a>
        <a href="{{ route('admin-toggle') }}" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition duration-200">
            Post Manager
        </a>
    </div>
</div>
</body>
