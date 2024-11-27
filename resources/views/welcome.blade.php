<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>
    <?php echo env('APP_NAME'); ?>
</h1>

<h2>
    <?php echo config('app.name'); ?>
</h2>

<h2>
    <?php echo config('database.connections.mysql.collation') ?>
</h2>

<h2><?php echo config('epelajar.general.site_title'); ?></h2>

<p>Hantar sebarang pertanyaan ke <?php echo env('MAIL_FROM_ADDRESS'); ?></p>

<div>
    <label>Status Pelajar</label>
    <select name="status_pelajar">

        <?php foreach (config('epelajar.general.user_status') as $key => $value): ?>

            <option value="<?php echo $key; ?>">
                <?php echo $value; ?>
            </option>

        <?php endforeach; ?>

    </select>
</div>

<p><?php echo config('epelajar.general.site_copyright'); ?></p>
</body>
</html>
