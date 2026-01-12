let Boton_crear= document.getElementById("Crear_partida")
let Boton_Unirse= document.getElementById("Unirse_partida")

let Codigo_crear=document.getElementById("Codigo_crear")
let Codigo_Unirse=document.getElementById("Codigo_Unirse")

let Codigo =""
let Bucle_Verificacion;


function Crear_partida(Codigo,Accion) {
fetch("../controller/Partida.php",{
method:"POST",
headers: { "Content-Type": "application/json"},
body:JSON.stringify({
    Accion :Accion,
    Codigo :Codigo
})
    })
.then(Repuesta => Repuesta.json())
.then(Datos =>{
    if (Datos.ok==true) {
        document.getElementById("Patalla").style.display="flex"
        Bucle_Verificacion=setInterval(Verificacion,1000)
    }
})    
}

function Unirse() {
Codigo =Codigo_Unirse.value
fetch("../controller/Partida.php",{
method:"POST",
headers: { "Content-Type": "application/json"},
body:JSON.stringify({
    Accion :'Unirse',
    Codigo :Codigo
})
    })
.then(Repuesta => Repuesta.json())
.then(Datos =>{
    if (Datos.ok==true) {
         window.location.href=`/Game.html?Partida=${Codigo}`
      
    }
})    
}


function Verificacion() {
    Codigo=Codigo_crear.value
fetch("../controller/Partida.php",{
method:"POST",
headers: { "Content-Type": "application/json"},
body:JSON.stringify({
    Accion :'Verificar',
    Codigo :Codigo

})
    })
.then(Repuesta => Repuesta.json())
.then(Datos =>{
    if (Datos.ok !==false) {
         window.location.href=`/Game.html?Partida=${Codigo}`
         console.log(Datos) 

 }
document.getElementById("Patalla").style.display="flex"

}
)    
    
}


Boton_crear.addEventListener("click",()=>{
    Codigo=Codigo_crear.value
Crear_partida(Codigo,'Crear')
})


Boton_Unirse.addEventListener("click",()=>{
    Unirse()

})

