<?php

namespace Ghratzoo\ProductsListConfiguration\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class ConfigHelper extends AbstractHelper
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * ConfigHelper constructor.
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(Context $context, ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     *  Get config data about visible products list
     *  @return bool
     */
    public function getVisibleProductList(): bool
    {
        if ($this->scopeConfig->getValue('ProductsListSection/ProductsListGroup/ShowList')) {
            return false;
        }

        return true;
    }
}
