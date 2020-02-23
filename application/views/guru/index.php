<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Guru</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Guru</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <form class="form-inline" action="<?= base_url('guru') ?>" method="get">
                            <input type="text" name="keyword" class="form-control float-right" placeholder="Cari Guru" style="display: inline-block">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#guruModal">Tambah Guru</button>

                <?= $this->session->flashdata('messageBerhasil'); ?>

                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>NUPTK</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allGuru as $guru) : ?>
                            <tr>
                                <td><?= $guru['nuptk']; ?></td>
                                <td><?= $guru['nama_guru']; ?></td>
                                <td><?= $guru['nama_mapel']; ?></td>
                                <td>
                                    <a href="<?= base_url() . 'guru/ubahGuru/' . $guru['id'] ?>" class="fas fa-edit" title="ubah"></a>
                                    <a href=" <?= base_url() . 'guru/hapusGuru/' . $guru['id'] ?>" class="fas fa-trash" title="hapus" onclick="return confirm('yakin ingin menghapus?')"></a>
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

<!-- Guru Modal -->
<div class="modal fade" id="guruModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('guru/createGuru'); ?>" method="post">
                    <div class="form-group">
                        <label for="nuptk">NUPTK</label>
                        <input type="text" name="nuptk" class="form-control" id="nuptk" value="<?= set_value('nuptk') ?>">
                        <?= $this->session->flashdata('nuptk'); ?>
                    </div>
                    <div class="form-group">
                        <label for="namaGuru">Nama Guru</label>
                        <input type="text" name="namaGuru" class="form-control" id="namaGuru" value="<?= set_value('namaGuru') ?>">
                        <?= $this->session->flashdata('namaGuru'); ?>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select name="mapel" id="mapel" class="form-control">
                            <?php foreach ($allMapel as $mapel) : ?>
                                <option value="<?= $mapel['id'] ?>"><?= $mapel['nama_mapel'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= $this->session->flashdata('mapel'); ?>
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