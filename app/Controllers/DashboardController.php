<?php

namespace Beear\Controllers;

class DashboardController extends Controller {
  function admin(): void {
    include $this->viewAdmin('admin');
  }
}