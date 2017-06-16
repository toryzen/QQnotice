<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        $this->display();
		if($this->isPost()){
		$user = $this->_post('n');
		$pass = $this->_post('p');
		$check = M('admin');
		$result = $check->where('`user`=\''.$user.'\'')->find();
		if($result[password]==$pass){	
		session('admin',$result[user]);
		echo "<script>alert('登陆成功');</script>";
		$url = U('Home/index');
		redirect($url ,0,'');
		}
		else echo "<script>alert('用户名或密码错误！');</script>";
		}
    }
}