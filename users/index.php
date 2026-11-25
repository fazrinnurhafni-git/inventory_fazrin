<?php
require __DIR__ . '/../config/app.php';
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/functions.php';

$pageTitle = 'Data Pengguna';
$activeMenu = 'users';

$users = $pdo->query("SELECT nama, username, role, created_at FROM users ORDER BY nama ASC")->fetchAll();

require __DIR__ . '/../includes/header.php';
?>

<section class="card">
  <div class="card-header">
    <h2>Daftar Pengguna</h2>
    <span class="badge badge-info"><?= count($users) ?> pengguna</span>
  </div>

  <div class="table-wrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Role</th>
          <th>Tanggal Dibuat</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($users) === 0): ?>
          <tr>
            <td colspan="5" class="text-center">Belum ada pengguna.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($users as $i => $u): ?>
            <tr>
              <td><?= $i + 1 ?></td>
              <td><?= e($u['nama']) ?></td>
              <td><?= e($u['username']) ?></td>
              <td>
                <span class="badge <?= $u['role'] == 'admin' ? 'badge-info' : 'badge-success' ?>">
                  <?= e($u['role']) ?>
                </span>
              </td>
              <td><?= date('d-m-Y H:i', strtotime($u['created_at'])) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
</section>