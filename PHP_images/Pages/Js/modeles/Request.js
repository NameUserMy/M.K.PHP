


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


     static async MultipartPost(url, data) {

        const formData = new FormData();
        formData.append('uploadFile', data.files[0]);
 
        return await fetch(url, {
            method: 'POST',
            body: formData,
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