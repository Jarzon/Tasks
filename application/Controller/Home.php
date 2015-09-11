<?php
namespace Tasks\Controller;

use Prim\Core\Translate;
use Prim\Core\Controller;

use Tasks\Model\Project;

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
        $t = new Translate($this->_getTranslation());

        // load views
        $this->design('home/index', $t);
    }
}
