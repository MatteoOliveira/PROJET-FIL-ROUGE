<?php

namespace Modeles\Entites;

class Contact
{
    private $id;
    private $name;
    private $email;
    private $mess;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mess
     */
    public function getMess()
    {
        return $this->mess;
    }

    /**
     * Set the value of mess
     *
     * @return  self
     */
    public function setMess($mess)
    {
        $this->mess = $mess;

        return $this;
    }
}
