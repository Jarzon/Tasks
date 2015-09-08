<?php
namespace Tasks\Controller;

use Prim\Core\Translate;
use Prim\Core\Controller;

use Tasks\Model\Project;

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $t = new Translate($this->_getTranslation());

        // load views
        $this->design('home/index', $t);
    }
}
