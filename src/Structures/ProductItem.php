<?php

namespace App\Structures;

/**
 * Class ProductItem
 * @package App\Structures
 */
class ProductItem
{
    private $variant_id;
    private $external_variant_id;
    private $warehouse_product_variant_id;
    private $quantity;
    private $value;

    /**
     * @return mixed
     */
    public function getVariantId():int
    {
        return $this->variant_id;
    }

    /**
     * @param mixed $variant_id
     * @return ProductItem
     */
    public function setVariantId($variant_id)
    {
        $this->variant_id = $variant_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExternalVariantId()
    {
        return $this->external_variant_id;
    }

    /**
     * @param mixed $external_variant_id
     * @return ProductItem
     */
    public function setExternalVariantId($external_variant_id)
    {
        $this->external_variant_id = $external_variant_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWarehouseProductVariantId()
    {
        return $this->warehouse_product_variant_id;
    }

    /**
     * @param mixed $warehouse_product_variant_id
     * @return ProductItem
     */
    public function setWarehouseProductVariantId($warehouse_product_variant_id)
    {
        $this->warehouse_product_variant_id = $warehouse_product_variant_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     * @return ProductItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return ProductItem
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }


}
