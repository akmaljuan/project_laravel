<div class="row mb-2">
    <div class="col-md-6">
        <select name="obat_id[]" class="form-control" required>
            <option value="">-- Pilih Obat --</option>
            @foreach ($obats as $obat)
            <option value="{{ $obat->id }}">{{ $obat->nama }} (Rp{{ number_format($obat->harga) }})</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
    </div>
</div>
