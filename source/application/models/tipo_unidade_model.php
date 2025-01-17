<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipo_unidade_model extends DataMapper {

    var $table = 'tipo_unidade';
    var $has_many = array(
        'insumo' => array(
            'class' => 'insumo_model',
            'other_field' => 'unidade',
            'join_self_as' => 'tipo_unidade',
            'join_other_as' => 'id',
            'join_table' => 'insumo'
        )
    );
    var $created_field = 'cadastro';
    var $local_time = TRUE;
    var $validation = array(
        'descricao' => array(
            'label' => 'Descrição',
            'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 45)
        ),
        'sigla' => array(
            'label' => 'Sigla',
            'rules' => array('required', 'trim', 'min_length' => 1, 'max_length' => 10)
        )
    );

    function __construct($id = NULL) {
        parent::__construct($id);
    }

}

/* End of file tipo_unidade.php */
/* Location: ./application/usuario/models/tipo_unidade.php */