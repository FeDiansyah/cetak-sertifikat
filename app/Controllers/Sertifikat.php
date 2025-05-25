<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\SiswaModel;

ini_set('max_execution_time', 120); // 2 menit


class Sertifikat extends BaseController
{
    public function generate($id)
    {
        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Data siswa tidak ditemukan.');
        }

        $path = FCPATH . 'img\sertifikat.png'; // path lokal
        $base64 = base64_encode(file_get_contents($path));
        $mime = mime_content_type($path);
        $imgData = "data:$mime;base64,$base64";

        // Load view ke dalam variabel HTML
        $html = view('sertifikat/template', ['siswa' => $siswa, 'imgData' => $imgData]);

        // Konfigurasi DomPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Download otomatis
        $dompdf->stream("sertifikat-{$siswa['nama']}.pdf", ['Attachment' => false]);
    }
}
