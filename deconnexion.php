<?php

      // Page de deconnexion sessions php et redirection vers page accueil
      session_start();
      session_unset();
      session_destroy();
      header("Location: index.php");
      exit();
?>