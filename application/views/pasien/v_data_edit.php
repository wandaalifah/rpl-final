<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url('pasien'); ?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('pasien/update'); ?>">
                    <input type="hidden" name="id" value="<?= $r['id_pasien']; ?>">
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        <input type="text" name="nama_pasien" value="<?= $r['nm_pasien'] ?>" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input class="form-control" type="date" value=<?php echo  date("Y-m-d"); ?> id="pt_date" name="ttl" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?= $r['alamat'] ?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>