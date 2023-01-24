<?php

use Illuminate\Support\Facades\Auth;
Auth::routes();
require_once __DIR__ . '/web.admin.php';
require_once __DIR__ . '/web.front.php';


