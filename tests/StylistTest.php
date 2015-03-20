<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

	class StylistTest extends PHPUnit_Framework_TestCase
	{

//ACT ON ALL STYLIST OBJECTS SECTION

		function test_getName()
		{
			//Arrange
			$name = "Molly";
			$id = 1;
			$test_stylist = new Stylist($name, $id);

			//Act
			$result = $test_stylist->getName();

			//Assert
			$this->assertEquals($name, $result);

		}

		function test_setName()
		{

			//Arrange
			$name = "Fred";
			$id = 2;
			$test_stylist = new Stylist($name, $id);

			//Act
			$test_stylist->setName("Zora");
			$result = $test_stylist->getName();

			//Assert
			$this->assertEquals("Zora", $result);
		}


		function test_save()
		{

			//Arrange
			//create stylist
			$name = "Bruno";
			$id = 3;
			$test_stylist = new Stylist($name, $id);

			//Act
			//save it
			$test_stylist->save();

			//Assert
			//get it back
			$result = Stylist::getAll();
			$this->assertEquals($test_stylist, $result[0]);
		}


		function test_getAll()
		{

			//Arrange
            //create 2 stylists to make sure we can get all of them back
			$name = "Vernon";
			$id = 1;
			$test_stylist = new Stylist($name, $id);
			$name = "Bernice";
			$id = 1;
			$test_stylist2 = new Stylist($name, $id);
			
			//Act
			//Save it
			$test_stylist->save();
			$test_stylist2->save();

			//Assert
			//get it back
			$result = Stylist::getAll();
			$this->assertEquals([$test_stylist, $test_stylist2], $result);

		}

		function test_deleteAll()
		{
			//Arrange
			//Create two stylists and make sure we can delete them all
			$name = "Vernon";
			$id = 1;
			$test_stylist = new Stylist($name, $id);
			$name = "Bernice";
			$id = 1;
			$test_stylist2 = new Stylist($name, $id);

			//Act
			$test_stylist->save();
			$test_stylist2->save();
			Stylist::deleteAll();

			//Assert
			//test to make sure getAll is empty
			$result = Stylist::getAll();
			$this->assertEquals([], $result);

		}

			protected function tearDown() 
			{
				Stylist::deleteAll();

			}



//ACT ON SPECIFIC STYLISTS SECTION



















	}//Ends class

?>