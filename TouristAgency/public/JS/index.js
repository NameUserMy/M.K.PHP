
document.addEventListener("DOMContentLoaded", () => {

    const selectCountry = document.getElementById('countryOpt');
    const selectCity = document.getElementById('cityOpt');
    const form = document.getElementById('tours-form');
    const img = document.getElementsByClassName('link-img');

    if(selectCountry!=null){
      selectCountry.addEventListener("change", (e) => {
        form.submit();
      });

    }
    if(selectCity!=null){
      selectCity.addEventListener("change", (e) => {
        form.submit();
      });
    }
    galery(img);
});

function galery(img){
  let i=0;
  setInterval(() =>{

    
    if(i>=img.length){

      i=0;
    }else{  img[i].click();i++;}
  }, 2000);
}