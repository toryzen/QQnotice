<?php
// 本类由系统自动生成，仅供测试用途
class HomeAction extends Action {
    public function index(){
        $admin = session('admin');
		$this->assign('admin',$admin);
		$Getdata = M('qqnotic');
		import("ORG.Util.Page"); 
		$count = $Getdata->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$data =$Getdata->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$Getbtype = M('btype');
		$Getqqname = M('qqname');
		for($i=0;$i<count($data);$i++){
		$btype = $Getbtype->where('id=\''.$data[$i][btype].'\'')->find();
		if(!$data[$i][content])$data[$i][content] = $btype[content];
		$data[$i][btype] = $btype[type];
		$qqname = $Getqqname->where('id=\''.$data[$i][userid].'\'')->find();
		$data[$i][name] = $qqname[realname];
		$data[$i][qqnum] = $qqname[qqnum];
		if($data[$i][isok])$data[$i][isok]='<font color="#009900" >已推送</font>'; else $data[$i][isok]='<font color="#CC0000">等待中</font>';
		}
		$this->assign('page',$show);
		$this->assign('data',$data);
		//print_r($data);
		$this->display();	
    }
}