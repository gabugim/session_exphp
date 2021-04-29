<?php

if (isset($_POST['logout'])) {
    //session_destroy();
    // header('Location: index');
    unset($_SESSION['loginname']);
}

// if (isset($_SESSION['loginname'])) {
//     $_SESSION['article_id'];
//     array_push($_GET['add_to_cart']);
// }
// var_dump($_SESSION['article_id']);
if (isset($_SESSION['loginname'])) {


    if (!isset($_SESSION['cart'])) {

        $_SESSION['cart'] = [];
    } else {
        //if (!isset($_GET['add_to_cart'])) {
        if (isset($_GET['add_to_cart'])) {

            $getCart = $_GET['add_to_cart'];
            if (!isset($_SESSION['cart'][$_GET['add_to_cart']])) {
                // $getCart = $_GET['add_to_cart'];
                // $_SESSION['cart'][$getCart] = [];
                $_SESSION['cart'][$getCart]["quantity"] = 1;
            } else {
                //$getCart = $_GET['add_to_cart'];
                $_SESSION['cart'][$getCart]['quantity']++;
            }
        }
    }
    var_dump($_SESSION['cart']);
}



//     if (!isset($_SESSION['cart'])) {
//         $_SESSION['cart'] = [];
//     }
//     if (!isset($_SESSION['cart'][$item['id']])) {
//         $_SESSION['cart'][$item['id']] = [
//             "id" => $item['id'],
//             "name" => $item['name'],
//             "quantity" => 1
//         ];
//     } else {
//         $_SESSION['cart'][$item['id']]['quantity'] ++;
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Cookie Factory</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/styles.css" />
</head>

<body>
    <header>

        <!-- MENU ENTETE -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img class="pull-left" src="assets/img/cookie_funny_clipart.png" alt="The Cookies Factory logo">
                        <h1>The Cookies Factory</h1>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Chocolates chips</a></li>
                        <li><a href="#">Nuts</a></li>
                        <li><a href="#">Gluten full</a></li>
                        <li>
                            <a href="/cart.php" class="btn btn-warning navbar-btn">
                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                Cart
                            </a>
                        </li>
                        <li> <a></br></a></li>
                        <?php if (!isset($_SESSION['loginname'])) : ?>
                            <li>
                                <a href="/login.php" class="btn btn-warning navbar-btn">
                                    <span class="bi bi-person-fill" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg></span>
                                    Login
                                </a>
                            </li>

                        <?php elseif (isset($_SESSION['loginname'])) : ?>
                            <li>

                                <form method="POST">
                                    <input class="btn btn-warning navbar-btn" aria-hidden="true" type="submit" name="logout" value="logout">

                                </form>
                            <?php endif; ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid text-right">
            <strong>Hello
                <?= isset($_SESSION['loginname']) ? $_SESSION['loginname'] : "wilder" ?> !
            </strong>
        </div>
    </header>