<?php

namespace Database\Seeders;

use App\Models\Auteur;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PharIo\Manifest\Author;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Auteur::factory()->create([
            'nom' => 'Test',
            'prenom' => 'Auteur',
        ]);
        Auteur::factory()->create([
            'nom' => 'Boom',
            'prenom' => 'Paul',
            'ddn' => new DateTime()
        ]);*/

        Auteur::factory(20)->create();
    }
}
