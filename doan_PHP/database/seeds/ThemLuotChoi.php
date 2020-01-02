<?php

use Illuminate\Database\Seeder;
use App\LuotChoi;
class ThemLuotChoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuotChoi::create(
            [
                'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
                'so_cau'    => rand(0,100),
                'diem'    => rand(0,10000),
            ]);
        LuotChoi::create(
            [
                    'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
                    'so_cau'    => rand(0,100),
                    'diem'    => rand(0,10000),
            ]);          
        LuotChoi::create(
            [
                        'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
                        'so_cau'    => rand(0,100),
                        'diem'    => rand(0,10000),
            ]);
            LuotChoi::create(
                [
                        'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
                        'so_cau'    => rand(0,100),
                        'diem'    => rand(0,10000),
                ]);          
            LuotChoi::create(
                [
                            'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
                            'so_cau'    => rand(0,100),
                            'diem'    => rand(0,10000),
                ]);
    }
}
