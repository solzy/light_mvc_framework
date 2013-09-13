<?php
class UploadFile {
	/**
	 * 记录原文件名
	 * @var string $originalname
	 * @access private
	 */
	public $originalname;
	/**
	 * 记录目标文件名
	 * @var string $targetname
	 * @access private
	 */
	public  $targetname;
	/**
	 * 允许的上传文件类型
	 * @var array $allowFileTypes
	 * @access private
	 */
//	private $allowFileTypes = array('doc','docx','pdf');
//20130526
    private $allowFileTypes = array('msword','pdf');

	/**
	 * 允许的上传文件大小，单位字节
	 * @var int $maxFileSize
	 * @access public
	 */
	public $maxFileSize = 8388608;

	/**
	 * 构造函数
	 */
	public function __construct() {

	}

	/**
	 * 设置允许的文件类型
	 * @param $fileTypes 文件类型列表可以是数组和字符串，用“,”号隔开
	 * @return void
	 * @access public
	 */
	public function setAllowFileType($fileTypes) {
		if (!is_array($fileTypes)) {
			$this->allowFileTypes = explode(',', $fileTypes);
		} else {
			$this->allowFileTypes = $fileTypes;
		}
		return;
	}

	/**
	 * 上传文件
	 * @param string $fileField  要上传的文件如$_FILES['file']
	 * @param string $destFolder 上传的目录，会自动建立
	 * @param string $fileTypes   上传后文件命名方式0使用原文件名1使用当前时间戳作为文件名
	 * @return int
	 * @access public
	 */
	public function upload($fileField, $destFolder = UPLOADS, $fileNameType = 1) {
		$destFolder .= '/';
	//	echo "error=".$fileField['error'].'<br>';
		switch ($fileField['error']) {
			case 0 ://UPLOAD_ERR_OK : //其值为 0，没有错误发生，文件上传成功。
				$upload_succeed = true;
				break;
			case 1 ://UPLOAD_ERR_INI_SIZE : //其值为 1，上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。
			case 2 ://UPLOAD_ERR_FORM_SIZE : //其值为 2，上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。
				$errorMsg = '稿件上传失败！失败原因：稿件大小超出限制！';
				$errorCode = -103;
				$upload_succeed = false;
				break;
			case 3 ://UPLOAD_ERR_PARTIAL : //值：3; 文件只有部分被上传。
				$errorMsg = '稿件上传失败！失败原因：稿件只有部分被上传！';
				$errorCode = -101;
				$upload_succeed = false;
				break;
			case 4 ://UPLOAD_ERR_NO_FILE : //值：4; 没有稿件被上传。
				$errorMsg = '稿件上传失败！失败原因：没有稿件被上传！';
				$errorCode = -102;
				$upload_succeed = false;
				break;
			case 6 ://UPLOAD_ERR_NO_TMP_DIR : //其值为 6，找不到临时稿件夹。
				$errorMsg = '稿件上传失败！失败原因：找不到临时稿件夹！';
				$errorCode = -102;
				$upload_succeed = false;
				break;
			case 7 ://UPLOAD_ERR_CANT_WRITE : //其值为 7，稿件写入失败。
				$errorMsg = '稿件上传失败！失败原因：稿件写入失败！';
				$errorCode = -102;
				$upload_succeed = false;
				break;
			default : //其它错误
				$errorMsg = '稿件上传失败！失败原因：其它！';
				$errorCode = -100;
				$upload_succeed = false;
				break;
		}
		if ($upload_succeed) {
			if ($fileField['size']>$this->maxFileSize) {
				$errorMsg = '稿件上传失败！失败原因：稿件大小超出限制！';
				$errorCode = -103;
				$upload_succeed = false;
			}
			if ($upload_succeed) {
              	$fileExt = explode('/',$fileField['type']);
				if (!in_array(strtolower($fileExt[1]),$this->allowFileTypes)) {
					$errorMsg = '稿件上传失败！失败原因：稿件类型不被允许！';
					$errorCode = -104;
					$upload_succeed = false;
				}
			}
		}
		if ($upload_succeed) {
			if (!is_dir($destFolder) && $destFolder!='./uploads/' && $destFolder!='../') {
				$dirname = '';
				$folders = explode('/',$destFolder);
				foreach ($folders as $folder) {
					$dirname = $folder . '/';
					if ($folder!='' && $folder!='.' && $folder!='..' && !is_dir($dirname)) {
						mkdir($dirname);
					}
				}
				chmod($destFolder,0777);
				//获取源文件名
				$this->originalname=$fileField . $dot . $fileExt;
			}
				
			switch ($fileNameType) {
				case 1:
					$fileName = date('YmdHis');
					$dot = '.';
					$fileFullName = $fileName . $dot . $fileExt[1];
					$i = 0;
					//判断是否有重名稿件
					while (is_file($destFolder . $fileFullName)) {
						$fileFullName = $fileName . $dot . $fileExt[1]. $i++ ;
					}
					//获取目标文件名
					$this->targetname=$fileFullName;
					break;
				case 2:
					$fileFullName = date('YmdHis');
					$i = 0;
					//判断是否有重名稿件
					while (is_file($destFolder . $fileFullName)) {
						$fileFullName = $fileFullName . $i++;
					}
					break;
				default:
					$fileFullName = $fileField['name'];
					break;
			}
			//die($destFolder . $fileFullName);
			//$tempfile = $fileField['tmp_name'];
			if (move_uploaded_file($fileField['tmp_name'], $destFolder . $fileFullName)) {
				return $fileFullName;
			} else {
				$errorMsg = $destFolder.$fileFullName." 稿件上传失败！失败原因：本地稿件系统读写权限出错！";
				$errorCode = -105;
				$upload_succeed = false;
			}
		}
		if (!$upload_succeed) {
			throw new Exception($errorMsg,$errorCode);
		}
	}
	//public function get($propertyname){
	//	return isset($this->$propertyname) ? $this->$propertyname : null;		
	//}
}
