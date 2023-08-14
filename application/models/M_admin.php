<?php
class M_admin extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    // =========================== Surat Masuk ============================
    public function dropdown_unit_penerbit()
    {
        $value_unit_penerbit = array('-Pilih-', 'Institusi', 'Jurusan Teknik Sipil', 'Jurusan Teknik Mesin', 'Jurusan Teknik Elektro', 'Jurusan Akuntansi', 'Jurusan Administrasi Bisnis');
        $nama_unit_penerbit = array('-Pilih-', 'Institusi', 'Jurusan Teknik Sipil', 'Jurusan Teknik Mesin', 'Jurusan Teknik Elektro', 'Jurusan Akuntansi', 'Jurusan Administrasi Bisnis');

        return array_combine($value_unit_penerbit, $nama_unit_penerbit);
    }

    public function dropdown_nama_pengesah()
    {
        $value_nama_pengesah = array('-Pilih-', 'Direktur', 'Ketua Jurusan Teknik Sipil', 'Ketua Jurusan Teknik Mesin', 'Ketua Jurusan Teknik Elektro', 'Ketua Jurusan Akuntansi', 'Ketua Jurusan Administrasi Bisnis');
        $nama_nama_pengesah = array('-Pilih-', 'Direktur', 'Ketua Jurusan Teknik Sipil', 'Ketua Jurusan Teknik Mesin', 'Ketua Jurusan Teknik Elektro', 'Ketua Jurusan Akuntansi', 'Ketua Jurusan Administrasi Bisnis');

        return array_combine($value_nama_pengesah, $nama_nama_pengesah);
    }

    public function dt_surat_masuk()
    {
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $query = $this->db->get();
        return $query->result_array();        
    }

    public function dt_surat_masuk_tambah()
    {
        $data = array(
            'no_surat' => $this->input->post('no_surat'),
            'pengirim' => $this->input->post('pengirim'),
            'waktu' => $this->input->post('waktu'),
            'lampiran' => $this->input->post('lampiran'),
            'perihal' => $this->input->post('perihal'),
            'penerima' => $this->input->post('penerima'),
            'isi' => $this->input->post('isi'),
            'unit_penerbit' => $this->input->post('unit_penerbit'),
            'tempat' => $this->input->post('tempat'),
            'nama_pengesah' => $this->input->post('nama_pengesah'),
            'nama_tembusan' => $this->input->post('nama_tembusan'),
        );
        
        return $this->db->insert('surat_masuk', $data);
    }

    public function dt_surat_masuk_edit($id)
    {
        $data = array(
            'no_surat' => $this->input->post('no_surat'),
            'pengirim' => $this->input->post('pengirim'),
            'waktu' => $this->input->post('waktu'),
            'lampiran' => $this->input->post('lampiran'),
            'perihal' => $this->input->post('perihal'),
            'penerima' => $this->input->post('penerima'),
            'isi' => $this->input->post('isi'),
            'unit_penerbit' => $this->input->post('unit_penerbit'),
            'tempat' => $this->input->post('tempat'),
            'nama_pengesah' => $this->input->post('nama_pengesah'),
            'nama_tembusan' => $this->input->post('nama_tembusan'),
        );

        $this->db->where('id', $id);
        return $this->db->update('surat_masuk', $data);
    }

    // =========================== Surat Keluar ============================
    public function dt_surat_keluar()
    {
        $this->db->select('*');
        $this->db->from('surat_keluar');
        $query = $this->db->get();
        return $query->result_array();        
    }

    public function dt_surat_keluar_tambah()
    {
        $data = array(
            'no_surat' => $this->input->post('no_surat'),
            'pengirim' => $this->input->post('pengirim'),
            'waktu' => $this->input->post('waktu'),
            'lampiran' => $this->input->post('lampiran'),
            'perihal' => $this->input->post('perihal'),
            'penerima' => $this->input->post('penerima'),
            'isi' => $this->input->post('isi'),
            'unit_penerbit' => $this->input->post('unit_penerbit'),
            'tempat' => $this->input->post('tempat'),
            'nama_pengesah' => $this->input->post('nama_pengesah'),
            'nama_tembusan' => $this->input->post('nama_tembusan'),
        );
        
        return $this->db->insert('surat_keluar', $data);
    }

    public function dt_surat_keluar_edit($id)
    {
        $data = array(
            'no_surat' => $this->input->post('no_surat'),
            'pengirim' => $this->input->post('pengirim'),
            'waktu' => $this->input->post('waktu'),
            'lampiran' => $this->input->post('lampiran'),
            'perihal' => $this->input->post('perihal'),
            'penerima' => $this->input->post('penerima'),
            'isi' => $this->input->post('isi'),
            'unit_penerbit' => $this->input->post('unit_penerbit'),
            'tempat' => $this->input->post('tempat'),
            'nama_pengesah' => $this->input->post('nama_pengesah'),
            'nama_tembusan' => $this->input->post('nama_tembusan'),
        );

        $this->db->where('id', $id);
        return $this->db->update('surat_keluar', $data);
    }


//=============================== SANTRI ===============================
//     public function dt_santri_detil($id)
//     {
//         $this->db->select('s.id_santri, s.nama_santri, k.nama_kelas, s.nama_alias, g.nama_guru');
//         $this->db->from('santri s');
//         $this->db->join('guru g', 's.id_guru = g.id_guru','left');
//         $this->db->join('kelas k', 'k.id_kelas = s.id_kelas', 'left');
//         $this->db->where('id_santri',$id);
//         $query = $this->db->get();
//         return $query->row_array();           
//     }

//     public function dt_santri_tambah()
//     {
//         $data = array(
//             'nama_santri' => $this->input->post('nama_santri'),
//             'nama_alias' => $this->input->post('nama_alias'),
//             'id_guru' => $this->input->post('id_guru'),
//             'id_kelas' => $this->input->post('id_kelas')
//         );
//         return $this->db->insert('santri', $data);
//     }

//     public function dt_santri_edit($id)
//     {
//         $data = array(
//             'nama_santri' => $this->input->post('nama_santri'),
//             'nama_alias' => $this->input->post('nama_alias'),
//             'id_guru' => $this->input->post('id_guru'),
//             'id_kelas' => $this->input->post('id_kelas')
//         );
//         $this->db->where('id_santri', $id);
//         return $this->db->update('santri', $data);
//     }

// //=============================== GURU ===============================
//     public function dropdown_guru()
//     {
//         $query = $this->db->get('guru');
//         $result = $query->result();

//         $id_guru = array('-Pilih-');
//         $nama_guru = array('-Pilih-');

//         for ($i = 0; $i < count($result); $i++) {
//             array_push($id_guru, $result[$i]->id_guru);
//             array_push($nama_guru, $result[$i]->nama_guru);
//         }
//         return array_combine($id_guru, $nama_guru);
//     }

//     public function dt_guru($id = FALSE)
//     {
//         $this->db->select('s.id_guru, s.nama_guru');
//         $this->db->from('guru s');
//         $query = $this->db->get();
//         return $query->result_array();
//     }

//     public function guru_tambah()
//     {
//         $data = array(
//             'nama_guru' => $this->input->post('nama_guru'),
//         );

//         return $this->db->insert('guru', $data);
//     }  

//     public function dt_guru_edit($id)
//     {
//         $data = array(
//             'nama_guru' => $this->input->post('nama_guru'),
//         );
//         $this->db->where('id_guru', $id);
//         return $this->db->update('guru', $data);        
//     }

//     //=============================== kelas ===============================
//     public function dropdown_kelas()
//     {
//         $query = $this->db->get('kelas');
//         $result = $query->result();

//         $id_kelas = array('-Pilih-');
//         $nama_kelas = array('-Pilih-');

//         for ($i = 0; $i < count($result); $i++) {
//             array_push($id_kelas, $result[$i]->id_kelas);
//             array_push($nama_kelas, $result[$i]->nama_kelas);
//         }
//         return array_combine($id_kelas, $nama_kelas);
//     }

//     public function dt_kelas($id = FALSE)
//     {
//         $this->db->select('s.id_kelas, s.nama_kelas');
//         $this->db->from('kelas s');
//         $query = $this->db->get();
//         return $query->result_array();
//     }

//     public function kelas_tambah()
//     {
//         $data = array(
//             'nama_kelas' => $this->input->post('nama_kelas'),
//         );

//         return $this->db->insert('kelas', $data);
//     }

//     public function dt_kelas_edit($id)
//     {
//         $data = array(
//             'nama_kelas' => $this->input->post('nama_kelas'),
//         );
//         $this->db->where('id_kelas', $id);
//         return $this->db->update('kelas', $data);
//     }
//     //=============================== DATA SANTRI PER KELAS===============================
//     public function dt_santri_per_kelas($id)
//     {
//         $this->db->select('s.id_santri, s.nama_santri, s.nama_alias, g.nama_guru');
//         $this->db->from('santri s');
//         $this->db->join('guru g', 's.id_guru = g.id_guru', 'left');
//         $this->db->where('s.id_kelas',$id);
//         $query = $this->db->get();
//         return $query->result_array();
//     }

}