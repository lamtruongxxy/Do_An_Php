<?php

use Illuminate\Database\Seeder;
use App\ChiTietLuotChoi;
class ThemChiTietLuotChoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChiTietLuotChoi::create(
            [
                'luot_choi_id' => App\LuotChoi::pluck('id')->random(),
                'cau_hoi'   => App\CauHoi::pluck('id')->random(),
                'phuong_an'    => App\CauHoi::pluck('dap_an')->random(),
                'diem'       => rand(0,10000)
            ]);
        ChiTietLuotChoi::create(
            [
                'luot_choi_id' => App\LuotChoi::pluck('id')->random(),
                'cau_hoi'   => App\CauHoi::pluck('id')->random(),
                'phuong_an'    => App\CauHoi::pluck('dap_an')->random(),
                'diem'       => rand(0,10000)
            ]); 
        ChiTietLuotChoi::create(
            [
                'luot_choi_id' => App\LuotChoi::pluck('id')->random(),
                'cau_hoi'   => App\CauHoi::pluck('id')->random(),
                'phuong_an'    => App\CauHoi::pluck('dap_an')->random(),
                'diem'       => rand(0,10000)
            ]);                
    }
}
