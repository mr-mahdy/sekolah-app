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
                    <input type="hidden" name="id" value="<?= set_value('id', $guruMaster['id']) ?>">
                    <div class="form-group">
                        <label for="nuptk">NUPTK</label>
                        <input type="text" name="nuptk" value="<?= set_value('nuptk', $guruMaster['nuptk']) ?>" class="form-control" id="nuptk">
                        <?= $this->session->flashdata('nuptk'); ?>
                    </div>
                    <div class="form-group">
                        <label for="namaGuru">Nama Guru</label>
                        <input type="text" name="namaGuru" value="<?= set_value('namaGuru', $guruMaster['nama_guru']) ?>" class="form-control" id="nama">
                        <?= $this->session->flashdata('namaGuru'); ?>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <?php $i = 1;
                        foreach ($allGuru as $guru) : ?>

                            <select name="mapel<?= $i++ ?>" id="mapel" class="form-control mb-2">
                                <?php $j = 0;
                                foreach ($allMapel as $mapel) : ?>
                                    <?php if ($j == 0) : ?>
                                        <?php if ($mapel['id'] == $guru['id_mapel']) : ?>
                                            <option value="<?= $mapel['id'] ?>" selected><?= $mapel['nama_mapel'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $mapel['id'] ?>"><?= $mapel['nama_mapel'] ?></option>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <?php if ($mapel['id'] == $guru['id_mapel']) : ?>
                                            <option value="<?= $mapel['id'] ?>" selected><?= $mapel['nama_mapel'] ?></option>
                                        <?php else : ?>
                                            <option value="">Pilih Mata Pelajaran</option>
                                            <option value="<?= $mapel['id'] ?>"><?= $mapel['nama_mapel'] ?></option>
                                        <?php endif; ?>
                                        <?php $j++; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>

                        <?php endforeach; ?>

                        <?php if (count($allGuru) == 2) : ?>
                            <select name="mapel3" id="mapel" class="form-control mb-2">
                                <option value="">Pilih Mata Pelajaran</option>
                                <?php foreach ($allMapel as $mapel) : ?>
                                    <option value="<?= $mapel['id'] ?>"><?= $mapel['nama_mapel'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php elseif (count($allGuru) == 1) : ?>
                            <?php for ($i = 2; $i < 5; $i++) : ?>
                                <select name="mapel<?= $i++ ?>" id="mapel" class="form-control mb-2">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($allMapel as $mapel) : ?>
                                        <option value="<?= $mapel['id'] ?>"><?= $mapel['nama_mapel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>

                    <a href="<?= base_url('guru') ?>" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

                <!-- /.card-body -->
            </div>
    </section>
</div>