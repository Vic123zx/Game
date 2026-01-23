let Ajuste ={
Turno : Math.floor(Math.random() * 2) + 1,
Empate:[],
Turno_actual:0,
Ganador:undefined
}
let Sonidos={
    Sonido_winner:new Audio("./Audio/Sonido_Victoria.mp3")
}
 class Player {
    constructor(Valor,Nombre){
        this.Valor=Valor
        this.Nombre=Nombre
        this.Posiciones =[];

    }}

  let Player_1= new Player(1,"Player-1")
  let Player_2= new Player(2,"Player-2")

  console.log(Sonidos.Sonido_winner)

function CrearElemento(Boton) {
if(Ajuste.Ganador !== undefined) return;
if (Boton.dataset.ocupado) return;



switch (Ajuste.Turno) {

    case 1:
    const Circulo =document.createElement("i")
    Circulo.classList.add("bi","bi-circle","Circulo")
    Boton.appendChild(Circulo)
    Boton.setAttribute("data-ocupado", "Circulo");

    Ajuste.Turno_actual=Player_1
    Ajuste.Turno= Player_2.Valor

    break;
    case 2:

    const X =document.createElement("i")
    X.classList.add("bi","bi-x","X")
    Boton.appendChild(X)
    Boton.setAttribute("data-ocupado", "x");

    Ajuste.Turno_actual=Player_2
    Ajuste.Turno= Player_1.Valor

    break;

    default:
    
    break;
}  
}

function Posicion(Boton,Player){
if(Ajuste.Ganador !== undefined) return;
if (Ajuste.Empate.includes(parseInt(Boton.dataset.posicion)))return;
    Player.Posiciones.push(parseInt(Boton.dataset.posicion))
    Ajuste.Empate.push(parseInt(Boton.dataset.posicion))
}

function Movimiento_Winner(Player) {
 const CombinacionesGanadoras = [
  [0,1,2],   
  [3,4,5],   
  [6,7,8],   

  [0,3,6],   
  [3,4,7],   
  [2,5,8],   

  [0,4,8],   
  [2,4,6]   
]

if(Ajuste.Ganador !== undefined) return;
CombinacionesGanadoras.forEach(Combos => {

    let Contador=0

    for (let i= 0; i < 3; i++) {

     if (Player.Posiciones.includes(Combos[i])) {
         Contador++
         console.log(Player_1.Posiciones)



     if (Contador>=3) {
            Ajuste.Ganador=Player
        }
    }     
}
});
}
function Empate() {
    if(Ajuste.Ganador !== undefined) return;
    if (Ajuste.Ganador == undefined && Ajuste.Empate.length >=9) {
        console.log("Empate")

             document.getElementById("Patalla").style.display="flex"
            document.getElementById("texto").textContent=`Empate`
            Sonidos.Sonido_winner.play()
    }
    
}

function Winner_alert() {
    if(Ajuste.Ganador == undefined || Ajuste.Ganador=="Empate") return;
    
            document.getElementById("Patalla").style.display="flex"
            document.getElementById("texto").textContent=`Ganador es ${Ajuste.Turno_actual.Nombre}`
            Sonidos.Sonido_winner.play()

    
}
const Objeto=document.querySelectorAll(".div_objeto")

Objeto.forEach(Boton => {
Boton.addEventListener('click',function () {

CrearElemento(Boton)
Posicion(Boton,Ajuste.Turno_actual) 
Movimiento_Winner(Ajuste.Turno_actual)
Winner_alert()
Empate()


    })
});






