<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сообщение отправлено</title>
</head>
<body>
    <center>
    <nav>
        <a href="index.php">Назад к форме</a>
    </nav>
        <?php
            include 'db_connector.php';

            $conn = openConnDB();

            createTable($conn);

            $user_name = $_REQUEST['user_name'];
            $message = $_REQUEST['user_message'];
            $date = $_REQUEST['date'];

            $sql = "INSERT INTO records (user_name, message, date) VALUES(
                        '$user_name',
                        '$message',
                        '$date')";
            
            if(mysqli_query($conn, $sql)) {
                echo "<h3>Сообщение отправлено на почту </h3>";
                
            } else {
                echo "ERROR: $sql. " 
                    . mysqli_error($conn);
            }

            $query = "SELECT user_name, message, date
                      FROM records
                      ORDER BY date
                    ";
            $result = $conn->query($query);

            echo '<table border="1" cellspacing="3" cellpadding="3"> 
                    <tr> 
                        <td> <b>Дата</font></b> </td> 
                        <td> <b>Имя</b></td> 
                        <td> <b>Сообщение</b> </td> 
                    </tr>';

            if ($result-> num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<tr> 
                            <td>'. $row["date"] .'</td> 
                            <td>'. $row["user_name"] .'</td> 
                            <td>'. $row["message"] .'</td> 
                        </tr>';
                }
              } else {
                echo "<h2>Записей нет</h2>";
              }

            mysqli_close($conn);

            $name = $_POST['user_name'];
            $messageToSend = $_POST['user_message'];

            $email = "shjn02@yandex.ru";

            $letter = "Пользователь: $name отправил сообщение. \n\n $messageToSend";

            $subject='Новое сообщение';
            $emailFrom='Пользователь';
            mail ($email,$subject,$letter,"Content-type:text/plain; charset = utf-8\r\nFrom:$emailFrom");
        ?>
    </center>
    
</body>
</html>