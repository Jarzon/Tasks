<?php
namespace Tasks\BasePack\Service;

use Prim\Controller;
use PrimPack\Container\Toolbar;

class Container extends \Prim\Container
{
    use Toolbar;

    /**
     * @return Controller
     */
    public function getController(string $obj) : object
    {
        $this->parameters["$obj.class"] = $obj;

        if($this->options['debug']) {
            $toolbar = $this->getToolbarService();
        } else {
            $toolbar = (object) [];
        }

        return $this->init($obj, $this->getView(), $this, $this->options, $toolbar);
    }
}