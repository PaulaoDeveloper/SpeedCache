<?php  
	namespace SpeedCache;
	/**
	* Classe para renovar o cache
	*/
	class RenovaCache extends Cached
	{
		public $pp;
		function __construct($pp,$rel,$tc)
		{
			$this->pagina = $pp;
			$this->rel= $rel;
			$this->tempCache = $tc;
			$this->renovaCache();
		}
		public function renovaCache(){
			ob_start();
			require $this->pagina.".php";
			$html = ob_get_contents();
			ob_end_clean();
			file_put_contents('cached/'.$this->pagina.'.cache', $html);
			require 'cached/'.$this->pagina.'.cache';
			echo '<script>var temp = '.($this->tempCache - date('i')).';</script>';
			if($this->rel){
				require 'assets/js/reload.js';
			}
		}
	}

?>