<?php

namespace Ghratzoo\ProductsListConfiguration\Plugin;

use Ghratzoo\ProductsListConfiguration\Helper\ConfigHelper;
use Magento\Framework\App\Response\Http;
use Magento\Framework\UrlInterface;

/**
 * Class PluginProductsListConfiguration
 * @package Ghratzoo\ProductsListConfiguration\Plugin
 */
class PluginProductsListConfiguration
{

    /**
     * @var ConfigHelper
     */
    private ConfigHelper $configHelper;

    /**
     * @var Http
     */
    private Http $redirect;

    /**
     * @var UrlInterface
     */
    private UrlInterface $url;

    /**
     * PluginProductsListConfiguration constructor.
     * @param ConfigHelper $configHelper
     * @param Http $redirect
     * @param UrlInterface $url
     */
    public function __construct(
        ConfigHelper $configHelper,
        Http $redirect,
        UrlInterface $url
    ) {
        $this->configHelper = $configHelper;
        $this->redirect = $redirect;
        $this->url = $url;
    }

    /**
     * @return Http|\Magento\Framework\App\Response\HttpInterface
     */
    public function beforeExecute()
    {
        if (!$this->configHelper->getVisibleProductList()) {
            return $this->redirect->setRedirect($this->url->getBaseUrl());
        }
    }
}
