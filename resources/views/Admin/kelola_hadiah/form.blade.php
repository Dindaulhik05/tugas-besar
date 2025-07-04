<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <input type="text" name="nama" value="{{ old('nama', $hadiah->nama ?? '') }}" placeholder="Nama Hadiah" required>
    <input type="number" name="point" value="{{ old('point', $hadiah->point ?? '') }}" placeholder="Point" required>
    <input type="number" name="stock" value="{{ old('stock', $hadiah->stock ?? '') }}" placeholder="Stock" required>

    @if ($isEdit && $hadiah->gambar)
        <img src="{{ asset('storage/' . $hadiah->gambar) }}" width="100">
    @endif

    <input type="file" name="gambar">
    <button type="submit">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
</form>
