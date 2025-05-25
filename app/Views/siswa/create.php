<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <h3 class="mb-3">Tambah Siswa</h3>

    <form method="post" action="<?= base_url('siswa/store'); ?>">
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <div class="row mb-3">
            <label for="usia" class="col-sm-2 col-form-label">Usia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="usia" name="usia">
            </div>
        </div>
        <div class="row mb-3">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kelas" name="kelas">
            </div>
        </div>
        <div class="row mb-3">
            <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah">
            </div>
        </div>
        <div class="row mb-3">
            <label for="program" class="col-sm-2 col-form-label">Program</label>
            <div class="col-sm-10">
                <select class="form-select" name="program" id="program" onchange="handleProgram()" required>
                    <option value="">-- Pilih Program --</option>
                    <option value="dasher">Dasher</option>
                    <option value="runner">Runner</option>
                    <option value="sprinter">Sprinter</option>
                    <option value="ranger">Ranger</option>
                    <option value="explorer">Explorer</option>
                    <option value="ielts">IELTS</option>
                    <option value="toefl">TOEFL</option>
                </select>
            </div>
        </div>

        <div class="row mb-3" id="typeContainer">
            <label for="type" class="col-sm-2 col-form-label">Jenis</label>
            <div class="col-sm-10">
                <select class="form-select" name="jenis" id="type" onchange="handleType()" required>
                    <option value="">-- Pilih Jenis --</option>
                </select>
            </div>
        </div>

        <div class="row mb-3" id="levelContainer">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
                <select class="form-select" name="level" id="level" required>
                    <option value="">-- Pilih Level --</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>