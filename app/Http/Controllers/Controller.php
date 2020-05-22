<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $error_messages = [
        'name.required'         => 'O campo de nome é obrigatório',
        'species.required'      => 'O campo de espécie é obrigatório',
        'description.required'  => 'O campo de descrição é obrigatório',
        'months.required'       => 'Marque os meses para essa flor',
        'bees.required'         => 'Adicione as abelhas para essa flor',
        'file.required'         => 'Adicione uma imagem a essa flor'
    ];
}
