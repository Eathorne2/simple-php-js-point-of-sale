<?php 

/**
 * pagination class
 */
class Pager
{
	
	protected $limit		= 10;
	public $offset			= 0;
	public $steps			= 2;

	public function __construct($limit = 10)
	{
		$this->limit = (int)$limit;
		
		$page_number = $this->get_page_number();
		$this->offset = ($page_number - 1) * $this->limit;

	}

	protected function get_page_number()
	{
		$page_number = $_GET['page'] ?? 1;
		$page_number = (int)$page_number;

		if($page_number < 1)
		{
			$page_number = 1;
		}

		return $page_number;
	}

	protected function create_page_link($page)
	{

		//reconstruct the url
		$url = "index.php?";
		$url2 = "";
		foreach ($_GET as $key => $value) {
			if($key == 'page'){
				$url2 .= "&".$key ."=$page";
			}else{
				$url2 .= "&".$key ."=".$value;
			}
		}

		$url2 = trim($url2,"&");
		if(!strstr($url2, "page="))
		{
			$url2 .= "&page=$page";
		}

		$url .= $url2;
		return $url;
	}

	public function display($rec_count = null)
	{

		if(!$rec_count){
			$rec_count = $this->limit;
		}

		if($rec_count < $this->limit){
			return;
		}

		$page_number = $this->get_page_number();
		?>
		<nav aria-label="...">
		  <ul class="pagination">
		    <li class="page-item">
		      <a class="page-link" href="<?=$this->create_page_link(1)?>">First</a>
		    </li>
		 		<li class="page-item">
		 			<?php 

		 				$num = $page_number - 1;
		 				$num = ($num < 1) ? 1 : $num;
		 			?>
		      <a class="page-link" href="<?=$this->create_page_link($num)?>">Prev</a>
		    </li>
		    <?php 
		    	$x = $this->steps;
		    	for ($i=1; $i <= $this->steps; $i++) { 

		    		if(($page_number - $x) < 1){
		    			$x--;
		    			continue;
		    		}

		    		echo '
		    		<li class="page-item">
				    	<a class="page-link" href="'.$this->create_page_link($page_number - $x).'">'.$page_number - $x.'</a>
				    </li>';
				    $x--;
		    	}
		    ?>
		 
		    <li class="page-item active">
		    	<a class="page-link" href="<?=$this->create_page_link($page_number)?>"><?=$page_number?></a>
		    </li>
		    
		    <?php 

		    	for ($i=1; $i <= $this->steps; $i++) { 
		    		echo '
		    		<li class="page-item">
				    	<a class="page-link" href="'.$this->create_page_link($page_number + $i).'">'.$page_number + $i.'</a>
				    </li>';
		    	}
		    ?>
		    <li class="page-item">
		      <a class="page-link" href="<?=$this->create_page_link($this->get_page_number() + 1)?>">Next</a>
		    </li>
		  </ul>
		</nav>
		<?php 

	}

}