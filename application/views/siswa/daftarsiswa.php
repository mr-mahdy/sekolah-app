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
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Cari Siswa">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>183</td>
                            <td>Mahdy</td>
                            <td>11-7-2005</td>
                            <td>15 tahun</td>
                            <td>Jl Sindang Sari</td>
                            <td>2019</td>
                            <td>
                                <a href="" class="fas fa-eye" title="detail"></a>
                                <a href="" class="fas fa-edit" title="edit"></a>
                                <a href="" class="fas fa-trash" title="hapus"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                            <td>12-1-2004</td>
                            <td>16 tahun</td>
                            <td>Jl Margaasih</td>
                            <td>2018</td>
                            <td>
                                <a href="" class="fas fa-eye" title="detail"></a>
                                <a href="" class="fas fa-edit" title="edit"></a>
                                <a href="" class="fas fa-trash" title="hapus"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
</div>