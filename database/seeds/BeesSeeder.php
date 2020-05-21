<?php

use Illuminate\Database\Seeder;
use App\Bee;

class BeesSeeder extends Seeder
{

    private $bees = [
        [
            'name' => 'Uruçu',
            'species' => 'Melipona scutellaris',
        ],
        [
            'name' => 'Uruçu-Amarela',
            'species' => 'Melipona refiventris',
        ],
        [
            'name' => 'Guarupu',
            'species' => 'Melipona bicolor',
        ],
        [
            'name' => 'Iraí',
            'species' => 'Nannotrigona Testaceicornes',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->bees as $bee) {
            Bee::Create([
                'name' => $bee['name'],
                'species'   => $bee['species']
            ]);
        }
    }
}
