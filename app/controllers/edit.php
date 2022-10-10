<?php
require_once('../models/jugador.model.php');

echo json_encode(Jugador::getByID($_POST['id']));
