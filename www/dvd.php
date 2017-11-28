<?php   # DVD class

	//include 'product.php';

	class DVD extends Product {

		private $_duration;

		/*@override*/
		public function __construct($title, $price){
			$this->_type = "Dvd";
			$this->_duration = $duration;


			// Call an overridden constructor
			//parent::__construct($title, $price);
		}

		/*@override */
		public function getDuration(){

			return $this->_duration;
		}

		public function getDescription(){
			echo '<ul>';

			echo '<li> type: '.$this->getType().'</li>';
			echo '<li> title: '.$this->getTitle().'</li>';
			echo '<li> price: '.$this->getPrice().'</li>';
			echo '<li> duration: '.$this->getDuration().'</li>';

			echo '</ul>';
		}


	}



	


?>