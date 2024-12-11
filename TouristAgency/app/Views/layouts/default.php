<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="/css/index.css">
  <script type="module" src="/Js/index.js"></script>
  <title>index</title>
</head>

<body>
  <?php
  if (session('admin') !== null) {
    echo view('/layouts/adminHeader', ['whois' => session('admin')]);
  } else if (session('user') !== null) {
    echo view('/layouts/userHeader', ['whois' => session('user')]);
  } else {
    echo view('/layouts/header');
  }
  ?>
  <main>
    <?= $this->renderSection('content') ?>
  </main>

</body>

</html>