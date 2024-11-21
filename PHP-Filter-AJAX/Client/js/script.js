import Query from "./Modules/Request.js";
document.addEventListener("DOMContentLoaded", () => {

    const info = document.getElementById('result');
    const AD = document.getElementById('head');
    const country = document.getElementById('country-name-filter');
    const city = document.getElementById('city-name-filter');
    const form = document.getElementById('nav');
    let urlMaxFilter='';
    let filter='';

    Query.Request.Get(`http://localhost/BackEndFilter/Controller/dbworker.php?All=all`).then((data) => {
        for (let item in data) {
            info.innerHTML += `
            <span class='data'> ${data[item].Name}</span> 
            <span class='data'> ${data[item].Surname}</span>
            <span class='data'> ${data[item].Country}</span>
            <span class='data'> ${data[item].City}</span>
            <span class='data'>$ ${data[item].Salary}</span>
            `;
        }
    });

    Query.Request.Get(`http://localhost/BackEndFilter/Controller/dbworker.php?checkBox=checkBox`).then((data) => {
        for (let item in data) {

            if (data[item].country) {
                country.innerHTML += `<span><input type="checkbox" name="country[]" value="${data[item].country}"> ${data[item].country}</span>`
            } else if (data[item].city) {

                city.innerHTML += `<span><input type="checkbox" name="city[]" value="${data[item].city}"> ${data[item].city}</span>`
            }
        }

    });
    form.addEventListener("click",(e)=>{
        urlMaxFilter=new URLSearchParams(new FormData(form)).toString();
        info.innerHTML = '';
        if(urlMaxFilter==''){

            Query.Request.Get(`http://localhost/BackEndFilter/Controller/dbworker.php?All=all`).then((data) => {
                for (let item in data) {
                    info.innerHTML += `
                    <span class='data'> ${data[item].Name}</span> 
                    <span class='data'> ${data[item].Surname}</span>
                    <span class='data'> ${data[item].Country}</span>
                    <span class='data'> ${data[item].City}</span>
                    <span class='data'>$ ${data[item].Salary}</span>
                    `;
                }
            });
        }else{
            Query.Request.Get(`http://localhost/BackEndFilter/Controller/dbworkerAll.php?${urlMaxFilter}`).then((data) => {
                for (let item in data) {
                 info.innerHTML += `
                 <span class='data'> ${data[item].Name}</span> 
                 <span class='data'> ${data[item].Surname}</span>
                 <span class='data'> ${data[item].Country}</span>
                 <span class='data'> ${data[item].City}</span>
                 <span class='data'>$ ${data[item].Salary}</span>
                 `;
             }
             });
        }
        
    })
    AD.addEventListener('click', (e) => {
        let AD = e.target.getAttribute('data-AD');
        
        info.innerHTML='';
        if(urlMaxFilter===''){
           
            Query.Request.Get(`http://localhost/BackEndFilter/Controller/dbworker.php?
                data-AD=${e.target.getAttribute('data-AD')}&&data-key=${e.target.getAttribute('data-key')}`).then((data) => {
                for (let item in data) {
                    info.innerHTML += `
                    <span class='data'> ${data[item].Name}</span> 
                    <span class='data'> ${data[item].Surname}</span>
                    <span class='data'> ${data[item].Country}</span>
                    <span class='data'> ${data[item].City}</span>
                    <span class='data'>$ ${data[item].Salary}</span>
                    `;
                }
            });
        }else{
            filter=`&data-AD=${e.target.getAttribute('data-AD')}&data-key=${e.target.getAttribute('data-key')}`;
            Query.Request.Get(`http://localhost/BackEndFilter/Controller/dbworkerAll.php?${urlMaxFilter+filter}`).then((data) => {
               
                for (let item in data) {
                 info.innerHTML += `
                 <span class='data'> ${data[item].Name}</span> 
                 <span class='data'> ${data[item].Surname}</span>
                 <span class='data'> ${data[item].Country}</span>
                 <span class='data'> ${data[item].City}</span>
                 <span class='data'>$ ${data[item].Salary}</span>
                 `;
             }
            
             });
        }
     
        if (AD === 'DESC') {
            e.target.setAttribute('data-AD', `ASC`);
            e.target.className = `filter-view`
        } else {
            e.target.setAttribute('data-AD', `DESC`);
            e.target.className = `filter-view-s`
        }
    });

  
});

