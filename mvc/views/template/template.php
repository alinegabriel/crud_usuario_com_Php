<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.108.0">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

  <title>User Register with PHP</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-static/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/mvc/views/template/styles.php" media="screen">
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="<?php echo APP; ?>">Home</a></li>
        <li><a aria-current="page" href="<?php echo APP . 'user/listar' ?>">Users</a></li>
        <li><a aria-current="page" href="https://www.linkedin.com/in/aline-gabriel-2b0a89203/">Contact me</a></li>
      </ul>
    </nav>
  </header>
  <main class="container">
    <?php
    require_once $arquivo;
    ?>
  </main>

  <footer>
    <p>&copy; 2023 My Awesome Website</p>
  </footer>
</body>

</html>