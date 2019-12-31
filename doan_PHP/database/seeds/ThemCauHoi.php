<?php

use Illuminate\Database\Seeder;
use App\CauHoi;
class ThemCauHoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CauHoi::create(
        	['noi_dung'=>'1+1=','linh_vuc_id'=>'1','phuong_an_a'=>'0','phuong_an_b'=>'1','phuong_an_c'=>'2','phuong_an_d'=>'3','dap_an'=>'C']
        );

        CauHoi::create(
        	['noi_dung'=>'1+2=','linh_vuc_id'=>'1','phuong_an_a'=>'0','phuong_an_b'=>'1','phuong_an_c'=>'2','phuong_an_d'=>'3','dap_an'=>'D']
        );

        CauHoi::create(
        	['noi_dung'=>'Nuoc la gi','linh_vuc_id'=>'5','phuong_an_a'=>'Tao','phuong_an_b'=>'baTao','phuong_an_c'=>'Water','phuong_an_d'=>'la nuoc','dap_an'=>'D']
        );

    }
}
