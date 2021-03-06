<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Kelas</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Kelas</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <form class="form-inline" action="<?= base_url('kelas') ?>" method="get">
                            <input type="text" name="keyword" class="form-control float-right" placeholder="Cari Kelas" style="display: inline-block">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#kelasModal">Tambah Kelas</button>

                <?= $this->session->flashdata('messageBerhasil'); ?>

                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kelas</th>
                            <th>Jumlah Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allKelas as $kelas) : ?>
                            <tr>
                                <td><?= $kelas['id']; ?></td>
                                <td><?= $kelas['nama_kelas']; ?></td>
                                <td><?= $kelas['jumlah']; ?></td>
                                <td>
                                    <a href="<?= base_url() . 'kelas/ubahKelas/' . $kelas['id'] ?>" class="fas fa-edit" title="ubah"></a>
                                    <a href=" <?= base_url() . 'kelas/hapusKelas/' . $kelas['id'] ?>" class="fas fa-trash" title="hapus" onclick="return confirm('yakin ingin menghapus?')"></a>
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

<!-- Kelas Modal -->
<div class="modal fade" id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('kelas/createKelas'); ?>" method="post">
                    <div class="form-group">
                        <label for="namaKelas">Nama Kelas</label>
                        <input type="text" name="namaKelas" class="form-control" id="namaKelas" value="<?= set_value('namaKelas') ?>">
                        <?= $this->session->flashdata('namaKelas'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah" value="<?= set_value('jumlah') ?>">
                        <?= $this->session->flashdata('jumlah'); ?>
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