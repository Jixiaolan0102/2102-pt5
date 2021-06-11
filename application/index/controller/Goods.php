<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Goods extends Controller
{
    //商品列表
    public function goods($id=0)
    {
//        $goods_id =3192;
        $u =Db::name('p_goods')->where('goods_id',$id)->find();
//        var_dump($u);die;
        $this->assign('name',$u['goods_name']);
        $this->assign('price',$u['shop_price']);
        $this->assign('time',date('Y-m-d H:i:s',$u['add_time']));
        return $this->fetch();
    }

}
