<?php
	// SearchBundle/Entity/Url.php
	namespace SearchBundle\Entity;
	class Search{
		protected $search;
		public function getSearch(){ 
			return $this->search; 
		}
		public function setSearch($search){ 
			$this->search = $search;
		}

	}
?>