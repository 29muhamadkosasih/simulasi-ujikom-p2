<form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="">Name</label><br>
    <input class="form-control mb-3" type="text" name="name_petugas">
    <label for="">Username</label>
    <input class="form-control mb-3" type="text" name="username">
    <label for="">Password</label>
    <input class="form-control mb-3" type="password" name="password">
    <label for="">No Telp.</label>
    <input class="form-control mb-3" type="number" pattern="\(\d\d\d\)-\d\d\d\d\d\d\d\d" name="no_telp" placeholder="(+62) 999999999" required />
    <label for="">Level</label>
    <select name="level" id="level" class="form-control mb-3">
        <option value="petugas" selected>Pilih Level (Default Petugas)</option>
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
    </select>
    <button class="btn btn-primary mb-3" type="submit">submit</button>
</form>
