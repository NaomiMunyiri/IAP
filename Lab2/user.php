<?php
include_once 'account.php';    
class User implements Account 
{        
			//properties  
			protected $identity;
	        protected $mail;        
	        protected $password;
	        protected $res;
	        protected $pp;
       
	        //identity setter         
	        public function setIdentity ($identity)
	        {        	

	        	$this->identity = $identity;        
	        }        
	        //identity getter        
	        public function getIdentity ()
	        {        	

	        	return $this->identity;       
	        }

	        //email setter
	        public function setEmail ($mail)
	        {        	
	        	$this->mail = $mail;      
	        }        
	        //email getter        
	        public function getEmail ()
	        {        	
	        	return $this->mail;       
	        } 

	        //password setter
	        public function setPassword ($password)
	        {        	
	        	$this->password = $password;      
	        }        
	        //password getter        
	        public function getPassword ()
	        {        	
	        	return $this->password;      
	        } 

	        //residence setter
	        public function setResidence ($res)
	        {        	
	        	$this->res = $res;       
	        }        
	        //residence getter        
	        public function getResidence ()
	        {        	
	        	return $this->res;     
	        }

	        //picture setter 
	        public function setPicture ($pp)
	        {        	
	        	$this->pp = $pp;        
	        }        
	        //picture getter        
	        public function getPicture ()
	        {        	
	        	return $this->pp;      
	        } 

	        public function setNewPassword ($Password)
	        {     
            $this->newPassword = password_hash($Password,PASSWORD_DEFAULT); 
       		} 

        	public function getNewPassword ()
        	{  
            return $this->newPassword;      
        	}       
	        /**        * Create a new user        * @param Object PDO Database connection handle        * @return String success or failure message        */   
	        //$errors=array();     
	        public function register ($pdo)
	        {            
	        	$passwordHash = password_hash($this->password,PASSWORD_DEFAULT);                      
	        	$sql = 'INSERT INTO user (Identity,Email,Password,Residence,pp) VALUES(?,?,?,?,?)';                         
	        	$data = array($this->getIdentity(),$this->getEmail(),$passwordHash,$this->getResidence(),$this->getPicture());  
	        	$stmt = $pdo->prepare ($sql); 
	        	try 
	        	{
            		$stmt->execute($data);              
	        		echo "Registration was successful";         
	        	} 
	        	catch (PDOException $e) 
	        	{            	
	        		echo $e->getMessage();
	        		echo $e;            
	        	}
	        	//echo $e;                    
	        }   
    
	        	/**        * Check if a user entered a correct username and password        * @param Object PDO Database connection handle        * @return String success or failure message        */

	        public function login ($pdo)
	        {            
	        		try 
	        		{                
	        			$stmt = $pdo->prepare("SELECT Password FROM user WHERE Email=?");                
	        			$stmt->execute([$this->getEmail()]);       
	        			$row = $stmt->fetch();                
	        			if($row == null)
	        				{                	
	        					echo "This account does not exist";
	                        }                
	                    if (password_verify($this->password,$row['Password']))
	                    	{                	
	                    		//echo "Successful";
	                    		header('location:member.php');                 
	                    	}                
	                    	return "Your username or password is not correct";            
	                } 
	                catch (PDOException $e) 
	                {            	
	                    	return $e->getMessage();            
	                }        
	        }         
	        public function changePassword($pdo)
	        {        
	        	try{
                $sql = 'SELECT * FROM user WHERE Email = ?';
                $data = array($_SESSION['email']);
                $stmt = $pdo-> prepare($sql);
                $stmt ->execute($data);
                $row = $stmt -> fetch();
                if(!$row){
                    echo "Account does not exist";
                    return false;
                }else{
                    if(password_verify($this->getPassword(),$row['Password'])){
                        try{
                            $updateSql = 'UPDATE user SET Password = ? WHERE Email = ?';
                            $updateData = array($this -> newPassword, $_SESSION['email']);
                            $updateStmt = $pdo -> prepare($updateSql);
                            $updateStmt -> execute($updateData);
                            echo '<script>alert("Password Changed Successfully. Log in to access your account")</script>'; 
                            echo '<script>window.location="login.php"</script>';


                        }catch(PDOException $e){
                            return $e->getMessage(); 
                        }
                    }else{
                        echo "Password does not match password in the database";
                    }           
                }
            }catch(Exception $e){
                echo $e;
            }
        }
        public function logout ($pdo){
            session_destroy();
            unset($_SESSION['email']);
            header("location: login.php");
        }

}
?>
