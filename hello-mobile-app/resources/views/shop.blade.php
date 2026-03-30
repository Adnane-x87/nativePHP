<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Native Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .product-card:active { transform: scale(0.98); transition: 0.1s; }
    </style>
</head>
<body class="bg-gray-50 pb-10">

    <header class="sticky top-0 z-50 bg-white border-b px-4 py-3 flex justify-between items-center shadow-sm">
        <h1 class="text-xl font-extrabold tracking-tight text-indigo-600">ProStore</h1>
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] rounded-full h-4 w-4 flex items-center justify-center">2</span>
        </div>
    </header>

    <div class="flex gap-2 p-4 overflow-x-auto no-scrollbar">
        <span class="bg-indigo-600 text-white px-4 py-1 rounded-full text-xs font-medium">All</span>
        <span class="bg-white border text-gray-600 px-4 py-1 rounded-full text-xs font-medium">Electronics</span>
        <span class="bg-white border text-gray-600 px-4 py-1 rounded-full text-xs font-medium">Jewelry</span>
        <span class="bg-white border text-gray-600 px-4 py-1 rounded-full text-xs font-medium">Men</span>
    </div>

    <main class="px-4">
        <div class="grid grid-cols-2 gap-4">
            @foreach($products as $product)
                <div class="product-card bg-white rounded-2xl p-3 shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="bg-gray-50 rounded-xl p-4 mb-3 flex justify-center items-center h-40">
                            <img src="{{ $product['image'] }}" class="max-h-full object-contain mix-blend-multiply">
                        </div>
                        
                        <span class="text-[10px] uppercase text-gray-400 font-bold tracking-widest">{{ $product['category'] }}</span>
                        <h2 class="text-sm font-semibold text-gray-800 line-clamp-2 mt-1 leading-snug">
                            {{ $product['title'] }}
                        </h2>
                    </div>

                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-900">${{ $product['price'] }}</span>
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white p-2 rounded-lg shadow-md transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <nav class="fixed bottom-0 w-full bg-white border-t flex justify-around py-3">
        <div class="text-indigo-600">
            <svg class="h-6 w-6 mx-auto" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
        </div>
        <div class="text-gray-400">
            <svg class="h-6 w-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
        <div class="text-gray-400">
            <svg class="h-6 w-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </div>
    </nav>

</body>
</html>