


 class Request {

     static async Get(url) {
        return await fetch(url, {
            method: 'Get',
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


    }


     static async Post(url, data) {
      
        console.log("kkkk",JSON.stringify(data.serializeObject()));
        return await fetch(url, {
            method: 'POST',
            body: JSON.stringify(Object.fromEntries(data)),
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
    }

}

export default {Request};