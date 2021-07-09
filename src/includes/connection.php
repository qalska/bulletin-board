<?php 

$connection = mysqli_connect('localhost', 'root', '', 'bulletin_board');

if ($connection == false) {
    echo 'Не удалось подключиться к базе данных!';
    echo mysqli_connet_error();
    exit();
}