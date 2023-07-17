<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SiteContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['content' => 'Carousel3.jpeg','type' => 'image','page' => 'home','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['content' => 'Carousel4.jpeg','type' => 'image','page' => 'home','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['content' => 'Carousel6.jpeg','type' => 'image','page' => 'home','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['content' => 'Nossa empresa é voltada para a prática do tiro esportivo e capacitação tática em forma de um clube de tiro. Um sonho que já se estende por mais de vinte anos, tendo como diferencial nossos valores, não queremos ser uma empresa voltada para uma pequena minoria e sim dar a oportunidade a todos que tenham o interesse pelo tiro e pela capacitação de poder participar e buscar conhecimento em nossa empresa.','type' => 'text','page' => 'about','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['content' => '(24) 99262-8759','type' => 'number','page' => 'contact','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['content' => 'contato@clubedetiro76.com.br','type' => 'email','page' => 'contact','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['content' => 'qrcode.png','type' => 'image','page' => 'contact','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ];

        SiteContent::insert($data);
    }
}
