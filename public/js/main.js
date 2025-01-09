function test(){

    let errorMessage=document.getElementById("forText"),
        email=document.getElementById("email"),
        password=document.getElementById("password");

    if (email.value==="" ||password.value===""){
        errorMessage.innerHTML="email va passwordni to'ldir";
        errorMessage.style.color="red";
    }
}