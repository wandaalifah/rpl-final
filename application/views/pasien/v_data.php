<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>
                <a href="<?= base_url('pasien/tambah'); ?>" class="btn btn-success btn-sm float-right">Tambah Data</a>
            </div>
            <div class="col-md-4 mt-3">
                <form action="<?= base_url('pasien/index'); ?>" method="post">
                    <div class="input-group rounded">
                        <input type="text" class="form-control" placeholder="Search" name="keyword" autocomplete="off">
                        <input class="btn btn-success" type="submit" name="submit" value="Search">
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pasien as $r) { ?>
                                <tr>
                                    <td class="text-center"><?= ++$start; ?></td>
                                    <td><?= $r['id_pasien']; ?></td>
                                    <td><?= $r['nm_pasien']; ?></td>
                                    <td><?= $r['ttl']; ?></td>
                                    <td><?= $r['alamat']; ?></td>
                                    <td>
                                        <a href="<?= base_url() . 'pasien/edit/' . $r['id_pasien']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url() . 'pasien/hapus/' . $r['id_pasien']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin akan menghapus data?')">Hapus</a>
                                        <a href="" class="btn btn-success btn-sm">Riwayat Medis</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</section>