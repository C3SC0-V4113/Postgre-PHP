<?php
require_once('../models/jugador.model.php');
echo json_encode(Jugador::deleteData($_POST['id']));
