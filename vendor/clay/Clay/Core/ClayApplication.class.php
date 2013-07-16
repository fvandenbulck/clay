<?php
/**
 * @author Fabien Vanden Bulck <fabien@elhena.com>
 */

namespace Clay\Core;

use Clay\Http\Exception\PageNotFoundException;

class ClayApplication extends Application {
    
    // Constructor
    public function __construct($name) {
        parent::__construct($name);
    }

    // Method : Run
    public function run() {
        $kernel = new Kernel($this);

        try {
            $kernel->execute();
            $this->getResponse()->send();
        } catch(PageNotFoundException $e) {
            $this->error404();
        }
    }
}
?>