<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>форма</title>
</head>
<body>
    <center>
        <h1>Отправить сообщение</h1>

        <form action="insert.php" method="POST">
            <p>
                <label for="name">Имя</label>
                <input type="text" name="user_name" id="name">
            </p>
            <p>
                <textarea name="user_message" id="message" cols="40" rows="8" placeholder="Введите сообщение"></textarea>
            </p>
            <p>
                <label for="Date">Дата</label>
                <input type="date" name="date" id="Date">
            </p>

            <input type="submit" value="Submit">
        </form>
        </center>
    
</body>
</html>