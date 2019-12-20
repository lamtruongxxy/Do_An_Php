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
          ['ten_dang_nhap' =>'nc1',
          'mat_khau'=> Hash::make ('123456'),
          'email'=>'anhtu@gmail.com',
          'hinh_dai_dien'=>'dadasda.png',
          'diem_cao_nhat'=>'100',
          'credit'=>'8989'
      ]);
        NguoiChoi::create(
          ['ten_dang_nhap' =>'nc2',
          'mat_khau'=> Hash::make ('abc1234'),
          'email'=>'anhtu2@gmail.com',
          'hinh_dai_dien'=>'dbasda.png',
          'diem_cao_nhat'=>'450',
          'credit'=>'10000'
      ]);
        
    }
           
}
