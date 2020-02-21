<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Mata Pelajaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('mapel'); ?>">Mapel</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Mapel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-3" style="height: 500px;">
                <?= $this->session->flashdata('messageBerhasil'); ?>

                <form action="<?= base_url('mapel/editMapel'); ?>" method="post">
                    <input type="hidden" name="id" value="<?= set_value('id', $mapel['id']) ?>">
                    <div class="form-group">
                        <label for="kodeMapel">Kode Mapel</label>
                        <input type="text" name="kodeMapel" value="<?= set_value('kodeMapel', $mapel['kode_mapel']) ?>" class="form-control" id="kode">
                        <?= $this->session->flashdata('kodeMapel'); ?>
                    </div>
                    <div class="form-group">
                        <label for="namaMapel">Nama Mapel</label>
                        <input type="text" name="namaMapel" value="<?= set_value('namaMapel', $mapel['nama_mapel']) ?>" class="form-control" id="nama">
                        <?= $this->session->flashdata('namaMapel'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kkm">KKM</label>
                        <input type="number" name="kkm" value="<?= set_value('kkm', $mapel['kkm']) ?>" class="form-control" id="kkm">
                        <?= $this->session->flashdata('kkm'); ?>
                    </div>

                    <a href="<?= base_url('mapel') ?>" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

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
                        <input type="text" name="kodeMapel" class="form-control" id="kodeMapel" autocomplete="">
                        <?= $this->session->flashdata('kodeMapel'); ?>
                    </div>
                    <div class="form-group">
                        <label for="namaMapel">Nama Mapel</label>
                        <input type="text" name="namaMapel" class="form-control" id="namaMapel">
                        <?= $this->session->flashdata('namaMapel'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kkm">KKM</label>
                        <input type="number" name="kkm" class="form-control" id="kkm2">
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