<?php
// 分页类
class DivPage {
	
	/**
	 * 记录偏移量
	 * @var int $offset
	 * @access private
	 */
	private $offset;
	
	/**
	 * 分页效果
	 * @var string $display
	 * @access private
	 */
	private $display;
	
	/**
	 * 每页的大小
	 * @var int $pagesize
	 * @access private
	 */
	private $pagesize;
	
	/**
	 * 记录总行数
	 * @var int $rowcount
	 * @access private
	 */
	private $rowcount;
	
	/**
	 * 记录总页数
	 * @var int $pagecount
	 * @access private
	 */
	private $pagecount;
	
	/**
	 * 当前页面
	 * @var int $curpage
	 * @access private
	 */
	private $curpage;
	
	/**
	 * 当前页面链接
	 * @var string $pagelink
	 * @access private
	 */
	private $pagelink;
	
	private $currow;
	
	function __construct(  $curpage , $rowcounts , $pagesize  , $pagelink){
		$this->pagelink = $pagelink;
		$this->pagesize = $pagesize;
		$this->rowcount = $rowcounts;
		$this->curpage = $curpage;
		if(!$this->curpage || $this->curpage < 1){
			$this->curpage = 1;
		}
		$pagenum = $this->rowcount / $this->pagesize;
		if(is_int($pagenum) ){
			$this->pagecount = $pagenum;
		}else{
			$this->pagecount = settype($pagenum, 'int');
			$this->pagecount = $pagenum + 1;
		}
		$this->offset = ($this->curpage - 1) * $this->pagesize;
	}
	
	
	 // getPageList方法生成页码列表
	public function getPageList(){
		
		$firstPage;
		$previousPage;
		$pageList;
		$nextPage;
		$lastPage;
		$currentPage;
		
		if($this->curpage > 1){
			//如果页码>1则显示首页连接
			$firstPage = "<a href=\"".$this->pagelink."1\">首页</a>";
			//如果页码>1则显示上一页连接
			$previousPage = "<a href=\"".$this->pagelink.($this->curpage-1)."\">上一页</a>";
		}
		
		//如果没到尾页则显示下一页连接
		if($this->curpage<$this->pagecount){
			$nextPage = "<a href=\"".$this->pagelink.($this->curpage+1)."\">下一页</a>";
		}
		//如果没到尾页则显示尾页连接
		if($this->curpage<$this->pagecount){
			$lastPage = "<a href=\"".$this->pagelink.$this->pagecount."\">尾页</a>";
		}
		//所有页码列表
		for($counter=1;$counter<=$this->pagecount;$counter++){
			if($this->curpage == $counter){
				$currentPage = "<b>".$counter."</b>";
			}
			else{
				$count = "[$counter]";
				$currentPage = " "."<a href=\"".$this->pagelink.$counter."\">".$count."</a>"." ";
				}
					$pageList .= $currentPage;
		}
	
		return $firstPage." ".$previousPage." ".$pageList." ".$nextPage." ".$lastPage." ";
	}
	
	//得到条件查找后的行数
	public function getCurRow(){
		
		return $this->currow;
	}
	
	//得到偏移量
	public function getOffset(){
		
		return  $this->offset;
	}
	
	//得到每页的大小
	public function getPageSize(){
		
		return $this->pagesize;
	}
	
}
	