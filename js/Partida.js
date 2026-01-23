
const Btn = document.querySelectorAll(".div_objeto")
const parms = new URLSearchParams(window.location.search)
const Partida = parms.get("Partida")

if (!Partida) {
    window.location.href="index.html"

}

Btn.forEach(Btn => {
    Btn.addEventListener("click",()=>{
        fetch("./controller/Partida.php",{
            method:"POST",
            headers: { "Content-Type": "application/json"},
            body:JSON.stringify({Codigo : Partida,
                                 Accion:'Insertar',
                                 Posicion:Btn.getAttribute("data-posicion")
                                })

        })
        .then(r =>r.json())
        .then(d =>{
    console.log(d)
            })
        }
    )});

function Render(Codigo) {
    fetch("./controller/Partida.php",{
        method:"POST",
        headers: { "Content-Type": "application/json"},
        body: JSON.stringify({
            Codigo : Codigo,
            Accion:'Actualizar',
        })
        

    })

    .then(r => r.json())
    .then(d=>{
  Agregar(d.tabla.tablero)

    })
    
}

Render(Partida)

function Agregar(d) {

     document.querySelectorAll(".div_objeto").forEach((C,i)=>{
    if (C.dataset.ocupado)return;
   
    switch (d[i]) {
    case "X":
    const X =document.createElement("i")
    X.classList.add("bi","bi-x","X")
    C.appendChild(X)
    C.setAttribute("data-ocupado", true);
                break;
             case "0":
     const Circulo =document.createElement("i")
    Circulo.classList.add("bi","bi-circle","Circulo")
    C.appendChild(Circulo)
    C.setAttribute("data-ocupado", true);
                break;
        
            default:""
                break;
        }
    



     })

}

setInterval(()=>{
    Render(Partida)
},1000)
    
