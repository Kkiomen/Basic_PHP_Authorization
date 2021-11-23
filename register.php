<?php
include('assets/header.php');
/**
 * @var \Classes\Database\Database $db
 */


if(isset($_POST['register_input_submit'])){
    $register = new \Classes\User\Register($_POST, $db);
    $register->handle();
}
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">Rejestracja</div>
        <div class="card-body">
            <form method="post" action="#">
                <div class="form-group">
                    <label>Login</label>
                    <input type="text" class="form-control" name="login" minlength="<?= Config::loginMinLength ?>" required/>
                </div>
                <div class="form-group">
                    <label>Imię</label>
                    <input type="text" class="form-control" name="firstname" required/>
                </div>
                <div class="form-group">
                    <label>Nazwisko</label>
                    <input type="text" class="form-control" name="secondname" required/>
                </div>
                <div class="form-group">
                    <label>Płeć</label>
                    <select class="form-select" name="sex" required>
                        <option value="1">Mężczyzna</option>
                        <option value="0">Kobieta</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hasło</label>
                    <input type="password" class="form-control" name="password" minlength="<?= Config::passwordMinLength ?>" required/>
                </div>
                <div class="form-group">
                    <label>Powtórz hasło</label>
                    <input type="password" class="form-control" name="confirm_password" minlength="<?= Config::passwordMinLength ?>" required/>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" name="register_input_submit" class="btn col-12 btn-info" value="Zarejestruj się">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('assets/footer.php'); ?>
