<?php
namespace Tasks\Controller;

use Prim\Controller;

/**
 * Class Error
 *
 */
class Error extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function handleError($e, $allowedMethods = '')
    {
        if($e == 404) {
            header(URL_PROTOCOL.' 404 Not Found');
        } else if ($e == 405) {
            header(URL_PROTOCOL.' 405 Method Not Allowed');
            header($allowedMethods);
        }

        // load views
        $this->design('error/404');
    }
}