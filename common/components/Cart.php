<?php


namespace common\components;


use common\models\cart\Product;
use yii\base\Component;
use Yii;

class Cart extends Component
{
    public $session;

    public $products;

    public function add($productId, $size)
    {
        if(!$this->session->isActive)
        {
            $this->session->open();
        }
        if($this->session->has('products'))
        {
            $this->products = $this->session->get('products');
        }

        if(isset($this->products[$productId]) && $this->products[$productId]->add($size)) {
            $this->session->set('products', $this->products);
        }else{
            $cartProduct = new Product();
            $cartProduct->productId = $productId;
            $cartProduct->name = $productId->name;
            $cartProduct->add($size);
            $this->products[$productId] = $cartProduct;
            $this->session->set('products', $this->products);
        }
    }

    public function remove($productId)
    {
        if(!$this->session->isActive)
        {
            $this->session->open();
        }
        if(isset($this->session['products']))
        {
            $this->products = $this->session->get('products');
        }
        if(isset($this->products[$productId]))
        {
            unset($this->products[$productId]);
            $this->session->set('products', $this->products);
        }
    }


}