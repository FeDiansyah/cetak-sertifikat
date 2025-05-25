<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Siswa</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?= esc($siswa['nama']) ?></td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <td><?= esc($siswa['usia']) ?></td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td><?= esc($siswa['kelas']) ?></td>
                </tr>
                <tr>
                    <th>Asal Sekolah</th>
                    <td><?= esc($siswa['asal_sekolah']) ?></td>
                </tr>
                <tr>
                    <th>Program</th>
                    <td><?= esc($siswa['program']) ?></td>
                </tr>
                <tr>
                    <th>Jenis</th>
                    <td><?= esc($siswa['jenis']) ?></td>
                </tr>
                <tr>
                    <th>Level</th>
                    <td><?= esc($siswa['level']) ?></td>
                </tr>
            </table>
            <a href="<?= base_url('siswa/edit/' . $siswa['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= base_url('sertifikat/' . $siswa['id']) ?>" class="btn btn-success btn-sm" target="_blank">Generate Sertifikat</a>
            <!-- <a href="<?= base_url('siswa/delete/' . $siswa['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a> -->
            <a href="<?= base_url('siswa') ?>" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>