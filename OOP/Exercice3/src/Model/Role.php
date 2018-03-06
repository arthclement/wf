<?php
namespace Model;

use Exception\NotAllowedRoleException;
class Role
{
    public const ROLE_USER = 'ROLE_USER';
    
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    
    private $id;
    
    protected $label;
    
    public function __construct($label)
    {
        $this->setLabel($label);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        if($label == 'ROLE_USER' || $label == 'ROLE_ADMIN') {
            $this->label = $label;
            return $this;
        } else {
            throw new NotAllowedRoleException(['ROLE_USER', 'ROLE_ADMIN'], $label);
        }
    }
}

