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
			$id = 1;
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
			$id = 1;
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

		function test_getId()
		{
			//Arrange
			//assign a specific id so we can be sure to get it back from the object.
			$name = "Vernon";
			$id = 1;
			$test_stylist = new Stylist($name, $id);

			//Act
			$result = $test_stylist->getId();

			//Assert
			$this->assertEquals($id, $result);
		}


		function test_setId()
		{
			//Arrange
			//assign a specific id so we can change it, and then be sure to get it back from the object.
			$name = "Vernon";
			$id = 1;
			$test_stylist = new Stylist($name, $id);

			//Act
			$test_stylist->setId(2);
			$result = $test_stylist->getId();

			//Assert
			$this->assertEquals(2, $result);
		}


		//READ specific cuisine instead of all cuisines.
        //This find method should return a cuisine given its id.
        //It will be used to display a single cuisine by clicking a link formatting the URL to include its id number.

        function test_find()
        {
        	//Arrange
        	$name = "Roxy";
        	$id = 1;
        	$test_stylist = new Stylist($name, $id);
        	$test_stylist->save();

        	//Act
        	$result = Stylist::find($test_stylist->getId());

        	//Assert
        	$this->assertEquals($test_stylist, $result);

        	

        }














	}//Ends class

?>