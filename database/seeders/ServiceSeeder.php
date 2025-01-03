<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = ['IT', 'RH', 'Finances/comptabilité', 'marketing', 'Support client', 'Logistics & Supply Chain', 'Production', 'Sécurité', 'Recherche & développement', 'Administration générale', 'Équipe commerciale', 'Juridique', 'Services de santé', 'Opérations'];
        foreach ($services as $service){
            Service::create(['name' => $service]);
        }
    }
}
