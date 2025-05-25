<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $programList = ['dasher', 'runner', 'sprinter', 'ranger', 'explorer', 'ielts', 'toefl'];
        $jenisList = ['reguler', 'private'];
        $levelList = array_merge(
            ['level 1', 'level 2', 'level 3', 'level 4'], // Dasher
            array_map(fn($l) => 'level ' . $l, range('A', 'L')), // Runner - Explorer
            ['intro', 'compe'] // IELTS, TOEFL
        );

        for ($i = 0; $i < 100; $i++) {
            $program = $faker->randomElement($programList);
            if ($program === 'dasher') {
                $jenis = in_array($program, ['dasher']) ? 'reguler' : $faker->randomElement($jenisList);
            } else {
                $jenis = in_array($program, ['ielts', 'toefl']) ? 'private' : $faker->randomElement($jenisList);
            }

            // Tentukan level berdasarkan program
            if ($program === 'dasher') {
                $level = $faker->randomElement(['level 1', 'level 2', 'level 3', 'level 4']);
            } elseif (in_array($program, ['runner', 'sprinter', 'ranger', 'explorer'])) {
                $level = $faker->randomElement(array_map(fn($l) => 'level ' . $l, range('A', 'L')));
            } else {
                $level = $faker->randomElement(['intro', 'compe']);
            }

            $data = [
                'nama'         => $faker->name,
                'usia'         => $faker->numberBetween(7, 18),
                'kelas'        => 'Kelas ' . $faker->randomDigitNotNull(),
                'asal_sekolah' => $faker->company . ' ' . $faker->city,
                'program'      => $program,
                'level'        => $level,
                'jenis'        => $jenis,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s')
            ];

            $this->db->table('siswa')->insert($data);
        }
    }
}
