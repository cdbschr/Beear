<?php

namespace Project\Controllers;

class FrontController {
  function home() {
    require 'app/Views/frontend/home.php';
  }
  
  function valeursPage() {
    require 'app/Views/frontend/valeurs.php';
  }

  function actualitespage() {
    require 'app/Views/frontend/actualites.php';
  }
  
  function contactPage() {
    require 'app/Views/frontend/contact.php';
  }
}