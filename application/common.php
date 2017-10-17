<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use app\user\model\Users;
// 应用公共文件

function queryroot($block){
	if(!empty(session('rootlist'))){
		//echo $role->rootlist;
		$b1=json_decode(session('rootlist'),true);
		//print_r($b1);
		//print_r($block);
		foreach($block as $key=>$val){
			if(empty($b1[$key])){
				return false;
			}
			foreach($val as $k=>$v){
				if(empty($b1[$key][$k])){
					return false;
				}
				if($b1[$key][$k]!=$v){
					return false;
				}
			}
		}
		return true;
	}else{
		return Users::need_login();
	}
}

function islogined(){
	
	return Users::is_login();

}

function needlogined(){
	
	return Users::need_login();

}

function unicode($str){
	if(empty($str)){
		return false;
	}
	return preg_replace_callback("/\\\u([0-9a-f]{4})/i",function($maches){
		//return mb_convert_encoding(pack('H*',$maches[1]),'UTF-8','UCS-2BE');
		return iconv('UCS-2BE','UTF-8',pack('H4',$maches[1]));
	},$str);
}