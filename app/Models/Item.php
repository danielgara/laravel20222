<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     */

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($q)
    {
        $this->attributes['quantity'] = $q;
    }

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($s)
    {
        $this->attributes['subtotal'] = $s;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($pId)
    {
        $this->attributes['order_id'] = $pId;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($pId)
    {
        $this->attributes['product_id'] = $pId;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }
}
