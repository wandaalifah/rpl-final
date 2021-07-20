<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url('pasien'); ?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('pasien/insert'); ?>">
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        <input type="text" name="nm_pasien" class="form-control" required placeholder="Nama Lengkap" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="pt_date" class="col-2 col-form-label">Tanggal Lahir</label>
                        <input class="form-control" type="date" value=<?php echo  date("Y-m-d"); ?> id="pt_date" name="ttl">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required placeholder="Alamat Sesuai KTP" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>