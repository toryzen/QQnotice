<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action {
    public function index(){
        $admin = session('admin');
		$this->assign('admin',$admin);
		$Getdata = M('qqname');
		import("ORG.Util.Page"); 
		$count = $Getdata->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$data =$Getdata->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('data',$data);
		$this->display();	
    }
	
    public function change(){
		$id = $_GET['id'];
		$Getdata = M('qqname');
		$data =$Getdata->where('id='.$id)->find();
		$this->assign('data',$data);
		$this->display();
		if($this->isPost()){
		$cdata[qqname] = $_POST['qqname'];
		$cdata[qqnum] = $_POST['qqnum'];
		$cdata[realname] = $_POST['realname'];
		//print_r($cdata);
		$Getdata->where('id='.$id)->setField($cdata);
		echo "<script>alert('客户资料修改成功');</script>";
		$url = U('User/index');
		redirect($url ,0,'');
		}
    }	
    public function add(){
		$this->display();
		if($this->isPost()){
		$Getdata = M('qqname');
		$cdata[qqname] = $_POST['qqname'];
		$cdata[qqnum] = $_POST['qqnum'];
		$cdata[realname] = $_POST['realname'];
		$Getdata->add($cdata);
		echo "<script>alert('客户添加成功');</script>";
		$url = U('User/index');
		redirect($url ,0,'');
		}
    }	
	
}