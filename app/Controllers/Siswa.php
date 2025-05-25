<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\siswaModel;

class Siswa extends BaseController
{
    public function index()
    {
        $siswaModel = new SiswaModel();


        $program = $this->request->getGet('program');
        $jenis   = $this->request->getGet('jenis');
        $level   = $this->request->getGet('level');

        $builder = $siswaModel;

        if ($program) {
            $builder = $builder->where('program', $program);
        }

        if ($jenis) {
            $builder = $builder->where('jenis', $jenis);
        }

        if ($level) {
            $builder = $builder->where('level', $level);
        }

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $builder = $builder->groupStart()
                ->like('nama', $keyword)
                ->orLike('program', $keyword)
                ->orLike('jenis', $keyword)
                ->orLike('level', $keyword)
                ->groupEnd();
        }

        $data = [
            'siswa'   => $builder->paginate(5, 'siswa'),
            'pager'   => $builder->pager,
            'program' => $program,
            'jenis'   => $jenis,
            'level'   => $level,
            'keyword' => $keyword,
        ];

        // $data['siswa'] = $builder->findAll();

        return view('siswa/index', $data);
    }

    // Menyimpan data siswa
    public function store()
    {
        $model = new SiswaModel();

        $data = [
            'nama'         => $this->request->getPost('nama'),
            'usia'          => $this->request->getPost('usia'),
            'kelas'        => $this->request->getPost('kelas'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
            'program'      => $this->request->getPost('program'),
            'level'        => $this->request->getPost('level'),
            'jenis'        => $this->request->getPost('jenis'),
        ];

        $model->insert($data);

        return redirect()->to('/');
    }

    public function create()
    {
        return view('siswa/create');
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->find($id);
        return view('siswa/edit', $data);
    }

    // Update data siswa
    public function update($id)
    {
        $model = new SiswaModel();

        $data = [
            'nama'         => $this->request->getPost('nama'),
            'usia'          => $this->request->getPost('usia'),
            'kelas'        => $this->request->getPost('kelas'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
            'program'      => $this->request->getPost('program'),
            'level'        => $this->request->getPost('level'),
            'jenis'        => $this->request->getPost('jenis'),
        ];

        $model->update($id, $data);

        return redirect()->to('/');
    }

    // Menghapus data siswa
    public function delete($id)
    {
        $model = new SiswaModel();
        $model->delete($id);

        return redirect()->to('/');
    }

    public function detail($id)
    {
        $model = new \App\Models\SiswaModel();
        $data['siswa'] = $model->find($id);

        if (!$data['siswa']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Siswa dengan ID $id tidak ditemukan");
        }

        return view('siswa/detail', $data);
    }
}
