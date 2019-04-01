<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 */
class Users implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_1", type="string", length=20)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_2", type="string", length=20, nullable=true)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=20, unique=true)
     */
    private $usuario;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=4096)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasenya", type="string", length=255)
     */
    private $contrasenya;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, unique=true)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="telefono", type="integer", nullable=true)
     */
    private $telefono;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json_array")
     */
    private $roles;

    /**
     * @var int
     *
     * @ORM\Column(name="intentos", type="integer")
     */
    private $intentos = 0;

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Users
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return Users
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return Users
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Users
     */
    public function setUsername($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->usuario;
    }

    public function getPlainPassword()
    {
        return $this->password;
    }

    public function setPlainPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set contrasenya
     *
     * @param string $contrasenya
     *
     * @return Users
     */
    public function setPassword($contrasenya)
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }

    /**
     * Get contrasenya
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->contrasenya;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Users
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return int
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Users
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set contrasenya
     *
     * @param string $contrasenya
     *
     * @return Users
     */
    public function setContrasenya($contrasenya)
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }

    /**
     * Get contrasenya
     *
     * @return string
     */
    public function getContrasenya()
    {
        return $this->contrasenya;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return Users
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set intentos
     *
     * @param integer $intentos
     *
     * @return Users
     */
    public function setIntentos($intentos)
    {
        $this->intentos = $intentos;

        return $this;
    }

    /**
     * Get intentos
     *
     * @return integer
     */
    public function getIntentos()
    {
        return $this->intentos;
    }
}
