<?php

require 'assets/init.php';
$is_admin = Wo_IsAdmin();
$is_moderoter = Wo_IsModerator();
// Get header
include('components/admincp/admincp_header.php');
// Get request
include('components/admincp/admincp_request.php');

$wo['script_root'] = dirname(__FILE__);
// autoload admin panel files
require 'admin-panel/autoload.php';