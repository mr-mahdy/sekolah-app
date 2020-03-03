<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Wali Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Wali Kelas</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Wali Kelas</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <form class="form-inline" action="<?= base_url('walikelas') ?>" method="get">
                            <input type="text" name="keyword" class="form-control float-right" placeholder="Cari Wali Kelas" style="display: inline-block">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#walikelasModal">Tambah Wali Kelas</button>

                <?= $this->session->flashdata('messageBerhasil'); ?>

                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>NUPTK</th>
                            <th>Nama Wali Kelas</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allWalikelas as $walikelas) : ?>
                            <tr>
                                <td><?= $walikelas['nuptk_guru']; ?></td>
                                <td><?= $walikelas['nama_guru']; ?></td>
                                <td><?= $walikelas['nama_kelas']; ?></td>
                                <td>
                                    <a href="<?= base_url() . 'walikelas/ubahWalikelas/' . $walikelas['id'] ?>" class="fas fa-edit" title="ubah"></a>
                                    <a href=" <?= base_url() . 'walikelas/hapusWalikelas/' . $walikelas['id'] ?>" class="fas fa-trash" title="hapus" onclick="return confirm('yakin ingin menghapus?')"></a>
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

<!-- Wali Kelas Modal -->
<div class="modal fade" id="walikelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Wali Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('walikelas/createWalikelas'); ?>" method="post">
                    <div class="form-group">
                        <label for="guru">NUPTK Guru</label>
                        <input type="text" name="guru" id="guru" class="form-control">
                        <?= $this->session->flashdata('guru'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Nama Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <?php foreach ($allKelas as $kelas) : ?>
                                <option value="<?= $kelas['id'] ?>"><?= $kelas['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= $this->session->flashdata('kelas'); ?>
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