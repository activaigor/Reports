<?php

require_once('config.php');
require('Smarty-3.1.12/libs/Smarty.class.php');

#comment

class Smarty_reports extends Smarty {
    function Smarty_reports() {
        parent::__construct();

        $this->template_dir = TEMPLATES_DIR;
        $this->config_dir = CONFIG_DIR;
        $this->compile_dir = COMPILE_DIR;
        $this->cache_dir = CACHE_DIR;

    }
}

?>
