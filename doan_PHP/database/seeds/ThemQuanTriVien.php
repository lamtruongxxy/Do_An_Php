<?php

use Illuminate\Database\Seeder;
namespace Illuminate\Support\Facades;
class ThemQuanTriVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$listQTV=[
            ['ten_dang_nhap'=>'admin','mat_khau'=>Hash::make('123456'),'ho_ten'=>
            'Quan tri vien 1'],
            ['ten_dang_nhap'=>'adminn','mat_khau'=>Hash::make('1234567'),'ho_ten'=>
            'Quan tri vien 2'],
        ];
        //
        foreach ($listQTV as $qtv) {
                ThemQuanTriVien::create($qtv);
        }
    }
}
