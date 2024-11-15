import Query from "./Modules/Request.js";
document.addEventListener("DOMContentLoaded", () => {

    const msg = document.getElementById('info-server');
    const login = document.getElementById('login');
    const form = document.getElementById('form-User');
    const send = document.getElementById('button');
    msg.innerHTML = '';
    send.addEventListener('click', (e) => {
        e.preventDefault();
        Query.Request.Post('http://localhost:/BackEnd/controller/registration.php', form).then((data) => {
            if (data['Status']) {

                msg.innerHTML = 'Registration successful';
            } else {
                msg.innerHTML = 'Registration faild';

            }

        });

    });

    login.addEventListener('input', (e) => {
        if (e.currentTarget.value.trim().length > 4) {
            console.log(e.currentTarget.value.trim().length);
            Query.Request.Get(`http://localhost:/BackEnd/controller/isExist.php?check=${e.currentTarget.value.trim()}`).then((data) => {
                console.log(data);
                if (data['Status']) {

                    msg.innerHTML = 'Login successful';
                    send.removeAttribute('disabled');


                } else {
                    msg.innerHTML = 'Login faild';
                    send.setAttribute('disabled','true');
    
                }
            });
           
        }else{
            msg.innerHTML = 'Login faild';
            send.setAttribute('disabled','true');
        }

    })
});