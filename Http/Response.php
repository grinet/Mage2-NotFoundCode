<?php
namespace Grinet\NotFoundCode\Http;

use Magento\Framework\HTTP\PhpEnvironment\Response as BaseResponse;
use Grinet\NotFoundCode\Helper\NotFoundCodeConfig;

class Response extends BaseResponse
{
    protected $configHelper;

    public function __construct(NotFoundCodeConfig $configHelper)
    {
        $this->configHelper = $configHelper;
        parent::__construct();
    }

    public function setHttpResponseCode($code)
    {
        if ($code == 404 && $this->configHelper->isActive()) {
            $code = $this->configHelper->getCustom404Code();
        }
        return parent::setHttpResponseCode($code);
    }
}
