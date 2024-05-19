<?php
if (!class_exists('Client')) {
    class Client {
        public $id;
        public $firstName;
        public $lastName;
        public $address;
        public $phoneNumber;
    
        public function __construct($firstName, $lastName, $address, $phoneNumber) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->address = $address;
            $this->phoneNumber = $phoneNumber;
        }
    
        public function save() {
            // Code pour enregistrer le client dans la base de données
        }
    }
}

?>
