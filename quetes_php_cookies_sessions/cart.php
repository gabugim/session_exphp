<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['loginname'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: login.php');
    exit();
}

?>
<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <table class="table table-hover">

            <thead>
                <th>Nom</th>
                <th>description</th>
                <th>Quantité</th>
                <th></th>
            </thead>
            <tbody>
                <?php if (!isset($_SESSION['cart'])) {
                    echo "empty";
                } else { ?>

                    <?php foreach ($_SESSION['cart'] as $key => $value) { ?>

                        <tr>
                            <td>
                                <p><?= $catalog[$key]['name']; ?></p>
                            </td>
                            <td>
                                <p><?= $catalog[$key]['description']; ?></p>
                            </td>
                            <td>
                                <p> Seulement <?php echo $_SESSION['cart'][$key]['quantity']; ?> dans le panier, êtes vous sur de vous?</p>
                            </td>
                            <td class=" text-end">
                                <a href="" class="btn btn-danger">Retirer</a>
                            </td>
                        </tr>

                <?php  }
                } ?>
            </tbody>
        </table>
    </div>
</section>
<?php require 'inc/foot.php'; ?>