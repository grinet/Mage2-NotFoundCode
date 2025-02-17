<?php
namespace Grinet\NotFoundCode\Plugin;

use Magento\Framework\HTTP\PhpEnvironment\Response;
use Grinet\NotFoundCode\Helper\NotFoundCodeConfig;

class ResponsePlugin
{
    protected $configHelper;

    public function __construct(NotFoundCodeConfig $configHelper)
    {
        $this->configHelper = $configHelper;
    }

    public function beforeSetHttpResponseCode(Response $subject, $code)
    {
        if ($code == 404 && $this->configHelper->isActive()) {
            $code = $this->configHelper->getCustom404Code();
        }
        return [$code];
    }
}
