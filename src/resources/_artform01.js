console.log('Proyecto 004 - Maquetación (formulario)')

// Obtengo los elementos de los dos números y del resultado del sistema
const num1 = document.getElementById('num1')
const operacion = document.getElementById('operacion')
const num2 = document.getElementById('num2')
const respSystem = document.getElementById('respSystem')

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
