<?php
include('assets/header.php');
/**
 * @var \Classes\Database\Database $db
 */

$error = null;

if(isset($_POST['login_input_submit'])){
    $login = new \Classes\User\Login($_POST, $db);
    $login->handle();
}

if(isset($_GET['logout'])){
    \Classes\User\Login::logout();
}


?>




<div class="container mt-3">
    <div class="card">
        <div class="card-header">Logowanie</div>
        <div class="card-body">
            <form method="post" action="#">
                <div class="form-group">
                    <label>Login</label>
                    <input type="text" class="form-control" name="login" minlength="<?= Config::loginMinLength ?>" required/>
                </div>
                <div class="form-group">
                    <label>Hasło</label>
                    <input type="password" class="form-control" name="password" minlength="<?= Config::passwordMinLength ?>" required/>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" class="btn col-12 btn-info" name="login_input_submit" value="Zaloguj się">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('assets/footer.php'); ?>
