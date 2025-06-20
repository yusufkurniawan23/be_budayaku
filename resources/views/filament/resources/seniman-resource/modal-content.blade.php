{{-- filepath: resources/views/filament/resources/seniman-resource/modal-content.blade.php --}}
<div class="space-y-6">
    <div class="flex items-center space-x-4">
        @if($record->getFirstMediaUrl('foto'))
            <img src="{{ $record->getFirstMediaUrl('foto', 'thumb') ?: $record->getFirstMediaUrl('foto') }}" alt="{{ $record->nama }}" class="h-24 w-24 rounded-full object-cover">
        @endif
        <div>
            <h3 class="text-xl font-bold">{{ $record->nama }}</h3>
            <p class="text-sm text-gray-500">{{ $record->judul }}</p>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
            <h4 class="text-sm font-medium text-gray-500">Alamat</h4>
            <p>{{ $record->alamat }}</p>
        </div>
        <div>
            <h4 class="text-sm font-medium text-gray-500">Nomor Telepon</h4>
            <p>{{ $record->nomor }}</p>
        </div>
    </div>
    <div>
        <h4 class="text-sm font-medium text-gray-500">Deskripsi</h4>
        <div class="prose max-w-none mt-1">
            {!! $record->deskripsi !!}
        </div>
    </div>
</div>