<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head> 
<center>
<?php
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
            <th> Telefone: <?php echo $l->telefone; ?></th>
            <th> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp E-mail: <?php echo $l->email; ?></th> 
        </tr>
    </table>
    <?php
endforeach;

if (isset($_SESSION['nivel'])) {
    ?>
<button class="btn btn-danger"><a href="logoff.php"><font color="white">Sair</font></a></button>

<?php } else { ?>
    
<button class="btn btn-outline-success"><a href="login.php">Logar</a></button>
<?php } ?>

</center>