<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Mata Pelajaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Mapel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Mapel</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <form class="form-inline" action="<?= base_url('mapel') ?>" method="get">
                            <input type="text" name="keyword" class="form-control float-right" placeholder="Cari Mata Pelajaran">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#mapelModal">Tambah Mapel</button>

                <?= $this->session->flashdata('messageBerhasil'); ?>

                <table class="table table-head-fixed text-nowrap mt-2">
                    <thead>
                        <tr>
                            <th>Kode Mapel</th>
                            <th>Nama Mapel</th>
                            <th>KKM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allMapel as $mapel) : ?>
                            <tr>
                                <td><?= $mapel['kode_mapel']; ?></td>
                                <td><?= $mapel['nama_mapel']; ?></td>
                                <td><?= $mapel['kkm']; ?></td>
                                <td>
                                    <a href="<?= base_url() . 'mapel/ubahMapel/' . $mapel['id'] ?>" class="fas fa-edit" title="ubah"></a>
                                    <a href=" <?= base_url() . 'mapel/hapusMapel/' . $mapel['id'] ?>" class="fas fa-trash" title="hapus" onclick="return confirm('yakin ingin menghapus?')"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
</div>

<!-- Mapel Modal -->
<div class="modal fade" id="mapelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('mapel/createMapel'); ?>" method="post">
                    <div class="form-group">
                        <label for="kodeMapel">Kode Mapel</label>
                        <input type="text" name="kodeMapel" class="form-control" id="kodeMapel" value="<?= set_value('kodeMapel') ?>">
                        <?= $this->session->flashdata('kodeMapel'); ?>
                    </div>
                    <div class="form-group">
                        <label for="namaMapel">Nama Mapel</label>
                        <input type="text" name="namaMapel" class="form-control" id="namaMapel" value="<?= set_value('namaMapel') ?>">
                        <?= $this->session->flashdata('namaMapel'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kkm">KKM</label>
                        <input type="number" name="kkm" class="form-control" id="kkm2" value="<?= set_value('kkm') ?>">
                        <?= $this->session->flashdata('kkm'); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>