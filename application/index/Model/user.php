<?php
namespace app\index\Model;
use think\Controller;
use think\Db;
use think\Model;
//引入User模型
use app\index\model\User as u;
class User extends Model{

    //指定当前模型使用的表
    protected $table = 'users';

    //指定表的主键
    protected $pk ='userid';

}
