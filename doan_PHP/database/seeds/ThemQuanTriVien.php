<?php

use Illuminate\Database\Seeder;

class ThemQuanTriVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('quan_tri_viens')->insert([
    		['ten_dang_nhap'=>'aaa','mat_khau'=>'aaa','ho_ten'=>' Văn A'],
    		['ten_dang_nhap'=>'bbb','mat_khau'=>'bbb','ho_ten'=>' Văn B'],
    		['ten_dang_nhap'=>'ccc','mat_khau'=>'ccc','ho_ten'=>' Văn C'],
    		['ten_dang_nhap'=>'ddd','mat_khau'=>'ddd','ho_ten'=>' Văn D']
    	]);
        //
    }
}
