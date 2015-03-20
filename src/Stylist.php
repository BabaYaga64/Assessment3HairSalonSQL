<?php

	class Stylist
	{
		private $name;
		private $id;

//Constructor

		function __construct($name, $id = null)
		{
			$this->name = $name;
			$this->id = $id;
		}


		function getName()
		{
			return $this->name;

		}

		function setName($new_name)
		{
			$this->name = (string) $new_name;

		}


		function getId()
		{

			return $this->id;
		}

		function setId($new_id)
		{
			$this->id = (int) $new_id;
			
		}

		//CREATE: save to the database
		function save() {

			$statement = $GLOBALS['DB']->query("INSERT INTO stylists (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);

		}

		// function findClients()
		// {

		// 	$found_clients = array();
		// 	$table_matches = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
			
		// }

//STATIC FUNCTIONS (ACT ON ALL INSTANCES OF CLASS)


		//READ: extracts and reads all content in all table rows in database
		static function getAll()
		{
			$all_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
			$stylists_to_return = array();
			foreach($all_stylists as $current_stylist) {
				$name = $current_stylist['name'];
				$id = $current_stylist['id'];
				$new_name = new Stylist($name, $id);
				array_push($stylists_to_return, $new_name);
			}
			return $stylists_to_return;

		}


		//DELETE: removes ALL content from database
		static function deleteAll()
		{

			$GLOBALS['DB']->exec("DELETE FROM stylists *;");

		}

		static function find($stylist_search_id)
		{
			$found_stylist = null;
			$all_stylists = Stylist::getAll();
			foreach ($all_stylists as $current_stylist) {
				$current_id = $current_stylist->getId();
				if ($current_id = $stylist_search_id) {
					$found_stylist = $current_stylist;
				}//Ends if
			return $found_stylist;
				
			}//Ends foreach

		}

















	}//Ends class

?>