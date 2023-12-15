function newfunction(input){

    let spass = document.getElementById(input);
    if(spass.type === "password"){
      spass.type = "text";
    }

    else{
      spass.type = "password";
    }

}