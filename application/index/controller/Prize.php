<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
class Prize extends Controller
{
    public function prize()
    {
        $id =Session::get('biaoid');
//        var_dump($id);die;
        if($id){
//            $this->success('登录成功','prize');
        }else{
            $this->success('未登录','/login1');
        }
        $time =time();
        $before =$time -60;
        echo "当前时间戳".$time.'>>'.date('Y-m-d H:i:s',$time);echo '</br>';
        echo "一分钟之前时间".$before.'>>'.date('Y-m-d H:i:s',$before);echo '</br>';
        $num =Db::table('prize')->where('uid',$id)->where('add_time','>',$before)->count();
//        var_dump($num);die;
        if($num>=3){
            echo "抽奖次数受限";
            die();
        }
        if($num>10){
            echo "抽奖次数上线";
            die;
        }
        echo "<br>";

        $sui =intval(mt_rand(1,100));
        echo "生成中奖数字： ";"<pre>";print_r($sui);"</pre>";

        echo "<br>";
        if($sui==1){
            echo "恭喜获得一等奖";
        }else if($sui==2||$sui==3){
            echo "恭喜获得二等奖";
        }else if($sui==4||$sui==5||$sui==6){
            echo "恭喜获得三等奖";
        }
        $data =[
            'uid'  =>$id,
            'add_time'  =>$time,
            'add_num'  =>$sui
        ];
        Db::table('prize')->insert($data);
        return $this->fetch();
    }

}


