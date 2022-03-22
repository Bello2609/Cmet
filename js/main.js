//this is the beginning of the validation process
const username = document.getElementById("username").value;
const firstname = document.getElementById("firstname").value;
const lastname = document.getElementById("lastname").value;

const email = document.getElementById("email");
const address = document.getElementById("address");
const telephone = document.getElementById("telephone");
const postal = document.getElementById("postal");
const description = document.getElementById("textarea").value;
const form = document.getElementById("form");


// i will not  be adding other input field validation because it has been done in the file
const validation = (e) =>{
   
    const password = document.getElementById("password").value;
    const conpassword = document.getElementById("conpassword").value;
    const passwordValue = password.trim().toString();
    const conPasswordValue = conpassword.trim().toString();
    e.preventDefault();
    if(conPasswordValue === passwordValue){
         return alert("match");
    }
    else{
        return alert("Enter yor details");
    }
        
    
}
form.addEventListener("submit", validation);