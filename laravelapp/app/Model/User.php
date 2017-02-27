<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Request;
use Hash;

class User extends Model
{
    /*注册API*/
    public function signup()
    {
        //检查是否传了用户名和密码的值
        $check = $this->has_username_and_password();
        if (!$check)
            return ['status' => 0, 'msg' => '用户名和密码皆不可为空'];
        $username = $check[0];
        $password = $check[1];

        //查看用户名是否存在
        $user_exists = $this->where('username', $username)->exists();
        if ($user_exists)
            return ['status' => 0, 'msg' => '用户名已存在'];

        //加密密码
        $hashed_password = bcrypt($password);

        //存入数据库
        $this->username = $username;
        $this->password = $hashed_password;
        if ($this->save())
            return ['status' => 1, 'id' => $this->id];
        else
            return ['status' => 0, 'msg' => '保存失败'];
    }

    /*登录API*/
    public function login()
    {
        //检查是否传了用户名和密码的值
        $check = $this->has_username_and_password();
        if (!$check)
            return ['status' => 0, 'msg' => '用户名和密码皆不可为空'];
        $username = $check[0];
        $password = $check[1];

        //检查用户是否存在
        $user = $this->where('username', $username)->first();
        if (!$user) {
            return ['status' => 0, 'msg' => '用户名不存在'];
        }

        //检查密码是否正确
        $hashed_password = $user->password;
        if (!Hash::check($password, $hashed_password))
            return ['status' => 0, 'msg' => '密码有误'];

        //存入session
        session()->put('username', $user->username);
        session()->put('user_id', $user->id);
        return ['status' => 1, 'id' => $user->id];
    }

    public function has_username_and_password()
    {
        //获取参数
        $username = Request::input('username');
        $password = Request::input('password');
        //检查用户名和密码是否为空
        if ($username && $password)
            return [$username, $password];
        return false;
    }

    /*登出API*/
    public function logout()
    {
        //删除session
        session()->forget('username');
        session()->forget('user_id');
        return ['status' => 1];
    }

    /*检测用户是否登录*/
    public function is_logged_in()
    {
        return session('user_id') ?: false;
    }


}
