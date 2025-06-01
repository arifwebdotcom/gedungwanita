<!DOCTYPE html>
<html>
<head>
    <title>Upload Excel Invoice</title>
</head>
<body>
    <h2>Upload Excel Invoice</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('invoice/import') ?>" enctype="multipart/form-data">
        <input type="file" name="excel_file" accept=".xls,.xlsx" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>
