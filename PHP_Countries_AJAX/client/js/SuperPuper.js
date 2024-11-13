
document.addEventListener("DOMContentLoaded", function () {

    const options = document.getElementById("countries");
    const cities = document.getElementById("cities");

    Get('http://localhost/Mysite/countries.php').then((data) => {


        for (item in data) {
            let id=item;
            id++;
            options.innerHTML += `<option name="countries" value="${id}">${data[item]}</option>`;
        }
    });
    options.addEventListener("change", (e) => {

        cities.innerHTML='';
        Get(`http://localhost/Mysite/cities.php?cities=${e.currentTarget.value}`).then((data) => {

            for (item of data) {
                cities.innerHTML += `<span>${item}</span>`;
            }
        });
        
    });


});



async function Get(url) {

    const headers = {
        'Accept': 'application/json',
        "Content-Type": "application/json;charset=UTF-8",
    }
    return await fetch(url, {
        method: 'GET',
        header: headers,
        mode: "cors",
    }).then(response => {

        if (response.ok) {

            return response.json();

        } else {
            return response.json().then(error => {

                const e = new error("Ex...");
                e.data = error;

            });
        }
    });
};