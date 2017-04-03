<?php

class RewardPoints
{
    private $reward_id;
    private $customer_id;
    private $point_balance;
    private $created_time;

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

    public function getRewardId()
    {
        return $this->reward_id;
    }

    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function getPointBalance()
    {
        return $this->point_balance;
    }

    public function getCreatedTime()
    {
        return $this->created_time;
    }

}
?>
