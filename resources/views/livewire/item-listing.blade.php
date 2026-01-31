<div>
    <div class="mb-12 text-center">
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Katalog Rental Kami</h1>
        <p class="mt-3 text-slate-500 max-w-2xl mx-auto font-medium">Temukan motor atau alat terbaik untuk kebutuhan Anda dengan harga transparan dan proses instan.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($items as $item)
        <div class="group bg-white rounded-[2rem] shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-slate-100 overflow-hidden">
            <div class="relative h-64 overflow-hidden">
                <img class="h-full w-full object-cover group-hover:scale-110 transition duration-700" src="{{ $item->image ? asset('storage/'.$item->image) : 'https://placehold.co/600x400' }}" alt="{{ $item->name }}">
                <div class="absolute top-4 right-4 px-3 py-1 bg-white/90 glass rounded-full text-xs font-bold text-slate-800 shadow-sm">
                    Stok: {{ $item->stock }}
                </div>
            </div>
            
            <div class="p-8">
                <h3 class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition">{{ $item->name }}</h3>
                <p class="text-slate-500 text-sm mt-2 line-clamp-2 leading-relaxed">{{ $item->description }}</p>
                
                <div class="mt-8 flex items-end justify-between">
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Harga Sewa</p>
                        <p class="text-2xl font-black text-slate-900">Rp{{ number_format($item->price_per_day) }}<span class="text-sm font-medium text-slate-400">/hari</span></p>
                    </div>
                    
                    <a href="/items/{{ $item->id }}" class="flex items-center justify-center w-12 h-12 bg-slate-50 text-slate-900 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-all transform active:scale-95 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>