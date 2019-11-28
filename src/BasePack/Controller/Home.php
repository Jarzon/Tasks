<?php
namespace Tasks\BasePack\Controller;

use Prim\Controller;

/**
 * Class Home
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        

        // load views
        $this->design('home/index');
    }
}
