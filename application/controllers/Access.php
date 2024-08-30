<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Access_model');
    }

    public function form()
    {
        // Menampilkan form pengajuan
        $this->load->view('access_form');
    }

    public function submit()
    {
        // Mendapatkan data dari form
        $applicantType = $this->input->post('applicantType');
        $email = $this->input->post('email');
        $keterangan = $this->input->post('keteranganPengajuan');

        // Membuat array data untuk disimpan
        $data = [
            'applicant_type' => $applicantType,
            'email' => $email,
            'keterangan_pengajuan' => $keterangan,
            'status' => 'pending'
        ];

        // Menambahkan data berdasarkan jenis pemohon
        if ($applicantType == 'Mahasiswa') {
            $data['nama_lengkap'] = $this->input->post('nama_lengkap_mahasiswa');
            $data['identity_number'] = $this->input->post('identityNumber_mahasiswa');
            $data['faculty_department'] = $this->input->post('facultyDepartment_mahasiswa');
            $data['program_studi'] = $this->input->post('programStudi_mahasiswa');
        } elseif ($applicantType == 'Dosen') {
            $data['nama_lengkap'] = $this->input->post('nama_lengkap_dosen');
            $data['identity_number'] = $this->input->post('identityNumber_dosen');
            $data['faculty_department'] = $this->input->post('facultyDepartment_dosen');
            $data['jabatan'] = $this->input->post('jabatan_dosen');
        } elseif ($applicantType == 'Staff') {
            $data['nama_lengkap'] = $this->input->post('nama_lengkap_staff');
            $data['identity_number'] = $this->input->post('identityNumber_staff');
            $data['faculty_department'] = $this->input->post('facultyDepartment_staff');
            $data['divisi'] = $this->input->post('divisi_staff');
        }

        // Simpan data pengajuan ke database
        $this->Access_model->insert_pengajuan($data);

        // Redirect ke halaman konfirmasi setelah submit
        redirect('access/confirmation');
    }

    public function confirmation()
    {
        // Menampilkan halaman konfirmasi
        $this->load->view('access_confirmation');
    }

    public function approval_list()
    {
        // Mengambil data pengajuan berdasarkan status
        $data['pending'] = $this->Access_model->get_pengajuan_by_status('pending');
        $data['approved'] = $this->Access_model->get_pengajuan_by_status('approved');

        // Menampilkan halaman approval list
        $this->load->view('approval', $data);
    }

    public function approve($id)
    {
        // Mengubah status pengajuan menjadi approved
        $this->Access_model->update_status($id, 'approved');

        // Redirect kembali ke daftar approval
        redirect('access/approval_list');
    }

    public function reject($id)
    {
        // Mengubah status pengajuan menjadi rejected
        $this->Access_model->update_status($id, 'rejected');

        // Redirect kembali ke daftar approval
        redirect('access/approval_list');
    }

    public function hapus_pengajuan($id)
    {
        // Hapus pengajuan berdasarkan ID
        $this->Access_model->delete_pengajuan($id);

        // Redirect kembali ke daftar approval
        redirect('access/approval_list');
    }

    public function export_excel()
    {
        // Load library PHPExcel
        require_once APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';

        $excel = new PHPExcel();

        // Set properties
        $excel->getProperties()->setCreator("Your Name")
                               ->setLastModifiedBy("Your Name")
                               ->setTitle("Data Pengajuan")
                               ->setSubject("Data Pengajuan")
                               ->setDescription("Laporan Pengajuan Akses");

        // Ambil data pengajuan berdasarkan status
        $pendingData = $this->Access_model->get_pengajuan_by_status('pending');
        $approvedData = $this->Access_model->get_pengajuan_by_status('approved');

        // Setting header kolom di excel
        $excel->setActiveSheetIndex(0)
              ->setCellValue('A1', 'ID')
              ->setCellValue('B1', 'Nama Lengkap')
              ->setCellValue('C1', 'Email')
              ->setCellValue('D1', 'Keterangan')
              ->setCellValue('E1', 'Status');

        // Tulis data pending ke excel
        $row = 2; // Mulai dari baris kedua
        foreach ($pendingData as $data) {
            $excel->getActiveSheet()->setCellValue('A' . $row, $data['id_KA'])
                                    ->setCellValue('B' . $row, $data['nama_lengkap'])
                                    ->setCellValue('C' . $row, $data['email'])
                                    ->setCellValue('D' . $row, $data['keterangan_pengajuan'])
                                    ->setCellValue('E' . $row, 'Pending');
            $row++;
        }

        // Tulis data approved ke excel
        foreach ($approvedData as $data) {
            $excel->getActiveSheet()->setCellValue('A' . $row, $data['id_KA'])
                                    ->setCellValue('B' . $row, $data['nama_lengkap'])
                                    ->setCellValue('C' . $row, $data['email'])
                                    ->setCellValue('D' . $row, $data['keterangan_pengajuan'])
                                    ->setCellValue('E' . $row, 'Approved');
            $row++;
        }

        // Rename worksheet
        $excel->getActiveSheet()->setTitle('Data Pengajuan');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excel->setActiveSheetIndex(0);

        // Output ke browser
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="DataPengajuan.xls"');
        header('Cache-Control: max-age=0');
        
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $writer->save('php://output');
        exit;
    }
}
