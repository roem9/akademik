<?php

class Badal extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Akademik_model');

        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function jadwal(){
        $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        $bulan = date("n");
        $tahun = date("Y");
        $data['title'] = "Jadwal Badal {$month[$bulan]} {$tahun}";
        $jadwal = $this->Akademik_model->get_all_jadwal_badal_month_now();
        $data['jadwal'] = [];
        foreach ($jadwal as $i => $badal) {
            $data['jadwal'][$i]['tgl'] = $badal['tgl'];
            $data['jadwal'][$i]['hari'] = $badal['hari'];
            $data['jadwal'][$i]['r'] = COUNT($this->Akademik_model->get_jadwal_badal_kelas_reguler_by_tgl($badal['tgl']));
            $data['jadwal'][$i]['pk'] = COUNT($this->Akademik_model->get_jadwal_badal_kelas_pv_khusus_by_tgl($badal['tgl']));
            $data['jadwal'][$i]['pl'] = COUNT($this->Akademik_model->get_jadwal_badal_kelas_pv_luar_by_tgl($badal['tgl']));
        }

        $data['tabs'] = "jadwal";

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("badal/jadwal", $data);
        $this->load->view("templates/footer");
    }

    public function konfirmasi(){
        $data['title'] = "Konfirmasi Badal";
        
        $data['tabs'] = "konfirmasi";

        $data['jadwal'] = $this->Akademik_model->get_konfirmasi_badal();

        // var_dump($data);
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("badal/konfirmasi", $data);
        $this->load->view("templates/footer");

    }

    public function rekap(){
        $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        $bulan = date("n");
        $tahun = date("Y");
        $data['title'] = "Badal Yang Belum Terrekap {$month[$bulan]} {$tahun}";
        
        $data['tabs'] = "badal";

        $data['jadwal'] = $this->Akademik_model->get_badal_no_rekap();

        // var_dump($data);
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("badal/rekap", $data);
        $this->load->view("templates/footer");
    }

    // get
        public function get_jadwal_badal_kelas_by_tipe_by_tgl(){
            $data = explode("|", $this->input->post("id"));
            $tgl = $data[0];
            $tipe = $data[1];

            if($tipe == "Reguler"){
                $data = $this->Akademik_model->get_jadwal_badal_kelas_reguler_by_tgl($tgl);
            } else if($tipe == "Pv Khusus"){
                $data = $this->Akademik_model->get_jadwal_badal_kelas_pv_khusus_by_tgl($tgl);
            } else if($tipe == "Pv Luar"){
                $data = $this->Akademik_model->get_jadwal_badal_kelas_pv_luar_by_tgl($tgl);
            }

            echo json_encode($data);
        }

        public function get_catatan_badal_by_id(){
            $id = $this->input->post("id");
            $data = $this->Akademik_model->get_catatan_badal_by_id($id);

            echo json_encode($data);
        }
    // get

    // edit
        public function konfirm_badal($id){
            $this->Akademik_model->konfirm_badal($id);
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengkonfirmasi badal<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit

    // delete
        public function delete_badal_by_id_kbm($id){
            $this->Akademik_model->delete_badal_by_id_kbm($id);
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil membatalkan badal<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect($_SERVER['HTTP_REFERER']);
        }
    // delete
}