<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
class Info extends Controller
{
    public function info()
    {
        //消费最多的前10个用户
        $ave =Db::table('p_order_info')->max('money_paid');
        echo "<pre>";print_r($ave); echo "</pre>";
        return $this->fetch();
    }
}