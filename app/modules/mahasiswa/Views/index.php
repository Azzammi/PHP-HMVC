<div class="container mt-4">
    <h2>Daftar Mahasiswa</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#formModal">
        Tambah Data Mahasiswa
    </button>
        <table class="table mt-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Npm</th>
                <th scope="col">email</th>
                <th scope="col">Jurusan</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $count = 0;
                foreach ($data['mhs'] as $mhs) :
                    $count += 1; ?>
                <tr>
                    <th scope="row"><?= $count; ?></th>
                    <td><?= $mhs['nama']; ?></td>
                    <td><?= $mhs['npm']; ?></td>
                    <td><?= $mhs['email']; ?></td>
                    <td><?= $mhs['jurusan']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <ul class="list-group">
            <?php
            $count = 0;
            foreach ($data['mhs'] as $mhs) :  ?>
                <tr>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary">Detail</a>
                    </li>
                </tr>
            <?php endforeach; ?>
        </ul>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" class="form-control" id="npm" name="npm">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Example select</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                            <option value="Matematika Terapan">Matematika Terapan</option>
                            <option value="Pendidikan Jasmani">Pendidikan Jasmani</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>