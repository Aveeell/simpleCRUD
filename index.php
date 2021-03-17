<!DOCTYPE html>
<html>

<head>
  <title>testTask</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <?php require_once 'process.php'; ?>
  <?php 
    $mysqli = new mysqli('localhost', 'root', 'root', 'parking') or die(mysqli_error($mysqli));
    $name = $mysqli->query("SELECT * FROM clients") or die($mysqli->error);
    $car = $mysqli->query("SELECT * FROM cars") or die ($mysqli->error);
  ?>

  <nav class="nav justify-content-center">
    <a class="nav-link" href="index.php">Главная страница</a>
    <a class="nav-link" href="add.php">Добавление клиента</a>
    <a class="nav-link" href="parking.php">Автомобили на парковке</a>
  </nav>

  <div class="container">
    <div class="row">
      <h1>Все клиенты</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ФИО</th>
            <th scope="col">Автомобиль</th>
            <th scope="col">Номер а/м</th>
            <th scope="colspan-2">Действия</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $name->fetch_assoc() and $cell = $car->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['ФИО'] ?></td>
            <td><?php echo $cell['Марка']; echo " "; echo $cell['Модель'] ?></td>
            <td><?php echo $cell['Госномер'] ?></td>
            <td>
            <form action="process.php" method="GET">
                <a href="edit.php?edit=<?php echo $row['id']; ?>"> 
                  <button type="button" class="btn btn-primary">Редактировать</button>
                </a>
                <a href="process.php?delete=<?php echo $row['id'];?>&car=<?php echo $cell['id']; ?>">
                  <button type="button" class="btn btn-danger">Удалить</button>
                </a>
              </form>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
</body>

</html>
