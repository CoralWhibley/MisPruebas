<?php
// UsersBundle/Entity/Task.php
namespace UsersBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="usuarios")
*/
class Usuario{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id_user;
	/**
     * @ORM\Column(type="string", length=30)
     */
	protected $username;
	/**
     * @ORM\Column(type="string", length=30)
     */
	protected $password;

	/**
     * @ORM\Column(type="string")
     */
	protected $email;
	/**
     * @ORM\Column(type="date")
     */
	protected $fecha_nacimiento;


	//atributo $id_user
	public function getId_User(){ return $this->id_user; }

	// atributo $username 
	public function getUsername(){ return $this->username; }
	public function setUsername($username){ $this->username = $username;}

	//atributo $password
	public function getPassword(){ return $this->password; }
	public function setPassword($password){ $this->password = $password;}

	// atributo $email
	public function getEmail(){ return $this->email; }
	public function setEmail($email){ $this->email = $email;}

	// atributo $fecha_nacimiento
	public function getFechaNacimiento(){ return $this->fecha_nacimiento; }
	public function setFechaNacimiento($fecha_nacimiento){ $this->fecha_nacimiento = $fecha_nacimiento;}
	//public function getfecha_nacimiento(){ return $this->fecha_nacimiento; }
	//public function setfecha_nacimiento($fecha_nacimiento){ $this->fecha_nacimiento = $fecha_nacimiento;}
}
?>