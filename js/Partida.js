const Btn = document.querySelectorAll(".div_objeto")
const parms = new URLSearchParams(window.location.search)
const Partida = parms.get("Partida")

Btn.forEach(Btn => {
    Btn.addEventListener("click",()=>{
        fetch("./logica/Partida.php",{
            method:"POST",
            headers: { "Content-Type": "application/json"},
            body:JSON.stringify({Codigo : Partida,
                                 Accion:'Insertar'
            })

        })
        .then(r =>r.json())
        .then(d=>{
            console.log(d)
        })
    })
    
});