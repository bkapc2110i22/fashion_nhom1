<?php 
namespace App\Helper;

class Cart {
    public $items = [];
    public $totalQuantity = 0;
    public $totalAmount = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalQuantity = $this->getTotalQuantity();
        $this->totalAmount = $this->getTotalAmount();
    }

    public function addToCart($product, $quantity = 1)
    {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]->quantity += 1;
        } else {
            $cart_item = (object) [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->sale_price ? $product->sale_price : $product->price,
                'quantity' => 1
            ];
            
            $this->items[$product->id] = $cart_item;
        }
       
        session(['cart' => $this->items]);
    }

    public function removeItem($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
            session(['cart' => $this->items]);
        }
        
    }

    public function updateItem($id, $quantity) {
        $quantity = $quantity > 0 ? $quantity : 1;
 
        if (isset($this->items[$id])) {
             $this->items[$id]->quantity = $quantity;
             session(['cart' => $this->items]);
        }
    }
 
    private function getTotalQuantity() {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->quantity;
        }

        return $total;
    }

    private function getTotalAmount() {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->quantity * $item->price;
        }

        return $total;
    }
}