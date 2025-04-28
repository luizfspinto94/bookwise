<?php

require("models/Livro.php");
require("models/Usuario.php");

session_start();
require("functions.php");
$config = require("config.php");
require("Flash.php");
require("Validacao.php");
require("Database.php");
require("routes.php");
