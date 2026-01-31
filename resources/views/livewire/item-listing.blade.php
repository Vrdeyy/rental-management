<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
    @foreach($items as $item)
    <div class="bg-white rounded-xl shadow-md overflow-hidden border">
        <img class="h-48 w-full object-cover" src="{{ $item->image ? asset('storage/'.$item->image) : 'https://placehold.co/600x400' }}" alt="{{ $item->name }}">
        <div class="p-4">
            <h3 class="text-lg font-bold">{{ $item->name }}</h3>
            <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $item->description }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-blue-600 font-bold">Rp {{ number_format($item->price_per_day) }}/hari</span>
                <span class="text-xs text-gray-400">Stok: {{ $item->stock }}</span>
            </div>
            <a href="/items/{{ $item->id }}" class="mt-4 block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Booking Sekarang
            </a>
        </div>
    </div>
    @endforeach
</div>