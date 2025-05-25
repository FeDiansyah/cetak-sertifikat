<?= $this->extend('layout/template'); ?>
<?php helper('form'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1 class="mb-3"><a href="/siswa">Data Siswa</a></h1>

    <form method="get" action="<?= base_url('/') ?>" id="filterForm">
        <div class="row mb-3">
            <div class="col-sm-4">
                <label class="form-label">Program</label>
                <select class="form-select" name="program" id="program" onchange="handleProgram();">
                    <option value="">-- Pilih Program --</option>
                    <option value="dasher" <?= set_select('program', 'dasher', request()->getGet('program') == 'dasher') ?>>Dasher</option>
                    <option value="runner" <?= set_select('program', 'runner', request()->getGet('program') == 'runner') ?>>Runner</option>
                    <option value="sprinter" <?= set_select('program', 'sprinter', request()->getGet('program') == 'sprinter') ?>>Sprinter</option>
                    <option value="ranger" <?= set_select('program', 'ranger', request()->getGet('program') == 'ranger') ?>>Ranger</option>
                    <option value="explorer" <?= set_select('program', 'explorer', request()->getGet('program') == 'explorer') ?>>Explorer</option>
                    <option value="ielts" <?= set_select('program', 'ielts', request()->getGet('program') == 'ielts') ?>>IELTS</option>
                    <option value="toefl" <?= set_select('program', 'toefl', request()->getGet('program') == 'toefl') ?>>TOEFL</option>
                </select>
            </div>

            <div class="col-sm-4">
                <div class="mb-3" id="typeContainer">
                    <label class="form-label">Jenis</label>
                    <select class="form-select" name="jenis" id="type" onchange="handleType(); ">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="reguler" <?= set_select('jenis', 'reguler', request()->getGet('jenis') == 'reguler') ?>>Reguler</option>
                        <option value="private" <?= set_select('jenis', 'private', request()->getGet('jenis') == 'private') ?>>Private</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="mb-3" id="levelContainer">
                    <label class="form-label">Level</label>
                    <select class="form-select" name="level" id="level" onchange="submitForm();">
                        <option value="">-- Pilih Level --</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <!-- <div class="row mb-3">
        <div class="col-md-3">
            <h4 class="mb-0">Data Siswa</h4>
        </div>
    </div> -->
    <div class="row mb-3 mt-4 align-items-end">
        <div class="col-md-2">
            <a href="<?= base_url('siswa/create') ?>" class="btn btn-primary w-100">+ Tambah Data</a>
        </div>
        <div class="col-md-10">
            <form class="row g-2 justify-content-end" method="get" action="<?= base_url('siswa') ?>">
                <div class="col-md-3">
                    <input type="search" class="form-control" name="keyword" placeholder="Cari siswa...">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-outline-success w-100" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="table-info">
            <tr class="text-center">
                <th style="width: 5%;">No</th>
                <th>Nama</th>
                <!-- <th>Usia</th>
                <th>Kelas</th>
                <th>Asal Sekolah</th> -->
                <th style="width: 15%;">Program</th>
                <th style="width: 15%;">Jenis</th>
                <th style="width: 15%;">Level</th>
                <th style="width: 15%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($siswa): ?>
                <?php $i = 1 + (5 * ($pager->getCurrentPage('siswa') - 1)); ?>
                <?php foreach ($siswa as $row): ?>
                    <tr>
                        <td scope="row" class="text-center"><?= $i++; ?></td>
                        <td><?= esc($row['nama']) ?></td>
                        <!-- <td><?= esc($row['usia']) ?></td>
                        <td><?= esc($row['kelas']) ?></td>
                        <td><?= esc($row['asal_sekolah']) ?></td> -->
                        <td class="text-center"><?= esc($row['program']) ?></td>
                        <td class="text-center"><?= esc($row['jenis']) ?></td>
                        <td class="text-center"><?= esc($row['level']) ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('siswa/detail/' . $row['id']) ?>" class="btn btn-info btn-sm">Detail</a>
                            <!-- <a href="<?= base_url('siswa/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a> -->
                            <a href="<?= base_url('siswa/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links('siswa', 'siswa_pagination'); ?>
</div>

<?= $this->endSection(); ?>