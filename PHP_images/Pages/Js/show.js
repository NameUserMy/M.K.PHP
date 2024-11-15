import Query from "./modeles/Request.js";
document.addEventListener("DOMContentLoaded",  ()=> {

    const options=document.getElementById('info-server');
    const img=document.getElementById('img');
    Query.Request.Get('http://localhost/BackEndImages/Controller/getInfo.php?imgsrc').then((data) => {
    for (let item in data) {
       options.innerHTML += `<option name="img" value="${data[item]}">${data[item]}</option>`;
    }
});

options.addEventListener("change", (e) => {

    console.log(e.currentTarget.value) 
    img.setAttribute('src',`http://localhost/BackEndImages/Images/${e.currentTarget.value}`)
   
    
});

});