<?php

// Encerrando sessão

session_start();
session_unset();
session_destroy();

header('location: paginainicial.html');

?>