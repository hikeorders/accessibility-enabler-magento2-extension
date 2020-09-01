<?php

namespace HikeOrders\A11yenabler\Plugin;

use Magento\Framework\App\RequestInterface;

class ConfigPlugin
{

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var \MageWorx\SearchSuiteAutocomplete\Helper\Data
     */
    protected $helper;

    /**
     * AddPromotionToConfigPlugin constructor.
     *
     * @param RequestInterface $request
     * @param \MageWorx\SearchSuiteAutocomplete\Helper\Data $helper
     */
    public function __construct(
        RequestInterface $request
    ) {
        $this->request = $request;
    }

    /**
     * @param \Magento\Config\Block\System\Config\Edit $subject
     * @param string $result
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function afterToHtml(\Magento\Config\Block\System\Config\Edit $subject, $result)
    {
        if ($this->request->getParam('section')=='org') {
            $renderer_head = $subject
                    ->getLayout()
                    ->createBlock(\Magento\Framework\View\Element\Template::class)
                    ->setTemplate('HikeOrders_A11yenabler::config_head.phtml');

            $renderer_footer = $subject
                    ->getLayout()
                    ->createBlock(\Magento\Framework\View\Element\Template::class)
                    ->setTemplate('HikeOrders_A11yenabler::config_footer.phtml');
            return $renderer_head->toHtml() . $result . $renderer_footer->toHtml();
        }

        return $result;
    }
}
