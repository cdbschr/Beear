<?php

namespace Project\Controllers;

class DashboardController extends Controller {
  function admin(): void {
    include $this->viewAdmin('dashboard');
  }
}