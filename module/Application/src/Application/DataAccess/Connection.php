<?php

namespace Application\DataAccess;

use Application\Models\User;

class Connection {

    public function __construct($connection_string){

    }

    public function open(){
        print "opened connection\n";
    }

    public function insert($table, $parameters){
        print "inserting\n";
    }

    public function select($id){
        print "selecting\n";
        $user = new User();
        $user->setUsername('Test');
        $user->setEmail('Fake@fake.com');
        return $user;
    }

    public function commit(){
        print "commit\n";
    }

    public function close(){
        print "connection closed\n";
    }
} 