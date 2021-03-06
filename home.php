<?php
include_once './php/user.php';
$user = new User();
$userSession = $userSession->getCurrentUser();
$user->setUser($userSession);
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Semat</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwesome CDN Link for Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- create Team -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"
        id="style2" />
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
            $(document).on('click', '.btn-add', function (e) {
                e.preventDefault();

                var controlForm = $('.controls form:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="glyphicon glyphicon-minus"></span>');
            }).on('click', '.btn-remove', function (e) {
                $(this).parents('.entry:first').remove();
                e.preventDefault();
                return false;
            });
        });
        if ($('team-box').is(':visible')) {
            document.getElementById("team-box").style.display = "none";
        } else {
            $('team-box').show();
        }
    </script>
</head>

<body>
    <div class="set-game_mode">
        <header>
            <h2>Establecer modo de juego</h2>
        </header>
        <main>
            <div class="exit-set_game">Salir</div>
            <div class="container-buttons">
                <div class="btn_set"><button id="ruleta_btn">Ruleta</button></div>
                <div class="btn_set"><button id="classic_btn">Classic</button></div>
                <div class="btn_set"><button id="new_btn">New</button></div>
            </div>
            <!-- New mode info-->
            <div class="info-box_ruleta" id="info-new">
                <div class="info_title">
                    <span>Algunas reglas y recomendaciones</span>
                </div>
                <div class="info_list">
                    <div class="info">1. Tienes solo <span>15 seconds</span> por pregunta</div>
                    <div class="info">2. Obtendras puntos cada vez que aciertes una pregunta y dependiendo la rapidez
                        que respondas </div>
                    <div class="info">3. Si no respondes dentro del limite de tiempo obtendras <span>-10</span>
                        puntos</span></div>
                    <div class="info">4. Una vez inicies tienes la opcion de abandonar cuando quieras </div>
                    <div class="info">5. Diviertete :D</div>
                </div>
                <div class="buttons">
                    <button class="quit">Salir del Quiz</button>
                    <button class="restart">Continue</button>
                </div>
            </div>
            <!-- Classic mode info-->
            <div class="info-box_ruleta" id="info-classic">
                <div class="info_title">
                    <span>Algunas reglas y recomendaciones</span>
                </div>
                <div class="info_list">
                    <div class="info">1. Ser?? redireccionado a la pagina del juego original</span></div>
                    <div class="info">2. El moderador podr?? establecel el <span> tiempo </span> por pregunta</div>
                    <div class="info">3. Una vez inicies tienes la opcion de abandonar cuando quieras</div>
                    <div class="info">4. No ingreses nombres vacios</div>
                    <div class="info">5. Vuelve pronto :D</div>
                </div>
                <div class="buttons">
                    <button class="quit">Salir del Quiz</button>
                    <button class="restart">Continue</button>
                </div>
            </div>
            <!-- Ruleta mode info-->
            <div class="info-box_ruleta" id="info-ruleta">
                <div class="info_title">
                    <span>Algunas reglas y recomendaciones</span>
                </div>
                <div class="info_list">
                    <div class="info">1. Puedes girar la ruleta las veces que quieras</div>
                    <div class="info">2. El docente escoger?? un estudiante al azar y este debe responder de forma escrita u oral</div>
                    <div class="info">3. Diviertete :D</div>
                    <!-- <div class="info">4. You can't exit from the</div>
                    <div class="info">5. You'll get points on the EugenioJoto0</div> -->
                </div>
                <div class="buttons">
                    <button class="quit">Salir del Quiz</button>
                    <button class="restart">Continue</button>
                </div>
            </div>
        </main>
    </div>
    <!--<div class="quiz-box">
        <header>
            <div class="title">Awesome Quiz Aplication</div>
            <div class="timer">
                <div class="time-tex">Time Left</div>
                <div class="timer-sec">15</div>
            </div>
        </header>
        <section>
            <div class="que_text">
                <span>What does HTML stand for?</span>
            </div>
            <div class="option_list">
                <div class="option">
                    <span>Hyper Text Preprocessor</span>
                    <div class="icon"><i class="fas fa-check"></i></div>
                </div>
                <div class="option">
                    <span>Hyper Text Preprocessor</span>
                    <div class="icon"><i class="fas fa-times"></i></div>
                </div>
                <div class="option">
                    <span>Hyper Text Preprocessor</span>
                    <div class="icon"><i class="fas fa-check"></i></div>
                </div>
                <div class="option">
                    <span>Hyper Text Preprocessor</span>
                    <div class="icon"><i class="fas fa-check"></i></div>
                </div>
            </div>
        </section>
            Quiz Box Footer
        <footer>
            <div class="total_que" id="total_que">
                <span><p>2</p>Of<p>5</p>Questions</span>
            </div>
            <button class="next_btn" onclick="next_btn()">Next Question</button>
        </footer> -->
    </div>
    <div class="main-new_mode">
        <div class="container">
            <div class="exit-set_game" id="exit-new_mode">Salir</div>
            <div class="team" id="jugadorActual"></div>
            <header id="header">
                <div class="title" id="pregunta">Pregunta</div>
                <div class="timer">
                    <div class="time_tex">Time Left</div>
                    <div class="timer_sec">15</div>
                </div>
                <div class="time_line" id="time_line"></div>
            </header>
            <div class="imagen">
                <img src="" class="imagen" id="imagen">
            </div>
            <div class="cat" id="cat">
                <div class="btn-cat" id="btn-cat1" onclick="oprimir_btn_Cat(0)">
                    <p>Cliente</p>
                </div>
                <div class="btn-cat" id="btn-cat2" onclick="oprimir_btn_Cat(1)">
                    <p>Soluci??n</p>
                </div>
                <div class="btn-cat" id="btn-cat3" onclick="oprimir_btn_Cat(2)">
                    <p>Esfuerzo</p>
                </div>
            </div>
            <div class="respuesta" id="respuesta">
                <div class="btn" id="btn1" onclick="oprimir_btn(0)">
                    <span id="btn11">Alfa</span>
                    <div class="btn1-fig"><img src="#" alt="" id="btn1-fig"></div>
                </div>
                <div class="btn" id="btn2" onclick="oprimir_btn(1)">
                    <span id="btn22">Espacio de actividad</span>
                    <div class="btn2-fig"><img src="#" alt="" id="btn2-fig"></div>
                </div>
                <div class="btn" id="btn3" onclick="oprimir_btn(2)">
                    <span id="btn33">Competencia</span>
                    <div class="btn3-fig"><img src="#" alt="" id="btn3-fig"></div>
                </div>
                <div class="btn" id="btn4" onclick="oprimir_btn(3)">
                    <span id="btn44">Actividad</span>
                    <div class="btn4-fig"><img src="#" alt="" id="btn4-fig"></div>
                </div>
            </div>
            <footer>
                <div class="total_que" id="total_que">
                    <!-- <span><p>2</p>Of<p>5</p>Questions</span> -->
                </div>
                <button class="next_btn">Next Question</button>
            </footer>
        </div>
    </div>
    
    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <!-- <div class="complete_text">Has completado el Quiz! :D</div>
        <div class="score_text">
            <span>and sorry, you got only <p>2</p> out of <p>5</p></span>
        </div> -->
        <div class="equipo-ganador" id="equipo-ganador"></div>
        <div class="puntos-ganador" id="puntos-ganador"></div>
        <table class="table mx-auto table-bordered table-sm table-striped text-center" id="tablaResultados">
        </table>
        <div class="buttons">
            <button class="imprimir">Imprimir</button>
            <button class="restart">Repetir Quiz</button>
            <button class="quit">Salir del Quiz</button>
        </div>
    </div>

    <!-- Crear equipos -->
    <div class="team-box" id="team-box">
        <header class="headerTeam">
            <div class="local_time">
                <!-- Good morning -->
            </div>
            <!-- <div class="option">
                <p><a href="">Iniciar sesi??n</a></p>
                <p><a href="">Crear cuenta</a></p>
            </div> -->
            <div class="action">
                <div class="profile">
                    <img src="./images/user.png" alt="">
                </div>
                <div class="menu">
                    <ul>
                        <li id="user">
                            <img src="./images/user.gif" alt="">
                            <div class="datos_user">
                                <h3 id="username"><?php echo $user->getNombre(); ?></h3>
                                <h3 id="email"><?php echo $user->getCorreo(); ?></h3>
                            </div>
                        </li>
                        <li><img src="./images/edit.png" alt=""><a href="#" class="clave">Cambiar contrase??a</a></li>
                        <li><img src="./images/log-out.png" alt=""><a href="./php/logout.php">Cerrar sesion</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="login-register" >
            <!--Login-->
            <form action="./php/change_pass.php" method="POST" class="formulario__login">
                <h2>Cambiar contrase??a</h2>
                <input type="password" placeholder="Contrasena actual" name="passac" required>
                <input type="password" placeholder="Contrase??a nueva" name="passn" id="password" required>
                <input type="password" placeholder="Confirmar contrase??a" name="conpassn" id="password2" required>
                <?php
                    if(isset($claves)){
                        echo $claves;
                    }
                ?>
                <button class="aceptar">Aceptar</button>
                <button class="cancelar">Cancelar</button>
            </form>
        </div>
        <main class="mainTeam">
            <div class="row justify-content-md-center">
                <section class="control-group" id="fields">
                    <h1>Creating Teams</h1>
                    <div class="controls">
                        <form role="form" autocomplete="off">
                            <div class="entry input-group">
                                <input class="form-control" name="fields[]" type="text" placeholder="Nombre del equipo"
                                    required>
                                <span class="input-group-btn">
                                    <button class="btn-Team btn-success btn-add" type="button">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <div class="row justify-content-md-center mt-2">
                <button type="button" class="btn-Team" id="btn-Team">Game mode</button>
            </div>
        </main>
    </div>
</body>
<script src="js/script.js"></script>
</html>