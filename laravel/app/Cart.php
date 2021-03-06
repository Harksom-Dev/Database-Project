<?php
namespace App;

class Cart{
    public $items = null;
    public $totalQty =0;
    public $totalPrice =0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        } 
        
    }

    public function add($item,$id){
        $storedItem = ['qty' => 0 , 'price' => $item->MSRP,'item' => $item,'name' => $item->productName,'id' => $id];
        if($this ->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        

        $storedItem['qty'] += $item->quantityInStock;
        $storedItem['price'] = $item->MSRP * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty+= $item->quantityInStock;
        $this->totalPrice += $item->MSRP * $item->quantityInStock;
    }

    public function remove($id){
        $storedItem = $this->items[$id];
        // $this->items[$id] = null;
        unset($this->items[$id]);
        $this->totalQty -= $storedItem['qty'];
        $this->totalPrice -= $storedItem['price'];
    }
}