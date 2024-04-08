<?php
session_start();


$host = 'https://serwer2325179.home.pl/sql'; 
$username = '37526988_test';
$password = '123qwe!!!';
$database = '37526988_test';


$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $number = mysqli_real_escape_string($conn, $_POST['number']);

    $query = "SELECT * FROM users WHERE number = '$number'";
    $result = mysqli_query($conn, $query);

    

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['name'] = $row['name'];
        $_SESSION['surname'] = $row['surname'];


        header("Location: index.php");
        exit();
    } else {

        $error = "Niepoprawny numer użytkownika.";
    }
}

?>