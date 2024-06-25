<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' =>"القاهرة",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"الجيزة",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"الاسكندرية",
            'countery_id'=>1

        ]);
        DB::table('cities')->insert([
            'name' =>"المنصورة",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"الشرقية",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"البحيرة",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"القليوبية",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"المحلة الكبري",
            'countery_id'=>1


        ]);

        DB::table('cities')->insert([
            'name' =>"مطروح",
            'countery_id'=>1

        ]);
        DB::table('cities')->insert([
            'name' =>"دمياط",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"بورسعيد",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"المنوفية",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"الدقهلية",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"الاسماعيلية",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"بنها",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"كفر الشيخ",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"يني سويف",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"الغربية",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"المنيا",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"الفيوم",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"اسيوط",
            'countery_id'=>1


        ]);
        DB::table('cities')->insert([
            'name' =>"الوادي الجديد",
            'countery_id'=>1

        ]);
        DB::table('cities')->insert([
            'name' =>"كفر الزيات",
            'countery_id'=>1


        ]);
    }
}
