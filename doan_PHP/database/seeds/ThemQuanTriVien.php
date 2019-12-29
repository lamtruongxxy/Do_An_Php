<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\QuanTriVien;
class ThemQuanTriVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$listQTV = [
            ['ten_dang_nhap'=>'anhtu','mat_khau'=>Hash::make('anhtu99'),'ho_ten'=>'Đỗ Anh Tú'],
            ['ten_dang_nhap'=>'lamtruong','mat_khau'=>Hash::make('lamtruong99'),'ho_ten'=>'Lê Hồng Lâm Trường'],
            ['ten_dang_nhap'=>'quockhanh','mat_khau'=>Hash::make('quockhanh99'),'ho_ten'=>'Nguyễn Quốc Khánh'],
            
        ];
        //
        foreach ($listQTV as $qtv) {
            QuanTriVien::create($qtv);
        }
    }
}
