<?php

use Illuminate\Database\Seeder;
use App\Month;

class MonthSeeder extends Seeder
{
    private $months = [
        'Jan',
        'Fev',
        'Mar',
        'Abril',
        'Maio',
        'Jun',
        'Jul',
        'Ago',
        'Set',
        'Out',
        'Nov',
        'Dez'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->months as $month) {
            Month::Create([
                'name' => $month
            ]);
        }
    }
}
