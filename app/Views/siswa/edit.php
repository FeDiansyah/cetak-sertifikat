<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="card">
        <h3 class="card-header bg-primary text-white mb-3">Edit Siswa</h3>
        <div class="card-body">
            <div class="table table-bordered">

                <form method="post" action="<?= base_url('siswa/update/' . $siswa['id']); ?>">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($siswa['nama']) ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="usia" class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usia" name="usia" value="<?= esc($siswa['usia']) ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= esc($siswa['kelas']) ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= esc($siswa['asal_sekolah']) ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="program" id="program"
                                data-jenis="<?= $siswa['jenis'] ?>"
                                data-level="<?= $siswa['level'] ?>"
                                onchange="handleProgram()" required>
                                <option value="">-- Pilih Program --</option>
                                <option value="dasher" <?= $siswa['program'] == 'dasher' ? 'selected' : '' ?>>Dasher</option>
                                <option value="runner" <?= $siswa['program'] == 'runner' ? 'selected' : '' ?>>Runner</option>
                                <option value="sprinter" <?= $siswa['program'] == 'sprinter' ? 'selected' : '' ?>>Sprinter</option>
                                <option value="ranger" <?= $siswa['program'] == 'ranger' ? 'selected' : '' ?>>Ranger</option>
                                <option value="explorer" <?= $siswa['program'] == 'explorer' ? 'selected' : '' ?>>Explorer</option>
                                <option value="ielts" <?= $siswa['program'] == 'ielts' ? 'selected' : '' ?>>IELTS</option>
                                <option value="toefl" <?= $siswa['program'] == 'toefl' ? 'selected' : '' ?>>TOEFL</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3" id="typeContainer">
                        <label for="type" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="jenis" id="type" onchange="handleType()" required>
                                <option value="">-- Pilih Jenis --</option>
                                <!-- Option akan diisi oleh JavaScript -->
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3" id="levelContainer">
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="level" id="level" required>
                                <option value="">-- Pilih Level --</option>
                                <!-- Option akan diisi oleh JavaScript -->
                            </select>
                        </div>
                    </div>

                    <button type=" submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('siswa/detail/' . $siswa['id']) ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>