<?php
    namespace app\index\controller;
    use think\Controller;
    use think\Db;
    use think\facade\Session;
    class Yk extends Controller
    {
        public function yk1()
        {
            return $this->fetch();
        }
        public function yk22()
        {
            $num =Db::table('book')->insert($_POST);
            if($num){
                echo "添加成功";
                $this->success('注册成功','daile');
            }else{
                echo "添加失败";
            }
//            return $this->fetch();
        }

        //列表
        public function daile()
        {
            $list =Db::table('book')->limit(10)->select();
            $this->assign('list',$list);
            return $this->fetch();
        }
        //删除
        public function del($id)
        {
//            echo $id;
            $delete =Db::table('book')->where('book_id',$id)->delete();
            if($delete){
                echo "删除成功";
                $this->success('删除成功','daile');
            }else{
                echo "删除失败";
            }
        }
    }