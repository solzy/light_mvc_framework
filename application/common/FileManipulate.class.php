<?php
//文件操作类

class FileManipulate {
	
	private $filename;
	private $filemode = 'w';
	private $fp;
	
	function __construct( $filename ){
		$this->filename = $filename;
	}
	
	function __destruct(){
		fclose($this->fp);
	}
	/**
	 * function createFile() 新创建一个文件
	 * @param $mode 文件模式
	 */
	public function createFile(  ){
		if($this->fp = fopen($this->filename ,$this->filemode)){
			@chmod($filename, 0775);
		}else{
			echo "文件创建失败\n";
			return false;
		}
		return true;
	}
	
	/**
	 * writerFile() 写文件方法
	 * @param  $string 写入文件的字符串
	 * @return boolean  
	 */
	public function writerFile( $string ){
		if(fwrite( $this->fp, $string , strlen($string)))
			return true;
		else 
			return false;
	}
	
	/** 文件下载
	 * @file_name     下载文件名
	 * @file_dir      下载文件存放目录
	 */
	public function fileDownload($file_name , $file_dir ){
		
		//检查文件是否存在
		if (! file_exists ( $file_dir . $file_name )) {
			return  false;
		} else {
			//打开文件
			$file = fopen ( $file_dir . $file_name, "r" );
			//输入文件标签
			Header ( "Content-type: application/octet-stream" );
			Header ( "Accept-Ranges: bytes" );
			Header ( "Accept-Length: " . filesize ( $file_dir . $file_name ) );
			Header ( "Content-Disposition: attachment; filename=" . $file_name );
			//输出文件内容
			//读取文件内容并直接输出到浏览器
			echo fread ( $file, filesize ( $file_dir . $file_name ) );
			fclose ( $file );
			exit();
		}
	}
}
