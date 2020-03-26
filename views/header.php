<?php
    session_start();
    $login = $_SESSION['login'];
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Приложение-задачник</title>
    </head>
    <body>
        <header>
            <div class="container bg-dark mb-5">
                <div class="row">
                    <div class="col-10">
                        <h1 class="text-info">Приложение-задачник</h1>
                    </div>
                    <div class="col-2 my-auto">
                        <?php
                        if ($login == 'admin'){
                            echo '<a type="button" class="btn btn-primary" href="http://beejee/views/logout.php">Выход</a>';
                        }
                        else {
                            echo '<a type="button" class="btn btn-primary" href="http://beejee/views/login.php">Администратор</a>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </header>
    </body>
</html>