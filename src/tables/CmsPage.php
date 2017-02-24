<?php

class CmsPage
{
    private $page_id;
    private $title;
    private $meta_keyword;
    private $meta_description;
    private $content_heading;
    private $content;
    private $creation_time;
    private $update_time;
    private $is_active;
    private $sort_order;


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
    public function getPageId()
    {
        return $this->page_id;
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
    public function getContentHeading()
    {
        return $this->content_heading;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getCreationTime()
    {
        return $this->creation_time;
    }

    /**
     * @return mixed
     */
    public function getUpdateTime()
    {
        return $this->update_time;
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
    public function getSortOrder()
    {
        return $this->sort_order;
    }


}
