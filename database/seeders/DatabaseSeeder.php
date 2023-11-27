<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Dimension;
use App\Models\Marque;
use App\Models\Matelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //test avec Factory
        // Category::factory(4)->create();
        // Dimension::factory(5)->create();
        // Marque::factory(5)->create();
        // Matelas::factory(20)->create(function(){
        //     return [
        //         'category_id' => rand(1,4),
        //         'dimension_id' => rand(1,5),
        //     ];
        // });

        
        //creation des catégories de matelas
        $confort = Category::factory()->create(['name' => 'Matelas Confort']);
        $assurance = Category::factory()->create(['name' => 'Matelas Assurance']);
        $essentiel = Category::factory()->create(['name' => 'Matelas Essentiel']);
        $prestige = Category::factory()->create(['name' => 'Matelas Prestige']);


        //ajout des marques de matelas
        $brandEpeda = Marque::factory()->create(['name' => 'Epeda']);
        $brandDreamway = Marque::factory()->create(['name' => 'Dreamway']);
        $brandBultex = Marque::factory()->create(['name' => 'Bultex']);
        $brandDorsoline = Marque::factory()->create(['name' => 'Dorsoline']);
        $brandMemoryline = Marque::factory()->create(['name' => 'MemoryLine']);

        // insertion des 4 références du catalogue
        $item1 = Matelas::factory()->create([
            'name' => 'Malm Odo',
            'cover' => 'https://www.ikea.com/fr/fr/images/products/malm-mobilier-chambre-lot-de-4-brun-noir__1102127_pe866548_s5.jpg?f=s',
            'largeur' => 90,
            'longueur' => 190,
            'price' => 759.00,
            'discount' => 230,
            'category_id' => $confort,
            'marque_id' => $brandEpeda
        ]);

        $item2 = Matelas::factory()->create([
            'name' => 'Sansonges',
            'cover' => 'https://www.ikea.com/fr/fr/images/products/songesand-mobilier-chambre-lot-de-5-blanc__1102144_pe866545_s5.jpg?f=s',
            'largeur' => 90,
            'longueur' => 190,
            'price' => 709.00,
            'discount' => 100,
            'category_id' => $assurance,
            'marque_id' => $brandDreamway
        ]);

        
        $item3 = Matelas::factory()->create([
            'name' => 'Tallelattes',
            'cover' => 'https://www.ikea.com/fr/fr/images/products/taellasen-cadre-de-lit-matelasse-matelas-kulsta-gris-vert-vesteroey-ferme__1206615_pe907554_s5.jpg?f=xxs',
            'largeur' => 140,
            'longueur' => 190,
            'price' => 759.00,
            'discount' => 230,
            'category_id' => $essentiel,
            'marque_id' => $brandBultex
        ]);
       
        $item4 = Matelas::factory()->create([
            'name' => 'Acrédifoisanfré',
            'cover' => 'https://www.ikea.com/fr/fr/images/products/nordli-cadre-de-lit-av-rangt-et-matelas-blanc-akrehamn-ferme__1102033_pe866854_s5.jpg?f=xxs',
            'largeur' => 160,
            'longueur' => 200,
            'price' => 1019.00,
            'discount' => 0,
            'category_id' => $prestige,
            'marque_id' => $brandEpeda
        ]);
    }
}
