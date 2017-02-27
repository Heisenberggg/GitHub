<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Request;

class Question extends Model
{
    /*添加问题API*/
    public function add()
    {
        /*检查用户是否登录*/
        if (!user_ins()->is_logged_in())
            return ['status' => 0, 'msg' => '用户未登录'];

        /*检查是否存在标题*/
        if (!Request::get('title'))
            return ['status' => 0, 'msg' => '标题不可为空'];

        /*组装数据*/
        $this->title = Request::get('title');
        $this->user_id = session('user_id');
        if (Request::get('desc'))   //如果有就添加描述
            $this->desc = Request::get('desc');

        /*入库并返回状态*/
        return $this->save() ?
            ['status' => 1, 'id' => $this->id] :
            ['status' => 0, 'msg' => '入库失败'];
    }

    /*修改问题API*/
    public function change()
    {
        if (!user_ins()->is_logged_in())
            return ['status' => 0, 'msg' => '用户未登录'];

        if (!Request::get('id'))
            return ['status' => 0, 'msg' => 'id is required'];

        $question = $this->find(Request::get('id'));
        if ($question->user_id != session('user_id'))
            return ['status' => 0, 'msg' => '只有作者才可以更改此条问题'];

        if (Request::get('title'))
            $question->title = Request::get('title');

        if (Request::get('desc'))
            $question->desc = Request::get('desc');

        return $question->save() ?
            ['status' => 1, 'id' => $question->id] :
            ['status' => 0, 'msg' => '更新失败'];

    }

    /*查看问题API*/
    public function read()
    {
        if (Request::get('id'))
            return $this->find(Request::get('id'));

        /*limit条件*/
        $limit = Request::get('limit') ?: 10;
        /*skip条件*/
        $skip = (Request::get('page') ? Request::get('page') - 1 : 0) * $limit;

        /*构建query并返回collection数据*/
        $result = $this ->orderby('created_at')
                        ->limit($limit)
                        ->skip($skip)
                        ->get(['id', 'title', 'desc', 'user_id', 'created_at', 'updated_at'])
                        ->keyby('id');

        return ['status' => 1,'data' => $result];
    }
}
