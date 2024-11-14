import Query from "./modeles/Request.js" ;

document.addEventListener("DOMContentLoaded", function () {
    const send = document.getElementById("send");
    const data=document.getElementById('uploadFile');
    const msg=document.getElementById('message');
    msg.innerHTML="";
    send.addEventListener('click',(e)=>{
        e.preventDefault();
        Query.Request.MultipartPost(`http://localhost/BackEnd/Controller/uploadFile.php`,data).then((data)=>{
            console.log(data);
            if(data===0){
                msg.innerHTML="File upload successful"

            }
        });
    })


});


    