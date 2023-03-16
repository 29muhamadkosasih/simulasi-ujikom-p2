<form action="{{ route('masyarakat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="">NIK</label><br>
    <input class="form-control mb-3" type="text" name="nik">
    <label for="">Name</label>
    <input class="form-control mb-3" type="text" name="name">
    <label for="">Username</label>
    <input class="form-control mb-3" type="text" name="username">
    <label for="">Password</label>
    <input class="form-control mb-3" type="password" name="password">
    <label for="">No Telp.</label>
    <input class="form-control mb-3" type="number" pattern="\(\d\d\d\)-\d\d\d\d\d\d\d\d" name="telp" placeholder="(+62) 999999999" required />
    <button class="btn btn-primary mb-3" type="submit">submit</button>
</form>
