<?php
//require_once(realpath(dirname(__FILE__) . '/..') . '/models/jugador.model.php');
require_once('../models/jugador.model.php');
echo json_encode(Jugador::getData());
