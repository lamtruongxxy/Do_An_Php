<?php

use Illuminate\Database\Seeder;
use App\NguoiChoi;
class ThemNguoiChoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NguoiChoi::create(
            ['ten_dang_nhap' =>'Anh Tu','mat_khau'=>'anhtu','email'=>'anhtu@gmail.com','hinh_dai_dien'=>'dadasda.png','diem_cao_nhat'=>'100','credit'=>'8989']
        );
    }
           
}
