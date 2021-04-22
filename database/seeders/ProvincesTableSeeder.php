<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
        (1, 'Sulawesi Barat', '2019-08-29 04:55:52', '2019-08-29 04:55:52'),
        (2, 'Sulawesi Selatan', '2019-08-29 04:55:52', '2019-08-29 04:55:52'),
        (3, 'Sulawesi Tengah', '2019-08-29 04:55:52', '2019-08-29 04:55:52'),
        (4, 'Sulawesi Tenggara', '2019-08-29 04:55:52', '2019-08-29 04:55:52'),
        (5, 'Sulawesi Utara', '2019-08-29 04:55:52', '2019-08-29 04:55:52');
        ");
    }
}
