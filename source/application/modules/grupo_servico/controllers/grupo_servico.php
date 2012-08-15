﻿<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupo_servico extends MY_Non_Public_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['message'] = $this->session->flashdata('message');
        
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('grupo_servico');
        $crud->set_subject('Grupo de Serviço');        
        $crud->columns('id', 'grupo_id', 'codigo', 'descricao');
        $crud->edit_fields('grupo_id', 'codigo', 'descricao');
        $crud->add_fields('grupo_id', 'codigo', 'descricao');        
        $crud->set_relation('grupo_id', 'grupo_servico', 'codigo');
        $contents = $crud->render();

        $this->template->set('subtitle', 'Grupo de Serviço');
        $this->template->load('template_teste', 'crudpage', $contents);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */