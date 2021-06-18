<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
//引入User模型
use app\index\model\User as UserModel;
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
        $this->success('注册成功','login1');

    }
    //登录
    public function login1()
    {
        return $this->fetch();
    }
    //登录逻辑
    public function loginDO()
    {
//        echo "<pre>";print_r($_POST); echo "</pre>";
//        $user =$_POST['u'];
//        $pass =$_POST['pass'];
//        $u =Db::table('biao')->where('name',$user)->where('pass',$pass)->select();
        $name = $_POST['u'];
        $pass = $_POST['pass'];
        $awm = Db::table('biao')->where('name', $name)->where('pass', $pass)->select();
        if ($name == "" || $pass == "") {
            $this->success('不能为空', 'login1');
        } else if ($awm) {
            Session::set('biaoid', $awm[0]['biaoid']);
            Session::set('biao', $awm[0]['name']);
            $this->success('登录成功', '/prize/prize');
        } else {
            $this->success('登录失败', 'login1');
        }
    }

//        if($awm){
//        //验证密码
//        if($pass==$awm['pass'] ){
//            echo "登录成功";
//
//            //记录登录历史
//            $history =[
//                'uid' =>$awm['biaoid'],
//                'login_time' =>time(),
//                'login_ip' =>$_SERVER['REMOTE_ADDR'],
//                'ua' =>$_SERVER['HTTP_USER_AGENT']
//            ];
//            Db::table('login_history')->insert($history);
//            Session::set('biaoid',$awm['biaoid']);
//
////            跳转个人中心
//            $this->success('登录成功','center');
//        }else{
//            echo "密码失败";
//        }
//        }else{
//            echo "登录失败";
//        }
//    }
    //退出登录
    public function sha()
    {
        Session::delete('biaoid');
        Session::delete('name');
        return redirect('/');
    }
    //个人中心
    public function center()
    {
        //判断用户登录状态
        $sess =Session::get('biaoid');
        if(empty($sess)&&empty($sess['name'])){
            //未登录
            return redirect('center');
        }
//        $u =Db::table('biao')->field('biaoid,name,email')->where('biaoid',$sess)->find();
////        查询数据库用户信息
////        $history =Db::table('login_history')->where('uid',$sess)->select();
////        处理字段
//
//        foreach ($history as $k=>$v){
//            $history[$k]['login_time']=date('Y-m-d H:i:s',$v['login_time']);
//        }
//        $this->assign('name',$u['name']);
//        $this->assign('email',$u['email']);
//        $this->assign('history',$history);
//        return $this->fetch();
    }


}
