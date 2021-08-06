function traerConceptos(){
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "/obtenerConceptos", false);
	xhr.send();

	var respuesta = xhr.responseText;

	console.log(respuesta);
	return JSON.parse(respuesta);
}

//var conceptos = traerConceptos();
var tiempoLimite;
var jugadores;
var equipos;
var jugadorActual = 1;
var jugadaActual = {};
jugadaActual.jugador = 1;
var timer;
var contadorTemporizador;
var funcionTemporizador;
var temporizadorAlerta;
var configuracion;
var equipos_config;


function generarConcepto(){

	function getRandom(max) {
  		return Math.floor(Math.random()*max)+0;
	}

	var numGenerado = getRandom(conceptos.length);
	console.log(numGenerado);

	var concepto = {};
	concepto.nombre =  conceptos[numGenerado].nombre;
	concepto.descripcion = conceptos[numGenerado].descripcion;
	concepto.id = conceptos[numGenerado].id;
	concepto.tipo = conceptos[numGenerado].tipo;

	console.log("---------");
	console.log(JSON.stringify(concepto));
	return concepto;
}


function guardarConfiguracion(){
	var configuracion = {};
	configuracion.equipos = [];
	equipos = document.getElementsByName("fields[]");
	jugadores = equipos.length;
	/* configuracion.tiempoLimite = document.getElementById("inputTiempoLimite").value * 1000; */
	console.log(equipos.length);
	for (var i = 0; i < equipos.length; i++) {
			configuracion.equipos.push(equipos[i].value);
    	 	console.log("Valor equipos"+equipos[i].value);
    	 	console.log("Valor json"+configuracion.equipos[i]);
    }
    console.log(configuracion);
   	var serializado = JSON.stringify(configuracion);
   	console.log(serializado);
   	var envio = new XMLHttpRequest();
	   
   	envio.open("POST", "guardarConfiguracion", false);
   	envio.send(serializado);
   	/* var response = JSON.parse(envio.responseText);

   	console.log(response); */
    /* window.location.href = "index.php"; */
	equipos_config = serializado;
	//window.location.href = "index.html";
}

function configurarJuego () {
/* 	var xhr = new XMLHttpRequest();
	xhr.open("GET", "/descargarConfiguracion", false);
	xhr.send();
	var respuesta = xhr.responseText;
	console.log(respuesta); */
	configuracion = equipos_config;
	/* configuracion = JSON.parse(respuesta); */
	console.log("Configuración:", configuracion);
	jugadores = configuracion.equipos.length;
/* 	contadorTemporizador = tiempoLimite/1000;
	tiempoLimite = configuracion.tiempoLimite; */
	console.log(jugadores);

	var titulo = "";
	var scores = "";

	for (var i = 0; i < configuracion.equipos.length; i++) {
		titulo = titulo + '<th>'+ configuracion.equipos[i] +'</th>';
		scores = scores + '<td id="score'+(i+1)+'">0</td>';
	}

	var contenido = '<thead class="thead-inverse"><tr><th colspan="'+configuracion.equipos.length+'">Puntaje</th></tr><tr>'+titulo+'</tr></thead><tr>'+scores+'</tr>';
	document.getElementById("tablaPuntuaciones").innerHTML = contenido;
	rellenarInfo();
}

function rellenarInfo(){
/* 	clearInterval(funcionTemporizador);
	clearTimeout(timer); */
	/* var concepto = generarConcepto();
	document.getElementById("nombreConcepto").innerHTML = concepto.nombre;
	document.getElementById("descripcion").innerHTML = concepto.descripcion; */
	document.getElementById("jugadorActual").innerHTML = "Equipo en turno: "+ configuracion.equipos[jugadaActual.jugador-1];
	console.log(jugadores);
	jugadaActual.numeroSeleccionado = concepto.id;
	jugadaActual.tipoSeleccionado = concepto.tipo;
	timer = setTimeout(cambiarTurno,tiempoLimite);
}

function jugar(id){
	var numeroBtnSeleccionado = id.substring(id.length-1, id.length);
	var TipoSeleccionado = id.substring(id.length-2, id.length-1);
	console.log("Categoria: "+ TipoSeleccionado);
	console.log("#Boton: " +  numeroBtnSeleccionado);

	if(numeroBtnSeleccionado == "5" &&
		numeroBtnSeleccionado == jugadaActual.numeroSeleccionado){
		document.getElementById("score"+jugadaActual.jugador).innerHTML = parseInt(document.getElementById("score"+jugadaActual.jugador).innerHTML)+1;
		cambiarTurno();
		rellenarInfo();
		audioCorrecto();
	} else if(TipoSeleccionado == jugadaActual.tipoSeleccionado
				&& numeroBtnSeleccionado == jugadaActual.numeroSeleccionado){
		document.getElementById("score"+jugadaActual.jugador).innerHTML = parseInt(document.getElementById("score"+jugadaActual.jugador).innerHTML)+1;
		cambiarTurno();
		rellenarInfo();
		audioCorrecto();
	}else {
		rellenarInfo();
		mostrarAlerta();
		cambiarTurno();
		audioIncorrecto();
	}
}

function cambiarTurno(){
	clearInterval(funcionTemporizador);
	clearTimeout(timer);
	jugadaActual.jugador++;
	if(jugadaActual.jugador>jugadores){
		jugadaActual.jugador = 1;
	}
	document.getElementById("jugadorActual").innerHTML = "Equipo en turno: " + configuracion.equipos[jugadaActual.jugador-1];
	//temporizador = setInterval(temporizador,1000);
	timer = setTimeout(cambiarTurno,tiempoLimite);


}

function terminarJuego () {

	var puntajes = document.getElementById("tablaPuntuaciones").getElementsByTagName("td");
	puntajes = [].slice.call(puntajes);
	puntajes = puntajes.map(function (celda) {
		return parseInt(celda.innerText);
	});
	var maxPuntaje = puntajes.indexOf(Math.max.apply(null,puntajes));


	var puntajesOrdenados = puntajes.slice();
	var puntajesOrdenados = puntajesOrdenados.sort(function(a,b){return b - a;});


	var nombreTeamGanador = configuracion.equipos[maxPuntaje];
	console.log(nombreTeamGanador);
	document.getElementById("equipo-ganador").innerHTML = nombreTeamGanador;
	document.getElementById("puntos-ganador").innerHTML = "con "+ Math.max.apply(null,puntajes) + " puntos";


	var tabla = "";
	for (var i = 1; i < puntajesOrdenados.length; i++) {
		tabla = tabla + "<tr><td>"+configuracion.equipos[puntajes.indexOf(puntajesOrdenados[i])]+"</td><td>"+puntajesOrdenados[i]+"</td></tr>";
	}
	document.getElementById("tablaResultados").innerHTML = tabla;

}

function audioCorrecto () {
	document.getElementById("contenedorAlerta").innerHTML ='<div id="alerta" class="alert alert-success alert-dismissible fade show text-center" role="alert">Respuesta Correcta!</div>';
	temporizadorAlerta = setTimeout(ocultarAlerta,1500);
	document.getElementById("audioCorrecto").play();
}

function audioIncorrecto () {
	document.getElementById("contenedorAlerta").innerHTML ='<div id="alerta" class="alert alert-danger alert-dismissible fade show text-center" role="alert">Respuesta Incorrecta!</div>';
	temporizadorAlerta = setTimeout(ocultarAlerta,1500);
	document.getElementById("audioIncorrecto").play();
}

function mostrarAlerta(){

}
function ocultarAlerta(){
	$("#alerta").alert("close");
	clearTimeout(temporizadorAlerta);
}
