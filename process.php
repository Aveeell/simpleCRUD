<?php 

$mysqli = new mysqli('localhost', 'root', 'root', 'parking') or die(mysqli_error($mysqli));

$name = '';
$sex = '';
$phone ='';
$address ='';
$carId ='';
$mark ='';
$model ='';
$color ='';
$number ='';
$status ='0';

if (isset($_POST['add'])){
    $name = $_POST['name'];
    if(isset($_POST['sex'])){
        switch($_POST['sex'])
        {
            case 'М':
                $sex = 'М';
                break;
            case 'Ж':
                $sex = 'Ж';
                break;
        }
    }
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $mark = $_POST['mark'];
    $model= $_POST['model'];
    $color = $_POST['color'];
    $number = $_POST['number'];
    // $status = $_POST['status'];
    if(isset($_POST['status'])){
        switch($_POST['status'])
        {
            case 1:
                $status = 1;
                break;
            case 0:
                $status = 0;
                break;
        }
    }

    $mysqli->query("INSERT INTO cars (Марка, Модель, Цвет, Госномер, Статус) VALUES ('$mark', '$model', '$color', '$number', '$status')")
    or die($mysqli->error);
    $carArray = $mysqli->query("SELECT * FROM cars WHERE Госномер='$number'") or die($mysqli->error);
    $car = $carArray->fetch_assoc();
    $carId = $car['id'];
    $mysqli->query("INSERT INTO clients (ФИО, Пол, Телефон, Адрес, Автомобиль) VALUES ('$name', '$sex', '$phone', '$address', '$carId')")
    or die($mysqli->error);

    $_SESSION['message'] = 'Запись была добавлена';
    $_SESSION['msgType'] = 'success';

    header('location: add.php');
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $client = $mysqli->query("SELECT * FROM clients WHERE id=$id") or die($mysqli->error);
    if ($client!=NULL){
        $row = $client->fetch_array();
        $name = $row['ФИО'];
        $sex = $row['Пол'];
        if (isset($sex)){
            switch($sex){
                case 'М':
                    $sexFirstButton = 'checked';
                    $sexSecondButton = '';
                    break;
                case 'Ж':
                    $sexFirstButton = '';
                    $sexSecondButton = 'checked';
                    break;
            }
        }
        
        $phone = $row['Телефон'];
        $address = $row['Адрес'];
        $carId = $row['Автомобиль'];

        $carArray = $mysqli->query("SELECT * FROM cars WHERE id=$carId") or die($mysqli->error);

        $car = $carArray->fetch_array();
        $mark = $car['Марка'];
        $model= $car['Модель'];
        $color = $car['Цвет'];
        $number = $car['Госномер'];
        $status = $car['Статус'];
        if (isset($status)){
            switch($status){
                case 0:
                    $statusFirstButton = '';
                    $statusSecondButton = 'checked';
                    break;
                case 1:
                    $statusFirstButton = 'checked';
                    $statusSecondButton = '';
                    break;
            }
        }
    }
}

if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    $carId = $_GET['car'];
    $mysqli->query("DELETE FROM clients WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = 'Запись была удалена';
    $_SESSION['msgType'] = 'danger';
    
    header('location: index.php');
}

if (isset($_POST['update'])){
    $id = $_POST['clientId'];
    $name = $_POST['name'];
    if(isset($_POST['sex'])){
        switch($_POST['sex'])
        {
            case 'М':
                $sex = 'М';
                break;
            case 'Ж':
                $sex = 'Ж';
                break;
        }
    }    
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $carId = $_POST['carId'];
    $mark = $_POST['mark'];
    $model= $_POST['model'];
    $color = $_POST['color'];
    $number = $_POST['number'];
    $status = $_POST['status'];

    $mysqli->query("UPDATE clients SET ФИО='$name', Пол='$sex', Телефон='$phone', Адрес='$address' WHERE id=$id")
    or die($mysqli->error);
    $mysqli->query("UPDATE cars SET Марка='$mark', Модель='$model', Цвет='$color', Госномер='$number', Статус='$status' WHERE id=$carId")
    or die($mysqli->error);

    $_SESSION['message'] = 'Запись была обновлена';
    $_SESSION['msgType'] = 'info';

    header('location: edit.php');
}

