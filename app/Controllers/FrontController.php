<?php

namespace Project\Controllers;

class FrontController {
  function home() {
    require 'app/Views/frontend/home.php';
  }
}