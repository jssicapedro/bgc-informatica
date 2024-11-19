<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RMASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rma')->insert([
            [
                'id' => 1,
                'equipamento' => 1,
                'servico' => 1,
                'encomendaCusto' => 200,
                'dataChegada' => '2024-11-01',
                'previsaoEntrega' => '2024-11-10',
                'dataEntrega' => '2024-11-09',
                'horasTrabalho' => '05:00:00',
                'descricaoProblema' => 'Limpeza e substituição de peças',
                'status' => 'processing',
                'totalPagar' => 250.50,
                'qr' => 'QR_CODE_1'
            ],
            [
                'id' => 2,
                'equipamento' => 2,
                'servico' => 2,
                'encomendaCusto' => 300,
                'dataChegada' => '2024-11-03',
                'previsaoEntrega' => '2024-11-12',
                'dataEntrega' => '2024-11-11',
                'horasTrabalho' => '06:00:00',
                'descricaoProblema' => 'Reparo de tela quebrada',
                'status' => 'completed',
                'totalPagar' => 350.75,
                'qr' => 'QR_CODE_2'
            ],
            [
                'id' => 3,
                'equipamento' => 3,
                'servico' => 3,
                'encomendaCusto' => 150,
                'dataChegada' => '2024-11-05',
                'previsaoEntrega' => '2024-11-15',
                'dataEntrega' => '2024-11-14',
                'horasTrabalho' => '04:00:00',
                'descricaoProblema' => 'Manutenção de impressora',
                'status' => 'pending',
                'totalPagar' => 180.00,
                'qr' => 'QR_CODE_3'
            ],
            [
                'id' => 4,
                'equipamento' => 4,
                'servico' => 4,
                'encomendaCusto' => 100,
                'dataChegada' => '2024-11-07',
                'previsaoEntrega' => '2024-11-17',
                'dataEntrega' => '2024-11-16',
                'horasTrabalho' => '03:00:00',
                'descricaoProblema' => 'Substituição de bateria',
                'status' => 'completed',
                'totalPagar' => 130.25,
                'qr' => 'QR_CODE_4'
            ],
            [
                'id' => 5,
                'equipamento' => 5,
                'servico' => 1,
                'encomendaCusto' => 200,
                'dataChegada' => '2024-11-09',
                'previsaoEntrega' => '2024-11-19',
                'dataEntrega' => '2024-11-18',
                'horasTrabalho' => '05:30:00',
                'descricaoProblema' => 'Limpeza interna',
                'status' => 'processing',
                'totalPagar' => 220.00,
                'qr' => 'QR_CODE_5'
            ],
            [
                'id' => 6,
                'equipamento' => 6,
                'servico' => 2,
                'encomendaCusto' => 250,
                'dataChegada' => '2024-11-11',
                'previsaoEntrega' => '2024-11-21',
                'dataEntrega' => '2024-11-20',
                'horasTrabalho' => '04:30:00',
                'descricaoProblema' => 'Reparo de teclado',
                'status' => 'completed',
                'totalPagar' => 290.50,
                'qr' => 'QR_CODE_6'
            ],
            [
                'id' => 7,
                'equipamento' => 7,
                'servico' => 3,
                'encomendaCusto' => 150,
                'dataChegada' => '2024-11-13',
                'previsaoEntrega' => '2024-11-23',
                'dataEntrega' => '2024-11-22',
                'horasTrabalho' => '05:15:00',
                'descricaoProblema' => 'Reparo de conector de carga',
                'status' => 'pending',
                'totalPagar' => 180.75,
                'qr' => 'QR_CODE_7'
            ],
            [
                'id' => 8,
                'equipamento' => 8,
                'servico' => 4,
                'encomendaCusto' => 300,
                'dataChegada' => '2024-11-15',
                'previsaoEntrega' => '2024-11-25',
                'dataEntrega' => '2024-11-24',
                'horasTrabalho' => '06:45:00',
                'descricaoProblema' => 'Substituição de disco rígido',
                'status' => 'completed',
                'totalPagar' => 350.25,
                'qr' => 'QR_CODE_8'
            ],
            [
                'id' => 9,
                'equipamento' => 9,
                'servico' => 1,
                'encomendaCusto' => 100,
                'dataChegada' => '2024-11-17',
                'previsaoEntrega' => '2024-11-27',
                'dataEntrega' => '2024-11-26',
                'horasTrabalho' => '03:15:00',
                'descricaoProblema' => 'Limpeza de ventilação',
                'status' => 'processing',
                'totalPagar' => 130.00,
                'qr' => 'QR_CODE_9'
            ],
            [
                'id' => 10,
                'equipamento' => 10,
                'servico' => 2,
                'encomendaCusto' => 250,
                'dataChegada' => '2024-11-19',
                'previsaoEntrega' => '2024-11-29',
                'dataEntrega' => '2024-11-28',
                'horasTrabalho' => '05:00:00',
                'descricaoProblema' => 'Reparo de câmera',
                'status' => 'completed',
                'totalPagar' => 290.75,
                'qr' => 'QR_CODE_10'
            ],
            [
                'id' => 11,
                'equipamento' => 1,
                'servico' => 3,
                'encomendaCusto' => 200,
                'dataChegada' => '2024-11-21',
                'previsaoEntrega' => '2024-12-01',
                'dataEntrega' => '2024-11-30',
                'horasTrabalho' => '04:45:00',
                'descricaoProblema' => 'Reparo de impressora a laser',
                'status' => 'pending',
                'totalPagar' => 220.00,
                'qr' => 'QR_CODE_11'
            ]
        ]);
    }
}


