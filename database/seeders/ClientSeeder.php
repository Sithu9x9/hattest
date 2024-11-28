<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'logo' => 'frontend/images/clients/mmftb.png',
                'link' => 'http://www.mmftb.gov.mm/',
            ],
            [
                'logo' => 'frontend/images/clients/Loyar.jpg',
                'link' => 'https://www.loyarmyanmar.com/',
            ],
            [
                'logo' => 'frontend/images/clients/mcba.png',
                'link' => 'https://myanmarcba.com.mm',
            ],
            [
                'logo' => 'frontend/images/clients/walmart.png',
                'link' => 'https://myanmarcba.com.mm',
            ],
            [
                'logo' => 'frontend/images/clients/umfcci.png',
                'link' => 'https://www.umfcci.com.mm/index.php',
            ],
            [
                'logo' => 'frontend/images/clients/fashion.png',
                'link' => 'https://myanmarcba.com.mm',
            ],
            [
                'logo' => 'frontend/images/clients/moali_2.png',
                'link' => 'https://www.moali.gov.mm/',
            ],
            [
                'logo' => 'frontend/images/clients/aliexpress.png',
                'link' => 'https://www.customs.gov.mm/',
            ],
            [
                'logo' => 'frontend/images/clients/myanmar-gov.png',
                'link' => 'https://www.myanmar.gov.mm/',
            ],
        ];

        foreach ($clients as $client) {
            Client::create([
                'logo' => $client['logo'],
                'link' => $client['link']
            ]);
        }
    }
}
