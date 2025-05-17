<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SIPenulis</title>
    <style>
        :root {
            --primary: #4a6fa5;
            --secondary: #166088;
            --accent: #4fc3f7;
            --light: #f8f9fa;
            --dark: #343a40;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: var(--dark);
            color: white;
            padding: 20px 0;
            transition: all 0.3s;
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        
        .sidebar-header h2 {
            color: white;
            font-size: 22px;
            display: flex;
            align-items: center;
        }
        
        .sidebar-header h2 i {
            margin-right: 10px;
            color: var(--accent);
        }
        
        .sidebar-menu {
            padding: 0 20px;
        }
        
        .menu-item {
            padding: 12px 15px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            border-radius: 6px;
            margin-bottom: 5px;
            font-weight: 500;
            color: #ddd;
        }
        
        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .menu-item.active {
            background-color: var(--primary);
            color: white;
        }
        
        .menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            padding: 25px;
            background-color: #f9f9f9;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        
        .header h1 {
            color: var(--dark);
            font-size: 24px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 8px 15px;
            border-radius: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .user-info img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .card h3 {
            color: #666;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
        }
        
        .card .value {
            font-size: 24px;
            font-weight: bold;
            color: var(--dark);
            margin: 5px 0;
        }
        
        .card .trend {
            font-size: 13px;
            color: var(--success);
            display: flex;
            align-items: center;
        }
        
        .card .trend.down {
            color: var(--danger);
        }
        
        .card .trend i {
            margin-right: 5px;
        }
        
        /* Tables */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }
        
        .data-table th, 
        .data-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .data-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #555;
            font-size: 14px;
        }
        
        .data-table tr:hover {
            background-color: #f9f9f9;
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }
        
        .status.pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status.approved {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status.rejected {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .status.published {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .status.paid {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status.unpaid {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
            font-size: 13px;
            margin-right: 5px;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-success {
            background-color: var(--success);
            color: white;
        }
        
        .btn-warning {
            background-color: var(--warning);
            color: black;
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        /* Tabs */
        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
        }
        
        .tab.active {
            border-bottom: 3px solid var(--primary);
            font-weight: 500;
            color: var(--primary);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Forms */
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        /* Charts */
        .chart-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .chart-placeholder {
            width: 100%;
            height: 100%;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 18px;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .dashboard-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-user-shield"></i> Admin Panel</h2>
            </div>
            
            <div class="sidebar-menu">
                <div class="menu-item active" onclick="showTab('dashboard')">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </div>
                <div class="menu-item" onclick="showTab('stories')">
                    <i class="fas fa-book"></i> Manajemen Cerita
                </div>
                <div class="menu-item" onclick="showTab('authors')">
                    <i class="fas fa-users"></i> Manajemen Penulis
                </div>
                <div class="menu-item" onclick="showTab('royalties')">
                    <i class="fas fa-coins"></i> Pembayaran Royalti
                </div>
                <div class="menu-item" onclick="showTab('settings')">
                    <i class="fas fa-cog"></i> Pengaturan Sistem
                </div>
                <div class="menu-item" onclick="showTab('reports')">
                    <i class="fas fa-chart-bar"></i> Laporan
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1 id="page-title">Dashboard Admin</h1>
                <div class="user-info">
                    <img src="https://via.placeholder.com/35" alt="User">
                    <span>Admin</span>
                </div>
            </div>
            
            <!-- Dashboard Tab -->
            <div id="dashboard" class="tab-content active">
                <div class="dashboard-cards">
                    <div class="card">
                        <h3>Total Penulis</h3>
                        <div class="value">128</div>
                        <div class="trend">
                            <i class="fas fa-arrow-up"></i> 12% dari bulan lalu
                        </div>
                    </div>
                    <div class="card">
                        <h3>Total Pembaca</h3>
                        <div class="value">24,568</div>
                        <div class="trend">
                            <i class="fas fa-arrow-up"></i> 8% dari bulan lalu
                        </div>
                    </div>
                    <div class="card">
                        <h3>Cerita Aktif</h3>
                        <div class="value">543</div>
                        <div class="trend">
                            <i class="fas fa-arrow-up"></i> 5% dari bulan lalu
                        </div>
                    </div>
                    <div class="card">
                        <h3>Pendapatan Bulan Ini</h3>
                        <div class="value">Rp 125,750,000</div>
                        <div class="trend">
                            <i class="fas fa-arrow-up"></i> 15% dari bulan lalu
                        </div>
                    </div>
                </div>
                
                <div class="chart-container">
                    <div class="chart-placeholder">
                        Grafik Statistik Bulanan
                    </div>
                </div>
                
                <h2>Aktivitas Terkini</h2>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Aktivitas</th>
                            <th>Pengguna</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10 Mei 2023</td>
                            <td>Cerita Disetujui</td>
                            <td>Budi Santoso</td>
                            <td>"Petualangan di Negeri Awan"</td>
                        </tr>
                        <tr>
                            <td>9 Mei 2023</td>
                            <td>Pencairan Royalti</td>
                            <td>Ani Wijaya</td>
                            <td>Rp 3,250,000</td>
                        </tr>
                        <tr>
                            <td>8 Mei 2023</td>
                            <td>Cerita Ditolak</td>
                            <td>Agus Munif</td>
                            <td>"Misteri Hutan Gelap"</td>
                        </tr>
                        <tr>
                            <td>7 Mei 2023</td>
                            <td>Penulis Baru</td>
                            <td>Dewi Lestari</td>
                            <td>Bergabung dengan sistem</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Stories Management Tab -->
            <div id="stories" class="tab-content">
                <div class="tabs">
                    <div class="tab active" onclick="showStoryTab('pending-stories')">Menunggu Review</div>
                    <div class="tab" onclick="showStoryTab('published-stories')">Dipublikasikan</div>
                    <div class="tab" onclick="showStoryTab('rejected-stories')">Ditolak</div>
                </div>
                
                <div id="pending-stories" class="story-tab active">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal Upload</th>
                                <th>Genre</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Misteri Gunung Lawu</td>
                                <td>Ani Wijaya</td>
                                <td>2 Juni 2023</td>
                                <td>Misteri, Petualangan</td>
                                <td><span class="status pending">Menunggu Review</span></td>
                                <td>
                                    <button class="action-btn btn-primary"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-success"><i class="fas fa-check"></i></button>
                                    <button class="action-btn btn-danger"><i class="fas fa-times"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Kisah Kota Hilang</td>
                                <td>Rudi Hartono</td>
                                <td>1 Juni 2023</td>
                                <td>Fantasi, Petualangan</td>
                                <td><span class="status pending">Menunggu Review</span></td>
                                <td>
                                    <button class="action-btn btn-primary"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-success"><i class="fas fa-check"></i></button>
                                    <button class="action-btn btn-danger"><i class="fas fa-times"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div id="published-stories" class="story-tab">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal Publikasi</th>
                                <th>Pembaca</th>
                                <th>Rating</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Petualangan di Negeri Awan</td>
                                <td>Budi Santoso</td>
                                <td>15 Mei 2023</td>
                                <td>5,642</td>
                                <td>4.8</td>
                                <td>
                                    <button class="action-btn btn-primary"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-warning"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Filosofi Kopi</td>
                                <td>Dewi Lestari</td>
                                <td>28 Mei 2023</td>
                                <td>3,210</td>
                                <td>4.5</td>
                                <td>
                                    <button class="action-btn btn-primary"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-warning"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div id="rejected-stories" class="story-tab">
                    <!-- Konten cerita yang ditolak -->
                </div>
            </div>
            
            <!-- Authors Management Tab -->
            <div id="authors" class="tab-content">
                <h2>Daftar Penulis</h2>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Bergabung</th>
                            <th>Total Cerita</th>
                            <th>Total Pembaca</th>
                            <th>Total Royalti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Budi Santoso</td>
                            <td>Jan 2022</td>
                            <td>12</td>
                            <td>24,568</td>
                            <td>Rp 32,450,000</td>
                            <td>
                                <button class="action-btn btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="action-btn btn-warning"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Ani Wijaya</td>
                            <td>Mar 2022</td>
                            <td>8</td>
                            <td>15,342</td>
                            <td>Rp 18,750,000</td>
                            <td>
                                <button class="action-btn btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="action-btn btn-warning"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Dewi Lestari</td>
                            <td>Jul 2022</td>
                            <td>15</td>
                            <td>32,456</td>
                            <td>Rp 45,200,000</td>
                            <td>
                                <button class="action-btn btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="action-btn btn-warning"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Royalties Management Tab -->
            <div id="royalties" class="tab-content">
                <div class="tabs">
                    <div class="tab active" onclick="showRoyaltyTab('pending-payments')">Menunggu Pembayaran</div>
                    <div class="tab" onclick="showRoyaltyTab('payment-history')">Riwayat Pembayaran</div>
                </div>
                
                <div id="pending-payments" class="royalty-tab active">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Penulis</th>
                                <th>Jumlah</th>
                                <th>Periode</th>
                                <th>Rekening</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>Rp 3,750,000</td>
                                <td>Mei 2023</td>
                                <td>BCA - 1234567890</td>
                                <td><span class="status unpaid">Belum Dibayar</span></td>
                                <td>
                                    <button class="action-btn btn-success">Proses Pembayaran</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Ani Wijaya</td>
                                <td>Rp 2,250,000</td>
                                <td>Mei 2023</td>
                                <td>Mandiri - 0987654321</td>
                                <td><span class="status unpaid">Belum Dibayar</span></td>
                                <td>
                                    <button class="action-btn btn-success">Proses Pembayaran</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div id="payment-history" class="royalty-tab">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Penulis</th>
                                <th>Jumlah</th>
                                <th>Periode</th>
                                <th>Rekening</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15 Apr 2023</td>
                                <td>Budi Santoso</td>
                                <td>Rp 3,200,000</td>
                                <td>Apr 2023</td>
                                <td>BCA - 1234567890</td>
                                <td><span class="status paid">Sudah Dibayar</span></td>
                            </tr>
                            <tr>
                                <td>28 Mar 2023</td>
                                <td>Ani Wijaya</td>
                                <td>Rp 1,850,000</td>
                                <td>Mar 2023</td>
                                <td>Mandiri - 0987654321</td>
                                <td><span class="status paid">Sudah Dibayar</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- System Settings Tab -->
            <div id="settings" class="tab-content">
                <h2>Pengaturan Sistem</h2>
                <div class="card" style="max-width: 600px; margin-bottom: 30px;">
                    <h3>Tarif Baca</h3>
                    <form>
                        <div class="form-group">
                            <label for="price-per-chapter">Harga per Bab (Rp)</label>
                            <input type="number" id="price-per-chapter" value="5000">
                        </div>
                        <div class="form-group">
                            <label for="author-percentage">Persentase Penulis (%)</label>
                            <input type="number" id="author-percentage" value="60">
                        </div>
                        <button type="submit" class="action-btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
                
                <div class="card" style="max-width: 600px;">
                    <h3>Pengaturan Umum</h3>
                    <form>
                        <div class="form-group">
                            <label for="min-withdrawal">Minimal Pencairan (Rp)</label>
                            <input type="number" id="min-withdrawal" value="500000">
                        </div>
                        <div class="form-group">
                            <label for="withdrawal-days">Hari Proses Pencairan</label>
                            <input type="number" id="withdrawal-days" value="7">
                        </div>
                        <button type="submit" class="action-btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
            
            <!-- Reports Tab -->
            <div id="reports" class="tab-content">
                <div class="tabs">
                    <div class="tab active" onclick="showReportTab('content-performance')">Kinerja Konten</div>
                    <div class="tab" onclick="showReportTab('royalty-reports')">Laporan Royalti</div>
                    <div class="tab" onclick="showReportTab('user-growth')">Pertumbuhan Pengguna</div>
                </div>
                
                <div id="content-performance" class="report-tab active">
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            Grafik Kinerja Konten
                        </div>
                    </div>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Pembaca</th>
                                <th>Rating</th>
                                <th>Royalti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Petualangan di Negeri Awan</td>
                                <td>Budi Santoso</td>
                                <td>5,642</td>
                                <td>4.8</td>
                                <td>Rp 12,450,000</td>
                            </tr>
                            <tr>
                                <td>Filosofi Kopi</td>
                                <td>Dewi Lestari</td>
                                <td>3,210</td>
                                <td>4.5</td>
                                <td>Rp 8,750,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div id="royalty-reports" class="report-tab">
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            Grafik Laporan Royalti
                        </div>
                    </div>
                    <!-- Konten laporan royalti -->
                </div>
                
                <div id="user-growth" class="report-tab">
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            Grafik Pertumbuhan Pengguna
                        </div>
                    </div>
                    <!-- Konten pertumbuhan pengguna -->
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Fungsi untuk menampilkan tab utama
        function showTab(tabId) {
            // Sembunyikan semua tab konten
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Tampilkan tab yang dipilih
            document.getElementById(tabId).classList.add('active');
            
            // Update judul halaman
            const tabTitles = {
                'dashboard': 'Dashboard Admin',
                'stories': 'Manajemen Cerita',
                'authors': 'Manajemen Penulis',
                'royalties': 'Pembayaran Royalti',
                'settings': 'Pengaturan Sistem',
                'reports': 'Laporan'
            };
            document.getElementById('page-title').textContent = tabTitles[tabId];
            
            // Update menu sidebar aktif
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }
        
        // Fungsi untuk menampilkan sub-tab cerita
        function showStoryTab(tabId) {
            // Sembunyikan semua sub-tab cerita
            document.querySelectorAll('.story-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Tampilkan sub-tab yang dipilih
            document.getElementById(tabId).classList.add('active');
            
            // Update tab aktif
            document.querySelectorAll('#stories .tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }
        
        // Fungsi untuk menampilkan sub-tab royalti
        function showRoyaltyTab(tabId) {
            // Sembunyikan semua sub-tab royalti
            document.querySelectorAll('.royalty-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Tampilkan sub-tab yang dipilih
            document.getElementById(tabId).classList.add('active');
            
            // Update tab aktif
            document.querySelectorAll('#royalties .tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }
        
        // Fungsi untuk menampilkan sub-tab laporan
        function showReportTab(tabId) {
            // Sembunyikan semua sub-tab laporan
            document.querySelectorAll('.report-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Tampilkan sub-tab yang dipilih
            document.getElementById(tabId).classList.add('active');
            
            // Update tab aktif
            document.querySelectorAll('#reports .tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }
        
        // Fungsi untuk tombol aksi
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const action = this.innerHTML.includes('fa-eye') ? 'lihat' : 
                              this.innerHTML.includes('fa-check') ? 'setujui' :
                              this.innerHTML.includes('fa-times') ? 'tolak' :
                              this.innerHTML.includes('fa-edit') ? 'edit' :
                              this.textContent.toLowerCase();
                
                alert(`Aksi: ${action}`);
            });
        });
    </script>
</body>
</html>