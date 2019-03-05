<?php
/**
 * Created by Keyrvin Yongque
 */

namespace CodingChallenge\DisablePrices\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Framework\App\Helper\Context;
use \Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    const DISABLE_PRICES_CATALOG_DISABLE_ATTRIBUTE_SETS = "catalog/disable_price/attribute_sets";

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Get the list of attribute sets in the disable price configuration
     *
     * @return array
     */
    public function getAttributeSets()
    {
        return $this->scopeConfig->getValue(
            self::DISABLE_PRICES_CATALOG_DISABLE_ATTRIBUTE_SETS,
            ScopeInterface::SCOPE_STORE
        );
    }
}