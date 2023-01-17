<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
        public $peliculas = [
            'titulo' => 'required|min_length[3]' ,
            'descripcion' => 'required|min_length[4]'   
        ];
        public $categorias = [
            'id' => 'required|integer|exact_length[1]',
            'titulo' => 'required|min_length[5]|max_length[10]'
        ];
        public $usuarios = [
            'usuario' => 'min_length[5]|max_length[20]|is_unique[usuarios.usuario]',
            'usuario' => 'min_length[5]|max_length[80]|is_unique[usuarios.email]',
            'contrasena' => 'min_length[5]|max_length[255]'
        ];
    // --------------------------------------------------------------------
}
