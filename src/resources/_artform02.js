console.log('Proyecto 004 - Maquetación (formulario)')

// 1.- Crear un sistema que genere dos números aleatorios y una operación (suma, resta, multiplicación)
// y muestre el resultado en un input. El usuario deberá ingresar el resultado correcto para poder enviar el formulario.   

// Obtengo los elementos de los dos números y del resultado del sistema
const num1 = document.getElementById('num1Ajax')
const operacion = document.getElementById('operacionAjax')
const num2 = document.getElementById('num2Ajax')
const respSystemAjax = document.getElementById('respSystemAjax')

generarCaptcha(num1, num2, operacion, respSystemAjax) // Genero el captcha al cargar la página

// 2.- Al pulsar el botón "enviar" del formulario 02 envíamos los valores por Ajax o por FETCH API al servidor y esperamos su respuesta
// Si la respuesta es correcta, muestra un mensaje de éxito, si no, muestra un mensaje de error.

// 2.1 Recogemos los elementos del formulario
const formulario = document.querySelector('#idFormAjax')
const btnEnviarAjax = document.querySelector('#btnEnviarAjax')
const inputs = formulario.querySelectorAll('input, textarea')

const modalEnvioOk = document.querySelector('#modalEnvioOk')
const mensajeOk = document.querySelector('#mensajeOk')
const btnMostrarFormulario = document.querySelector('#btnMostrarFormulario')

const errorAjax = document.querySelector('#errorAjax')
const loader = document.querySelector('#moduleloader01')

// 2.2 Agregamos el evento de click al botón de mostrar el formulario para volver a mostrar el formulario después de un envío exitoso
btnMostrarFormulario.addEventListener('click', function() {
    modalEnvioOk.style.display = "none"
    formulario.style.display = "flex"
    inputs.forEach(input => input.disabled = false)
    inputs.forEach(input => {
        if (input.type !== "submit") {
            input.value = ""
        }
    }) // Limpio los campos de texto del formulario
    inputs.forEach(input => {
        if (input.type === "checkbox") {
            input.checked = false
        }
    }) // Desmarco los checkboxes
    btnEnviarAjax.disabled = false
    generarCaptcha(num1, num2, operacion, respSystemAjax) // Genero un nuevo captcha para el formulario
})

// 2.3 Agregamos el evento de submit al formulario para enviar los datos por Ajax o Fetch API
formulario.addEventListener('submit', function(event) {
    event.preventDefault() // Evito que el formulario se envíe de manera automática
    const camposFormulario = new FormData(document.forms.namedItem("idFormAjax")) // Recogo los datos del formulario

    // *******************
    // OPCION 1: Enviar los datos mediante XMLHttpRequest (más tradicional)
    // *******************

    // construimos el objeto de clase XMLHttpRequest para enviar los datos al servidor
    /*
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function() {
        if (this.status === 200) {
            // Aquí recibo la respuesta del servidor y la proceso
            // Elimino el loader de carga o habilito el botón de enviar si lo había deshabilitado
            
            console.log(this.responseText)
            var jsonResponse = JSON.parse(this.responseText) // Parseo la respuesta JSON del servidor
            var mensaje = jsonResponse.mensaje
            var fallo = jsonResponse.fallo

            if (fallo) {
                console.log("Error: " + mensaje)
                errorAjax.innerHTML = mensaje
                mensajeGraciasAjax.innerText = ""
            } else {
                console.log("Éxito: " + mensaje)
                mensajeGraciasAjax.innerHTML = mensaje
                errorAjax.innerText = ""
                formulario.style.display = "none" // Oculto el formulario
            }
            
        } else {
            console.log("Error en la comunicación con el servidor. Código de estado: " + this.status)
        }
    }

    // Envío los datos al servidor (index.php) mediante POST
    xmlhttp.open("POST", "/App/artform02.php", true)
    xmlhttp.send(camposFormulario)
    */

    // *******************
    // OPCION 2: Enviar los datos mediante FETCH API (más moderno y sencillo que XMLHttpRequest)
    // *******************

    // Solución IGOR: (Profesor)
    /*
    fetch("/App/artForm02.php", { method: "POST", body: camposFormulario })
    .then(async (res) => {
        if (!res.ok) throw new Error(`HTTP ${res.status}`)
 
        const texto = await res.text()
        console.log(texto)              // equivalente a xmlhttp.responseText
 
        return JSON.parse(texto)        // equivalente a JSON.parse(xmlhttp.responseText)
    })
    .then(({ mensaje, fallo, campo }) => {
 
        // quitaría el loader
 
        // lógica una vez se recibe con éxito la respuesta y los valores
        if (fallo === true) {
            errorForm02.innerText = mensaje
        } else {
            formulario.style.display = "none"
            h3Form02.innerText = mensaje
        }
    })
    .catch((err) => {
 
        // quitaría el loader
 
        console.error(err)
        errorForm02.innerText = "Ha ocurrido un error al enviar el formulario."
    })
    */ 


    fetch('App/artform02.php', {
        method: 'POST',
        body: camposFormulario
    })
    .then(response => response.json())
    .then(data => {
        // Ocultamos el loader de carga, quitamos el blur del formulario.
        // Habilitamos el botón de enviar y los campos del formulario
        loader.style.display = "none"
        formulario.style.filter = "blur(0px)" 
        btnEnviarAjax.style.pointerEvents = "initial" 
        
        inputs.forEach(el => {
            el.disabled = false
        })

        console.log(data)
        var mensaje = data.mensaje
        var fallo = data.fallo

        if (fallo) {
            console.log("Error: " + mensaje)
            errorAjax.innerHTML = mensaje
        } else {
            console.log("Éxito: " + mensaje)
            errorAjax.innerText = ""
            formulario.style.display = "none" // Oculto el formulario

            // Mostrar un modal de éxito
            mensajeOk.innerHTML = mensaje
            modalEnvioOk.style.display = "flex"
        }
    })
    .catch(error => {
        // Ocultamos el loader de carga, quitamos el blur del formulario.
        // Habilitamos el botón de enviar y los campos del formulario
        loader.style.display = "none"
        formulario.style.filter = "blur(0px)"
        btnEnviarAjax.style.pointerEvents = "initial"

        inputs.forEach(el => {
            el.disabled = false
        })

        console.log("Error en la comunicación con el servidor: " + error)
        errorAjax.innerHTML = "Error en la comunicación con el servidor. Por favor, inténtalo de nuevo más tarde."
    })

    // Aquí podríamos realizar alguna acción adicional mientras esperamos la respuesta del servidor
    // Mostramos un loader de carga, hacemos un blur del formulario.
    // Deshabilitamos el botón de enviar, y deshabilitamos los campos del formulario
    loader.style.display = "initial"
    formulario.style.filter = "blur(2px)" 
    btnEnviarAjax.style.pointerEvents = "none"

    inputs.forEach(el => {
        el.disabled = true
    })
})

// Función para generar el captcha de la operación matemática
function generarCaptcha(num1, num2, operacion, respSystemAjax) {
    // Calculo los dos números random (entre 1 y 10) y los asigno a los elementos y hago la suma (me aseguro que los valores sean Number)
    let numero1 = (Number)(Math.floor(Math.random() * 10))
    let numero2 = (Number)(Math.floor(Math.random() * 10))

    // Conseguir un número aleatorio del 1 al 4
    let numOperacion = (Number)(Math.floor(Math.random() * 3) + 1)
    //console.log("Operación: " + numOperacion)

    // Según la operación, asigno los números y calculo el resultado
    let resultado = 0
    let simbolo = ""

    switch (numOperacion) {
        case 1: // Suma
            simbolo = "+"
            resultado = numero1 + numero2
            break
        case 2: // Resta
            simbolo = "-"
            resultado = numero1 - numero2
            break
        case 3: // Multiplicación
            simbolo = "*"
            resultado = numero1 * numero2
            break
        /*
        case 4: // División
            console.log("Operación: División")  
            simbolo = "/"   
            // Me aseguro de evitar divisiones por cero
            if (numero2 === 0) {
                numero2 = 1
            }
            resultado = Math.floor(numero1 / numero2) // División entera
            break
        */
        default: // Suma
            simbolo = "+"
            resultado = numero1 + numero2
            break
    }

    // Asigno los valores a los elementos
    num1.textContent = numero1
    operacion.textContent = simbolo
    num2.textContent = numero2
    respSystemAjax.value = resultado
}
