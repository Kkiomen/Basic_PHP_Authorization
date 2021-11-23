<?php
session_start();
foreach (glob("config/*.php") as $filename)
{
    include $filename;
}
foreach (glob("Interface/*.php") as $filename)
{
    include $filename;
}
foreach (glob("Classes/*.php") as $filename)
{
    include $filename;
}
\Classes\Error\Alert::init();
$db = new \Classes\Database\Database();
$db->connect();


if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
    $user = new \Classes\User\User($_SESSION['login'],$db);
    $user->init();
}


?>

<html>
<head>
    <title>Test egzaminacyjny</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>


<?php require_once('navbar.php') ?>

<?php if(count(\Classes\Error\Alert::get()) > 0): ?>
    <div class="container">
        <?= \Classes\Error\Alert::getListAlertHtml() ?>
    </div>
<?php endif; ?>
<?php \Classes\Error\Alert::clear(); ?>
