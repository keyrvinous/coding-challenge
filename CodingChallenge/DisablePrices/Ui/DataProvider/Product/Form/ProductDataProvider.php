<?php
/**
 * Created by Keyrvin Yongque
 */
namespace CodingChallenge\DisablePrices\Ui\DataProvider\Product\Form;

use Magento\Catalog\Ui\DataProvider\Product\Form\ProductDataProvider as PluginProductDataProvider;
use CodingChallenge\DisablePrices\Helper\Data;
use Magento\Catalog\Model\Locator\LocatorInterface;

class ProductDataProvider
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * @var LocatorInterface
     */
    protected $locator;


    /**
     * ProductDataProvider constructor.
     *
     * @param Data $helper
     * @param LocatorInterface $locator
     */
    public function __construct(Data $helper, LocatorInterface $locator)
    {
        $this->helper = $helper;
        $this->locator = $locator;
    }

    /**
     * Plugin After getMeta from ProductDataProvider
     *
     * @param PluginProductDataProvider $subject
     * @param $result
     * @return array
     */
    public function afterGetMeta(PluginProductDataProvider $subject, $result)
    {

        $prodDetails = 'product-details';
        $advancePricing = 'advanced-pricing';
        $contTCID = 'container_tax_class_id';
        $chldrn = 'children';
        $TCID = 'tax_class_id';

        $productAttributeSet = $this->locator->getProduct()->getAttributeSetId();

        $helperAttrSets = $this->helper->getAttributeSets();

        $boolVal = 0;

        if (empty($helperAttrSets) || !in_array($productAttributeSet, explode(',', $helperAttrSets))) {
            $boolVal = 1;
        }

        $result[$prodDetails][$chldrn]['container_price']['arguments']['data']['config']['visible'] = $boolVal;
        $result[$prodDetails][$chldrn][$contTCID][$chldrn][$TCID]['arguments']['data']['config']['visible'] = $boolVal;
        $result[$advancePricing]['arguments']['data']['config']['visible'] = $boolVal;

        return $result;
    }
}
