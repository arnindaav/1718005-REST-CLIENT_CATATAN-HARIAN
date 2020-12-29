<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Catatan Harian</h3>
            <?php if (empty($catatan_harian)) : ?>
                <div class="alert alert-danger" role="alert">
                Upsssss Catatan Yang Anda Cari Tidak Ditemukan
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($catatan_harian as $CatatanHarian) : ?>
                <li class="list-group-item">
                    <?= $CatatanHarian['judul']; ?>
                    <a href="<?= base_url(); ?>catatanharian/hapus/<?= $CatatanHarian['id']; ?>"
                        class="badge badge-danger float-right tombol-hapus">hapus</a>
                    <a href="<?= base_url(); ?>catatanharian/ubah/<?= $CatatanHarian['id']; ?>"
                        class="badge badge-success float-right">ubah</a>
                    <a href="<?= base_url(); ?>catatanharian/detail/<?= $CatatanHarian['id']; ?>"
                        class="badge badge-primary float-right">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>