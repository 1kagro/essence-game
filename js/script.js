window.onload = function() {
    base_preguntas = readText("base-preguntas.json")
    interprete_bp = JSON.parse(base_preguntas)
    escogerPreguntaAleatoria()
    select_id("respuesta").style.display = "none"
}

let pregunta
let posibles_respuestas
let posibles_categorias

//Quiz_App
const ruleta_btn = select_id("ruleta_btn");
const classic_btn = select_id("classic_btn");
const new_btn = select_id("new_btn");

//const info_box_ruleta = select_class(".info-box_ruleta");

const info_box_ruleta = select_id("info-ruleta")
const info_box_classic = select_id("info-classic")
const info_box_new = select_id("info-new")

const set_game_mode = select_class(".set-game_mode");

const option_list = document.querySelector(".respuesta");
const option_list_cat = document.querySelector(".cat");


const exit_btn_ruleta = info_box_ruleta.querySelector(".buttons .quit");
const continue_btn_ruleta = info_box_ruleta.querySelector(".buttons .restart")

const exit_btn_classic = info_box_classic.querySelector(".buttons .quit");
const continue_btn_classic = info_box_classic.querySelector(".buttons .restart")

const exit_btn_new = info_box_new.querySelector(".buttons .quit");
const continue_btn_new = info_box_new.querySelector(".buttons .restart");
const new_mode_box = document.querySelector(".container");

const timeCount = new_mode_box.querySelector(".timer .timer_sec");
const timeLine = new_mode_box.querySelector("header .time_line");
const timeOff = new_mode_box.querySelector("header .time_tex");


//console.log(new_mode_box)
// --------- Ruleta ---------

//If ruleta button clicked
ruleta_btn.onclick = () => {
    info_box_ruleta.classList.add("activeInfo"); //show
}
//If Exit button clicked
exit_btn_ruleta.onclick = () => {
    info_box_ruleta.classList.remove("activeInfo"); //hide
}

// --------- Classic ---------

//If classic button clicked
classic_btn.onclick = () => {
    info_box_classic.classList.add("activeInfo"); //show 
}
//If Exit button clicked
exit_btn_classic.onclick = () => {
    info_box_classic.classList.remove("activeInfo"); //hide
}

// --------- New ---------

//If new button clicked
new_btn.onclick = () => {
    info_box_new.classList.add("activeInfo"); //show
}
//If Exit button clicked
exit_btn_new.onclick = () => {
    info_box_new.classList.remove("activeInfo"); //hide
}
//If Continue button clicked
continue_btn_new.onclick = () => {
    set_game_mode.style.display = "none"; //hide header set game mode
    info_box_new.classList.remove("activeInfo"); //hide
    new_mode_box.classList.add("activeNewMode"); // show the New mode
    startTimer(15);
    startTimerLine(0);
}

let que_count = 0;
let counter;
let counterLine;
let timeValue = 15;
let widthValue = 0;
let userScore = 0.0;
let times = 0;

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
    preguntas_hechas++;

    escogerPregunta(n)
}


function escogerPregunta(n) {
    pregunta = interprete_bp[n]
    //select_id("categoria").innerHTML = pregunta.categoria
    select_id("pregunta").innerHTML = pregunta.descripcion
    select_id("imagen").setAttribute("src", pregunta.imagen)
    
    preguntaHecha();

    style("imagen").objectFit = pregunta.objectFit;
    desordenarRespuestas(pregunta)
    if (pregunta.imagen) {
        select_id("imagen").setAttribute("src", pregunta.imagen)
        style("imagen").height = "30rem"
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
        //userScore += 1;
        userScore += (Math.floor((times/15) * 100) / 100) * 1000
        console.log(times);
        console.log(userScore);
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
    clearInterval(counter);
    clearInterval(counterLine);
    let allOptions = option_list.children.length;
    for (let i = 0; i < allOptions; i++) {
        option_list.children[i].classList.add("disable");
    }
    next_btn.style.display = "block";
}

const next_btn = new_mode_box.querySelector(".next_btn");
const result_box = select_class(".result_box");
const restart_quiz = result_box.querySelector(".buttons .restart");
const quit_quiz = result_box.querySelector(".buttons .quit");

restart_quiz.onclick = () => {
    new_mode_box.classList.add("activeNewMode");
    result_box.classList.remove("activeResult");
    preguntas_hechas = 0;
    preguntas_correctas = 0;
    let que_count = 0;
    let timeValue = 15;
    let widthValue = 0;
    let userScore = 0.0;
    let times = 0;

    timeOff.textContent = "Time Left";
    style("header").height = "14%"
    style("time_line").top = "23%"
    reiniciar();
    clearInterval(counter);
    startTimer(timeValue);
    clearInterval(counterLine);
    startTimerLine(widthValue);
    suspender_botones = false
    next_btn.style.display = "none";
    
    let allOptions = option_list.children.length;
    for (let i = 0; i < allOptions; i++) {
        option_list.children[i].classList.remove("disable");
    }
    let allOptions_cat = option_list_cat.children.length;
    for (let i = 0; i < allOptions_cat; i++) {
        option_list_cat.children[i].classList.remove("disable");
    }
}

quit_quiz.onclick = () => {
    window.location.reload();
}

// ----- Next Botton clicked -------
next_btn.onclick = () => {
    if(npreguntas.length != interprete_bp.length) {
        setTimeout(() => {
            timeOff.textContent = "Time Left";
            style("header").height = "14%"
            style("time_line").top = "23%"
            reiniciar();
            clearInterval(counter);
            startTimer(timeValue);
            clearInterval(counterLine);
            startTimerLine(widthValue);
            suspender_botones = false
            next_btn.style.display = "none";
        }, 2000);
        let allOptions = option_list.children.length;
        for (let i = 0; i < allOptions; i++) {
            option_list.children[i].classList.remove("disable");
        }
        let allOptions_cat = option_list_cat.children.length;
        for (let i = 0; i < allOptions_cat; i++) {
            option_list_cat.children[i].classList.remove("disable");
        }
    }else{
        preguntas_hechas++;
        preguntaHecha();
        clearInterval(counter);
        clearInterval(counterLine);
        showResultBox();
        console.log("Questions Completed")
    }
}

function showResultBox(){
    info_box_new.classList.remove("activeInfo"); //hide
    new_mode_box.classList.remove("activeNewMode"); // hide the New mode
    result_box.classList.add("activeResult"); // show the result box
    const scoreText = result_box.querySelector(".score_text");
    if(preguntas_correctas > ((interprete_bp.length/2) + 1)) {
        let scoreTag = '<span>and congrats! you got <p>' + p + '</p> out of <p>' + interprete_bp.length + '</p></span>' + '<span><p>Score: </p>' + userScore + '</span>';
        scoreText.innerHTML = scoreTag;
    }
    else if(preguntas_correctas > 1) {
        let scoreTag = '<span>and nice, you got <p>' + p + '</p> out of <p>' + interprete_bp.length + '</p></span>' + '<span><p>Score: </p>' + userScore + '</span>';
        scoreText.innerHTML = scoreTag;
    }
    else {
        let scoreTag = '<span>and sorry, you got only <p>' + p + '</p> out of <p>' + interprete_bp.length + '</p></span>' + '<span><p>Score: </p>' + userScore + '</span>';
        scoreText.innerHTML = scoreTag;
    }
}

// --------- Time Limited -------------
function startTimer(time) {
    counter = setInterval(timer, 1000);
    function timer() {
        timeCount.textContent = time;
        time--;
        times = time;
        if(time < 9) {
            let addZero = timeCount.textContent;
            timeCount.textContent = "0" + addZero;
        }
        if(time < 0) {
            clearInterval(counter);
            timeCount.textContent = "00";
            timeOff.textContent = "Time Off";
            times = 0;
            //Escoger la categoria correcta automaticamente
            for (let j = 0; j < 3; j++) {
                if (pregunta.categoria == "Cliente") {
                    btn_fig_correspondiente[0].style.background = "lightgreen"
                    img_btn(0)
                    break
                } else if (pregunta.categoria == "Solucion") {
                    btn_fig_correspondiente[1].style.background = "lightgreen"
                    img_btn(1)
                    break
                } else if (pregunta.categoria == "Esfuerzo") {
                    btn_fig_correspondiente[2].style.background = "lightgreen"
                    img_btn(2)
                    break
                }
            }
            let allOptions_cat = option_list_cat.children.length;
            for (let i = 0; i < allOptions_cat; i++) {
                option_list_cat.children[i].classList.add("disable");
            }
            setTimeout(() => {
                suspender_botones_cat = false
                select_id("cat").style.margin = "1.7rem"
                select_id("cat").style.height = "7rem"
                select_id("respuesta").style.marginTop = "2rem"
                select_id("respuesta").style.display = "flex"
                style("header").height = "20.5%"
                style("time_line").top = "21.5%"
                style("imagen").height = "23rem"
            }, 450);

            style("btn1-fig").height = "4rem"
            style("btn2-fig").height = "4rem"
            style("btn3-fig").height = "4rem"
            style("btn4-fig").height = "4rem"
            //Escoger la opcion de respuesta corercta automaticamente
            for (let j = 0; j < 4; j++) {
                if (posibles_respuestas[j] == pregunta.respuesta) {
                    btn_correspondiente[j].style.background = "lightgreen"
                    break
                }
            }
            let allOptions = option_list.children.length;
            for (let i = 0; i < allOptions; i++) {
                option_list.children[i].classList.add("disable");
            }
            next_btn.style.display = "block";
        }
    }
}

function startTimerLine(time) {
    counterLine = setInterval(timer, 14.9);
    function timer() {
        time += 1;
        timeLine.style.width = time + "px";
        if(time > 1119) {
            clearInterval(counterLine);
        }
    }
}
let p = 0;
// ---------- Preguntas hechas ---------------
function preguntaHecha() {
    let pc = preguntas_correctas
    if(preguntas_hechas > 1) {
        if(pc < 0) {
            pc = 0;
        }
        if(userScore < 0) {
            userScore = 0
        }
        p = pc;
        select_id("total_que").innerHTML = '<span><p>'+ pc +'</p>of<p>' + (preguntas_hechas-1) + '</p>Correct questions</span>'
    }else{
        select_id("total_que").innerHTML = ""
    }
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
    if (i == 0) {
        if (posibles_categorias[0] == pregunta.categoria && posibles_categorias[0] == "Cliente"){
            btn_fig_correspondiente[i].style.background = "lightgreen"
        } else {
            preguntas_correctas--
            userScore -= (Math.floor((times/15) * 100) / 100) * 1000
            btn_fig_correspondiente[i].style.background = "pink"
        }
    } else if (i == 1) {
        if (posibles_categorias[0] == pregunta.categoria && posibles_categorias[0] == "Solucion") {
            btn_fig_correspondiente[i].style.background = "lightgreen"
        } else {
            preguntas_correctas--
            userScore -= (Math.floor((times/15) * 100) / 100) * 1000
            btn_fig_correspondiente[i].style.background = "pink"
        }
    } else if (i == 2) {
        if (posibles_categorias[0] == pregunta.categoria && posibles_categorias[0] == "Esfuerzo") {
            btn_fig_correspondiente[i].style.background = "lightgreen"
        } else {
            preguntas_correctas--
            userScore -= (Math.floor((times/15) * 100) / 100) * 1000
            btn_fig_correspondiente[i].style.background = "pink"
        }
    }
    for (let j = 0; j < 3; j++) {
        if (pregunta.categoria == "Cliente") {
            btn_fig_correspondiente[0].style.background = "lightgreen"
            img_btn(0)
            break
        } else if (pregunta.categoria == "Solucion") {
            btn_fig_correspondiente[1].style.background = "lightgreen"
            img_btn(1)
            break
        } else if (pregunta.categoria == "Esfuerzo") {
            btn_fig_correspondiente[2].style.background = "lightgreen"
            img_btn(2)
            break
        }
    }
    let allOptions_cat = option_list_cat.children.length;
    for (let i = 0; i < allOptions_cat; i++) {
        option_list_cat.children[i].classList.add("disable");
    }
    setTimeout(() => {
        suspender_botones_cat = false
        select_id("cat").style.margin = "1.7rem"
        select_id("cat").style.height = "7rem"
        select_id("respuesta").style.marginTop = "2rem"
        select_id("respuesta").style.display = "flex"
        style("header").height = "20.5%"
        style("time_line").top = "21.5%"
        style("imagen").height = "23rem"
    }, 450);

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
    select_id("cat").style.margin = "auto"
    select_id("cat").style.height = "10rem"
    select_id("respuesta").style.marginTop = "auto"
    select_id("respuesta").style.display = "none"
    escogerPreguntaAleatoria()
}

function select_id(id) {
    return document.getElementById(id)
}

function select_class(clas) {
    return document.querySelector(clas);
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