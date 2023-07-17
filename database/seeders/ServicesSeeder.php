<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Cursos', 'description' => '','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Capacitação', 'description' => '','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Serviços para Visitante', 'description' => '','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Despachante Bélico', 'description' => 
            '- Concessão de CR (Exército)
- Posse de Arma (Polícia Federal)
- SINARM e SIGMA.
- Outros Serviços Bélicos.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ];

        Service::insert($data);
    }
}
