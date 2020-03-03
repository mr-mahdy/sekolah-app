<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('siswa'); ?>">Siswa</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Siswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-3" style="height: 500px;">
                <?= $this->session->flashdata('messageBerhasil'); ?>

                <form action="<?= base_url('siswa/editSiswa'); ?>" method="post">
                    <input type="hidden" name="id" value="<?= set_value('id', $siswa['id_siswa']) ?>">
                    <input type="hidden" name="idSiswa" value="<?= set_value('idSiswa', $siswa['id']) ?>">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" name="nisn" value="<?= set_value('nisn', $siswa['nisn']) ?>" class="form-control" id="nisn">
                        <?= $this->session->flashdata('nisn'); ?>
                    </div>
                    <div class="form-group">
                        <label for="siswa">Nama Siswa</label>
                        <input type="text" name="siswa" value="<?= set_value('siswa', $siswa['nama_siswa']) ?>" class="form-control" id="siswa">
                        <?= $this->session->flashdata('siswa'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <?php foreach ($allKelas as $kelas) : ?>
                                <?php if ($kelas['id'] == $siswa['id_kelas']) : ?>
                                    <option value="<?= $kelas['id'] ?>" selected><?= $kelas['nama_kelas'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $kelas['id'] ?>"><?= $kelas['nama_kelas'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?= $this->session->flashdata('kelas'); ?>
                    </div>

                    <div class="form-group">
                        <label for="thnMasuk">Tahun Masuk</label>
                        <input type="text" name="thnMasuk" value="<?= set_value('thnMasuk', $siswa['thn_masuk']) ?>" class="form-control" id="thnMasuk">
                        <?= $this->session->flashdata('thnMasuk'); ?>
                    </div>

                    <a href="<?= base_url('siswa') ?>" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

                <!-- /.card-body -->
            </div>
    </section>
</div>