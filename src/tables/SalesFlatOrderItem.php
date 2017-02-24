<?php

class SalesFlatOrderItem
{
    private $item_id;
    private $order_id;
    private $parent_item_id;
    private $quote_item_id;
    private $store_id;
    private $created_at;
    private $updated_at;
    private $product_id;
    private $product_type;
    private $product_options;
    private $weight;
    private $is_virtual;
    private $sku;
    private $name;
    private $description;
    private $applied_rule_ids;
    private $additional_data;
    private $free_shipping;
    private $is_qty_decimal;
    private $no_discount;
    private $qty_backordered;
    private $qty_canceled;
    private $qty_invoiced;
    private $qty_ordered;
    private $qty_refunded;
    private $qty_shipped;
    private $base_cost;
    private $price;
    private $base_price;
    private $original_price;
    private $base_original_price;
    private $tax_percent;
    private $tax_amount;
    private $base_tax_amount;
    private $tax_invoiced;
    private $base_tax_invoiced;
    private $discount_percent;
    private $discount_amount;
    private $base_discount_amount;
    private $discount_invoiced;
    private $base_discount_invoiced;
    private $amount_refunded;
    private $base_amount_refunded;
    private $row_total;
    private $base_row_total;
    private $row_invoiced;
    private $base_row_invoiced;
    private $row_weight;
    private $base_tax_before_discount;
    private $tax_before_discount;
    private $ext_order_item_id;
    private $locked_do_invoice;
    private $locked_do_ship;
    private $price_incl_tax;
    private $base_price_incl_tax;
    private $row_total_incl_tax;
    private $base_row_total_incl_tax;
    private $hidden_tax_amount;
    private $base_hidden_tax_amount;
    private $hidden_tax_invoiced;
    private $base_hidden_tax_invoiced;
    private $hidden_tax_refunded;
    private $base_hidden_tax_refunded;
    private $is_nominal;
    private $tax_canceled;
    private $hidden_tax_canceled;
    private $tax_refunded;
    private $base_tax_refunded;
    private $discount_refunded;
    private $base_discount_refunded;
    private $gift_message_id;
    private $gift_message_available;
    private $base_weee_tax_applied_amount;
    private $base_weee_tax_applied_row_amnt;
    private $weee_tax_applied_amount;
    private $weee_tax_applied_row_amount;
    private $weee_tax_applied;
    private $weee_tax_disposition;
    private $weee_tax_row_disposition;
    private $base_weee_tax_disposition;
    private $base_weee_tax_row_disposition;
    private $rewardpoints_earn;
    private $rewardpoints_spent;
    private $rewardpoints_base_discount;
    private $rewardpoints_discount;
    private $affiliateplus_amount;
    private $base_affiliateplus_amount;
    private $affiliateplus_commission;
    private $rewardpoints_base_hidden_tax_amount;
    private $rewardpoints_hidden_tax_amount;
    private $rewardpoints_referal_earn;
    private $rewardpoints_invited_discount;
    private $rewardpoints_invited_base_discount;

    public function __construct($data)
    {
        $this->set($data);
    }

    public function setAttribute($data)
    {
        $this->set($data);
    }

    /**
     * Return a string if only single key array
     * @param array $value
     * @return mixed
     */
    private function filterValue($value)
    {
        if (is_array($value) && count($value) == 1) {
            foreach ($value as $v) {
                $value = $v;
            }
        }

        return $value;
    }

    private function set($data)
    {
        foreach ($data as $k => $v) {
            $className = get_class($this);
            if (property_exists($className, $k)) {
                $this->$k = addslashes($this->filterValue($v));
            }
        }
    }

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @return mixed
     */
    public function getParentItemId()
    {
        return $this->parent_item_id;
    }

    /**
     * @return mixed
     */
    public function getQuoteItemId()
    {
        return $this->quote_item_id;
    }

    /**
     * @return mixed
     */
    public function getStoreId()
    {
        return $this->store_id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @return mixed
     */
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * @return mixed
     */
    public function getProductOptions()
    {
        return $this->product_options;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return mixed
     */
    public function getIsVirtual()
    {
        return $this->is_virtual;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getAppliedRuleIds()
    {
        return $this->applied_rule_ids;
    }

    /**
     * @return mixed
     */
    public function getAdditionalData()
    {
        return $this->additional_data;
    }

    /**
     * @return mixed
     */
    public function getFreeShipping()
    {
        return $this->free_shipping;
    }

    /**
     * @return mixed
     */
    public function getIsQtyDecimal()
    {
        return $this->is_qty_decimal;
    }

    /**
     * @return mixed
     */
    public function getNoDiscount()
    {
        return $this->no_discount;
    }

    /**
     * @return mixed
     */
    public function getQtyBackordered()
    {
        return $this->qty_backordered;
    }

    /**
     * @return mixed
     */
    public function getQtyCanceled()
    {
        return $this->qty_canceled;
    }

    /**
     * @return mixed
     */
    public function getQtyInvoiced()
    {
        return $this->qty_invoiced;
    }

    /**
     * @return mixed
     */
    public function getQtyOrdered()
    {
        return $this->qty_ordered;
    }

    /**
     * @return mixed
     */
    public function getQtyRefunded()
    {
        return $this->qty_refunded;
    }

    /**
     * @return mixed
     */
    public function getQtyShipped()
    {
        return $this->qty_shipped;
    }

    /**
     * @return mixed
     */
    public function getBaseCost()
    {
        return $this->base_cost;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getBasePrice()
    {
        return $this->base_price;
    }

    /**
     * @return mixed
     */
    public function getOriginalPrice()
    {
        return $this->original_price;
    }

    /**
     * @return mixed
     */
    public function getBaseOriginalPrice()
    {
        return $this->base_original_price;
    }

    /**
     * @return mixed
     */
    public function getTaxPercent()
    {
        return $this->tax_percent;
    }

    /**
     * @return mixed
     */
    public function getTaxAmount()
    {
        return $this->tax_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseTaxAmount()
    {
        return $this->base_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getTaxInvoiced()
    {
        return $this->tax_invoiced;
    }

    /**
     * @return mixed
     */
    public function getBaseTaxInvoiced()
    {
        return $this->base_tax_invoiced;
    }

    /**
     * @return mixed
     */
    public function getDiscountPercent()
    {
        return $this->discount_percent;
    }

    /**
     * @return mixed
     */
    public function getDiscountAmount()
    {
        return $this->discount_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseDiscountAmount()
    {
        return $this->base_discount_amount;
    }

    /**
     * @return mixed
     */
    public function getDiscountInvoiced()
    {
        return $this->discount_invoiced;
    }

    /**
     * @return mixed
     */
    public function getBaseDiscountInvoiced()
    {
        return $this->base_discount_invoiced;
    }

    /**
     * @return mixed
     */
    public function getAmountRefunded()
    {
        return $this->amount_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseAmountRefunded()
    {
        return $this->base_amount_refunded;
    }

    /**
     * @return mixed
     */
    public function getRowTotal()
    {
        return $this->row_total;
    }

    /**
     * @return mixed
     */
    public function getBaseRowTotal()
    {
        return $this->base_row_total;
    }

    /**
     * @return mixed
     */
    public function getRowInvoiced()
    {
        return $this->row_invoiced;
    }

    /**
     * @return mixed
     */
    public function getBaseRowInvoiced()
    {
        return $this->base_row_invoiced;
    }

    /**
     * @return mixed
     */
    public function getRowWeight()
    {
        return $this->row_weight;
    }

    /**
     * @return mixed
     */
    public function getBaseTaxBeforeDiscount()
    {
        return $this->base_tax_before_discount;
    }

    /**
     * @return mixed
     */
    public function getTaxBeforeDiscount()
    {
        return $this->tax_before_discount;
    }

    /**
     * @return mixed
     */
    public function getExtOrderItemId()
    {
        return $this->ext_order_item_id;
    }

    /**
     * @return mixed
     */
    public function getLockedDoInvoice()
    {
        return $this->locked_do_invoice;
    }

    /**
     * @return mixed
     */
    public function getLockedDoShip()
    {
        return $this->locked_do_ship;
    }

    /**
     * @return mixed
     */
    public function getPriceInclTax()
    {
        return $this->price_incl_tax;
    }

    /**
     * @return mixed
     */
    public function getBasePriceInclTax()
    {
        return $this->base_price_incl_tax;
    }

    /**
     * @return mixed
     */
    public function getRowTotalInclTax()
    {
        return $this->row_total_incl_tax;
    }

    /**
     * @return mixed
     */
    public function getBaseRowTotalInclTax()
    {
        return $this->base_row_total_incl_tax;
    }

    /**
     * @return mixed
     */
    public function getHiddenTaxAmount()
    {
        return $this->hidden_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseHiddenTaxAmount()
    {
        return $this->base_hidden_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getHiddenTaxInvoiced()
    {
        return $this->hidden_tax_invoiced;
    }

    /**
     * @return mixed
     */
    public function getBaseHiddenTaxInvoiced()
    {
        return $this->base_hidden_tax_invoiced;
    }

    /**
     * @return mixed
     */
    public function getHiddenTaxRefunded()
    {
        return $this->hidden_tax_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseHiddenTaxRefunded()
    {
        return $this->base_hidden_tax_refunded;
    }

    /**
     * @return mixed
     */
    public function getIsNominal()
    {
        return $this->is_nominal;
    }

    /**
     * @return mixed
     */
    public function getTaxCanceled()
    {
        return $this->tax_canceled;
    }

    /**
     * @return mixed
     */
    public function getHiddenTaxCanceled()
    {
        return $this->hidden_tax_canceled;
    }

    /**
     * @return mixed
     */
    public function getTaxRefunded()
    {
        return $this->tax_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseTaxRefunded()
    {
        return $this->base_tax_refunded;
    }

    /**
     * @return mixed
     */
    public function getDiscountRefunded()
    {
        return $this->discount_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseDiscountRefunded()
    {
        return $this->base_discount_refunded;
    }

    /**
     * @return mixed
     */
    public function getGiftMessageId()
    {
        return $this->gift_message_id;
    }

    /**
     * @return mixed
     */
    public function getGiftMessageAvailable()
    {
        return $this->gift_message_available;
    }

    /**
     * @return mixed
     */
    public function getBaseWeeeTaxAppliedAmount()
    {
        return $this->base_weee_tax_applied_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseWeeeTaxAppliedRowAmnt()
    {
        return $this->base_weee_tax_applied_row_amnt;
    }

    /**
     * @return mixed
     */
    public function getWeeeTaxAppliedAmount()
    {
        return $this->weee_tax_applied_amount;
    }

    /**
     * @return mixed
     */
    public function getWeeeTaxAppliedRowAmount()
    {
        return $this->weee_tax_applied_row_amount;
    }

    /**
     * @return mixed
     */
    public function getWeeeTaxApplied()
    {
        return $this->weee_tax_applied;
    }

    /**
     * @return mixed
     */
    public function getWeeeTaxDisposition()
    {
        return $this->weee_tax_disposition;
    }

    /**
     * @return mixed
     */
    public function getWeeeTaxRowDisposition()
    {
        return $this->weee_tax_row_disposition;
    }

    /**
     * @return mixed
     */
    public function getBaseWeeeTaxDisposition()
    {
        return $this->base_weee_tax_disposition;
    }

    /**
     * @return mixed
     */
    public function getBaseWeeeTaxRowDisposition()
    {
        return $this->base_weee_tax_row_disposition;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsEarn()
    {
        return $this->rewardpoints_earn;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsSpent()
    {
        return $this->rewardpoints_spent;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsBaseDiscount()
    {
        return $this->rewardpoints_base_discount;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsDiscount()
    {
        return $this->rewardpoints_discount;
    }

    /**
     * @return mixed
     */
    public function getAffiliateplusAmount()
    {
        return $this->affiliateplus_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseAffiliateplusAmount()
    {
        return $this->base_affiliateplus_amount;
    }

    /**
     * @return mixed
     */
    public function getAffiliateplusCommission()
    {
        return $this->affiliateplus_commission;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsBaseHiddenTaxAmount()
    {
        return $this->rewardpoints_base_hidden_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsHiddenTaxAmount()
    {
        return $this->rewardpoints_hidden_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsReferalEarn()
    {
        return $this->rewardpoints_referal_earn;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsInvitedDiscount()
    {
        return $this->rewardpoints_invited_discount;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsInvitedBaseDiscount()
    {
        return $this->rewardpoints_invited_base_discount;
    }
}
?>
