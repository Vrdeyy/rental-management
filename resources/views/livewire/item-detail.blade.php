<div class="max-w-5xl mx-auto">
    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden flex flex-col lg:flex-row border border-slate-100">
        <!-- Foto -->
        <div class="lg:w-3/5 relative">
            <img class="h-full w-full object-cover min-h-[400px]" src="{{ $item->image ? asset('storage/'.$item->image) : 'https://placehold.co/800x600' }}">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        </div>

        <!-- Form Booking -->
        <div class="p-10 lg:w-2/5 flex flex-col justify-center">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase tracking-widest rounded-full inline-block">Item Detail</span>
                    <span class="px-3 py-1 bg-slate-100 text-slate-600 text-[10px] font-bold uppercase tracking-widest rounded-full inline-block">Tersedia: {{ $item->stock }} Unit</span>
                </div>
                <h1 class="text-3xl font-black text-slate-800 leading-tight">{{ $item->name }}</h1>
                <p class="text-slate-500 mt-3 text-sm leading-relaxed">{{ $item->description }}</p>
            </div>
            
            <div class="space-y-6">
                @if (session()->has('error'))
                    <div class="p-4 bg-red-50 text-red-600 text-xs font-bold rounded-2xl border border-red-100 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.401 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" /></svg>
                        {{ session('error') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-4">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 uppercase ml-2">Mulai Rental</label>
                        <input type="date" wire:model.live="startDate" class="block w-full px-5 py-3 rounded-2xl border-slate-100 bg-slate-50 text-slate-700 font-medium focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition outline-none">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 uppercase ml-2">Selesai Rental</label>
                        <input type="date" wire:model.live="endDate" class="block w-full px-5 py-3 rounded-2xl border-slate-100 bg-slate-50 text-slate-700 font-medium focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition outline-none">
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100">
                    <div class="flex items-center justify-between mb-6 px-2">
                        <p class="text-sm font-semibold text-slate-400">Estimasi Total</p>
                        <p class="text-3xl font-black text-blue-600">Rp{{ number_format($totalPrice) }}</p>
                    </div>
                    
                    <button wire:click="book" class="w-full bg-slate-900 text-white py-4 rounded-3xl font-bold hover:bg-blue-600 transition-all transform active:scale-95 shadow-xl shadow-slate-200">
                        Konfirmasi & Booking
                    </button>
                    <p class="text-center text-[10px] text-slate-400 mt-4 italic">*Admin akan memverifikasi booking Anda segera.</p>
                </div>
            </div>
        </div>
    </div>
</div>