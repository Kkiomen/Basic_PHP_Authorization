<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

            <ul class="navbar-nav mr-auto">

                <?php if(!\Classes\User\Helper::isLogged()): ?>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Logowanie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Rejestracja</a>
                </li>
                <?php endif; ?>

                <?php if(\Classes\User\Helper::isLogged()): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php?logout=true">Wyloguj się</a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>