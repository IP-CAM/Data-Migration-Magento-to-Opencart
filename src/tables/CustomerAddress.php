<?php

class CustomerAddress
{

    private $entity_id;
    private $entity_type_id;
    private $attribute_set_id;
    private $parent_id;
    private $increament_id;
    private $created_at;
    private $updated_at;
    private $is_active;

    //attribute
    private $lastname_furigana;
    private $firstname_furigana;
    private $vat_request_success;
    private $vat_request_date;
    private $vat_request_id;
    private $vat_is_valid;
    private $vat_id;
    private $fax;
    private $telephone;
    private $postcode;
    private $region_id;
    private $region;
    private $country_id;
    private $city;
    private $street;
    private $company;
    private $suffix;
    private $lastname;
    private $middlename;
    private $firstname;
    private $prefix;

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
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * @return mixed
     */
    public function getIncreamentId()
    {
        return $this->increament_id;
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
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * @return mixed
     */
    public function getLastnameFurigana()
    {
        return $this->lastname_furigana;
    }

    /**
     * @return mixed
     */
    public function getFirstnameFurigana()
    {
        return $this->firstname_furigana;
    }

    /**
     * @return mixed
     */
    public function getVatRequestSuccess()
    {
        return $this->vat_request_success;
    }

    /**
     * @return mixed
     */
    public function getVatRequestDate()
    {
        return $this->vat_request_date;
    }

    /**
     * @return mixed
     */
    public function getVatRequestId()
    {
        return $this->vat_request_id;
    }

    /**
     * @return mixed
     */
    public function getVatIsValid()
    {
        return $this->vat_is_valid;
    }

    /**
     * @return mixed
     */
    public function getVatId()
    {
        return $this->vat_id;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @return mixed
     */
    public function getRegionId()
    {
        return $this->region_id;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return mixed
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

}
?>
