<form action="{{ route('pengaduan-admin.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <label for="">Date</label><br>
    <input class="form-control mb-3" type="date" name="tgl_pengaduan" value="{{ $edit->tgl_pengaduan }}">
    <label for="">NIK</label>
    <select class="form-control mb-3" name="nik_id" id="nik_id">
        @foreach ($nik as $item)
        <option value="{{ $item->id }}">{{ $item->nik }}</option>
        @endforeach
    </select>
    <label for="">Laporan</label>
    <textarea class="form-control mb-3" name="laporan">{{ $edit->laporan }}</textarea>
    <label for="">fhoto</label>
    <input class="form-control mb-3" type="file" name="fhoto" value="{{ $edit->fhoto }}">
    <input type="hidden" name="status" value="update">
    <button class="btn btn-primary mb-3" type="submit">submit</button>
</form>
