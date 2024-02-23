<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('m_mahasiswa');
    }

    public function index_get()
    {
        // var_dump('aa');
        $mahasiswa = $this->M_mahasiswa->getMahasiswa();
    }
}
