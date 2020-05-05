<?php
class Wl extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Akademik_model");
        $this->load->model("Akademik_model");
        
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function reguler(){
        $data['tabs'] = "reguler";
        $data['title'] = "Waiting List Reguler";

        $kategori = $this->Akademik_model->get_kategori_wl_reguler();
        foreach ($kategori as $i => $kategori) {
            $data['wl'][$i]['kategori'] = $kategori['kategori'];
            $data['wl'][$i]['pria'] = COUNT($this->Akademik_model->get_peserta_wl_reguler_by_kategori($kategori['kategori'], 'Pria'));
            $data['wl'][$i]['wanita'] = COUNT($this->Akademik_model->get_peserta_wl_reguler_by_kategori($kategori['kategori'], 'Wanita'));
        }
        
        $kelas = $this->Akademik_model->get_kelas_reguler_aktif();
        foreach ($kelas as $i => $kelas) {
            $data['kelas_reg'][$i]['data'] = $kelas;
            $data['kelas_reg'][$i]['peserta'] = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($kelas['id_kelas']));
        }

        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("wl/wl_reguler", $data);
        $this->load->view("templates/footer", $data);
    }

    public function privat(){
        $data['tabs'] = "privat";
        $data['title'] = "Waiting List Kelas Privat";

        $kelas = $this->Akademik_model->get_all_kelas_wl();
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i]['data'] = $kelas;
            $data['kelas'][$i]['peserta'] = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($kelas['id_kelas']));
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');
        // var_dump($data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('wl/wl_privat', $data);
        $this->load->view('templates/footer');
    }

    // add
        public function get_peserta_wl_reguler_by_kategori(){
            $data = explode('|', $this->input->post("id"));
            $kategori = $data[0];
            $jk = $data[1];
            $data = $this->Akademik_model->get_peserta_wl_reguler_by_kategori($kategori, $jk);
            echo json_encode($data);
        }
    // add

    // edit
        public function konfirm_wl($id_kelas){
            $jadwal = COUNT($this->Akademik_model->get_data_jadwal_aktif_by_kelas($id_kelas));

            if($jadwal != 0){
                $this->Akademik_model->konfirm_wl($id_kelas);
                
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengkonfirmasi waiting list<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal mengkonfirmasi waiting list, Anda harus membuat jadwal terlebih dahulu<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function batal_wl($id_kelas){
            $this->Akademik_model->batal_wl($id_kelas);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil membatalkan waiting list<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit

}