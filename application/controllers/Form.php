<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function index()
	{
		$this->load->view('form');
	}

    public function submit()
	{	 
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => 'Nama Lengkap tidak boleh kosong ya!']);
        $this->form_validation->set_rules('phone', 'Telepon', 'trim|required|numeric|min_length[10]|max_length[13]', ['required' => 'Nomor Telepon tidak boleh kosong ya!', 'numeric' => 'Nomor telepon harus berupa angka!', 'min_length' => 'Nomor telepon kamu minimal harus 10 angka!', 'max_length' => 'Nomor telepon kamu maksimal harus 13 angka!']);
        $this->form_validation->set_rules('pengaduan', 'Pengaduan', 'trim|required', ['required' => 'Pesan Pengaduan kamu tidak boleh kosong!']);

        if($this->form_validation->run() != FALSE){
            $response = $this->input->post('g-recaptcha-response');
            if($response){
                $secret = "rahasia";
                $remoteip = $_SERVER['REMOTE_ADDR']; 
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
                $dataResponse = file_get_contents($url);
                $row = json_decode($dataResponse, true); 
    
                if ($row['success'] == "true"){
    
                    date_default_timezone_set('Asia/Jakarta');
                    $date = date("Y-m-d H:i:s");
        
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'phone' => $this->input->post('phone'),
                        'opsipernah' => $this->input->post('opsipernah'),
                        'instansi' => $this->input->post('instansi'),
                        'pengaduan' => $this->input->post('pengaduan'),
                        'date' => $date,
                    ];
                    
                    if($data){
                        $this->M_form_submit->submitForm($data);
                        $this->session->set_flashdata('response',
                        "<div class='col-md-6 col-lg-12'>
                            <div class='card bg-success text-primary-fg'>
                                <div class='card-body'>
                                    <h2 class='card-title'>Sukses !</h2>
                                    <p>Terima Kasih. Pengaduan Anda berhasil terkirim.</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                        ");
                        redirect('Form');
                    }else{
                        $this->session->set_flashdata('response',
                        "<div class='col-md-6 col-lg-12'>
                            <div class='card bg-danger text-primary-fg'>
                                <div class='card-body'>
                                    <h2 class='card-title'>Error !</h2>
                                    <p>Pengaduan Anda gagal terkirim. Silahkan cek koneksi internet Anda dan coba lagi.</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                        ");
                        redirect('Form');
                    }
                }
            }else{
                
                $this->session->set_flashdata('captcha',
                "<div class='col-md-6 col-lg-12'>
                    <small class='text-danger pl-3'>Verifikasi Anda bukan robot gagal, Silahkan centang Recaptcha sebelum klik tombol Kirim!</small><hr>
                ");
                $this->load->view('form');
            }
		}else{
			$this->load->view('form');
		}




	}
}
