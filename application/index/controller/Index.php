<?php
namespace app\index\controller;

class Index extends \think\Controller{
    public function index(){
		return $this->fetch('index/index');
	}
	
	public function Regsister(){
		return $this->fetch('regsister/regsister');
	}
}