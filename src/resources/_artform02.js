console.log('Proyecto 004 - Maquetación (formulario)')

// 1.- Crear un sistema que genere dos números aleatorios y una operación (suma, resta, multiplicación)
// y muestre el resultado en un input. El usuario deberá ingresar el resultado correcto para poder enviar el formulario.   

// Obtengo los elementos de los dos números y del resultado del sistema
const num1 = document.getElementById('num1Ajax')
const operacion = document.getElementById('operacionAjax')
const num2 = document.getElementById('num2Ajax')
const respSystem = document.getElementById('respSystemAjax')

// Calculo los dos números random (entre 1 y 10) y los asigno a los elementos y hago la suma (me aseguro que los valores sean Number)
let numero1 = (Number)(Math.floor(Math.random() * 10))
let numero2 = (Number)(Math.floor(Math.random() * 10))

// Conseguir un número aleatorio del 1 al 4
let numOperacion = (Number)(Math.floor(Math.random() * 3) + 1)
console.log("Operación: " + numOperacion)

// Según la operación, asigno los números y calculo el resultado
let resultado = 0
let simbolo = ""

switch (numOperacion) {
    case 1: // Suma
        console.log("Operación: Suma")
        simbolo = "+"
        resultado = numero1 + numero2
        break
    case 2: // Resta
        console.log("Operación: Resta")
        simbolo = "-"
        resultado = numero1 - numero2
        break
    case 3: // Multiplicación
        console.log("Operación: Multiplicación")    
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
        console.log("Operación: Suma")
        simbolo = "+"
        resultado = numero1 + numero2
        break
}

console.log(numero1 + " " + simbolo + " " + numero2 + " = " + resultado)

// Asigno los valores a los elementos
num1.textContent = numero1
operacion.textContent = simbolo
num2.textContent = numero2
respSystem.value = resultado


// 2.- Al pulsar el botón "enviar" del formulario 02 envíamos los valores por Ajax al servidor y esperamos su respuesta
// Si la respuesta es correcta, muestra un mensaje de éxito, si no, muestra un mensaje de error.

// 2.1 Recogemos los elementos del formulario

const formulario = document.getElementById('idFormAjax')
const btnEnviarAjax = document.getElementById('btnEnviarAjax')
const mensajeGraciasAjax = document.getElementById('mensajeGraciasAjax')
const errorAjax = document.getElementById('errorAjax')

formulario.addEventListener('submit', function(event) {
    event.preventDefault() // Evito que el formulario se envíe de manera automática
    const camposFormulario = new FormData(document.forms.namedItem("idFormAjax")) // Recogo los datos del formulario

    // construimos el objeto de clase XMLHttpRequest para enviar los datos al servidor
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

    // Aquí podriamos realizar alguna acción adicional mientras esperamos la respuesta del servidor
    // como mostrar un loader de carga o deshabilitar el botón de enviar para evitar múltiples envíos.


    
}) 