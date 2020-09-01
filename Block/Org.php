<?php

namespace HikeOrders\A11yenabler\Block;

use Magento\Store\Model\ScopeInterface;

class Org extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context);
    }
    public function getOrgUrl()
    {
        $url = 'https://jsappcdn.hikeorders.com/main/assets/js/hko-accessibility.min.js';
        $id = $this->_scopeConfig->getValue('org/config/id', ScopeInterface::SCOPE_STORE);
        if ($id != '') {
            $url = $url . "?orgId=" . $id;
            return $url;
        }
        return;
    }
}
