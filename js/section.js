let button_start=document.getElementById("button_start")
let button_Multijugador =document.getElementById("button_Multijugador")
let Tips = true

button_start.addEventListener("click",() =>{
window.location.href="Game.html"      
})

button_Multijugador.addEventListener("click",() =>{
     document.getElementById("MultiJugador").style.display="flex"
    document.getElementById("Screen_start").style.display="none"
})



// Tur
function Tur() {
    let c = 0
    let Mesaje = ["Dale iniciar para empezar una partida","Crear tu partida multijuagdor","Puede ver los ajuste(todavia en desarrolo)","Ver los creditos(Desarrollo)"]
   document.getElementById("Next").addEventListener('click',() =>{
    Boton(c)
      if (c >= 4 ) {
        document.querySelector(".card_tur").style.display="none"
       }
       document.getElementById("Tur").textContent=Mesaje[c] 
      c++
   }) 
}
if(Tips == true){
Tur()
}
function Boton(c) {
     document.querySelectorAll(".button_screen")[c].classList.toggle("C")
}



