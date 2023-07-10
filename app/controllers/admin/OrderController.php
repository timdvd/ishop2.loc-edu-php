<?php


namespace app\controllers\admin;
use ishop\libs\Pagination;
class OrderController extends AppController{
    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 8; //\R::count('order');
        $count = \R::count('order');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $orders = \R::getAll("SELECT `order` . `id` , `order` . `user_id`, `order` . `status`, `order` . `date`, 
`order` . `update_at`, `order`. `currency`, `user`. `name`, ROUND(SUM(`order_product` . `price`), 2) AS `sum` FROM `order`
    JOIN `user` ON `order` . `user_id` = `user` . `id` JOIN `order_product` ON `order` . `id` = `order_product`.`order_id` 
    GROUP BY `order`
    . `id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage");

        $this->setMeta('Order list');
        $this->set(compact('orders', 'pagination', 'count'));
    }

    public function viewAction(){
        $order_id = $this->getRequestId();
        $order = \R::getRow("SELECT `order` . * , `user`. `name`, ROUND(SUM(`order_product` . `price`), 2) AS `sum` FROM `order`
    JOIN `user` ON `order` . `user_id` = `user` . `id` 
    JOIN `order_product` ON `order` . `id` = `order_product`.`order_id` 
    WHERE `order`. `id` = ?
    GROUP BY `order`
    . `id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1", [$order_id]);
        if(!$order){
            throw new \Exception('Page not found', 404);
        }
        $order_products = \R::findAll('order_product', "order_id = ?", [$order_id]);
        $this->setMeta("Order number {$order_id}");
        $this->set(compact('order', 'order_products'));
    }

    public function changeAction(){
        $order_id = $this->getRequestId();
        $status = !empty($_GET['status']) ? '1' : '0';
        $order = \R::load('order', $order_id);
        if(!$order_id){
            throw new \Exception('Page not found', 404);
        }
        $order->status = $status;
        $order->update_at = date("Y-m-d H:i:s");
        \R::store($order);
        $_SESSION['success'] = "Changes have been saved";
        redirect();
    }

    public function deleteAction(){
        $order_id = $this->getRequestId();
        $order = \R::load('order', $order_id);
        \R::trash($order);
        $_SESSION['success'] = 'Order has been deleted';
        redirect(ADMIN . '/order');
    }
}