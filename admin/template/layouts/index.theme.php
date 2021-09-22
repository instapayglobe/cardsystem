<?php
include(LAYOUT . DS . 'header.theme.php');
include(LAYOUT . DS . 'aside.theme.php');
include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
include(LAYOUT . DS . 'footer.theme.php');
