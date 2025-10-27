<!DOCTYPE html>
<html>
<head>
    <title>Detail Todo - PHP Aplikasi Todolist</title>
    <link href="/assets/vendor/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .detail-card {
            border-left: 4px solid #0d6efd;
        }
        .info-label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .info-value {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Back Button -->
                <div class="mb-3">
                    <a href="index.php" class="btn btn-secondary">
                        ← Kembali ke Daftar Todo
                    </a>
                </div>

                <!-- Detail Card -->
                <div class="card detail-card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Detail Todo</h3>
                    </div>
                    <div class="card-body p-4">
                        <!-- Judul -->
                        <div class="mb-4">
                            <div class="info-label">JUDUL</div>
                            <div class="info-value">
                                <h4><?= htmlspecialchars($todo['title']) ?></h4>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <div class="info-label">DESKRIPSI</div>
                            <div class="info-value">
                                <?php if (!empty($todo['description'])): ?>
                                    <p class="text-muted"><?= nl2br(htmlspecialchars($todo['description'])) ?></p>
                                <?php else: ?>
                                    <p class="text-muted fst-italic">Tidak ada deskripsi</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <div class="info-label">STATUS</div>
                            <div class="info-value">
                                <?php if ($todo['is_finished'] == 't' || $todo['is_finished'] == '1'): ?>
                                    <span class="badge bg-success fs-6 px-3 py-2">✓ Selesai</span>
                                <?php else: ?>
                                    <span class="badge bg-danger fs-6 px-3 py-2">✗ Belum Selesai</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <hr>

                        <!-- Tanggal Dibuat -->
                        <div class="mb-3">
                            <div class="info-label">TANGGAL DIBUAT</div>
                            <div class="info-value">
                                <i class="bi bi-calendar"></i> <?= date('d F Y, H:i:s', strtotime($todo['created_at'])) ?> WIB
                            </div>
                        </div>

                        <!-- Tanggal Diupdate -->
                        <div class="mb-4">
                            <div class="info-label">TERAKHIR DIUPDATE</div>
                            <div class="info-value">
                                <i class="bi bi-calendar-check"></i> <?= date('d F Y, H:i:s', strtotime($todo['updated_at'])) ?> WIB
                            </div>
                        </div>

                        <hr>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning" onclick="editTodo()">
                                Ubah Todo
                            </button>
                            <button class="btn btn-danger" onclick="deleteTodo()">
                                Hapus Todo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/vendor/bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
    <script>
    function editTodo() {
        // Redirect ke halaman utama dengan parameter untuk auto-open modal edit
        window.location.href = 'index.php#edit-<?= $todo['id'] ?>';
    }

    function deleteTodo() {
        if (confirm('Apakah kamu yakin ingin menghapus todo "<?= htmlspecialchars(addslashes($todo['title'])) ?>"?')) {
            window.location.href = '?page=delete&id=<?= $todo['id'] ?>';
        }
    }
</script>
</body>
</html>
