<?php

class UserModel {
    
    // Data Dummy (SIDER 20) sebagai simulasi database
    private $users = [];

    public function __construct() {
        // Inisialisasi 20 Data Dummy
        $this->users = [
            ['id' => 1, 'nama' => 'Riska Wijaya', 'email' => 'riska@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 2, 'nama' => 'Budi Santoso', 'email' => 'budi@mail.com', 'role' => 'Wisatawan', 'status' => 'Non Aktif'],
            ['id' => 3, 'nama' => 'Siti Nurhaliza', 'email' => 'siti@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 4, 'nama' => 'Agung Pramana', 'email' => 'agung@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 5, 'nama' => 'Diah Ayu', 'email' => 'diah@mail.com', 'role' => 'Wisatawan', 'status' => 'Non Aktif'],
            ['id' => 6, 'nama' => 'Eko Maulana', 'email' => 'eko@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 7, 'nama' => 'Fani Adelia', 'email' => 'fani@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 8, 'nama' => 'Gilang Putra', 'email' => 'gilang@mail.com', 'role' => 'Wisatawan', 'status' => 'Non Aktif'],
            ['id' => 9, 'nama' => 'Heni Susanti', 'email' => 'heni@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 10, 'nama' => 'Indra Jaya', 'email' => 'indra@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 11, 'nama' => 'Jihan Kirana', 'email' => 'jihan@mail.com', 'role' => 'Wisatawan', 'status' => 'Non Aktif'],
            ['id' => 12, 'nama' => 'Kemal Pasha', 'email' => 'kemal@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 13, 'nama' => 'Laila Sari', 'email' => 'laila@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 14, 'nama' => 'Maman Sudarman', 'email' => 'maman@mail.com', 'role' => 'Wisatawan', 'status' => 'Non Aktif'],
            ['id' => 15, 'nama' => 'Nina Kartika', 'email' => 'nina@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 16, 'nama' => 'Oki Setiawan', 'email' => 'oki@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 17, 'nama' => 'Putri Lestari', 'email' => 'putri@mail.com', 'role' => 'Wisatawan', 'status' => 'Non Aktif'],
            ['id' => 18, 'nama' => 'Qinan Fadhil', 'email' => 'qinan@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 19, 'nama' => 'Rendi Kusuma', 'email' => 'rendi@mail.com', 'role' => 'Wisatawan', 'status' => 'Aktif'],
            ['id' => 20, 'nama' => 'Sari Dewi', 'email' => 'sari@mail.com', 'role' => 'Wisatawan', 'status' => 'Non Aktif'],
        ];
    }

    // [R]ead - Mengambil semua data user
    public function getAllUsers() {
        // Di sini seharusnya ada koneksi ke DB dan query SELECT
        return $this->users;
    }
    
    // [U]pdate - Simulasi Update Status
    public function updateStatus($userId, $newStatus) {
        // Logika nyata: UPDATE users SET status = ? WHERE id = ?
        // Simulasi: 
        foreach ($this->users as &$user) {
            if ($user['id'] == $userId) {
                $user['status'] = $newStatus;
                return true; // Berhasil update
            }
        }
        return false; // User tidak ditemukan
    }

    // [D]elete - Simulasi Hapus User
    public function deleteUser($userId) {
        // Logika nyata: DELETE FROM users WHERE id = ?
        // Simulasi:
        $initialCount = count($this->users);
        $this->users = array_filter($this->users, function($user) use ($userId) {
            return $user['id'] != $userId;
        });
        return count($this->users) < $initialCount; // Berhasil hapus
    }
}