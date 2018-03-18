function LoginForm(event){

    var elements = event.currentTarget;
    var result = true;
    var a = elements[0].value;
    var b = elements[1].value;

    document.getElementById("user_msg").innerHTML ="";
    document.getElementById("pswd_msg").innerHTML ="";

    if (a==null || a==""){
        document.getElementById("user_msg").innerHTML = "Please enter username";
        result = false;
    }
    if (b==null || b==""){
        document.getElementById("pswd_msg").innerHTML="Please enter password";
        result = false;
    }

    if (result == false){
        event.preventDefault();
    }
}


function ManualForm(event){ 
        
    var elements = event.currentTarget;

    var a = elements[0].value;  //username
    var b = elements[1].value;  //software name
 
    
    var result = true;    
        
    document.getElementById("username_msg").innerHTML ="";
    document.getElementById("software_msg").innerHTML ="";

    if(a==null || a==""){
        document.getElementById("firstname_msg").innerHTML="Enter a Username";
        result = false;
    }

    if(b==null || b==""){
        document.getElementById("software_msg").innerHTML="Enter the software name";
        result = false;
    }
	
    if(result == false )
        {    
            event.preventDefault();
        }
}