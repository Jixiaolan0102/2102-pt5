<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class User extends Controller
{
    //用户注册
    public function reg1()
    {
//        echo __METHOD__;
        return $this->fetch();
    }

    public function reg2()
    {
        echo "<pre>";print_r($_POST); echo "</pre>";

    }
}
