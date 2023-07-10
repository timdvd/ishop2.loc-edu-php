<?php


namespace app\controllers\admin;


use ishop\Cache;

class CacheController extends AppController{

    public function indexAction(){
        $this->setMeta('Cache clearing');
    }
    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch($key){
            case 'category':
                $cache->delete('cats');
                $cache->delete('ishop_menu');
                break;
            case 'filter':
                $cache->delete('filter-group');
                $cache->delete('filter-attrs');
                break;
        }
        $_SESSION['success'] = 'Selected cache has been deleted';
        redirect();

    }
}