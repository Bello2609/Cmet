//this is the beginning of the validation process
const username = document.getElementById("username");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");

const email = document.getElementById("email");
const address = document.getElementById("address");
const telephone = document.getElementById("telephone");
const postal = document.getElementById("postal");
const description = document.getElementById("textarea");
const form = document.getElementById("form");

// this is for the hambirger animation


const navSlide = ()=>{
    const navLink = document.querySelector(".nav");
    
    const burger_container = document.querySelector(".burger_container");

    burger_container.addEventListener("click", ()=>{
       
        navLink.classList.toggle("nav_active");
    });
    console.log("clicked");
}
navSlide();

// i will not  be adding other input field validation because it has been done in the file
// const validation = (e) =>{
   
//     const password = document.getElementById("password").value;
//     const conpassword = document.getElementById("conpassword").value;
//     const passwordValue = password.trim().toString();
//     const conPasswordValue = conpassword.trim().toString();
//     e.preventDefault();
//     if(conPasswordValue === passwordValue){
//          return alert("match");
//     }
//     else{
//         return alert("Enter yor details");
//     }
        
    
// }
// form.addEventListener("submit", validation);