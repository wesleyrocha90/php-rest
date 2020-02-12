<?php

class UserController {

    public function handleRequest($requestObject) {
        // switch($requestObject->$method) {

        // }
        echo $requestObject['method'];
    }
}