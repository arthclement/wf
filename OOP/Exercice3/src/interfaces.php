<?php

interface ArrayInterface extends Countable, ArrayAccess {
}

interface UserInterface {
    public function getId();
    public function getRoles();
    public function getPassword();
    public function getSalt();
    public function getUsername();
    public function setRoles(array $roles);
    public function addRole(Role $role);
    public function setPassword($password);
    public function setSalt($salt);
    public function setUsername($username);
    public function eraseCredentials();
    
}

class ArrayElement implements ArrayInterface {
    private $internal = [];
    private $count = 0;

    public function offsetGet($offset) {
        return $this->internal[$offset];
    }

    public function offsetSet($offset) {
        $this->internal[$offset] = $value;
    }

    public function offsetExists($offset) {
        return isset($this->internal[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->internal[$offset]);
    }

    public function count() {
        return ++$this->count;
    }
}

$array = new ArrayElement();
$array->offsetSet(1, 2);
echo count($array);