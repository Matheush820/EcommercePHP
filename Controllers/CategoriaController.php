<?php

namespace Controllers;

use Models\Queries\CategoriaQueries\CategoriaQuerie;


class CategoriaController
{
    public function index() {
        // carrega os dados
        $categorias = CategoriaQuerie::todas();

        // passa os dados para a view
        require_once 'Views/Categorias/index.php';
    }
}
