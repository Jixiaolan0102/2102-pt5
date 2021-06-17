<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
class Ding extends Controller
{
    //登录1
    public function ding()
    {
        return $this->fetch();        //显示登录页面
    }

    //登录逻辑
    public function ding1()
    {
        $name = $_POST['name'];           //接受登录传过来的值
        $pass = $_POST['pass'];           //接受登录传过来的值
        $awm = Db::table('biao')->where('name', $name)->where('pass', $pass)->select();   //找到表中的值
        //登录历史
        //记录登录历史
            $history =[
                'uid' =>$awm[0]['biaoid'],
                'login_time' =>time(),
                'login_ip' =>$_SERVER['REMOTE_ADDR'],
                'ua' =>$_SERVER['HTTP_USER_AGENT']
            ];
            Db::table('login_history')->insert($history);     //把登录历史添加但登录历史的表中
            Session::set('biaoid',$awm[0]['biaoid']);
            Session::set('name',$awm[0]['name']);
        if ($name == '' || $pass == '') {               //判断输入的东西是否正确
            $this->success('不能为空', 'ding');
        } else if ($awm) {
            Session::set('biaoid', $awm[0]['biaoid']);
            Session::set('biao', $awm[0]['name']);
            $this->success('登录成功', 'ding3');
        } else {
            $this->success('账号密码不正确', 'ding');
        }
        return $this->fetch();
    }
    //退出登录
    public function tui()
    {
        Session::delete('biaoid');           //删除登录的ID
        Session::delete('name');             //删除登录的名字
        return redirect('ding');               //跳转登录页面
    }
    //个人中心3
    public function ding3()
    {
        $var =Session::get();

        //判断是否登录
        if($var){
        }else{
            $this->success('未登录','ding');
            die;
        }
        $login_id =Session::get('biaoid');
        $u =Db::table('biao')->field('biaoid,name,email')->where('biaoid',$login_id)->find();
//        查询数据库用户信息
        $history =Db::table('login_history')->where('uid',$login_id)->select();
//        处理字段
        foreach ($history as $k=>$v){
            $history[$k]['login_time']=date('Y-m-d H:i:s',$v['login_time']);
        }
        $this->assign('name',$u['name']);
        $this->assign('email',$u['email']);
        $this->assign('history',$history);
        return $this->fetch();
    }

    // 预定座位5
    public function ding4()
    {
        $seat = Db::table('seat')->select();             //找到数据库
        $this->assign('seat',$seat);
        return $this->fetch();
    }
    //预定作为逻辑
    public function ding5()
    {
        echo "<pre>";print_r($_POST);echo "<pre>";
        $sess = Session::get();                 //判断是否登录
        if(empty($sess['biaoid']) && empty($sess['name'])){
            $this->success('请先登录','ding');
        }
        Db::table('seat')->where('zuo_number',$_POST['wei'])->update(['state'=>'已']);    //根据提交数据修改表内容
    }
    //取消预选
    public function qu()
    {
        $sess = Session::get();
        Db::table('seat')->where('zuo_number',$_POST['wei'])->update(['state'=>'未']);   //根据提交数据修改表内容

    }
    //我的订单
    public function ding6()
    {

        return $this->fetch();
    }
}
