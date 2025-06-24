<div class="space-y-4">
    <div>
        <h3 class="text-lg font-medium">{{ $record->nama_objek }}</h3>
        <p class="text-sm text-gray-500">{{ optional($record->category)->name }} - {{ optional($record->tanggal)->format('d M Y') }}</p>
    </div>
    
    @if($record->hasMedia('foto'))
        <div>
            <img src="{{ $record->getFirstMediaUrl('foto', 'preview') }}" alt="{{ $record->nama_objek }}" class="w-full rounded-lg">
        </div>
    @endif
    
    <div class="prose max-w-none">
        {!! $record->deskripsi !!}
    </div>
</div>