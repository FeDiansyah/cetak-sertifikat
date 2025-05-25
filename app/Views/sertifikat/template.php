<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0cm;
        }

        body {
            margin: 0;
            font-family: 'Times New Roman', serif;
            background-image: url('<?= $imgData ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            text-align: center;
            padding: 0;
            border: none;
        }


        .title {
            font-size: 36px;
            font-weight: bold;
            color: #000080;
            margin-bottom: 20px;
        }

        .subtitle {
            font-size: 20px;
            margin-bottom: 40px;
        }

        .name {
            font-size: 60px;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 330px;
            /* Geser ke bawah agar pas dengan background */
            margin-bottom: 15.86px;
        }


        .desc {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .date-location {
            text-align: right;
            font-size: 16px;
            margin-top: 50px;
            margin-right: 120px;
        }

        .signature {
            text-align: right;
            margin-top: 60px;
            margin-right: 120px;
        }

        .signature p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- <div class="title">SERTIFIKAT PENGHARGAAN</div>
        <div class="subtitle">Diberikan kepada:</div> -->
        <div></div>
        <div class="name"><?= esc($siswa['nama']) ?></div>

        <div class="desc">
            Atas partisipasi dan pencapaian dalam program<br>
            <strong><?= esc(strtoupper($siswa['program'])) ?></strong>
        </div>

        <div class="date-location">
            Tangerang, <?= date('d F Y') ?>
        </div>

        <div class="signature">
            <p><strong>_______________________</strong></p>
            <p><strong>Kepala Sekolah</strong></p>
        </div>
    </div>
</body>

</html>