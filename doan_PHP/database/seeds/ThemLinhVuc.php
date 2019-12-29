<?php

use Illuminate\Database\Seeder;
use App\LinhVuc;
class ThemLinhVuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LinhVuc::create(
            ['ten_linh_vuc' =>'Toán học']
        );
            LinhVuc::create(
            ['ten_linh_vuc' =>'Vật lý']
        );
           LinhVuc::create(
            ['ten_linh_vuc' =>'Văn học']
        );
            LinhVuc::create(
            ['ten_linh_vuc' =>'Địa lý']
        );
            LinhVuc::create(
            ['ten_linh_vuc' =>'Sinh học']
        );
        LinhVuc::create(
            ['ten_linh_vuc' =>'Âm nhạc']
        );
    	//DB::table('linh_vucs')->insert([ 
    		//['ten_linh_vuc' =>'Toán'],
    		//['ten_linh_vuc' =>'Lý'],
    		//['ten_linh_vuc' =>'Văn'],
    		//['ten_linh_vuc' =>'Địa'],
    		//['ten_linh_vuc' =>'Sinh']
    	//]);
    }
}
