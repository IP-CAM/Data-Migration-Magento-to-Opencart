<?php

class Product
{
    private $entity_id;
    private $entity_type_id;
    private $attribute_set_id;
    private $type_id;
    private $sku;
    private $has_options;
    private $required_options;
    private $created_at;
    private $updated_at;

    //attribute`
    private $name;
    private $description;
    private $short_description;
    private $price;
    private $special_price;
    private $special_from_date;
    private $special_to_date;
    private $cost;
    private $weight;
    private $manufacturer;
    private $visibility;
    private $status;
    private $meta_title;
    private $meta_keyword;
    private $meta_description;
    private $image;
    private $url_path;
    private $url_key;

    private $kh_content_amount;
    private $kh_displayed_eta_date;
    private $kh_eta_date;
    private $kh_expiration_date;
    private $kh_ingredients;

    private $quantity;
    private $is_in_stock;


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
     * @param mixed $quantity
     * @param mixed $is_in_stock
     *
     */
    public function setStock($quantity, $is_in_stock)
    {
        $this->quantity = $quantity;
        $this->is_in_stock = $is_in_stock;
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
    public function getEntityTypeId()
    {
        return $this->entity_type_id;
    }

    /**
     * @return mixed
     */
    public function getAttributeSetId()
    {
        return $this->attribute_set_id;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
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
    public function getHasOptions()
    {
        return $this->has_options;
    }

    /**
     * @return mixed
     */
    public function getRequiredOptions()
    {
        return $this->required_options;
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
    public function getShortDescription()
    {
        return $this->short_description;
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
    public function getSpecialPrice()
    {
        return $this->special_price;
    }

    /**
     * @return mixed
     */
    public function getSpecialFromDate()
    {
        return $this->special_from_date;
    }

    /**
     * @return mixed
     */
    public function getSpecialToDate()
    {
        return $this->special_to_date;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
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
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->visibility;
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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getIsInStock()
    {
        return $this->is_in_stock;
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * @return mixed
     */
    public function getMetaKeyword()
    {
        return $this->meta_keyword;
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getUrlPath()
    {
        return $this->url_path;
    }

    /**
     * @return mixed
     */
    public function getUrlKey()
    {
        return $this->url_key;
    }

    /**
     * @return mixed
     */
    public function getKhContentAmount()
    {
        return $this->kh_content_amount;
    }

    /**
     * @return mixed
     */
    public function getKhDisplayedEtaDate()
    {
        return $this->kh_displayed_eta_date;
    }

    /**
     * @return mixed
     */
    public function getKhEtaDate()
    {
        return $this->kh_eta_date;
    }

    /**
     * @return mixed
     */
    public function getKhExpirationDate()
    {
        return $this->kh_expiration_date;
    }

    /**
     * @return mixed
     */
    public function getKhIngredients()
    {
        return $this->kh_ingredients;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}
