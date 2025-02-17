<?php
namespace Grinet\NotFoundCode\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class NotFoundCodeConfig extends AbstractHelper
{
    const XML_PATH_ACTIVE = 'grinet_not_found_code/general/is_active';
    const XML_PATH_CUSTOM_CODE = 'grinet_not_found_code/general/custom_404_code';

    public function isActive()
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ACTIVE, ScopeInterface::SCOPE_STORE);
    }

    public function getCustom404Code()
    {
        return (int)$this->scopeConfig->getValue(self::XML_PATH_CUSTOM_CODE, ScopeInterface::SCOPE_STORE) ?: 404;
    }
}
