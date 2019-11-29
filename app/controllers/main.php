<?php

class Main extends Controller {

    /*
     * http://localhost/
     */
    function Index () {

        header('Location: /dashboard');

    }

    /*
     * http://localhost/anothermainpage
     */
    function test () {
        echo 'HelloWorld!';
    }

}

?>
