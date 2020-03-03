<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Siswa</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <form class="form-inline" action="<?= base_url('siswa') ?>" method="get">
                            <input type="text" name="keyword" class="form-control float-right" placeholder="Cari Siswa" style="display: inline-block">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#siswaModal">Tambah Siswa</button>

                <?= $this->session->flashdata('messageBerhasil'); ?>


                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allSiswa as $siswa) : ?>
                            <tr>
                                <td><?= $siswa['nisn']; ?></td>
                                <td><?= $siswa['nama_siswa']; ?></td>
                                <td><?= $siswa['nama_kelas']; ?></td>
                                <td><?= $siswa['thn_masuk']; ?></td>
                                <td>
                                    <a href="<?= base_url() . 'siswa/ubahSiswa/' . $siswa['id'] ?>" class="fas fa-edit" title="ubah"></a>
                                    <a href=" <?= base_url() . 'siswa/hapusSiswa/' . $siswa['id_siswa'] ?>" class="fas fa-trash" title="hapus" onclick="return confirm('yakin ingin menghapus?')"></a>
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

<!-- Siswa Modal -->
<div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('siswa/createSiswa'); ?>" method="post">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" name="nisn" id="nisn" class="form-control">
                        <?= $this->session->flashdata('nisn'); ?>
                    </div>
                    <div class="form-group">
                        <label for="siswa">Nama Siswa</label>
                        <input type="text" name="siswa" id="siswa" class="form-control">
                        <?= $this->session->flashdata('siswa'); ?>
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
                    <div class="form-group">
                        <label for="thnMasuk">Tahun Masuk</label>
                        <input type="text" name="thnMasuk" id="thnMasuk" class="form-control">
                        <?= $this->session->flashdata('thnMasuk'); ?>
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