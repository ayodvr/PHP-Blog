function passconfirm_verify(){
      //password validation  
       var password =  document.forms['regform']['pword'].value; 
       var cpassword =  document.forms['regform']['cpword'].value; 
       
         if( password != ""  && password != cpassword){
            alert("The two passwords do not match: Pls! Re enter password");
            document.forms['regform']['pword'].value  = ""; 
            document.forms['regform']['cpword'].value = ""; 
            document.forms['regform']['pword'].focus();
            return false;
         }  
  }