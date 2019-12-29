<?php

use Illuminate\Database\Seeder;
use App\LichSuMuaCredit;
class ThemLichSuMuaCredit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LichSuMuaCredit::create(
            [
                'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
                'goi_credit_id' => App\GoiCredit::pluck('id')->random(),
                'credit'        => App\GoiCredit::pluck('credit')->random(),
                'so_tien'       => App\GoiCredit::pluck('so_tien')->random()
            ]);
        LichSuMuaCredit::create(
            [
                'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
                'goi_credit_id' => App\GoiCredit::pluck('id')->random(),
                'credit'        => App\GoiCredit::pluck('credit')->random(),
                'so_tien'       => App\GoiCredit::pluck('so_tien')->random()
            ]);
        LichSuMuaCredit::create(
            [
                'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
                'goi_credit_id' => App\GoiCredit::pluck('id')->random(),
                'credit'        => App\GoiCredit::pluck('credit')->random(),
                'so_tien'       => App\GoiCredit::pluck('so_tien')->random()
            ]);
            
                
    }
}
