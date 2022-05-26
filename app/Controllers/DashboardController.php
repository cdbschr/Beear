<?php

namespace Beear\Controllers;

class DashboardController extends Controller {
  function admin(): void {
    include $this->viewAdmin('admin');
  }

  function managebeers(): void {
    include $this->viewAdmin('manage-beers');
  }

  function manageusers(): void {
    include $this->viewAdmin('manage-users');
  }
}