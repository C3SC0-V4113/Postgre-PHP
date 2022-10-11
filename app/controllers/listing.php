<?php
//require_once(realpath(dirname(__FILE__) . '/..') . '/models/jugador.model.php');
require_once('../models/alumno.model.php');
echo json_encode(Alumno::getData());
