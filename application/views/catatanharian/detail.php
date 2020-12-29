<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Catatan Harian
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $catatan_harian['kategori']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $catatan_harian['judul']; ?></h6>
                    <p class="card-text"><?= $catatan_harian['tanggal']; ?></p>
                    <p class="card-text"><?= $catatan_harian['catatan']; ?></p>
                    <a href="<?= base_url(); ?>CatatanHarian" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>