<?php

namespace SON\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="SON\Entity\UserRepository")
 */
class User implements UserInterface
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	public $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $username;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $password;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $plainPassword;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $roles = array('ROLE_USER');
	
	/**
	 * @ORM\Column(type="datetime", length=100)
	 */
	public $createdAt;
	
	public function __construct(){
		$this->createdAt = new \DateTime();
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setUsername($username){
		$this->username = $username;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function setPassword($password){
		$this->password = $password;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPalainPassword($plainPassword){
		$this->plainPassword = $plainPassword;
	}
	
	public function getPlainPassword(){
		return $this->plainPassword;
	}
	
	public function setRoles($roles){
		$this->roles = $roles;
	}
	
	public function getRoles(){
		return $this->roles;
	}
	
	public function setCreatedAt($createdAt){
		$this->createdAt = $createdAt;
	}
	
	public function getCreatedAt(){
		return $this->createdAt;
	}
	
	public function getSlat(){
		return null;
	}
	
	public function eraseCredentials(){
		$this->plainPassword = null;
	}
	
	public function __toString(){
		return $this->getUsername();
	}
	
	public function toArray(){
		return array(
			'id' => $this->id,
			'username' => $this->getUsername(),
			'salt' => $this->getSalt(),
			'roles' => $this->getRoles(),
			'password' => $this->getPassword()
		);
	}
	
}