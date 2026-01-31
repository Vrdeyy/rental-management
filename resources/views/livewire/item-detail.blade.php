<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row border">
        <div class="md:w-1/2">
            <img class="h-full w-full object-cover" src="{{ $item->image ? asset('storage/'.$item->image) : 'https://placehold.co/600x400' }}">
        </div>
        <div class="p-8 md:w-1/2">
            <h1 class="text-3xl font-bold">{{ $item->name }}</h1>
            <p class="text-gray-500 mt-2">{{ $item->description }}</p>
            
            <div class="mt-8 p-4 bg-gray-50 rounded-xl">
                <h3 class="font-bold mb-4 text-gray-700">Pilih Tanggal Rental</h3>
                
                @if (session()->has('error'))
                    <div class="mb-4 text-red-600 font-bold p-2 bg-red-100 rounded">{{ session('error') }}</div>
                @endif

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                        <input type="date" wire:model.live="startDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                        <input type="date" wire:model.live="endDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>

                <div class="mt-6 border-t pt-4">
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total Harga:</span>
                        <span class="text-blue-600">Rp {{ number_format($totalPrice) }}</span>
                    </div>
                    <button wire:click="book" class="w-full mt-4 bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                        Konfirmasi Booking
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>