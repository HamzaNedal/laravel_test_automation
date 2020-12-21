<?php

namespace App\UnitTest;

class Cart
{

    protected $items = [];

    public function insert($item)
    {
        $this->items[] = $item;
    }
    public function getItems()
    {
        return $this->items;
    }
    public function count()
    {
        return count($this->items);
    }

    public function total()
    {
        $amount = 0;
        foreach ($this->items as $key => $item) {
            $amount +=  $item['price'] * $item['quantity'];
        }
        return $amount;
    }
}
