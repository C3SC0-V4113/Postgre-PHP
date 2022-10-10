<?php
require_once('../models/jugador.model.php');
$arrayPost = array('nombre' => $_POST['nombre'], 'posicion' => $_POST['posicion'], 'camiseta' => $_POST['camiseta'], 'id' => $_POST['id'],);
echo json_encode(Jugador::setData($arrayPost));
