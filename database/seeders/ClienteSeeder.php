<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [ ["nome" => "Thiago Cantero",
                      "telefone" => "1199999999"], 
                      ["nome" => "Mario Bros",
                      "telefone" => "1122222222"],
                      ["nome" => "ElePHant",
                      "telefone" => "11233232"],
                      ["nome" => "Yoshi",
                      "telefone" => "11222212"]          
                ];

                foreach ($clientes as $key => $value) { 
                    Cliente::create($value);        
                    }
    }
}