<!DOCTYPE html>
<html>

<head>
    <title>testTask</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <style>
        .form-control {
            width: 300px;
        }
    </style>

    <?php require_once 'process.php'; ?>

    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-info" role="alert">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <nav class="nav justify-content-center">
        <a class="nav-link" href="index.php">Главная страница</a>
        <a class="nav-link" href="add.php">Добавление клиента</a>
        <a class="nav-link" href="parking.php">Автомобили на парковке</a>
    </nav>

    <div class="container">
        <div class="row">
            <div class="input-group justify-content-center">
                <form action="process.php" method="POST">
                    <input type="hidden" name="clientId" value="<?php echo $id; ?>">
                    <input type="hidden" name="carId" value="<?php echo $carId; ?>">
                    <div>
                    <label for="FIO">ФИО</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"
                            placeholder="Иванов Иван Иванович" minlength=3>
                    </div>
                    <div>
                        <label for="sex">Пол</label>
                        <input class="form-check-input" type="radio" value="М" name="sex" checked> Мужской
                        <input class="form-check-input" type="radio" value="Ж" name="sex"> Женский
                    </div>
                    <div>
                        <label for="phone">Номер телефона</label>
                        <input type="phone" class="form-control" name="phone" value="<?php echo $phone; ?>"
                            placeholder="88005553535" required>
                    </div>
                    <div>
                        <label for="address">Адрес</label>
                        <input type="address" class="form-control" name="address" value="<?php echo $address; ?>"
                            placeholder="Суздальского, 54">
                    </div>
                    <div>
                        <label for="mark">Марка</label>
                        <input type="text" class="form-control" name="mark" value="<?php echo $mark; ?>"
                            placeholder="Honda" required>
                    </div>
                    <div>
                        <label for="model">Модель</label>
                        <input class="form-control" type="text" name="model" value="<?php echo $model; ?>"
                            placeholder="Pilot" required>
                    </div>
                    <div>
                        <label for="color">Цвет</label>
                        <input type="phone" class="form-control" name="color" value="<?php echo $color; ?>"
                            placeholder="Белый"required>
                    </div>
                    <div>
                        <label for="number">Госномер</label>
                        <input type="address" class="form-control" name="number" value="<?php echo $number; ?>"
                            placeholder="а001мр" required>
                    </div>
                    <div>
                        <label for="status">Статус</label>
                        <input class="form-check-input" type="radio" value="1" name="status" <?php echo $statusFirstButton ?> > На парковке
                        <input class="form-check-input" type="radio" value="0" name="status" <?php echo $statusSecondButton ?> > Не на парковке
                    </div>
                    <div>
                        <br>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
