<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('guru'); ?>">Guru</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Guru</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-3" style="height: 500px;">
                <?= $this->session->flashdata('messageBerhasil'); ?>

                <form action="<?= base_url('guru/editGuru'); ?>" method="post">
                    <input type="hidden" name="id" value="<?= set_value('id', $guru['id']) ?>">
                    <div class="form-group">
                        <label for="nuptk">NUPTK</label>
                        <input type="text" name="nuptk" value="<?= set_value('nuptk', $guru['nuptk']) ?>" class="form-control" id="nuptk">
                        <?= $this->session->flashdata('nuptk'); ?>
                    </div>
                    <div class="form-group">
                        <label for="namaGuru">Nama Guru</label>
                        <input type="text" name="namaGuru" value="<?= set_value('namaGuru', $guru['nama_guru']) ?>" class="form-control" id="nama">
                        <?= $this->session->flashdata('namaGuru'); ?>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select name="mapel" id="mapel" class="form-control">
                            <?php foreach ($allMapel as $mapel) : ?>
                                <?php if ($mapel['id'] == $guru['id_mapel']) : ?>
                                    <option value="<?= $mapel['id'] ?>" selected><?= $mapel['nama_mapel'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $mapel['id'] ?>"><?= $mapel['nama_mapel'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <a href="<?= base_url('guru') ?>" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

                <!-- /.card-body -->
            </div>
    </section>
</div>