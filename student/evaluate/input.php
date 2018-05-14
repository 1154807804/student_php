<?php
class input{
	// 定义函数，对数据进行检查
	function post($content){
		if($content==''){
			return false;
		}

		// 禁止使用的用户名
		$n=['张三','李四','王五'];

		foreach ($n as $name) {
			if($content==$name){
				return false;
			}
		}
		return true;
	}
}