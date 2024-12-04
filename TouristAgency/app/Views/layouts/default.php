<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/index.css">
  <title>index</title>
</head>

<body>
<?=view('/layouts/header');?>
  <main>
    <?= $this->renderSection('content') ?>
  </main>

</body>

</html>