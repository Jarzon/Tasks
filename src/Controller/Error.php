<?php
namespace Tasks\Controller;

use Prim\Controller;

/**
 * Class Error
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Error extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function page404($t)
    {
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');

        // load views
        $this->design('error/404', $t);
    }
}