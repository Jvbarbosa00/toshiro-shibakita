<?php
ob_start();
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');

$servername = "db";
$username = "root";
$password = "senha_poderosa";
$database = "meubanco";

$link = new mysqli($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();

$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host)
          VALUES ('$valor_rand1', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$host_name')";

$status_message = "";
if ($link->query($query) === TRUE) {
    $status_message = "New record created successfully";
} else {
    $status_message = "Error: " . $link->error;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exemplo PHP - Desafio Docker</title>
</head>
<body>
    <h3>Versao Atual do PHP: <?php echo phpversion(); ?></h3>
    <p><strong>Status:</strong> <?php echo $status_message; ?></p>
    <p><strong>Host do Container:</strong> <?php echo $host_name; ?></p>
</body>
</html>