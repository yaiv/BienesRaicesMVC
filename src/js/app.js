//Menu hamburguesa que oculta y muestra los elementos 
//Tan pronto como se cargue el documento ejecuta esta funcion 
document.addEventListener('DOMContentLoaded', function(){

    eventListeners();
    darkMode();
});

function eventListeners(){
    const mobileMenu = document.querySelector ('.mobile-menu'); //Se eligue elemento del html   
    //Se da clic en mobileMenu -Se registra el click --Se manda a llamar la funcion 
    mobileMenu.addEventListener('click', navegacionResponsive) ///Cuando se de click en mobil menu se ejecuta la funcion 

    //Muestra campos condicionales 
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');

     metodoContacto.forEach(input=> input.addEventListener('click', mostrarMetodosContacto))
     
     // Restaurar campos condicionales si hay datos previos
     restaurarCamposCondicionales();
 }

//Se genera clase mostrar al seleccionar la navegacion en responsi
 function navegacionResponsive() {
    const navegacion = document.querySelector ('.navegacion') //Se eligue elemento del html 
    //Si contiene la clase de mostrar, removerla
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');

    }else{//caso contrario agregarla 
        navegacion.classList.add('mostrar');
    }    
 }

 function mostrarMetodosContacto( e ){
    const contactoDiv = document.querySelector('#contacto');
    
    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]" required>
                
                <p>Elija la fecha y la hora para la llamada</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="contacto[fecha]" required>

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" required>
        `;
    }  else {
        contactoDiv.innerHTML = `
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
        `;
    }
    
}

function restaurarCamposCondicionales() {
    const contactoDiv = document.querySelector('#contacto');
    const radioTelefono = document.querySelector('input[value="telefono"]');
    const radioEmail = document.querySelector('input[value="email"]');
    
    // Verificar si hay un radio button seleccionado
    if(radioTelefono && radioTelefono.checked) {
        contactoDiv.innerHTML = `
                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]" required>
                
                <p>Elija la fecha y la hora para la llamada</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="contacto[fecha]" required>

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" required>
        `;
    } else if(radioEmail && radioEmail.checked) {
        contactoDiv.innerHTML = `
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
        `;
    }
}

//Boton para DARK MODE 

//Se genera funcion con toggle 
function darkMode (){

    //Preferencia de modo se visualiza en consola mediante 
    //window.matchMedia('(prefers-color-scheme: dark)');

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }
    //Cuando se presente prefiereDarkMode se va a ejecutar el sig codigo 
    //Es decir desde las preferencias ya del S.O.
    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    })


    const btnDarkMode = document.querySelector ('.dark-mode-boton'); //Se eligue elemento del html 
    btnDarkMode.addEventListener('click', function() { //Cuando se de click en btnDarkMode se ejecuta la funcion 
        document.body.classList.toggle('dark-mode'); //toggle va a crear en el body la clase 'dark-mode' en caso de que ya se cuente con ella la remueve 
    })
}

