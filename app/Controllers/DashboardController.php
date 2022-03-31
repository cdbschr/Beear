<?php

namespace Project\Controllers;

class DashboardController {
  function admin(): void {
    require 'app/Views/admin/admin.php';
  }
}