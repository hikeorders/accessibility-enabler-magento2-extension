<?php

namespace HikeOrders\A11yenabler\Block;

use Magento\Store\Model\ScopeInterface;

class Org extends \Magento\Framework\View\Element\Template
{
    /**
     * Construct the Org block.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * Returns the URL for the Org JavaScript file.
     * If the Org ID is present in the configuration, it adds it as a query string parameter.
     * @return string The URL of the Org JavaScript file, or null if the Org ID is not present.
     */
    public function getOrgUrl()
    {
        $url = 'https://jsappcdn.hikeorders.com/main/assets/js/hko-accessibility.min.js';
        $id = $this->_scopeConfig->getValue('org/config/id', ScopeInterface::SCOPE_STORE);
        if ($id != '') {
            $url = $url . "?orgId=" . $id;
            return $url;
        }
        return "";
    }
}
