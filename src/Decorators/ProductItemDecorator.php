<?php


namespace App\Decorators;


use App\Structures\ProductItem;

class ProductItemDecorator
{
    /** @var ProductItem $productItem */
    private $productItem;

    /**
     * ProductItemDecorator constructor.
     * @param ProductItem $productItem
     */
    public function __construct(ProductItem $productItem)
    {
        $this->productItem = $productItem;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'variant_id' => $this->productItem->getVariantId(),
            'external_variant_id' => $this->productItem->getExternalVariantId(),
            'warehouse_product_variant_id' => $this->productItem->getWarehouseProductVariantId(),
            'quantity' => $this->productItem->getQuantity(),
            'value' => $this->productItem->getValue()
        ];
    }

}
