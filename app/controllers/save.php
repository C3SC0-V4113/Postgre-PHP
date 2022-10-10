<?php
require_once('../models/jugador.model.php');
$arrayPost = array('nombre' => $_POST['nombre'], 'posicion' => $_POST['posicion'], 'camiseta' => $_POST['camiseta']);
echo json_encode(Jugador::postData($arrayPost));
