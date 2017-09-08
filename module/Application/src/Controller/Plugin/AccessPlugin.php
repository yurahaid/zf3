<?php


namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class AccessPlugin extends AbstractPlugin
{
    public function checkAccess($params)
    {
        return $params;
    }
}