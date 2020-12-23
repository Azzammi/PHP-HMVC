<div class="container mt-4">
    <h2>Mahasiswa</h2>
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