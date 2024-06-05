class appMenu{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWMenu","/assets/js/components/paw-menu.js",() => {
                 let menuP = new PAWMenu(); //ver de usar tambien json
            });
         });
     }
}

let appM = new appMenu();
