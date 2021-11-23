<?php
include('assets/header.php');

/**
 * @var \Classes\User\User $user
 */
?>



<?php if(\Classes\User\Helper::isLogged()): ?>
    <div class="container text-center">
        <h3>Witaj!</h3>
        <h4><?= $user->getFirstname() ?> <?= $user->getSecondname() ?></h4>
        <h4><?= $user->getSexName() ?></h4>
    </div>
<?php endif; ?>



<?php include('assets/footer.php'); ?>
