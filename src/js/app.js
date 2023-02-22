document.addEventListener("DOMContentLoaded",function(){
    funcion1();
    darkmode();
});

function darkmode(){
    const preferencias = window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(preferencias.matches);
   
    if(preferencias.matches){
        document.body.classList.toggle('dark-mode');
    }
    preferencias.addEventListener('change',darkfuncion());
    const dark = document.querySelector('.darkmode');
    dark.addEventListener('click',darkfuncion);
}

function darkfuncion(){
    document.body.classList.toggle('dark-mode');
}


function funcion1(){
  const mobilmenu = document.querySelector('.mobil');
  mobilmenu.addEventListener('click',navegacionresponsive);
}
function navegacionresponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
   

}