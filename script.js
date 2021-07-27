window.onload = function() {
    base_preguntas = readText("base-preguntas.json")
    interprete_bp = JSON.parse(base_preguntas)
    escogerPreguntaAleatoria()
    select_id("respuesta").style.display = "none"
}

let pregunta
let posibles_respuestas
let posibles_categorias

btn_correspondiente = [
  select_id("btn1"), select_id("btn2"),
  select_id("btn3"), select_id("btn4")
]
npreguntas = []

let preguntas_hechas = 0
let preguntas_correctas = 0

function escogerPreguntaAleatoria() {
    let n = Math.floor(Math.random() * interprete_bp.length)

    while (npreguntas.includes(n)) {
        n++
        if (n >= interprete_bp.length) {
            n = 0
        }
        if (npreguntas.length == interprete_bp.length) {
            npreguntas = []
        }
    }
    npreguntas.push(n)
    preguntas_hechas++

    escogerPregunta(n)
}


function escogerPregunta(n) {
    pregunta = interprete_bp[n]
    select_id("categoria").innerHTML = pregunta.categoria
    select_id("pregunta").innerHTML = pregunta.descripcion
    select_id("imagen").setAttribute("src", pregunta.imagen)
    
    style("imagen").objectFit = pregunta.objectFit;
    desordenarRespuestas(pregunta)
    if (pregunta.imagen) {
        select_id("imagen").setAttribute("src", pregunta.imagen)
        style("imagen").height = "20rem"
        style("imagen").width = "70%"
    } else {
        style("image").height = "0px"
        style("image").width = "0px"
        setTimeout(() => {
            select_id("imagen").setAttribute("src", "")
        }, 500);
    }
}

function desordenarRespuestas(pregunta) {
    posibles_categorias = [
        pregunta.categoria,
        pregunta.categoria1,
        pregunta.categoria2
    ]
    posibles_respuestas = [
        pregunta.respuesta,
        pregunta.incorrecta,
        pregunta.incorrecta2,
        pregunta.incorrecta3
    ]

    posibles_respuestas.sort(() => Math.random() - 0.5)

    select_id("btn11").innerHTML = posibles_respuestas[0]
    select_id("btn22").innerHTML = posibles_respuestas[1]
    select_id("btn33").innerHTML = posibles_respuestas[2]
    select_id("btn44").innerHTML = posibles_respuestas[3]

    
}

let suspender_botones_cat = false
let btn_fig_correspondiente = [
    select_id("btn-cat1"), select_id("btn-cat2"),
    select_id("btn-cat3")
]
let btn_fig = [
    "btn1-fig", "btn2-fig",
    "btn3-fig", "btn4-fig",
]

let suspender_botones = false

function oprimir_btn(i) {
    if (suspender_botones) {
        return
    }
    suspender_botones = true
    if (posibles_respuestas[i] == pregunta.respuesta) {
        preguntas_correctas++
        btn_correspondiente[i].style.background = "lightgreen"
    } else {
        btn_correspondiente[i].style.background = "pink"
    }
    for (let j = 0; j < 4; j++) {
        if (posibles_respuestas[j] == pregunta.respuesta) {
            btn_correspondiente[j].style.background = "lightgreen"
            break
        }
    }
    setTimeout(() => {
        reiniciar()
        suspender_botones = false
    }, 3000);
}

function img_btn(i) {
    if (i == 0) {
        for (let j = 0; j < 4; j++){
            if (posibles_respuestas[j] == "Actividad") {
            select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/WyKcdr7/Actividad-C.png")
            } else if (posibles_respuestas[j] == "Alfa") {
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/6nzt4GX/AlfaC.png")
            } else if (posibles_respuestas[j] == "Competencia"){
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/tzFgTG8/Competencia-C.png")
            } else if (posibles_respuestas[j] == "Espacio de actividad") {
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/M5L34JK/EspacioC.png")
            }
        }
    } else if (i == 1) {
        for (let j = 0; j < 4; j++){
            if (posibles_respuestas[j] == "Actividad") {
            select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/jVfdPMF/Actividad-S.png")
            } else if (posibles_respuestas[j] == "Alfa") {
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/zfzBhyx/AlfaS.png")
            } else if (posibles_respuestas[j] == "Competencia"){
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/2yBK7ck/Competencia-S.png")
            } else if (posibles_respuestas[j] == "Espacio de actividad") {
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/Gtc0K7K/EspacioS.png")
            }
        }
    } else if (i == 2) {
        for (let j = 0; j < 4; j++){
            if (posibles_respuestas[j] == "Actividad") {
            select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/kBwNc0m/Actividad-E.png")
            } else if (posibles_respuestas[j] == "Alfa") {
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/kBwNc0m/Actividad-E.png")
            } else if (posibles_respuestas[j] == "Competencia"){
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/5kysHC5/Competencia-E.png")
            } else if (posibles_respuestas[j] == "Espacio de actividad") {
                select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/P58CQH4/EspacioE.png")
            }
        }
    }
}

function oprimir_btn_Cat(i) {
    if (suspender_botones_cat) {
        return
    }
    suspender_botones_cat = true
    //if (posibles_categorias[0] == pregunta.categoria) {
        if (i == 0) {
            if (posibles_categorias[0] == pregunta.categoria && posibles_categorias[0] == "Cliente"){
                /*for (let j = 0; j < 4; j++){
                    if (posibles_respuestas[j] == "Actividad") {
                    select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/WyKcdr7/Actividad-C.png")
                    } else if (posibles_respuestas[j] == "Alfa") {
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/6nzt4GX/AlfaC.png")
                    } else if (posibles_respuestas[j] == "Competencia"){
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/tzFgTG8/Competencia-C.png")
                    } else if (posibles_respuestas[j] == "Espacio de actividad") {
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/M5L34JK/EspacioC.png")
                    }
                }*/
                btn_fig_correspondiente[i].style.background = "lightgreen"
                //btn_fig_correspondiente[1].style.background = "pink"
                //btn_fig_correspondiente[2].style.background = "pink"
            } else {
                btn_fig_correspondiente[i].style.background = "pink"
            }
        } else if (i == 1) {
            if (posibles_categorias[0] == pregunta.categoria && posibles_categorias[0] == "Solucion") {
                /* for (let j = 0; j < 4; j++){
                    if (posibles_respuestas[j] == "Actividad") {
                    select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/jVfdPMF/Actividad-S.png")
                    } else if (posibles_respuestas[j] == "Alfa") {
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/zfzBhyx/AlfaS.png")
                    } else if (posibles_respuestas[j] == "Competencia"){
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/2yBK7ck/Competencia-S.png")
                    } else if (posibles_respuestas[j] == "Espacio de actividad") {
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/Gtc0K7K/EspacioS.png")
                    }
                } */
                btn_fig_correspondiente[i].style.background = "lightgreen"
                //btn_fig_correspondiente[0].style.background = "pink"
                //btn_fig_correspondiente[2].style.background = "pink"
            } else {
                btn_fig_correspondiente[i].style.background = "pink"
            }
        } else if (i == 2) {
            if (posibles_categorias[0] == pregunta.categoria && posibles_categorias[0] == "Esfuerzo") {
                /* for (let j = 0; j < 4; j++){
                    if (posibles_respuestas[j] == "Actividad") {
                    select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/kBwNc0m/Actividad-E.png")
                    } else if (posibles_respuestas[j] == "Alfa") {
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/kBwNc0m/Actividad-E.png")
                    } else if (posibles_respuestas[j] == "Competencia"){
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/5kysHC5/Competencia-E.png")
                    } else if (posibles_respuestas[j] == "Espacio de actividad") {
                        select_id(btn_fig[j]).setAttribute("src", "https://i.ibb.co/P58CQH4/EspacioE.png")
                    }
                } */
                btn_fig_correspondiente[i].style.background = "lightgreen"
                //btn_fig_correspondiente[0].style.background = "pink"
                //btn_fig_correspondiente[1].style.background = "pink"
            } else {
                btn_fig_correspondiente[i].style.background = "pink"
            }
        }
        for (let j = 0; j < 3; j++) {
            if (pregunta.categoria == "Cliente") {
                btn_fig_correspondiente[0].style.background = "lightgreen"
                img_btn(0)
                //btn_fig_correspondiente[1].style.background = "pink"
                //btn_fig_correspondiente[2].style.background = "pink"
                break
            } else if (pregunta.categoria == "Solucion") {
                btn_fig_correspondiente[1].style.background = "lightgreen"
                img_btn(1)
                //btn_fig_correspondiente[0].style.background = "pink"
                //btn_fig_correspondiente[2].style.background = "pink"
                break
            } else if (pregunta.categoria == "Esfuerzo") {
                btn_fig_correspondiente[2].style.background = "lightgreen"
                img_btn(2)
                //btn_fig_correspondiente[1].style.background = "pink"
                //btn_fig_correspondiente[0].style.background = "pink"
                break
            }
        }
        setTimeout(() => {
            suspender_botones_cat = false
            select_id("respuesta").style.display = "flex"
        }, 3000);
    //}
    style("btn1-fig").height = "4rem"
    style("btn2-fig").height = "4rem"
    style("btn3-fig").height = "4rem"
    style("btn4-fig").height = "4rem"
}

function reiniciar() {
    for (const btn of btn_fig_correspondiente) {
        btn.style.background = "whitesmoke"
    }
    for (const btn_cat of btn_correspondiente) {
        btn_cat.style.background = "whitesmoke"
    }
    select_id("respuesta").style.display = "none"
    escogerPreguntaAleatoria()
}

function select_id(id) {
    return document.getElementById(id)
}

function style(id) {
    return select_id(id).style
}

function readText(ruta_local) {
    let texto = null;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", ruta_local, false);
    xmlhttp.send();
    if (xmlhttp.status == 200) {
        texto = xmlhttp.responseText;
    }
    return texto;
}