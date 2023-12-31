<?php


namespace app\controllers\admin;


use app\models\admin\Currency;
use app\models\admin\FilterGroup;

class CurrencyController extends AppController {
    public function indexAction(){
        $currencies = \R::findAll('currency');
        $this->setMeta('Shop currencies');
        $this->set(compact('currencies'));
    }

    public function addAction(){
        if(!empty($_POST)) {
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base']? '1': '0';
            if (!$currency->validate($data)) {
                $currency->getErrors();
                redirect();
            }
            if ($currency->save('currency', false)) {
                $_SESSION['success'] = 'Save has been saved';
                redirect();
            }
        }
        $this->setMeta('New currency');
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
            if(!$currency->validate($data)){
                $currency->getErrors();
                redirect();
            }
            if($currency->update('currency', $id)){
                $_SESSION['success'] = "Изменения сохранены";
                redirect();
            }
        }

        $id = $this->getRequestID();
        $currency = \R::load('currency', $id);
        $this->setMeta("Currency editing");
        $this->set(compact('currency'));
    }

    public function deleteAction(){
        $id = $this->getRequestId();
        $currency = \R::load('currency', $id);
        \R::trash($currency);
        $_SESSION['success'] = 'All has been saved';
        redirect();
    }
}