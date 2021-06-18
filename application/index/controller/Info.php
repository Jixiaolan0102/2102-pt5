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
        $list =Db::table('p_order_info')->alias('b')
        ->field('a.user_id,a.user_name,a.reg_time,sum(b.goods_amount) as total')
        ->join('p_users a','a.user_id=b.user_id')
        ->group('b.user_id')
        ->order('total','desc')
        ->limit(10)
        ->select()
        ;
        dump($list);
    }
    public function info2()
    {
        // 订单最多的前10个用户信息
        $a =Db::table('p_order_info')->where('consignee,order_amount')
//            ->order('order_amount','desc')
//        ->limit(10)
//            ->select()
        ;
        dump($a);
    }
}