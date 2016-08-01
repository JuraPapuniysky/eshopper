<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 01.08.16
 * Time: 9:55
 */

namespace common\components;


use yii\base\Component;

class ExchangeRates extends Component
{

    public $source;

    public $content;

    public $usd;
    
    public $coef;

    public $currency;

    public $icon;


    public function init()
    {
        $this->content = json_decode(file_get_contents($this->source));
        $session = \Yii::$app->session;

        if(!$session->has('currency'))
        {
            $session->set('currency', 'USD');
        }

        $this->getUSD();
        
        if($session->get('currency') == 'USD')
        {
            $this->coef = 1;
            $this->icon = '$';

        }else{
            $this->coef = $this->usd->sale;
            $this->icon = '&#8372';
        }
    }

    public function getUSD()
    {
        foreach ($this->content as $object)
        {
            if($object->ccy == 'USD')
            {
                $this->usd = $object;
            }
        }
    }


}