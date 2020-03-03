<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Wali Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('walikelas'); ?>">Wali Kelas</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Wali Kelas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-3" style="height: 500px;">
                <?= $this->session->flashdata('messageBerhasil'); ?>

                <form action="<?= base_url('walikelas/editWalikelas'); ?>" method="post">
                    <input type="hidden" name="id" value="<?= set_value('id', $walikelas['id']) ?>">
                    <div class="form-group">
                        <label for="nuptk">NUPTK</label>
                        <input type="text" name="nuptk" value="<?= set_value('nuptk', $walikelas['nuptk_guru']) ?>" class="form-control" id="nuptk">
                        <?= $this->session->flashdata('nuptk'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <?php foreach ($allKelas as $kelas) : ?>
                                <?php if ($kelas['id'] == $walikelas['id_kelas']) : ?>
                                    <option value="<?= $kelas['id'] ?>" selected><?= $kelas['nama_kelas'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $kelas['id'] ?>"><?= $kelas['nama_kelas'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <a href="<?= base_url('walikelas') ?>" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

                <!-- /.card-body -->
            </div>
    </section>
</div>