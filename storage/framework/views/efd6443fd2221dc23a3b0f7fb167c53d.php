

<?php $__env->startSection('content'); ?>
<h1 class="mb-4">Data Mahasiswa</h1>

<a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

<?php if(session('success')): ?>
  <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>ID</th><th>Nama</th><th>NIM</th><th>Jurusan</th><th>Email</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($mhs->id); ?></td>
      <td><?php echo e($mhs->nama); ?></td>
      <td><?php echo e($mhs->nim); ?></td>
      <td><?php echo e($mhs->jurusan); ?></td>
      <td><?php echo e($mhs->email); ?></td>
      <td>
        <a href="<?php echo e(route('mahasiswa.edit', $mhs->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
        <form action="<?php echo e(route('mahasiswa.destroy', $mhs->id)); ?>" method="POST" style="display:inline">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
        </form>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\12d2\crud-mahasiswa\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>