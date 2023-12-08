<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Dimension;
use App\Models\Marque;
use App\Models\Matelas;
use App\Models\Stock;
use App\Models\User;
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

        //test avec Factory pour travailler le front
        // Category::factory(4)->create();
        // Dimension::factory(5)->create();
        // Marque::factory(5)->create();
        // Matelas::factory(20)->create(function(){
        //     return [
        //         'category_id' => rand(1,4),
        //         'dimension_id' => rand(1,5),
        //     ];
        // });
        User::factory()->create([
            'name' => 'Jean-Michel',
            'email' => 'jeanmichel@literie3000.fr',
        ]);

        User::factory()->create([
            'name' => 'Jocelyne',
            'email' => 'jocelyne@literie3000.fr',
        ]);
        User::factory()->create([
            'name' => 'Frédéric',
            'email' => 'frederic@literie3000.fr',
        ]);
        
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

        //ajout des diverses dimensions de matelas
        $dim90x190= Dimension::factory()->create(['size' => '90x190']);
        $dim140x190= Dimension::factory()->create(['size' => '140x190']);
        $dim160x200= Dimension::factory()->create(['size' => '160x190']);
        $dim180x200= Dimension::factory()->create(['size' => '180x190']);
        $dim200x200= Dimension::factory()->create(['size' => '200x200']);

        // insertion des 4 références du catalogue
        $item1 = Matelas::factory()->create([
            'name' => 'Malm Odo',
            'cover' => 'https://www.ikea.com/fr/fr/images/products/valevag-matelas-a-ressorts-ensaches-mi-ferme-bleu-clair__0928313_pe789779_s5.jpg?f=xxs',
            'price' => 759.00,
            'discount' => 230,
            'available' => 1,
            'dimension_id' => $dim90x190,
            'category_id' => $confort,
            'marque_id' => $brandEpeda,
            'user_id' => User::factory()->create()
        ]);

    
        $item2 = Matelas::factory()->create([
            'name' => 'Sansonges',
            'cover' => 'https://www.ikea.com/fr/fr/images/products/afjaell-matelas-en-mousse-mi-ferme-blanc__1027660_pe834973_s5.jpg?f=xxs',
            'price' => 709.00,
            'discount' => 100,
            'available' => 1,
            'dimension_id' => $dim90x190,
            'category_id' => $assurance,
            'marque_id' => $brandDreamway,
            'user_id' => User::factory()->create()
        ]);
        
        $item3 = Matelas::factory()->create([
            'name' => 'Tallelattes',
            'cover' => 'https://www.ikea.com/fr/fr/images/products/vestmarka-matelas-a-ressorts-ferme-bleu-clair__0928311_pe789776_s5.jpg?f=xxs',
            'price' => 759.00,
            'discount' => 230,
            'available' => 1,
            'dimension_id' => $dim140x190,
            'category_id' => $essentiel,
            'marque_id' => $brandBultex,
            'user_id' => User::factory()->create()
        ]);
       
        $item4 = Matelas::factory()->create([
            'name' => 'Acrédifoisanfré',
            'cover' => 'https://www.ikea.com/fr/fr/images/products/agotnes-matelas-en-mousse-ferme-bleu-clair__1150598_pe884638_s5.jpg?f=xxs',
            'price' => 1019.00,
            'discount' => 0,
            'available' => 1,
            'dimension_id' => $dim160x200,
            'category_id' => $prestige,
            'marque_id' => $brandEpeda,
            'user_id' => User::factory()->create()
        ]);

    

        Matelas::factory(20)->create(function(){
            return [
                'category_id' => rand(1,4),
                'marque_id' => rand(1,5),
                'dimension_id' => rand(1,5),
                'user_id' => rand(1,3)
            ];
        });

        //ajout des stocks
        $matelas = Matelas::all();
        foreach ($matelas as $item) {
            if (!$item->stock) {
                // S'il n'y a pas de stock associé au matelas, crée un nouveau stock pour ce matelas
                $stock = Stock::factory()->create(['quantity' => rand(2, 20)]);
                $item->stock()->save($stock);
            }
        }

    }
}
