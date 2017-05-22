<?php

define('BASE_URL', 'http://192.168.1.42/tungalahari/');
define('PUBLIC_URL', BASE_URL . 'public/');
define('XML_SRC_URL', BASE_URL . 'md-src/xml/');
define('PHOTO_URL', PUBLIC_URL . 'Awardees/');
define('DOWNLOAD_URL', PUBLIC_URL . 'Downloads/');
define('PROFILE_IMAGE_URL', PUBLIC_URL . 'images/Profile_Photo/');
define('AVATAR_IMAGE_URL', PUBLIC_URL . 'images/Avatar/');
define('STOCK_IMAGE_URL', PUBLIC_URL . 'images/stock/');
define('RESOURCES_URL', PUBLIC_URL . 'Photos/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/iitm-da/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_XML_SRC_URL', PHY_BASE_URL . 'md-src/xml/');
define('PHY_PHOTO_URL', PHY_PUBLIC_URL . 'Awardees/');
define('PHY_TXT_URL', PHY_PUBLIC_URL . 'Text/');
define('PHY_DOWNLOAD_URL', PHY_PUBLIC_URL . 'Downloads/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');
define('PHY_FLAT_IMAGE_URL', PHY_PUBLIC_URL . 'images/stock/');
define('PHY_STOCK_IMAGE_URL', PHY_PUBLIC_URL . 'images/stock/');
define('PHY_RESOURCES_URL', PHY_PUBLIC_URL . 'Photos/');

define('DB_PREFIX', 'iitm');
define('DB_HOST', 'localhost');

// photo will become iitmPHOTO inside
define('DB_NAME', 'Awardees');

define('Awardees_USER', 'root');
define('Awardees_PASSWORD', 'mysql');

?>
