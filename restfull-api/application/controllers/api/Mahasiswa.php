<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;


require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends RestController
{
    // var $menu;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->methods['index_get']['limit'] = 2;
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id ==  null) {
            $mahasiswa =  $this->mahasiswa_model->getMahasiswa();
        } else {
            $mahasiswa =  $this->mahasiswa_model->getMahasiswa($id);
        }


        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Id Not Found!',
            ], RestController::HTTP_NOT_FOUND);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id ==  null) {
            $this->response([
                'status' => false,
                'message' => 'Provide an Id',
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            // $delete = ;
            if ($this->mahasiswa_model->deleteMahasiswa($id) > 0) {
                // ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Deleted.',
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Id Not Found!',
                ], RestController::HTTP_NOT_FOUND);
            };
        };
    }

    public function index_post()
    {
        // $data = $this->post();
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan'),
        ];
        $insert = $this->mahasiswa_model->createMahasiswa($data);
        if ($insert > 0) {
            // ok
            $this->response([
                'status' => true,
                'message' => 'New Mahasiswa has been created.',
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to create new data!',
            ], RestController::HTTP_BAD_REQUEST);
        };
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan'),
        ];

        if ($id  ==  null) {
            $this->response([
                'status' => false,
                'message' => 'Provide an Id',
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            $update = $this->mahasiswa_model->updateMahasiswa($data, $id);
            if ($update > 0) {
                // ok
                $this->response([
                    'status' => true,
                    'message' => 'Data Mahasiswa has been Updated.',
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Failed to update new data!',
                ], RestController::HTTP_BAD_REQUEST);
            };
        }
    }
}
