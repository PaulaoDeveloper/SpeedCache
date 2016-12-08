<?php 
	namespace SpeedCache;
	/**
	* CACHE INIT
	*/
	class Cached
	{
		public $pagina;
		public $rel;
		public $t;

		public function time($t){
			$this->t = $t;
		}

		public function page($pagina){
			$this->pagina = $pagina;
		}

		public function reload($rel){
			$this->rel = $rel;
		}

		public function init(){
			date_default_timezone_set('America/Sao_Paulo');
			if(!file_exists('cached/')){
				mkdir('cached/');
			}

			if(file_exists('cached/'.$this->pagina.'.cache')){

			require 'cached/'.$this->pagina.'.cache';
			$edit = date('i', filemtime('cached/'.$this->pagina.'.cache'));
			$tempCache =  $edit + $this->t;

			if(date('i') >  $tempCache){

			new RenovaCache($this->pagina,$this->rel,$tempCache);	

		}else{
			echo '<script>var temp = '.($tempCache - date('i')).';</script>';
			if($this->rel){
				require 'assets/js/reload.js';
			}
		}

		}else{
		ob_start();
		require $this->pagina.'.php';
		$html = ob_get_contents();
		ob_end_clean();
		file_put_contents('cached/'.$this->pagina.'.cache', $html);
		require 'cached/'.$this->pagina.'.cache';
		$edit = date('i', filemtime('cached/'.$this->pagina.'.cache'));
		$tempCache =  $edit + $this->t;
		echo '<script>var temp = '.($tempCache - date('i')).';</script>';
		if($this->rel){
				require 'assets/js/reload.js';
		}
	}}
   }

?>