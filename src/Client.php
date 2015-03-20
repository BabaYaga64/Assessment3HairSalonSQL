<?php
    class Client
    {
        private $name;
        private $id;
        private $stylist_id;

        function __construct($name, $id = null, $stylist_id)
        {
            $this->name = $name;
            $this->id = $id;
            $this->stylist_id = $stylist_id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setStylistId($stylist_id)
        {
            $this->stylist_id = (int) $stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function save()
        {
          $GLOBALS['DB']->exec("INSERT INTO clients (description) VALUES ('{$this->getName()}');");
        }

        function update($new_name)

        {   //use the SQL update command to change the value of the name column in the cliens table.
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);//make the object match the database.
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }

        static function getAll()
        {
            $all_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients_to_return = array();
            foreach($all_clients as $current_client) {
                $name = $current_client['name'];
                $id = $current_client['id'];
                $stylist_id = $current_client['stylist_id'];
                $new_client = new Client($name, $id, $stylist_id);
                array_push($clients_to_return, $new_client);
            }
            return $clients_to_return;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients *;");
        }

        //Find a particular client from the database
        static function find($client_search_id)
        {
            $found_client = null;
            $all_clients = Client::getAll();
            foreach($all_clients as $current_client){
                $current_id = $current_client->getId();
                if ($current_id == $client_search_id) {
                    $found_client = $current_client;
                }
            }
            return $found_client;
        }

    }
?>
