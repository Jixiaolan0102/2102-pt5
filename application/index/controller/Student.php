<?php
namespace app\index\controller;
use think\Db;
class Student
{
    //查询所有学生信息
    public function select(){
        $list =Db::table('SthDent')->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询年龄大于20的学生信息
    public function age(){
        $list =Db::table('SthDent')->where('age','>',20)->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询年龄小于18的学生信息
    public function age1(){
        $list =Db::table('SthDent')->where('age','<',18)->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询性别为女的信息
    public function sex(){
        $list =Db::table('SthDent')->where('sex','=',1)->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询性别为男的信息
    public function sex1(){
        $list =Db::table('SthDent')->where('sex','=',0)->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询综合计分在150份以上的同学信息
    public function score(){
        $list =Db::table('SthDent')->where('score','>',150)->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }

    //查询综合计分小于59份的姓名年龄
    public function score1(){
        $list =Db::table('SthDent')->where('score','<',59)->field('name,age,score')->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询年龄在18-25岁之间的学生信息
    public function age2(){
        $list =Db::table('SthDent')->where('age','>',18,'and','<',25)->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询女同学年龄小于20的学生姓名 年龄
    public function age3(){
        $list =Db::table('SthDent')->where('age','<',20)->where('sex',1)->field('name,age')->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询id为5的一条数据
    public function id(){
        $list =Db::table('SthDent')->where('id',5)->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询综合计分在150份以下的同学信息
    public function score2(){
        $list =Db::table('SthDent')->where('score','<',150)->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //查询id在5-10之间的学生积分
    public function score3(){
        $list =Db::table('SthDent')->where('id','between','5,10')->field('score')->select();
        echo "<pre>";print_r($list); echo "</pre>";
    }
    //随机100条数据
    public  function sui()
    {
        for($i=0;$i<100;$i++){
            $name =$this->ran(3);
            $sex =mt_rand(0,1);
            $age =mt_rand(15,40);
            $score =mt_rand(30,150);

            $data =[
              'name' =>$name,
              'sex' =>$sex,
              'age' =>$age,
              'score' =>$score
            ];
            Db::table('SthDent')->insert($data);
        }
    }
    //随机生成字符串
    private function ran($num=3)
    {
        $str0 ='ABCDEFGHRJKLMNOPQISTUVWXYZabcdefghrjklmn';
        $res ="";
        for($i=0;$i<$num;$i++){
            $red =mt_rand(0,39);
            $res .=$str0[$red];
        }
        return $res;
    }
}