<?php
// Pastikan UserModel sudah di-include/autoload di framework-mu
include_once('app/models/UserModel.php');

class UserController {
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // [R]ead - Menampilkan halaman Kelola User
    public function index() {
        $users = $this->userModel->getAllUsers();

        // Di sini kita akan memuat View dan mengirimkan data $users
        // Asumsi: View ada di app/views/user_management.php
        $page_title = "Kelola User";
        $total_user = count($users);
        
        // Memuat View. Di framework, ini biasanya fungsi render
        include('app/views/user_management.php');
    }

    // [U]pdate Status - Menangani permintaan ubah status
    public function updateStatus() {
        // Pastikan permintaan datang dari POST dan memiliki 'id' dan 'status'
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
            $userId = $_POST['id'];
            $newStatus = $_POST['status'];
            
            // Panggil Model untuk update
            $success = $this->userModel->updateStatus($userId, $newStatus);

            if ($success) {
                // Beri respon sukses dan redirect kembali ke halaman list
                header('Location: index.php?page=kelola_user&message=status_updated');
                exit();
            }
        }
        // Redirect jika gagal atau request tidak valid
        header('Location: index.php?page=kelola_user&error=update_failed');
    }

    // [D]elete User - Menangani permintaan hapus user
    public function delete() {
        // Asumsi kita menggunakan GET request untuk demo, tapi idealnya pakai POST
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $userId = $_GET['id'];
            
            // Panggil Model untuk delete
            $success = $this->userModel->deleteUser($userId);

            if ($success) {
                header('Location: index.php?page=kelola_user&message=user_deleted');
                exit();
            }
        }
        header('Location: index.php?page=kelola_user&error=delete_failed');
    }

    // Catatan: Di implementasi nyata, fungsi search() akan ada di sini
    // Tapi karena kamu mau search client-side (JavaScript), maka logika search ada di View.
}