<?php

require_once 'BearsAdd.php';
require_once 'Blonde.php';
require_once 'Brune.php';
require_once 'Blanche.php';

$beears = new Beears;

$beears->addBeear(new Blonde);
$beears->addBeear(new Brune);
$beears->addBeear(new Blanche);