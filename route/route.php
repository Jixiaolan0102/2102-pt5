<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
     //当用户访问时xxx.com/hello/zhangsan ,找到index控制器中的hello方法
Route::get('hello/:name', 'index/hello');
route::get('login','index/login');
Route::get('user/reg','index/reg');
Route::get('user/goodsList','index/goodsList');
//查询所有学生信息
Route::get('s','Student/select');
//查询年龄大于20的学生信息
Route::get('a','Student/age');
//查询年龄小于18的学生信息
Route::get('b','Student/age1');
//查询性别为女的信息
Route::get('c','Student/sex');
//查询性别为男的信息
Route::get('d','Student/sex1');
//查询综合计分在150份以上的同学信息
Route::get('e','Student/score');
//查询综合计分小于59份的姓名年龄
Route::get('f','Student/score1');
//查询年龄在18-25岁之间的学生信息
Route::get('g','Student/age2');
//查询女同学年龄小于20的学生姓名 年龄
Route::get('h','Student/age3');
//查询id为5的一条数据
Route::get('r','Student/id');
//查询综合计分在150份以下的同学信息
Route::get('j','Student/score2');
//查询id在5-10之间的学生积分
Route::get('k','Student/score3');
//随机生成字符串
Route::get('ran','Student/ran');
Route::get('sui','Student/sui');







//用户注册
Route::get('reg1','User/reg1');
Route::post('reg1','User/reg2');
//个人中心
Route::get('center','User/center');
//登录
Route::get('login1','User/login1');
//登录逻辑
Route::post('loginDO','User/loginDO');
//商品详情
Route::get('goods/:id', 'goods/detail');         //商品详情
Route::get('goodslist','User/goodsList');
//退出登录
Route::get('sha', 'User/sha');



//月考
Route::get('yk11', 'Yk/yk1');
Route::post('yk22', 'Yk/yk22');

//列表展示
Route::get('daile', 'Yk/daile');
//闪出
Route::get('del/:id', 'Yk/del');


//6、15
//登录
Route::get('deng', 'Movie/deng');
//登录逻辑
Route::post('deng2', 'Movie/deng2');
//列表
Route::post('mov', 'Movie/mov');
Route::post('mov2', 'Movie/mov2');
//电影评分
Route::post('vote', 'Movie/vote');


//抽奖练习
Route::get('prize', 'Prize/prize');

//定座
Route::get('ding', 'Ding/ding');      //登录
Route::post('ding1', 'Ding/ding1');   //登录逻辑
Route::post('ding3', 'Ding/ding3');      //个人中心
Route::get('tui', 'Ding/tui');        //退出登录
Route::get('ding4','Ding/ding4');    // 预定座位
Route::post('ding5','Ding/ding5');     //预定作为逻辑
Route::post('qu','Ding/qu');     //取消预定
Route::post('ding6','Ding/ding6');     //我的订单

//数据统计
Route::get('info', 'Info/info');










return [

];
