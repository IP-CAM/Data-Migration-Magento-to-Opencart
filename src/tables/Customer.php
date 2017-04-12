<?php

class Customer
{

    private $entity_id;
    private $entity_type_id;
    private $attribute_set_id;
    private $website_id;
    private $email;
    private $group_id;
    private $increament_id;
    private $store_id;
    private $created_at;
    private $updated_at;
    private $is_active;

    //attribute
    private $lastname_furigana;
    private $firstname_furigana;
    private $fax;
    private $newsletter;
    private $url;
    private $telephone;
    private $pet_size;
    private $pet_type;
    private $pet_name;
    private $disable_auto_group_change;
    private $rp_token_created_at;
    private $rp_token;
    private $gender;
    private $confirmation;
    private $taxvat;
    private $default_shipping;
    private $default_billing;
    private $password_hash;
    private $dob;
    private $suffix;
    private $lastname;
    private $middlename;
    private $firstname;
    private $prefix;
    private $created_in;
    private $custom_fields;

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
     * @param array $data
     */
    public function setCustomFields($data)
    {
        $this->custom_fields = $data;
    }
    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->custom_fields;
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
    public function getWebsiteId()
    {
        return $this->website_id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
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
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @return mixed
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
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
    public function getPetSize()
    {
        return $this->pet_size;
    }

    /**
     * @return mixed
     */
    public function getPetType()
    {
        return $this->pet_type;
    }

    /**
     * @return mixed
     */
    public function getPetName()
    {
        return $this->pet_name;
    }

    /**
     * @return mixed
     */
    public function getDisableAutoGroupChange()
    {
        return $this->disable_auto_group_change;
    }

    /**
     * @return mixed
     */
    public function getRpTokenCreatedAt()
    {
        return $this->rp_token_created_at;
    }

    /**
     * @return mixed
     */
    public function getRpToken()
    {
        return $this->rp_token;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * @return mixed
     */
    public function getTaxvat()
    {
        return $this->taxvat;
    }

    /**
     * @return mixed
     */
    public function getDefaultShipping()
    {
        return $this->default_shipping;
    }

    /**
     * @return mixed
     */
    public function getDefaultBilling()
    {
        return $this->default_billing;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->password_hash;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
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

    /**
     * @return mixed
     */
    public function getCreatedIn()
    {
        return $this->created_in;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->is_active;
    }
}
?>
