<?php

	class Stylist
	{
		private $name;
		private $id;


		function __construct($name, $id = null);
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

		//Save to the database
		function save() {

			$statement = $GLOBALS['DB']->query("INSERT INTO stylists (name) VALUES ('{$this->getName()}') RETURNING id;"); 
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			$this->setId($result['id']);

		}









		


	}//Ends class

?>