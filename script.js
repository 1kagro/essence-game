escogerPregunta(0)

function escogerPregunta(n) {
    let base_preguntas = readText("base-preguntas.json")
    let interprete_bp = JSON.parse(base_preguntas)
    pregunta = interprete_bp[n]
    select_id("categoria").innerHTML = pregunta.categoria
    select_id("pregunta").innerHTML = pregunta.descripcion
    select_id("imagen").setAttribute("src", pregunta.imagen)
    select_id("categoria").innerHTML = pregunta.categoria

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