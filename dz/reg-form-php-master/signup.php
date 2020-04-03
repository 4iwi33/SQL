<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .errors {
            color: red;
        }

        .reg {
            color: green;
        }

        a, .reg {
            font-size: 2rem;
        }
    </style>
</head>
<body>

    <?php
        include("db.php");
        
        $data=$_POST;


        if (isset($data['do-singup'])) // проверяем, нажата ли кнопка регистрации
        {
            $errors = array(); //создаем массив для ошибок  
            
            if ( trim($data['login']) == '') { //чистим логин от пробелов и спрашиваем, пустой ли он
                $errors[] = "Вы не ввели логин";
            }

            if ( $data['password'] == '') { //спрашиваем, пустой ли пароль (его не чистим!)
                $errors[] = "Вы не ввели пароль";
            }

            if ( $data['password2'] != $data['password']) { // проверяем совпадения паролей
                $errors[] = "пароли не совпадают";
            }

            $result = mysqli_query($link, "SELECT `login` FROM `users`"); // проверям, зарегин ли уже такой пользователь

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['login'] == $data['login']) {
                    $errors[] = "Такой пользователь уже существует";
                }
            } 

            mysqli_free_result($result);

            if (!empty($errors)) { // проверяем пустой ли массив с ошибками, если нет ошибок, то снизу регистрируем
                
                echo "<div class='errors'>" . array_shift($errors) . "</div>"; //если есть ошибки выводи первый э-т массива errors

            }

            else {
                $result = mysqli_query($link, "INSERT INTO users VALUES (NULL, '$data[login]' , '$data[password]')"); //добавляем логин и пароль в таблицу users в БД
                echo "<div class='reg'>Вы успешно зарегистрировались!</div>";
                echo "<a href='hello.php'>Продолжить</a>";
            }
        }

    ?>


    <form action="?" method="POST">
        <p>Введите ваш логин</p>
         <input type="text" name="login" placeholder="ваш логин" value="<?php echo @$data['login'] ?>"><br> <!--в атрибут value вписал код, который сохраняет введенное значение в поле логин // @ - убирает все сообщения об ошибках -->
        <p>Введите ваш пароль</p>
        <input type="password" name="password" placeholder="ваш пароль"><br>
        
        <p>Подтвердите ваш пароль</p>
        <input type="password" name="password2" placeholder="подтвердите пароль"><br>
        <br>

        <button type="submit" name="do-singup">зарегистрироваться</button>


    </form>


</body>
</html>