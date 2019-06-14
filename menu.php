<head>
    <link rel="stylesheet" href="style.css">
</head>
<center>
<?php
session_start();
$rs = $pdo->prepare("SELECT * FROM tb_site");
$rs->execute();
$infoSite = $rs->fetchall(PDO::FETCH_OBJ);
foreach ($infoSite as $l):
    ?>
    <table style="" align="center">
        <tr>
            <td><a href="index.php"><img src="<?php echo $l->logo; ?>" width="125" height="100"></a></td>
            <td><a href="index.php"><h1><?php echo $l->nome; ?></h1></a></td>

        </tr>
        <tr>
            <th><?php echo $l->telefone; ?></th>
            <th><?php echo $l->email; ?></th> 
        </tr>
    </table>
    <?php
endforeach;

if (isset($_SESSION['nivel'])) {
    ?>
<button class="btn btn-secondary"><a href="logoff.php">Sair</a></button>

<?php } else { ?>
    
<button class="btn btn-secondary"><a href="login.php">Logar</a></button>
<?php } ?>

</center>