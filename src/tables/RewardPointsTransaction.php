<?php

class RewardPointsTransaction
{
    private $transaction_id;
    private $reward_id;
    private $customer_id;
    private $customer_email;
    private $title;
    private $action;
    private $action_type;
    private $store_id;
    private $point_amount;
    private $point_used;
    private $real_point;
    private $status;
    private $created_time;
    private $updated_time;
    private $expiration_date;
    private $expire_email;
    private $order_id;
    private $order_increment_id;
    private $order_base_amount;
    private $order_amount;
    private $base_discount;
    private $discount;
    private $extra_content;

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
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * @return mixed
     */
    public function getRewardId()
    {
        return $this->reward_id;
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
    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getActionType()
    {
        return $this->action_type;
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
    public function getPointAmount()
    {
        return $this->point_amount;
    }

    /**
     * @return mixed
     */
    public function getPointUsed()
    {
        return $this->point_used;
    }

    /**
     * @return mixed
     */
    public function getRealPoint()
    {
        return $this->real_point;
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
    public function getCreatedTime()
    {
        return $this->created_time;
    }

    /**
     * @return mixed
     */
    public function getUpdatedTime()
    {
        return $this->updated_time;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * @return mixed
     */
    public function getExpireEmail()
    {
        return $this->expire_email;
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
    public function getOrderIncrementId()
    {
        return $this->order_increment_id;
    }

    /**
     * @return mixed
     */
    public function getOrderBaseAmount()
    {
        return $this->order_base_amount;
    }

    /**
     * @return mixed
     */
    public function getOrderAmount()
    {
        return $this->order_amount;
    }

    /**
     * @return mixed
     */
    public function getBaseDiscount()
    {
        return $this->base_discount;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @return mixed
     */
    public function getExtraContent()
    {
        return $this->extra_content;
    }
}
?>
