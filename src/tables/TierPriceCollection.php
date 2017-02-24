<?php

class TierPriceCollection
{
    private $items = array();

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->items[] = $obj;
        }
        else {
            if (isset($this->items[$key])) {
                throw new KeyHasUseException("Key $key already in use.");
            }
            else {
                $this->items[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {}

    public function getItem($key) {}

    public function getItems() {
        return $this->items;
    }

}
