<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/Winwheel.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/jQuery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
    body {
        /*background-image: url('https://cdn.pixabay.com/photo/2018/10/22/18/02/teacher-3765909_960_720.jpg');
        background-size: 100vw 100vh;
        /*escala automa el ancho y el alto
        background-attachment: fixed;*/
        /*para que la imagen de fondo no se mueva*/
        background: #FF7675;
        margin: 0;
    }
    #boton {
        position: absolute;
        bottom: 0rem;
        left: 27%;
    }
    canvas#canvas {
        transform: rotate(90deg);
    }
    .col-md-6#circulo {
        position: absolute;
        left: 500px;
    }
    .container {
        width: 100%;
        height: 624px;
    }
    .btn-salir {
        position: absolute;
        text-align: center;
        margin: 1rem;
        /* border-color: darkgreen; */
        border: solid white;
        padding: 1rem;
        height: 5rem;
        width: 8rem;
        background: lightseagreen;
        color: white;
        font-weight: 500;
        font-size: 2rem;
        border-radius: 1rem;
    }
    .btn-salir:hover {
        background: green;
        cursor: pointer;
    }
</style>

<body>
    <div class="btn-salir">Salir</div>
    <div class="container">
        <div class="row">
            <div class="col-md-6" id="boton">
                <br><br><br>
                <center>
                    
                    <input type="button" value="Girar" onclick="miRuleta.startAnimation();"
                        class="btn btn-success btn-lg" style="width: 200px;margin-left: 0px;border: 2px solid #ffffff">

                </center>
                <br><br>
            </div>
            <div class="col-md-6" id="circulo">
                <canvas id="canvas" height="600px" width="600px">
                </canvas>
            </div>
        </div>
    </div>



    <script>
        var miRuleta = new Winwheel({

            'numSegments': 12,
            'outerRadius': 270,
            'segments': [
                { 'fillStyle': '#227093', 'text': 'Requisitos' },
                { 'fillStyle': '#F7F1E3', 'text': 'Alfa' },
                { 'fillStyle': '#AAA69D', 'text': 'Pregunta 4' },
                { 'fillStyle': '#CD6133', 'text': 'Pregunta 7' },
                { 'fillStyle': '#FF793F', 'text': 'Pregunta 1' },
                { 'fillStyle': '#706FD3', 'text': 'Checkpoint' },
                { 'fillStyle': '#474787', 'text': 'Forma de trabajo' },
                { 'fillStyle': '#FFDA79', 'text': 'Pregunta 9' },
                { 'fillStyle': '#CCAE62', 'text': 'Reto' },
                { 'fillStyle': '#33D9B2', 'text': 'Checkpoint' },
                { 'fillStyle': '#218C74', 'text': 'Pregunta 2' },
                { 'fillStyle': '#34ACE0', 'text': 'Oportunidad' },

            ],
            'animation': {
                'type': 'spinToStop',
                'duration': 6,
                'callbackFinished': 'Mensaje()',
                'callbackAfter': 'dibujarIndicador()'
            },
        });

        dibujarIndicador();
        function Mensaje() {
            var SegmentoSeleccionado = miRuleta.getIndicatedSegment();
            alert("Listo para la  " + SegmentoSeleccionado.text);
            if (SegmentoSeleccionado.text == "Requisitos") {
                $('#myModal1').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Alfa") {
                $('#myModal2').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Pregunta 4") {
                $('#myModal3').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Pregunta 7") {
                $('#myModal4').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Pregunta 1") {
                $('#myModal5').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Checkpoint") {
                $('#myModal6').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Forma de trabajo") {
                $('#myModal7').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Pregunta 9") {
                $('#myModal8').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Reto") {
                $('#myModal9').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Checkpoint") {
                $('#myModal10').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Pregunta 2") {
                $('#myModal11').modal({ backdrop: 'static' });
            }
            if (SegmentoSeleccionado.text == "Oportunidad") {
                $('#myModal12').modal({ backdrop: 'static' });
            }

            miRuleta.stopAnimation(false);
            miRuleta.rotationAngle = 0;
            miRuleta.draw();
            dibujarIndicador();
        }
        function dibujarIndicador() {
            var ctx = miRuleta.ctx;
            ctx.strokeStyle = '#1E1D1B';
            ctx.fillStyle = '#1E1D1B';
            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.moveTo(300, 0);
            ctx.lineTo(320, 0);
            ctx.lineTo(300, 40);
            ctx.lineTo(280, 0);
            ctx.stroke();
            ctx.fill();
        }



    </script>


    <!-- -->
    <!-- aqui introduccir la pregunta 1-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">
                            PREGUNTA 1</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Lo que el sistema de software debe hacer para tratar la oportunidad y satisfacer a los interesados</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">

                </div>
            </div>
            <br>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
    </div>
    <!-- Large modal -->
    <!-- aqui introduccir la pregunta 2-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 2</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Un sistema de software incluye software, hardware y datos que provee su valor primario mediante la ejecución del software</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">

                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->

    <!-- aqui introduccir la pregunta 3-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 3</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Personas, grupos u organizaciones que afectan o son afectados por el sistema de software</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">

                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->

    <!-- aqui introduccir la pregunta 4-->
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 4.</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Grupo de personas comprometidas activamente en el desarrollo, mantenimiento, despliegue o soporte de un sistema de software específico</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">

                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->

    <!-- aqui introduccir la pregunta 5-->
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 5.</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Un sistema de software incluye software, hardware y datos que provee su valor primario mediante la ejecución del software</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->

    <!-- aqui introduccir la pregunta 6-->
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 5.</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Estás de suerte, descansa y sede el siguiente turno a otro estudiante</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- aqui introduccir la pregunta 7-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">
                            PREGUNTA 1</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>El conjunto adaptado de prácticas y herramientas utilizadas por un equipo para guiar y apoyar su trabajo</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">

                </div>
            </div>
            <br>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
    </div>
    <!-- Large modal -->
    <!-- aqui introduccir la pregunta 8-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 2</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Coordinar y dirigir el trabajo del equipo. Esto incluye toda la planificación del trabajo y su replanificación, y la adición de recursos adicionales necesarios para completar la formación del equipo</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">

                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->

    <!-- aqui introduccir la pregunta 9-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 3</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>El docente decide un reto para el estudiante :0</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">

                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->

    <!-- aqui introduccir la pregunta 10-->
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 4.</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Estás de suerte, descansa y sede el siguiente turno a otro estudiante</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">

                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->

    <!-- aqui introduccir la pregunta 11-->
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 5.</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>Construir un sistema mediante la implementación, las pruebas y la integración de uno o más elementos del sistema</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->

    <!-- aqui introduccir la pregunta 12-->
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="width: 90%;margin: auto">
        <div class="modal-dialog" role="document" style="width: 90%;margin: auto">
            <div class="modal-content" style="width: 90%;margin: auto">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 class="modal-title" id="myModalLabel" style="color:#000">PREGUNTA 5.</h2>
                </div>
                <div class="modal-body">
                    <br>
                    <center>
                        <h2>El conjunto de circunstancias que hacen apropiado desarrollar o cambiar un sistema de software</h2>
                    </center>
                </div>
                </center>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>


    <!-- *********************** SCRIPTS *********************************-->
    <script src="js/bootstrap.js"></script>
    <!-- *********************** SCRIPTS *********************************-->
    <script>
        let btn_salir = document.querySelector(".btn-salir");
        btn_salir.onclick = () => {
            window.location.replace("./index.php");
        }
    </script>
</body>

</html>