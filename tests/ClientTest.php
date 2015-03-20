<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');


    class ClientTest extends PHPUnit_Framework_TestCase
    {

        function tearDown()
        {
            stylist::deleteAll();
        }


        function test_getName()
        { 
            //Arrange
            $name = "Bobby";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $name = "Rick";
            $id = 1;
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($name, $result);

        }

        function test_setName()
        { 
            //Arrange
            $name = "Will";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Rufus";
            $id = 1;
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $test_client->setName("Ellen");
            $result = $test_client->getName();

            //Assert
            $this->assertEquals("Ellen", $result);

        }

        function test_getStylistId()
        {
            //Arrange
            $name = "Eleanor";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Mike";
            $id = 1;
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals($stylist_id, $result);

        }

        function test_setStylistId()
        { 
            //Arrange
            $name = "Eleanor";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();
            $name = "Mike";
            $id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            //Act
            $test_client->setStylistId(10);
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(10, $result);

        }

        //READ specific client from a stylist.
        //This find method should return a client given its id.
        //It will be used to display a single client by clicking a link formatting the URL to include its id number.
        function test_find()
        {
            //Arrange
            $name = "Brian";
            $id = 1;
            $stylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            $name2 = "Lorna";
            $id2 = 2;
            $stylist_id = 2;
            $test_client2 = new Client($name2, $id2, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }

        //CREATE : //Saves the client object information into the database.
        function test_save()
        {
            //Arrange
            $name = "Harmony";
            $id = 1;
            $stylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            
            $test_client->save();

            //Assert
           
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        //READ ALL 

        function test_getAll()
        {
            //Arrange
            //create 2 clients to make sure we can get all of them back
            //both can use the same stylist.
            $name = "Hannah";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Trudie";
            $id = 1;
            $test_client = new Client($name, $id, $stylist_id);

            $name = "Mable";
            $id = 2;
            $test_client2 = new Client($name, $id, $stylist_id);

            //Act
            
            $test_client->save();
            $test_client2->save();

            //Assert
            
            $result = Client::getAll();
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        //DELETE ALL
        function test_deleteAll()
        {
            //Arrange
            $name = "Damian";
            $name2 = "Olive";
            $stylist_id = 1;
            $stylist_id2 = 2;
            $id = 1;
            $id2 = 2;

            $test_client = new Client($name, $id, $stylist_id);
            $test_client2 = new Client($name2, $id2, $stylist_id2);

            $test_client->save();
            $test_client2->save();

            //Act
            
            
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

//SPECIFIC STYLISTS TESTS

        function test_getId()
        {
            //assign a specific id so we can be sure to get it back from the object.

            //Arrange
            $name = "Ruby";
            $id = 1;
            $stylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(1, $result);
        }



        function test_setId()
        {
            //assign a specific id so we can change it, and then be sure to get it back from the object.

            $name = "Johnny";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Kim";
            $id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            

            $test_client->setId(2);
            $result = $test_client->getId();

            $this->assertEquals(2, $result);
        }


        function test_update()
        {
            //Arrange
            $name = "Bob";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Melba";
            $id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();
            $new_name = "Veljko";

            $test_client->update($new_name);

            $this->assertEquals("Veljko", $test_client->getName());
        }

        //Delete only one client
        function test_delete()
        {
            //Arrange
            $stylist_id = 9;
            $test_client = new Client("Jetta", 9);
            $test_client->save();
            $id = 1;

            //Act
            $test_client->delete();
            $test_client = Client::getAll();

            //Assert
            $this->assertEquals([], $test_client);
        }

    }
?>
