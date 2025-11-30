<div class="container-fluid">
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Utama (Kelola User)</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $total_user ?? 0; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data User SIDER 20</h6>
            
            <div class="d-flex align-items-center">
                 <input type="text" class="form-control" placeholder="Cari Nama/Email/Status..." id="searchInput" 
                    value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" style="width: 250px; margin-right: 5px;">
                <button class="btn btn-primary" type="button" onclick="filterTable()">Cari</button>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th style="width: 10%;">Role</th>
                            <th style="width: 15%;">Status</th>
                            <th style="width: 25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <?php 
                        // Pastikan variabel $users ada dari Controller
                        $no = 1;
                        foreach (($users ?? []) as $user): 
                            $status_class = ($user['status'] == 'Aktif') ? 'bg-success' : 'bg-danger';
                            $action_text = ($user['status'] == 'Aktif') ? 'Non Aktifkan' : 'Aktifkan';
                            $action_color = ($user['status'] == 'Aktif') ? 'warning' : 'success';
                            $next_status = ($user['status'] == 'Aktif') ? 'Non Aktif' : 'Aktif';
                        ?>
                        <tr data-nama="<?php echo strtolower($user['nama']); ?>" 
                            data-email="<?php echo strtolower($user['email']); ?>" 
                            data-status="<?php echo strtolower($user['status']); ?>">
                            
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($user['nama']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td><span class="badge <?php echo $status_class; ?>"><?php echo htmlspecialchars($user['status']); ?></span></td>
                            <td>
                                <button onclick="confirmUpdateStatus(<?php echo $user['id']; ?>, '<?php echo $next_status; ?>')" 
                                        class="btn btn-<?php echo $action_color; ?> btn-sm">
                                    <?php echo $action_text; ?>
                                </button>
                                <button onclick="confirmDeleteUser(<?php echo $user['id']; ?>)" 
                                        class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // **********************************************
    // LOGIKA JAVASCRIPT UNTUK PENCARIAN (CLIENT SIDE)
    // **********************************************
    function filterTable() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const tableBody = document.getElementById('userTableBody');
        const rows = tableBody.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            
            // Ambil data dari atribut 'data-'
            const nama = row.getAttribute('data-nama');
            const email = row.getAttribute('data-email');
            const status = row.getAttribute('data-status');

            // Cek apakah input cocok dengan Nama, Email, atau Status
            if (nama.includes(input) || email.includes(input) || status.includes(input)) {
                row.style.display = ""; // Tampilkan baris
            } else {
                row.style.display = "none"; // Sembunyikan baris
            }
        }
    }
    
    // Untuk mengaktifkan filter saat menekan Enter
    document.getElementById('searchInput').addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            filterTable();
        }
    });

    // **********************************************
    // LOGIKA JAVASCRIPT UNTUK AKSI (UPDATE & DELETE)
    // **********************************************
    
    function confirmUpdateStatus(userId, newStatus) {
        if (confirm(`Apakah Anda yakin ingin mengubah status User ID ${userId} menjadi ${newStatus}?`)) {
            // KIRIM DATA KE CONTROLLER UNTUK UPDATE
            // Asumsi: URL untuk update status adalah index.php?page=update_status
            const form = document.createElement('form');
            form.method = 'POST';
            // Ganti 'index.php?page=update_status' dengan rute controller-mu yang benar
            form.action = 'index.php?page=update_status'; 

            const idField = document.createElement('input');
            idField.type = 'hidden';
            idField.name = 'id';
            idField.value = userId;
            form.appendChild(idField);

            const statusField = document.createElement('input');
            statusField.type = 'hidden';
            statusField.name = 'status';
            statusField.value = newStatus;
            form.appendChild(statusField);

            document.body.appendChild(form);
            form.submit();
        }
    }

    function confirmDeleteUser(userId) {
        if (confirm(`Apakah Anda yakin ingin menghapus User ID ${userId} secara permanen? Aksi ini tidak dapat dibatalkan.`)) {
            // KIRIM DATA KE CONTROLLER UNTUK DELETE
            // Asumsi: URL untuk delete user adalah index.php?page=delete_user&id=
            // Ganti 'index.php?page=delete_user' dengan rute controller-mu yang benar
            window.location.href = `index.php?page=delete_user&id=${userId}`;
        }
    }
</script>