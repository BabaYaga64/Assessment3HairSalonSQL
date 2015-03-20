<?php

	class Stylist
	{
		private $name;
		private $id;


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

			return $this->$id;
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



		






	}//Ends class

?>