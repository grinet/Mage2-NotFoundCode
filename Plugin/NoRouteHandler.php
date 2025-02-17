<?php
namespace Grinet\NotFoundCode\Plugin;

use Magento\Framework\App\ResponseInterface;
use Magento\Cms\Controller\Noroute\Index as NoRouteController;
use Grinet\NotFoundCode\Helper\NotFoundCodeConfig;

class NoRouteHandler
{
    protected $configHelper;

    public function __construct(NotFoundCodeConfig $configHelper)
    {
        $this->configHelper = $configHelper;
    }

    public function beforeExecute(NoRouteController $subject)
    {
        if ($this->configHelper->isActive()) {
            $subject->getResponse()->setHttpResponseCode($this->configHelper->getCustom404Code());
        }
    }
}
