<?php
include "header.php";
?>


    <div class="container">
        <?php
        if ( isset($_POST['login']) ) {

            $login = $_POST['user_name'];
            $password = $_POST['password'];
            if ($login == 'admin' && $password == '123'){
                echo '<span style="color: green; font-weight: bold; margin-bottom: 10px; display: block;">Logged in. Go to list of <a href="../index.php">Tasks</a></span>';
                $_SESSION['login'] = $login;
                echo $_SESSION['login'];
            }
            else {
                echo "Incorrect login or password. Try again";
            }

        }
        ?>
        <form method="POST" action="/views/login.php">

            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="user_name">
                            <input class="form-control" type="text" name="user_name" placeholder="Enter login" required>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="password">
                            <input class="form-control" type="password" name="password" placeholder="Enter password" required>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-auto">
                        <input class="btn btn-primary" type="submit" name="login" value="Вход">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    include "footer.php";
    ?>
