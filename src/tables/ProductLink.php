<?php

class ProductLink
{
    private $link_id;
    private $product_id;
    private $linked_product_id;
    private $link_type_id;


    public function __construct($data)
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
    public function getLinkId()
    {
        return $this->link_id;
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
    public function getLinkedProductId()
    {
        return $this->linked_product_id;
    }

    /**
     * @return mixed
     */
    public function getLinkTypeId()
    {
        return $this->link_type_id;
    }


}
