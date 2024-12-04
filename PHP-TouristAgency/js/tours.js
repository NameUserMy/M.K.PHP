
import Query from "./modules/Request.js";

document.addEventListener("DOMContentLoaded", () => {
    const country = document.getElementById('country');
    const selectCountry = document.getElementById('countryOpt');
    const selectCity = document.getElementById('cityOpt');
    const table = document.getElementById('all-info');
    selectCity.setAttribute('hidden', true);
    //Get All country
    Query.Request.Get(`http://localhost/BackEndToursAjax/tours.php?countries`).then((data) => {
        for (let item in data) {

            selectCountry.innerHTML += `<option  value="${data[item].id}">${data[item].country}</option>`;
        }

    });
    //**********************/

    selectCountry.addEventListener("change", (e) => {
        let countryes = '';
        countryes = new URLSearchParams(new FormData(country)).toString();
        console.log("GET1", countryes.split('&'));
        if (e.target.value !== 0) {
            selectCity.innerHTML = '<option  value="0">Select city...</option>';
            Query.Request.Get(`http://localhost/BackEndToursAjax/tours.php?` + countryes.split('&')[0]).then((data) => {
                for (let item in data) {

                    selectCity.innerHTML += `<option  value="${data[item].id}">${data[item].city}</option>`;
                }

            });
            selectCity.removeAttribute('hidden');
        }
    });

    selectCity.addEventListener("change", (e) => {
        let countryes = '';
        countryes = new URLSearchParams(new FormData(country)).toString();

        console.log("GET", countryes)
        Query.Request.Get(`http://localhost/BackEndToursAjax/tours.php?` + countryes).then((data) => {
            for (let item in data) {

                table.innerHTML = `
                <thead style="font-weight: bold"> 
                <td>Hotel</td><td>Country</td><td>City</td> <td>Price</td><td>Stars</td><td>link</td>
                </thead>
                
                <tr id=${data[item].id}>
                <td>
                ${data[item].hotel}

                </td>
                 <td>
                ${data[item].country}

                </td>
                 <td>
                ${data[item].city}

                </td>
                 <td>
                ${data[item].cost}

                </td>
                 <td>
                ${data[item].stars}

                </td>
                 <td> <a href="pages/hotelinfo.php?hotel=${data[item].id}" target="_blank"> more info</a></td>
                </tr>
                `
            }
        });
    })

});


