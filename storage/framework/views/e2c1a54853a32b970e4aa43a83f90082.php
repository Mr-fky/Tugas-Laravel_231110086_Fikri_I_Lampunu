

<?php $__env->startSection('title', 'Tambah Mahasiswa'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Tambah Mahasiswa</h1>

    <?php if($errors->any()): ?>
        <div class="error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('mahasiswa.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo e(old('nama')); ?>" required>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo e(old('nim')); ?>" required>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo e(old('jurusan')); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>

        <button type="submit">Simpan</button>
    </form>

    <div class="back-link">
        <a href="<?php echo e(route('mahasiswa.index')); ?>">Kembali ke Daftar Mahasiswa</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\12d2\crud-mahasiswa\resources\views/mahasiswa/create.blade.php ENDPATH**/ ?>