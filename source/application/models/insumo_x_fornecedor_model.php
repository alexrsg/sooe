<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insumo_x_fornecedor_model extends DataMapper {

    var $table = 'insumo_x_fornecedor';
    var $has_one = array('insumo_model', 'fornecedor_model');

    function __construct($id = NULL) {
        parent::__construct($id);
    }

}

/* End of file insumo_x_fornecedor_model.php */
/* Location: ./application/usuario/models/insumo_x_fornecedor_model.php */