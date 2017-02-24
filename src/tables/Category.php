<?php

class Category
{
    private $entity_id;
    private $entity_type_id;
    private $attribute_set_id;
    private $parent_id;
    private $created_at;
    private $updated_at;
    private $path;
    private $position;
    private $level;
    private $children_count;

    //attribute
    private $name;
    private $is_active;
    private $url_key;
    private $description;
    private $image;
    private $meta_title;
    private $meta_keywords;
    private $meta_description;
    private $display_mode;
    private $landing_page;
    private $is_anchor;
    private $all_children;
    private $path_in_store;
    private $children;
    private $url_path;
    private $custom_design;
    private $custom_design_from;
    private $custom_design_to;
    private $page_layout;
    private $custom_layout_update;
    private $available_sort_by;
    private $default_sort_by;
    private $include_in_menu;
    private $custom_use_parent_settings;
    private $custom_apply_to_products;
    private $filter_price_range;
    private $thumbnail;
    private $catproduct;

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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getChildrenCount()
    {
        return $this->children_count;
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
    public function getIsActive()
    {
        return $this->is_active;
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
    public function getDescription()
    {
        return $this->description;
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
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
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
    public function getDisplayMode()
    {
        return $this->display_mode;
    }

    /**
     * @return mixed
     */
    public function getLandingPage()
    {
        return $this->landing_page;
    }

    /**
     * @return mixed
     */
    public function getIsAnchor()
    {
        return $this->is_anchor;
    }

    /**
     * @return mixed
     */
    public function getAllChildren()
    {
        return $this->all_children;
    }

    /**
     * @return mixed
     */
    public function getPathInStore()
    {
        return $this->path_in_store;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
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
    public function getCustomDesign()
    {
        return $this->custom_design;
    }

    /**
     * @return mixed
     */
    public function getCustomDesignFrom()
    {
        return $this->custom_design_from;
    }

    /**
     * @return mixed
     */
    public function getCustomDesignTo()
    {
        return $this->custom_design_to;
    }

    /**
     * @return mixed
     */
    public function getPageLayout()
    {
        return $this->page_layout;
    }

    /**
     * @return mixed
     */
    public function getCustomLayoutUpdate()
    {
        return $this->custom_layout_update;
    }

    /**
     * @return mixed
     */
    public function getAvailableSortBy()
    {
        return $this->available_sort_by;
    }

    /**
     * @return mixed
     */
    public function getDefaultSortBy()
    {
        return $this->default_sort_by;
    }

    /**
     * @return mixed
     */
    public function getIncludeInMenu()
    {
        return $this->include_in_menu;
    }

    /**
     * @return mixed
     */
    public function getCustomUseParentSettings()
    {
        return $this->custom_use_parent_settings;
    }

    /**
     * @return mixed
     */
    public function getCustomApplyToProducts()
    {
        return $this->custom_apply_to_products;
    }

    /**
     * @return mixed
     */
    public function getFilterPriceRange()
    {
        return $this->filter_price_range;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @return mixed
     */
    public function getCatproduct()
    {
        return $this->catproduct;
    }

}
?>
