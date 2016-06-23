<?php

/**
 * @Entity @Table(name="Client")
 **/
class Client
{
    
    //RegistrationDate, Login, Password, id, FirstName, LastName, 
    //BirthDate, Phone, Email, LastLoginTime
    
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 * @var integer
	 */
	protected $id;
	
	/**
	 * @Column(type="string", length=80)
	 *
	 * @var string
	 */
	private $firstName;
	
        /**
	 * @Column(type="string", length=80)
	 *
	 * @var string
	 */
	private $lastName;
        
	/**
	 * @Column(type="string", length=20, unique=true)
	 *
	 * @var string
	 */
	private $login;
	
        /**
         * The below length depends on the "algorithm" you use for encoding
         * the password, but this works well with bcrypt.
         *
         * @Column(type="string", length=64)
         */
        private $password;
        
        /** 
         * Date of the registration of the user
         * @Column(type="datetime") 
         */
        private $registrationDate;
        
        /** 
         * Date of birth of the user
         * @Column(type="datetime") 
         */
        private $birthDate;
        
        /**
	 * @Column(type="string", length=20, nullable=true)
	 *
	 * @var string
	 */
	private $phone;
        
	/**
	 * @Column(type="string", length=150, nullable=true)
	 *
	 * @var string
	 */
	private $email;
	
        /** 
         * Date of the registration of the user
         * @Column(type="datetime", nullable=true)  
         */
        private $lastLoginTime;
        
        // getters and setters of the class Client
        function getId() {
            return $this->id ? $this->id : null;
        }

        function getFirstName() {
            return $this->firstName;
        }

        function getLastName() {
            return $this->lastName;
        }

        function getLogin() {
            return $this->login;
        }

        function getPassword() {
            return $this->password;
        }

        function getRegistrationDate() {
            return $this->registrationDate;
        }

        function getBirthDate() {
            return $this->birthDate;
        }

        function getPhone() {
            return $this->phone;
        }

        function getEmail() {
            return $this->email;
        }

        function getLastLoginTime() {
            return $this->lastLoginTime;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setFirstName($firstName) {
            $names = explode(' ',$firstName);
            $this->firstName = $names[0];
        }

        function setLastName($lastName) {
            $names = explode(' ',$lastName);
            $this->lastName = $names[1];
        }

        function setLogin($login) {
            $this->login = $login;
        }

        function setPassword($password) {
            $this->password = md5($password);
        }

        function setRegistrationDate() {
            $this->registrationDate = new \DateTime("now");
        }

        function setBirthDate($birthDate) {
            $this->birthDate = new \DateTime(date("Y-m-d", strtotime($birthDate)));
        }

        function setPhone($phone) {
            $this->phone = $phone;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setLastLoginTime() {
            $this->lastLoginTime = new \DateTime("now");
        }
        
        // getters and setters of the class Client
        
        /**
         * Method that populate to create a client
         * @param type $post
         */
        public function populateClientFromPost($post){
            
            !array_key_exists('name', $post) ? : $this->setFirstName($post['name']);
            !array_key_exists('name', $post) ? : $this->setLastName($post['name']);
            !array_key_exists('username', $post) ? : $this->setLogin($post['username']);
            !array_key_exists('password', $post) ? : $this->setPassword($post['password']);
            !array_key_exists('birthdate', $post) ? : $this->setBirthDate($post['birthdate']);
            !array_key_exists('phone', $post) ? : $this->setPhone($post['phone']);
            !array_key_exists('email', $post) ? : $this->setEmail($post['email']);
            
        }
       
}