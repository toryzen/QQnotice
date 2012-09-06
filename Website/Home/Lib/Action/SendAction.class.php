<?php
// 本类由系统自动生成，仅供测试用途
class SendAction extends Action {
    public function index(){
        $admin = session('admin');
		$this->assign('admin',$admin);
		
		/**********************静态数据*******************************/
		$this->assign('hall',U('Home/index'));
		$this->assign('send',U('Send/index'));
		
		/**********************静态数据*******************************/
		$btype = M('btype');
		$type = $btype->where('id > 0')->order('id asc')->select();
		$this->assign('type',$type);

		$qqname = M('qqname');
		$qname = $qqname->select();
		$this->assign('qqname',$qname);
		//print_r($type);
		
		//print_r($data);
		$this->display();	
		
		if($this->isPost()){
		$getdata[userid	] = $_POST['user'];
		$getdata[btype] = $_POST['type'];
		$getdata[uptime] = time();
		$getdata[isok] = 0;
		if($getdata[btype]==0)$getdata[content] = $_POST['content'];
		$indata = M("qqnotic");
		$indata->add($getdata);
		//echo "<script><alert('提醒消息已经加入队列。')/script>";
		$url = U('Home/index');
		Redirect($url,0,'');
		
		}
    }
}