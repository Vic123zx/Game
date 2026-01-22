let button_start=document.getElementById("button_start")
let button_Multijugador =document.getElementById("button_Multijugador")



button_start.addEventListener("click",() =>{
window.location.href="Game.html"      
})

button_Multijugador.addEventListener("click",() =>{
     document.getElementById("MultiJugador").style.display="flex"
    document.getElementById("Screen_start").style.display="none"
})