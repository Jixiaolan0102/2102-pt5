<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
class Movie extends Controller
{
    //登录
    public function deng()
    {
        return $this->fetch();
    }
    //登录逻辑
    public function deng2()
    {
        $name =$_POST['name'];
        $pass =$_POST['pass'];
        $awm =Db::table('biao')->where('name',$name)->where('pass',$pass)->select();
        if($name==""||$pass==""){
            Session::set('biaoid',$awm[0]['biaoid']);
            Session::set('biao',$awm[0]['name']);
            $this->success('不能为空','deng');
        }else if($awm){
            $this->success('登录成功','mov');
        }else{
            $this->success('登录失败','deng');
        }
        return $this->fetch();

    }

    //列表
    public function mov()
    {
        $si =Db::table('movies')->select();

        foreach ($si as $k=>$v){
            $id =$v['id'];
            $score =ceil(Db::table('movie_score')->where('movie_id',$id)->avg('score'));
            $si[$k]['score']=$score;
        }

        $this->assign('list',$si);
        $this->assign('movies',$si);
        return $this->fetch();
    }
    public function mov2()
    {
        return $this->fetch();
    }

    //电影评分逻辑
    public function vote()
    {
        $uid =Session::get('biaoid');
        //判断用户是否登录
        if($uid){

        }else{
            $this->success('未登录','deng');
        }
        foreach ($_POST as $k=>$v){
            if(intval($v)==0){
                $this->success('评分不等为空','mov');die;

            }
            if($v<0){
                $this->success('评分不等小于0分','mov');die;
            }else if($v>100){
                $this->success('评分不等大于100分','mov');die;
            }

            $data =[
                'movie_id'  =>$k,
                'score'     =>$v,
                'uid'       =>$uid
             ];
            Db::table('movie_score')->insert($data);

        }
    }

}