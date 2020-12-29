<?php 
use GuzzleHttp\Client;

class CatatanHarian_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new client([
            'base_uri' =>'http://localhost/rest-api/rest-server/api/',
            'auth' => ['server', '1999']
        ]);
    }

    public function getAllCatatanHarian()
    {
        $response = $this->_client->request('GET', 'CatatanHarian', [
            'query' => [
                'X-API-KEY' => 'server123'
            ]

        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getCatatanHarianById($id)
    {
        $response = $this->_client->request('GET', 'CatatanHarian', [
            'query' => [
                'X-API-KEY' => 'server123',
                'id'=> $id
            ]

        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahCatatanHarian()
    {
        $data = [
            "kategori" => $this->input->post('kategori', true),
            "tanggal" => $this->input->post('tanggal', true),
            "judul" => $this->input->post('judul', true),
            "catatan" => $this->input->post('catatan', true),
            'X-API-KEY' => 'server123'
        ];

        $response = $this->_client->request('POST', 'CatatanHarian',[
         'form_params' => $data
        
            ]);
            
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
    }

    public function hapusCatatanHarian($id)
    {
        $response = $this->_client->request('DELETE', 'CatatanHarian', [
            'form_params' => [
                'id' => $id,
                ' X-API-KEY' => 'server123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }


    public function ubahCatatanHarian()
    {
        $data = [
            "kategori" => $this->input->post('kategori', true),
            "tanggal" => $this->input->post('tanggal', true),
            "judul" => $this->input->post('judul', true),
            "catatan" => $this->input->post('catatan', true), 
            "id" => $this->input->post('id', true), 
            "X-API-KEY" => 'server123' 
        ];

       $response = $this->_client->request('PUT', 'CatatanHarian', [
           'form_params' => $data
       ]);

       $result = json_decode($response->getBody()->getContent(), true);
       return $result;
    }

    public function cariCatatanHarian()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kategori', $keyword);
        $this->db->or_like('judul', $keyword);
        $this->db->or_like('tanggal', $keyword);
        $this->db->or_like('catatan', $keyword);
        return $this->db->get('catatan_harian')->result_array();
    }
}