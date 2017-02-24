<?php

class SalesFlatOrder
{
    private $entity_id;
    private $state;
    private $status;
    private $coupon_code;
    private $protect_code;
    private $shipping_description;
    private $is_virtual;
    private $store_id;
    private $customer_id;
    private $base_discount_amount;
    private $base_discount_canceled;
    private $base_discount_invoiced;
    private $base_discount_refunded;
    private $base_grand_total;
    private $base_shipping_amount;
    private $base_shipping_canceled;
    private $base_shipping_invoiced;
    private $base_shipping_refunded;
    private $base_shipping_tax_amount;
    private $base_shipping_tax_refunded;
    private $base_subtotal;
    private $base_subtotal_canceled;
    private $base_subtotal_invoiced;
    private $base_subtotal_refunded;
    private $base_tax_amount;
    private $base_tax_canceled;
    private $base_tax_invoiced;
    private $base_tax_refunded;
    private $base_to_global_rate;
    private $base_to_order_rate;
    private $base_total_canceled;
    private $base_total_invoiced;
    private $base_total_invoiced_cost;
    private $base_total_offline_refunded;
    private $base_total_online_refunded;
    private $base_total_paid;
    private $base_total_qty_ordered;
    private $base_total_refunded;
    private $discount_amount;
    private $discount_canceled;
    private $discount_invoiced;
    private $discount_refunded;
    private $grand_total;
    private $shipping_amount;
    private $shipping_canceled;
    private $shipping_invoiced;
    private $shipping_refunded;
    private $shipping_tax_amount;
    private $shipping_tax_refunded;
    private $store_to_base_rate;
    private $store_to_order_rate;
    private $subtotal;
    private $subtotal_canceled;
    private $subtotal_invoiced;
    private $subtotal_refunded;
    private $tax_amount;
    private $tax_canceled;
    private $tax_invoiced;
    private $tax_refunded;
    private $total_canceled;
    private $total_invoiced;
    private $total_offline_refunded;
    private $total_online_refunded;
    private $total_paid;
    private $total_qty_ordered;
    private $total_refunded;
    private $can_ship_partially;
    private $can_ship_partially_item;
    private $customer_is_guest;
    private $customer_note_notify;
    private $billing_address_id;
    private $customer_group_id;
    private $edit_increment;
    private $email_sent;
    private $forced_shipment_with_invoice;
    private $payment_auth_expiration;
    private $quote_address_id;
    private $quote_id;
    private $shipping_address_id;
    private $adjustment_negative;
    private $adjustment_positive;
    private $base_adjustment_negative;
    private $base_adjustment_positive;
    private $base_shipping_discount_amount;
    private $base_subtotal_incl_tax;
    private $base_total_due;
    private $payment_authorization_amount;
    private $shipping_discount_amount;
    private $subtotal_incl_tax;
    private $total_due;
    private $weight;
    private $customer_dob;
    private $increment_id;
    private $increment_id_original;
    private $applied_rule_ids;
    private $base_currency_code;
    private $customer_email;
    private $customer_firstname;
    private $customer_lastname;
    private $customer_middlename;
    private $customer_prefix;
    private $customer_suffix;
    private $customer_taxvat;
    private $discount_description;
    private $ext_customer_id;
    private $ext_order_id;
    private $global_currency_code;
    private $hold_before_state;
    private $hold_before_status;
    private $order_currency_code;
    private $original_increment_id;
    private $relation_child_id;
    private $relation_child_real_id;
    private $relation_parent_id;
    private $relation_parent_real_id;
    private $remote_ip;
    private $shipping_method;
    private $store_currency_code;
    private $store_name;
    private $x_forwarded_for;
    private $customer_note;
    private $created_at;
    private $updated_at;
    private $total_item_count;
    private $customer_gender;
    private $hidden_tax_amount;
    private $base_hidden_tax_amount;
    private $shipping_hidden_tax_amount;
    private $base_shipping_hidden_tax_amnt;
    private $hidden_tax_invoiced;
    private $base_hidden_tax_invoiced;
    private $hidden_tax_refunded;
    private $base_hidden_tax_refunded;
    private $shipping_incl_tax;
    private $base_shipping_incl_tax;
    private $coupon_rule_name;
    private $paypal_ipn_customer_notified;
    private $gift_message_id;
    private $onestepcheckout_order_comment;
    private $onestepcheckout_giftwrap_amount;
    private $rewardpoints_earn;
    private $rewardpoints_spent;
    private $rewardpoints_base_discount;
    private $rewardpoints_discount;
    private $affiliateplus_discount;
    private $base_affiliateplus_discount;
    private $base_affiliate_credit;
    private $affiliate_credit;
    private $imported;
    private $rewardpoints_base_amount;
    private $rewardpoints_amount;
    private $rewardpoints_base_hidden_tax_amount;
    private $rewardpoints_hidden_tax_amount;
    private $rewardpoints_base_shipping_hidden_tax_amount;
    private $rewardpoints_shipping_hidden_tax_amount;
    private $rewardpoints_referal_earn;
    private $rewardpoints_invited_discount;
    private $rewardpoints_invited_base_discount;
    private $rewardpoints_refer_customer_id;

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
    public function getEntityId()
    {
        return $this->entity_id;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getCouponCode()
    {
        return $this->coupon_code;
    }

    /**
     * @return mixed
     */
    public function getProtectCode()
    {
        return $this->protect_code;
    }

    /**
     * @return mixed
     */
    public function getShippingDescription()
    {
        return $this->shipping_description;
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
    public function getStoreId()
    {
        return $this->store_id;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
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
    public function getBaseDiscountCanceled()
    {
        return $this->base_discount_canceled;
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
    public function getBaseDiscountRefunded()
    {
        return $this->base_discount_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseGrandTotal()
    {
        return $this->base_grand_total;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingAmount()
    {
        return $this->base_shipping_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingCanceled()
    {
        return $this->base_shipping_canceled;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingInvoiced()
    {
        return $this->base_shipping_invoiced;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingRefunded()
    {
        return $this->base_shipping_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingTaxAmount()
    {
        return $this->base_shipping_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingTaxRefunded()
    {
        return $this->base_shipping_tax_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseSubtotal()
    {
        return $this->base_subtotal;
    }

    /**
     * @return mixed
     */
    public function getBaseSubtotalCanceled()
    {
        return $this->base_subtotal_canceled;
    }

    /**
     * @return mixed
     */
    public function getBaseSubtotalInvoiced()
    {
        return $this->base_subtotal_invoiced;
    }

    /**
     * @return mixed
     */
    public function getBaseSubtotalRefunded()
    {
        return $this->base_subtotal_refunded;
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
    public function getBaseTaxCanceled()
    {
        return $this->base_tax_canceled;
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
    public function getBaseTaxRefunded()
    {
        return $this->base_tax_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseToGlobalRate()
    {
        return $this->base_to_global_rate;
    }

    /**
     * @return mixed
     */
    public function getBaseToOrderRate()
    {
        return $this->base_to_order_rate;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalCanceled()
    {
        return $this->base_total_canceled;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalInvoiced()
    {
        return $this->base_total_invoiced;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalInvoicedCost()
    {
        return $this->base_total_invoiced_cost;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalOfflineRefunded()
    {
        return $this->base_total_offline_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalOnlineRefunded()
    {
        return $this->base_total_online_refunded;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalPaid()
    {
        return $this->base_total_paid;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalQtyOrdered()
    {
        return $this->base_total_qty_ordered;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalRefunded()
    {
        return $this->base_total_refunded;
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
    public function getDiscountCanceled()
    {
        return $this->discount_canceled;
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
    public function getDiscountRefunded()
    {
        return $this->discount_refunded;
    }

    /**
     * @return mixed
     */
    public function getGrandTotal()
    {
        return $this->grand_total;
    }

    /**
     * @return mixed
     */
    public function getShippingAmount()
    {
        return $this->shipping_amount;
    }

    /**
     * @return mixed
     */
    public function getShippingCanceled()
    {
        return $this->shipping_canceled;
    }

    /**
     * @return mixed
     */
    public function getShippingInvoiced()
    {
        return $this->shipping_invoiced;
    }

    /**
     * @return mixed
     */
    public function getShippingRefunded()
    {
        return $this->shipping_refunded;
    }

    /**
     * @return mixed
     */
    public function getShippingTaxAmount()
    {
        return $this->shipping_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getShippingTaxRefunded()
    {
        return $this->shipping_tax_refunded;
    }

    /**
     * @return mixed
     */
    public function getStoreToBaseRate()
    {
        return $this->store_to_base_rate;
    }

    /**
     * @return mixed
     */
    public function getStoreToOrderRate()
    {
        return $this->store_to_order_rate;
    }

    /**
     * @return mixed
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @return mixed
     */
    public function getSubtotalCanceled()
    {
        return $this->subtotal_canceled;
    }

    /**
     * @return mixed
     */
    public function getSubtotalInvoiced()
    {
        return $this->subtotal_invoiced;
    }

    /**
     * @return mixed
     */
    public function getSubtotalRefunded()
    {
        return $this->subtotal_refunded;
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
    public function getTaxCanceled()
    {
        return $this->tax_canceled;
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
    public function getTaxRefunded()
    {
        return $this->tax_refunded;
    }

    /**
     * @return mixed
     */
    public function getTotalCanceled()
    {
        return $this->total_canceled;
    }

    /**
     * @return mixed
     */
    public function getTotalInvoiced()
    {
        return $this->total_invoiced;
    }

    /**
     * @return mixed
     */
    public function getTotalOfflineRefunded()
    {
        return $this->total_offline_refunded;
    }

    /**
     * @return mixed
     */
    public function getTotalOnlineRefunded()
    {
        return $this->total_online_refunded;
    }

    /**
     * @return mixed
     */
    public function getTotalPaid()
    {
        return $this->total_paid;
    }

    /**
     * @return mixed
     */
    public function getTotalQtyOrdered()
    {
        return $this->total_qty_ordered;
    }

    /**
     * @return mixed
     */
    public function getTotalRefunded()
    {
        return $this->total_refunded;
    }

    /**
     * @return mixed
     */
    public function getCanShipPartially()
    {
        return $this->can_ship_partially;
    }

    /**
     * @return mixed
     */
    public function getCanShipPartiallyItem()
    {
        return $this->can_ship_partially_item;
    }

    /**
     * @return mixed
     */
    public function getCustomerIsGuest()
    {
        return $this->customer_is_guest;
    }

    /**
     * @return mixed
     */
    public function getCustomerNoteNotify()
    {
        return $this->customer_note_notify;
    }

    /**
     * @return mixed
     */
    public function getBillingAddressId()
    {
        return $this->billing_address_id;
    }

    /**
     * @return mixed
     */
    public function getCustomerGroupId()
    {
        return $this->customer_group_id;
    }

    /**
     * @return mixed
     */
    public function getEditIncrement()
    {
        return $this->edit_increment;
    }

    /**
     * @return mixed
     */
    public function getEmailSent()
    {
        return $this->email_sent;
    }

    /**
     * @return mixed
     */
    public function getForcedShipmentWithInvoice()
    {
        return $this->forced_shipment_with_invoice;
    }

    /**
     * @return mixed
     */
    public function getPaymentAuthExpiration()
    {
        return $this->payment_auth_expiration;
    }

    /**
     * @return mixed
     */
    public function getQuoteAddressId()
    {
        return $this->quote_address_id;
    }

    /**
     * @return mixed
     */
    public function getQuoteId()
    {
        return $this->quote_id;
    }

    /**
     * @return mixed
     */
    public function getShippingAddressId()
    {
        return $this->shipping_address_id;
    }

    /**
     * @return mixed
     */
    public function getAdjustmentNegative()
    {
        return $this->adjustment_negative;
    }

    /**
     * @return mixed
     */
    public function getAdjustmentPositive()
    {
        return $this->adjustment_positive;
    }

    /**
     * @return mixed
     */
    public function getBaseAdjustmentNegative()
    {
        return $this->base_adjustment_negative;
    }

    /**
     * @return mixed
     */
    public function getBaseAdjustmentPositive()
    {
        return $this->base_adjustment_positive;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingDiscountAmount()
    {
        return $this->base_shipping_discount_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseSubtotalInclTax()
    {
        return $this->base_subtotal_incl_tax;
    }

    /**
     * @return mixed
     */
    public function getBaseTotalDue()
    {
        return $this->base_total_due;
    }

    /**
     * @return mixed
     */
    public function getPaymentAuthorizationAmount()
    {
        return $this->payment_authorization_amount;
    }

    /**
     * @return mixed
     */
    public function getShippingDiscountAmount()
    {
        return $this->shipping_discount_amount;
    }

    /**
     * @return mixed
     */
    public function getSubtotalInclTax()
    {
        return $this->subtotal_incl_tax;
    }

    /**
     * @return mixed
     */
    public function getTotalDue()
    {
        return $this->total_due;
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
    public function getCustomerDob()
    {
        return $this->customer_dob;
    }

    /**
     * @return mixed
     */
    public function getIncrementId()
    {
        return $this->increment_id;
    }

    /**
     * @return mixed
     */
    public function getIncrementIdOriginal()
    {
        return $this->increment_id_original;
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
    public function getBaseCurrencyCode()
    {
        return $this->base_currency_code;
    }

    /**
     * @return mixed
     */
    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    /**
     * @return mixed
     */
    public function getCustomerFirstname()
    {
        return $this->customer_firstname;
    }

    /**
     * @return mixed
     */
    public function getCustomerLastname()
    {
        return $this->customer_lastname;
    }

    /**
     * @return mixed
     */
    public function getCustomerMiddlename()
    {
        return $this->customer_middlename;
    }

    /**
     * @return mixed
     */
    public function getCustomerPrefix()
    {
        return $this->customer_prefix;
    }

    /**
     * @return mixed
     */
    public function getCustomerSuffix()
    {
        return $this->customer_suffix;
    }

    /**
     * @return mixed
     */
    public function getCustomerTaxvat()
    {
        return $this->customer_taxvat;
    }

    /**
     * @return mixed
     */
    public function getDiscountDescription()
    {
        return $this->discount_description;
    }

    /**
     * @return mixed
     */
    public function getExtCustomerId()
    {
        return $this->ext_customer_id;
    }

    /**
     * @return mixed
     */
    public function getExtOrderId()
    {
        return $this->ext_order_id;
    }

    /**
     * @return mixed
     */
    public function getGlobalCurrencyCode()
    {
        return $this->global_currency_code;
    }

    /**
     * @return mixed
     */
    public function getHoldBeforeState()
    {
        return $this->hold_before_state;
    }

    /**
     * @return mixed
     */
    public function getHoldBeforeStatus()
    {
        return $this->hold_before_status;
    }

    /**
     * @return mixed
     */
    public function getOrderCurrencyCode()
    {
        return $this->order_currency_code;
    }

    /**
     * @return mixed
     */
    public function getOriginalIncrementId()
    {
        return $this->original_increment_id;
    }

    /**
     * @return mixed
     */
    public function getRelationChildId()
    {
        return $this->relation_child_id;
    }

    /**
     * @return mixed
     */
    public function getRelationChildRealId()
    {
        return $this->relation_child_real_id;
    }

    /**
     * @return mixed
     */
    public function getRelationParentId()
    {
        return $this->relation_parent_id;
    }

    /**
     * @return mixed
     */
    public function getRelationParentRealId()
    {
        return $this->relation_parent_real_id;
    }

    /**
     * @return mixed
     */
    public function getRemoteIp()
    {
        return $this->remote_ip;
    }

    /**
     * @return mixed
     */
    public function getShippingMethod()
    {
        return $this->shipping_method;
    }

    /**
     * @return mixed
     */
    public function getStoreCurrencyCode()
    {
        return $this->store_currency_code;
    }

    /**
     * @return mixed
     */
    public function getStoreName()
    {
        return $this->store_name;
    }

    /**
     * @return mixed
     */
    public function getXForwardedFor()
    {
        return $this->x_forwarded_for;
    }

    /**
     * @return mixed
     */
    public function getCustomerNote()
    {
        return $this->customer_note;
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
    public function getTotalItemCount()
    {
        return $this->total_item_count;
    }

    /**
     * @return mixed
     */
    public function getCustomerGender()
    {
        return $this->customer_gender;
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
    public function getShippingHiddenTaxAmount()
    {
        return $this->shipping_hidden_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingHiddenTaxAmnt()
    {
        return $this->base_shipping_hidden_tax_amnt;
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
    public function getShippingInclTax()
    {
        return $this->shipping_incl_tax;
    }

    /**
     * @return mixed
     */
    public function getBaseShippingInclTax()
    {
        return $this->base_shipping_incl_tax;
    }

    /**
     * @return mixed
     */
    public function getCouponRuleName()
    {
        return $this->coupon_rule_name;
    }

    /**
     * @return mixed
     */
    public function getPaypalIpnCustomerNotified()
    {
        return $this->paypal_ipn_customer_notified;
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
    public function getOnestepcheckoutOrderComment()
    {
        return $this->onestepcheckout_order_comment;
    }

    /**
     * @return mixed
     */
    public function getOnestepcheckoutGiftwrapAmount()
    {
        return $this->onestepcheckout_giftwrap_amount;
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
    public function getAffiliateplusDiscount()
    {
        return $this->affiliateplus_discount;
    }

    /**
     * @return mixed
     */
    public function getBaseAffiliateplusDiscount()
    {
        return $this->base_affiliateplus_discount;
    }

    /**
     * @return mixed
     */
    public function getBaseAffiliateCredit()
    {
        return $this->base_affiliate_credit;
    }

    /**
     * @return mixed
     */
    public function getAffiliateCredit()
    {
        return $this->affiliate_credit;
    }

    /**
     * @return mixed
     */
    public function getImported()
    {
        return $this->imported;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsBaseAmount()
    {
        return $this->rewardpoints_base_amount;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsAmount()
    {
        return $this->rewardpoints_amount;
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
    public function getRewardpointsBaseShippingHiddenTaxAmount()
    {
        return $this->rewardpoints_base_shipping_hidden_tax_amount;
    }

    /**
     * @return mixed
     */
    public function getRewardpointsShippingHiddenTaxAmount()
    {
        return $this->rewardpoints_shipping_hidden_tax_amount;
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

    /**
     * @return mixed
     */
    public function getRewardpointsReferCustomerId()
    {
        return $this->rewardpoints_refer_customer_id;
    }
}
?>
