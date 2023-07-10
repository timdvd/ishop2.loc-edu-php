<?php


namespace app\controllers\admin;


use app\models\admin\FilterAttr;
use app\models\admin\FilterGroup;

class FilterController extends AppController{

    public function attributeGroupAction(){
        $attrs_group = \R::findAll('attribute_group');
        $this->setMeta('Filter group');
        $this->set(compact('attrs_group'));
    }

    public function attributeAction(){
        $attrs = \R::getAssoc("SELECT attribute_value.*, attribute_group.title FROM 
attribute_value JOIN attribute_group ON attribute_group.id = attribute_value.attr_group_id");
        $this->setMeta('Filters');
        $this->set(compact('attrs'));
    }

    public function groupDeleteAction(){
        $id = $this->getRequestId();
        $count = \R::count('attribute_value', 'attr_group_id = ?', [$id]);
        if($count){
            $_SESSION['error'] = "Can't delete this";
            redirect();
        }else{
            \R::exec('DELETE FROM attribute_group WHERE id = ?', [$id]);
            $_SESSION['success'] = 'Deleted';
            redirect();
        }
    }

    public function groupAddAction(){
        if(!empty($_POST)){
            $group = new FilterGroup();
            $data = $_POST;
            $group->load($data);
            if(!$group->validate($data)){
                $group->getErrors();
                redirect();
            }
            if($group->save('attribute_group', false)){
                $_SESSION['success'] = 'Group has been added';
                redirect();
            }
        }
        $this->setMeta('New group of filters');
    }
    public function attributeEditAction(){
        if(!empty($_POST)){
            $id = $this->getRequestId(false);
            $attr = new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if(!$attr->validate($data)){
                $attr->getErrors();
                redirect();
            }
            if($attr->update('attribute_value', $id)){
                $_SESSION['success'] = 'All saved';
                redirect();
            }
        }
        $id = $this->getRequestId();
        $attr = \R::load('attribute_value', $id);
        $attrs_group = \R::findAll('attribute_group');
        $this->setMeta('Attr editing');
        $this->set(compact('attr', 'attrs_group'));
    }

    public function attributeAddAction(){
        if(!empty($_POST)){
            $attr = new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if(!$attr->validate($data)){
                $attr->getErrors();
                redirect();
            }
            if($attr->save('attribute_value', false)){
                $_SESSION['success'] = 'Attr has been added';
                redirect();
            }
        }
        $group = \R::findAll('attribute_group');
        $this->setMeta('New filter');
        $this->set(compact('group'));
    }

    public function groupEditAction(){
        if(!empty($_POST)){
            $id = $this->getRequestId(false);
            $group = new FilterGroup();
            $data = $_POST;
            $group->load($data);
            if(!$group->validate($data)){
                $group->getErrors();
                redirect();
            }
            if($group->update('attribute_group', $id)){
                $_SESSION['success'] = 'Save has been saved';
                redirect();
            }
        }
        $id = $this->getRequestId();
        $group = \R::load('attribute_group', $id);
        $this->setMeta("Group editing {$group->title}");
        $this->set(compact('group'));
    }

    public function attributeDeleteAction(){
        $id = $this->getRequestId();
        \R::exec("DELETE FROM attribute_product WHERE attr_id = ?", [$id]);
        \R::exec("DELETE FROM attribute_value WHERE id = ?", [$id]);
        $_SESSION['success'] = 'Deleted';
        redirect();
    }


}