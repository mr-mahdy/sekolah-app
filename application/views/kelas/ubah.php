<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('kelas'); ?>">Kelas</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Kelas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-3" style="height: 500px;">
                <?= $this->session->flashdata('messageBerhasil'); ?>

                <form action="<?= base_url('kelas/editKelas'); ?>" method="post">
                    <input type="hidden" name="id" value="<?= set_value('id', $kelas['id']) ?>">
                    <div class="form-group">
                        <label for="namaKelas">Nama Kelas</label>
                        <input type="text" name="namaKelas" value="<?= set_value('namaKelas', $kelas['nama_kelas']) ?>" class="form-control" id="nama">
                        <?= $this->session->flashdata('namaKelas'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" value="<?= set_value('jumlah', $kelas['jumlah']) ?>" class="form-control" id="jumlah">
                        <?= $this->session->flashdata('jumlah'); ?>
                    </div>

                    <a href="<?= base_url('kelas') ?>" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

                <!-- /.card-body -->
            </div>
    </section>
</div>