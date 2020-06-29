<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

include_once("config/configClass.php");

class User extends connect_db {
    
    public $data = array();
    public $value;
    public $error;
    public $saveFlag;
    public $query;
    public $recs;
    public $row;
    public $ress_arr = array();
    public $username;
    public $pword;
    public $id;
    
    //file upload properties
    public $currentDir;
    public $ext;
    public $uploadDirectory;
    public $allowed_fileExtensions;
    public $fileName;
    public $fileSize;
    public $fileTmpName;
    public $fileType;
    public $fileExtension;
    public $uploadPath;
    public $img_path;

   
   
         
    public function __construct(){
        parent::__construct();
    }
    
    
     public function getFullname($username){
            //echo "hSDFFHUkDS>HdS>JklkjsDlkmDSVLK";var_dump($username);
              $this->query  = "SELECT firstname FROM register_table WHERE username = '$username'";
               //echo "qry = ". $this->query;die;
              $this->recs   =  mysqli_query($this->db_connect,$this->query);
              if(mysqli_num_rows($this->recs) > 0){
                 $this->row = mysqli_fetch_assoc($this->recs);
                 //print_r($this->row);die;
                 return $row = ($this->row["firstname"] != "")?  $this->row["firstname"] : "Guest";
              }
        }
    
    public function create_recs($data){
        //
       if($this->validate_recs($data)){
        $this->data  = $this->validate_recs($data);
        
         $this->query = "INSERT INTO register_table (username,firstname,lastname,email,gender,pword) 
                        VALUES ('{$this->data['username']}',
                                '{$this->data['fname']}',
                                '{$this->data['lname']}',
                                '{$this->data['email']}',
                                '{$this->data['gender']}',
                                '{$this->data['pword']}'
                                )
                                ";
                   
  //echo "qry =  $this->query";die();
  //print_r($this->db_connect);
    $this->recs  = mysqli_query($this->db_connect,$this->query);
        if(mysqli_affected_rows($this->db_connect)){
            $_SESSION['username'] = $this->data['username'];
            $_SESSION['fname'] = $this->data['fname'];
            $_SESSION['lname'] = $this->data['lname'];
            $_SESSION['email'] = $this->data['email'];
            $_SESSION['gender'] = $this->data['gender'];
            $_SESSION['pword'] = $this->data['pword'];
            //move_uploaded_file($this->fileTmpName,$this->uploadPath);
            echo "<script>alert('Registration created succesfully... You can now login')</script>";
            header("refresh:2; url=http://localhost/blog_app/index.php");
            die();
        }else{
            echo "Ooops! Record Could not be saved ".mysqli_error($this->db_connect);
        }
        
       }
        
    }
    
    public function login($username,$pword){
        $this->username = $username;
        $this->pword = $pword;
        $this->query = "SELECT * FROM register_table WHERE username = '$username' and pword = '$pword'";
        $this->recs = mysqli_query($this->db_connect,$this->query);
            if(mysqli_affected_rows($this->db_connect)){
                $_SESSION['username'] =$username;
                $_SESSION['pword'] = $pword;
                 echo "<script>alert('Login Successful! ')</script>";
                header("refresh:2; url=http://localhost/blog_app/posts.php");
                die();
            }else{
                echo "Ooops! Login not successfull";
            }
    }
    
    public function logout($username,$pword){
        $this->username = $username;
        $this->pword = $pword;
        $this->query = "SELECT * FROM register_table WHERE username = '$username' and pword = '$pword'";
        $this->recs = mysqli_query($this->db_connect,$this->query);
            if(mysqli_affected_rows($this->db_connect)){
                $_SESSION['username'] =$username;
                $_SESSION['pword'] = $pword;
               echo "<script>alert('Logout Successful! ')</script>";
            }
    }
    
    
    
    public function read_recs(){
        
        $this->query = "SELECT * FROM register_table WHERE 1=1 ORDER BY id DESC";
        //echo $this->query;
        $this->recs = mysqli_query($this->db_connect,$this->query);
            if(mysqli_num_rows($this->recs) > 0){
                while($this->row = mysqli_fetch_assoc($this->recs)){
                    //echo "i am here";
                    $this->ress_arr[] = $this->row;
                    //array_push($this->arr, $this->row);      
                }
                return $this->ress_arr;
                
            }else{
                return "oops: No record found";
            }
    }
    
     public function read_one_rec($username){
         $this->username = $username; 
         $this->query = "SELECT * FROM register_table WHERE username  = '$this->username'";
        //echo  $this->query;
         $this->recs  = mysqli_query($this->db_connect,$this->query);
         if(mysqli_num_rows($this->recs )> 0){
                $this->row = mysqli_fetch_assoc($this->recs); 
            // print_r($this->row);die;                 
                return $this->row; 
        }else{
            return "Ooops! No Record Found";
        }
        
    }
  
          
    public function update_recs($id,$data){
       $this->id = $id;
       if($this->validate_recs($data)){//  this checks if the validation has bn done on all inputs and return true
        $this->query = "SELECT image FROM register_table WHERE 1=1 ORDER BY id DESC";
        //echo $this->query;
        $this->recs = mysqli_query($this->db_connect,$this->query);
            if(mysqli_num_rows($this->recs) > 0){
                $this->row = mysqli_fetch_assoc($this->recs);
                if($this->row['image'] !=""){
                    $this->currentDir = getcwd();
                    $this->img_path = $this->currentDir."\\image\\".$this->row['image'];
                   //echo "img path $this->img_path<br>";
                    unlink($this->img_path);
                    //die("what is happening");
                }
            }
               
                $this->data  = $this->validate_recs($data);
                $this->query = "UPDATE  employee_table 

                                
                         SET
                                username  = '{$this->data['username']}',
                                firstname = '{$this->data['fname']}',
                                lastname  = '{$this->data['lname']}',
                                email     = '{$this->data['email']}',
                                gender    = '{$this->data['gender']}',
                                pword     = '{$this->data['pword']}'
                                
                         WHERE  
                                id        = '$this->id'
                        ";
                   
  //echo $this->query;
    $this->recs  = mysqli_query($this->db_connect,$this->query);
        if(mysqli_affected_rows($this->db_connect)){
             move_uploaded_file($this->fileTmpName,$this->uploadPath);
            echo "<script>alert('Record updated succesfully..Redirecting in 5 seconds')</script>";
            header("refresh:1; url=http://localhost/crud_oop/show.php");
            die();
        }else{
            echo "Ooops! Record Could not be saved ";
        }
        
       }
    }
  
    
    public function delete_recs($id){
        $this->id = $id;
        $this->query = "SELECT image FROM register_table WHERE id = '$this->id'";
        //echo $this->query;
        $this->recs = mysqli_query($this->db_connect,$this->query);
            if(mysqli_num_rows($this->recs) > 0){
                $this->row = mysqli_fetch_assoc($this->recs);
                if($this->row['image'] !=""){
                    $this->currentDir = getcwd();
                    $this->img_path = $this->currentDir."\\image\\".$this->row['image'];
                   //echo "img path $this->img_path<br>";
                    unlink($this->img_path);
                    //die("what is happening");
                }
            }
        $this->query = "DELETE FROM register_table WHERE id = '$this->id'";
        $this->recs = mysqli_query($this->db_connect,$this->query);
        if(mysqli_affected_rows($this->db_connect)){  
            echo "<script>alert ('Record deleted successfully')</script>";
            header("location:show.php");
        }
        
    }
    
    public function create_post($data){
        //
       if($this->validate_post($data)){
        $this->data  = $this->validate_post($data);
        
         $this->query = "INSERT INTO posts (username,title,image,body,created_at) 
                        VALUES ('{$this->data['username']}',
                                '{$this->data['title']}',
                                '{$this->data['imageUpload']['name']}',
                                '{$this->data['body']}',
                                '{$this->data['created_at']}'
                                )";
                   
  //echo "qry =  $this->query";die();
  //print_r($this->db_connect);die;
    $this->recs  = mysqli_query($this->db_connect,$this->query);
        if(mysqli_affected_rows($this->db_connect)){
            move_uploaded_file($this->fileTmpName,$this->uploadPath);
            echo "<script>alert('Post created succesfully!')</script>";
           header("refresh:2; url=http://localhost/blog_app/home.php");
            die();
        }else{
            echo "Ooops! Post not created ".mysqli_error($this->db_connect);
        }
        
       }
        
    }
    
       public function read_post(){
        
        $this->query = "SELECT * FROM posts WHERE 1=1 ORDER BY 'id' DESC";
       // echo $this->query;
        $this->recs = mysqli_query($this->db_connect,$this->query);
        //print_r($this->recs);die;
            if(mysqli_num_rows($this->recs) > 0){
                while($this->row = mysqli_fetch_assoc($this->recs)){
                    //echo "i am here";
                    $this->ress_arr[] = $this->row;
                    //array_push($this->arr, $this->row);      
                }
                return $this->ress_arr;
                
            }else{
                return "oops: Post not available";
            }
    }
    
     public function read_single_post($id){
         $this->id = $id; 
         $this->query = "SELECT * FROM posts WHERE id = '$this->id' ";
        //echo  $this->query;
         $this->recs  = mysqli_query($this->db_connect,$this->query);
         if(mysqli_num_rows($this->recs )> 0){
                $this->row = mysqli_fetch_assoc($this->recs); 
              // print_r($this->row);                  
                return $this->row; 
        }else{
            return "Ooops! No Record Found";
        }
        
    }
    
    public function update_post($id,$data){
       $this->id = $id;
       if($this->validate_post($data)){//  this checks if the validation has bn done on all inputs and return true
        $this->query = "SELECT image FROM employee_table WHERE 1=1 ORDER BY id DESC";
        //echo $this->query;
            $this->recs = mysqli_query($this->db_connect,$this->query);
            if(mysqli_num_rows($this->recs) > 0){
                $this->row = mysqli_fetch_assoc($this->recs);
                if($this->row['image'] !=""){
                    $this->currentDir = getcwd();
                    $this->img_path = $this->currentDir."\\image\\".$this->row['image'];
                   //echo "img path $this->img_path<br>";
                    unlink($this->img_path);
                    //die("what is happening");
                }
            }
                $this->data  = $this->validate_post($data);
                $this->query = "UPDATE  posts 

                                
                         SET
                                title  =    '{$this->data['title']}',
                                body =      '{$this->data['body']}',
                                image     = '{$this->data['imageUpload']['name']}'
                                
                         WHERE  
                                id        = '$this->id'
                        ";
                   
  //echo $this->query;die;
    $this->recs  = mysqli_query($this->db_connect,$this->query);
        if(mysqli_affected_rows($this->db_connect)){
             move_uploaded_file($this->fileTmpName,$this->uploadPath);
            echo "<script>alert('Record updated succesfully..Redirecting in 5 seconds')</script>";
            header("refresh:1; url=http://localhost/blog_app/home.php");
            die();
        }else{
            echo "Ooops! Record Could not be saved ";
        }
        
       }
    }
 
     public function delete_post($id){
        $this->id = $id;
        $this->query = "SELECT image FROM posts WHERE id = '$this->id'";
        //echo $this->query;
        $this->recs = mysqli_query($this->db_connect,$this->query);
            if(mysqli_num_rows($this->recs) > 0){
                $this->row = mysqli_fetch_assoc($this->recs);
                if($this->row['image'] !=""){
                    $this->currentDir = getcwd();
                    $this->img_path = $this->currentDir."\\image\\".$this->row['image'];
                   //echo "img path $this->img_path<br>";
                    unlink($this->img_path);
                    //die("what is happening");
                }
            }
        $this->query = "DELETE FROM posts WHERE id = '$this->id'";
        $this->recs = mysqli_query($this->db_connect,$this->query);
        if(mysqli_affected_rows($this->db_connect)){
             echo "<script>alert('Ooops! Unauthorized....Please Log in')</script>";
            header("location:posts.php");
        }
        
    }
    
    public function validate_post($arr){
        $this->data = $arr;

     //Assiging form input values to variables
     
                $this->data['title']      = $this->data['title']    != ""   ?   $this->test_input($this->data['title'])      : "";
               $this->data['body']          = $this->data['body']   != ""   ?   $this->test_input($this->data['body'])       : "";
              
               //Start Validation
               $this->saveFlag    = true; //iniatialise save flag to true 
               $this->error       = "";
               
               if($this->data['title']  == ""){
                    $this->error  .= "Title is reqired  <br>";
                    $this->saveFlag = false;
               }
               
                if($this->data['body']  == ""){
                    $this->error  .= "Body is required <br>";
                    $this->saveFlag = false;
               }
               
                //File upload validation
               $this->currentDir = getcwd();
                $this->uploadDirectory = "/image/";
                
                $this->allowed_fileExtensions = ['jpeg','jpg','png','gif']; // Get all file extensions
                
                $this->fileName  = $this->data['imageUpload']['name'];
                $this->fileSize  = $this->data['imageUpload']['size'];
                $this->fileTmpName  = $this->data['imageUpload']['tmp_name'];
                $this->fileType  = $this->data['imageUpload']['type'];
                
                $this->ext  = explode('.',$this->fileName);
                $this->fileExtension  = strtolower(end($this->ext));
                
                $this->uploadPath = $this->currentDir . $this->uploadDirectory . basename($this->fileName);
                
                    if (!in_array($this->fileExtension,$this->allowed_fileExtensions)){
                        $this->error.="This file extension is not allowed. Please upload a JPEG or JPG or PNG or GIF file<br>";
                        $this->saveFlag = false;
                    }
                    
                    if ($this->fileSize > 2000000){
                        $this->error.= "This file is more than 2MB sorry, it has to be less than or equal to 2MB<br>";
                        $this->saveFlag = false;
                    }
                    
                    if($this->saveFlag){
                    return $this->data;
                   }
                    else{
                        echo "<h2>There are some errors in your inputs: Check below for details</h2><br>";
                        echo "<div style='background:#ffcccc;padding:15px;border-radius:10px;'>".$this->error."</div>";
                        return false;
               }
            
    }
    
            
    
    
    public function validate_recs($arr){
        
               $this->data = $arr;
     //Assiging form input values to variables
     
                $this->data['username']      = $this->data['username']    != ""   ?   $this->test_input($this->data['username'])    : "";
               $this->data['fname']          = $this->data['fname']       != ""   ?   $this->test_input($this->data['fname'])       : "";
               $this->data['lname']          = $this->data['lname']       != ""   ?   $this->test_input($this->data['lname'])       : ""; 
               $this->data['email']          = $this->data['email']       != ""   ?   $this->test_input($this->data['email'])       : ""; 
               $this->data['pword']          = $this->data['pword']       != ""   ?   $this->test_input($this->data['pword'])       : ""; 
               $this->data['cpword']         = $this->data['cpword']      != ""   ?   $this->test_input($this->data['cpword'])      : ""; 
               $this->data['gender']         = $this->data['gender']      != ""   ?   $this->test_input($this->data['gender'])      : ""; 
   
               //Start Validation
               $this->saveFlag    = true; //iniatialise save flag to true 
               $this->error       = "";
               
               
               if($this->data['username']  == ""){
                    $this->error  .= "username cannot be empty <br>";
                    $this->saveFlag = false;
               }
               
               if($this->data['fname']  == ""){
                    $this->error  .= "Firstname cannot be empty <br>";
                    $this->saveFlag = false;
               }
               
                if($this->data['lname']  == ""){
                    $this->error  .= "Lastname cannot be empty <br>";
                    $this->saveFlag = false;
               }
               
               if(!filter_var($this->data['email'],FILTER_VALIDATE_EMAIL)){
                    $this->error  .= "Invalid Email<br>";
                    $this->saveFlag = false;
               }
               
                if($this->data['pword'] == ""){
                    $this->error .= "Password cannot be empty <br>";
                    $this->saveFlag = false;
               }
               
               if($this->data['pword'] != "" && strlen($this->data['pword']) < 8){
                    $this->error  .= "Password xter length too short<br>";
                    $this->saveFlag = false;
               }
             
               if($this->data['gender'] == ""){
                    $this->error  .= "Pls Select your gender<br>";
                    $this->saveFlag = false;
               }
               
               //File upload validation
                    
                    
               if($this->saveFlag){
                return $this->data;
               }
               else{
                    echo "<h2>There are some errors in your inputs: Check below for details</h2><br>";
                    echo "<div style='background:#ffcccc;padding:15px;border-radius:10px;'>".$this->error."</div>";
                    return false;
               }
        
    }
    
    
    public function test_input($value){
        $this->value = $value;
        $this->value = trim($this->value);
        $this->value = stripslashes($this->value);
        $this->value = htmlspecialchars($this->value);
        return $this->value;
        
    }
}
?>