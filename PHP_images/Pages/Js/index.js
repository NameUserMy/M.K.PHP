import Query from "./modeles/Request.js";

document.addEventListener("DOMContentLoaded", function () {
    const msg = document.getElementById('info-server');
    Query.Request.Get(`http://localhost/BackEndImages/Controller/getInfo.php`).then((data) => {
            msg.innerHTML = `Image on Server ${data}` 
    });
});


