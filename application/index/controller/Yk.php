<?php
    namespace app\index\controller;
    use think\Controller;
    use think\Db;
    use think\facade\Session;
    class Yk extends Controller
    {
        //登录页面
        public function yk1()
        {
            return $this->fetch();
        }
        //登录逻辑
        public function yk2()
        {
            $name =$_POST['name'];
            $price =$_POST['price'];
            $number =$_POST['number'];
            $is_sale =$_POST['is_sale'];
            $data =[
                'book_name'    =>$name,
                'book_price'   =>$price,
                'book_num'     =>$number,
                'is_sale'      =>$is_sale
            ];
            $u =Db::table('book')->insert($data);
            if($u){
                $this->success('添加成功','yk3');
            }else{
                $this->success('添加失败','yk1');
            }
            return $this->fetch();
        }
        //列表
        public function yk3()
        {
            $list =Db::table('book')->select();
            $this->assign('list',$list);
            return $this->fetch();
        }
        //删除
        public function sha($id)
        {
//            echo $id;die;
            $ido =Db::table('book')->where('book_id',$id)->delete();
            if($ido){
                $this->success('删除成功','yk3');
            }else{
                echo "删除失败";
            }
//            return $this->fetch();
        }
        //修改
        public function gai($ab)
        {
            echo $ab;die;
            $add =Db::table('book')->where('book_id',$ab)->select();
            return $this->fetch();
        }
        //修改逻辑
        public function gai2()
        {


        }
    }