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
            ['ten_linh_vuc' =>'Toán']
        );
            LinhVuc::create(
            ['ten_linh_vuc' =>'Lý']
        );
           LinhVuc::create(
            ['ten_linh_vuc' =>'Văn']
        );
            LinhVuc::create(
            ['ten_linh_vuc' =>'Địa']
        );
            LinhVuc::create(
            ['ten_linh_vuc' =>'Sinh']
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
