# README #

Hola!

Este guía para que se sepáis como esta estructurado el proyecto de momento. Hay muchas cosas mal pero ahora ya tenemos un camino que podemos seguir todos, y hablar con más propiedad de lo que queremos o no.

Esta todo hecho rápido y sin pensar mucho. También a muchas cosas a medio hacer ya que lo único que quería era una estructara para trabajar y pudiésemos hablar del tema.

Algunas funciones con js son directas de js. Pero el jQuery esta comentado intentaré que todo sea jQuery para las consultas a php.

### Estructura ProjectPadel ###
####Archivos directorio principal####
/ProjectPadel/
'''index.php'''
Fichero Principal. Incluye todas las librerías tanto php como js. 

También incluye el cuerpo principal del web. Que consta de en menú vertical el la parte derecha con unas medidas de col-md-3 y de un cuerpo principal con unas medidas de col-md-9.

Según pulsemos en el menu, el cuerpo de la web irá cambiando.

'''home.php'''
Cuerpo de la página principal. Posible destino de nuevos usuarios // Comentar.

'''insertplayer.php'''
Formulario y lista de los players que el usuario haya o este introduciendo.

'''maketournament.php'''
Simple formulario que no ayuda a determinar que tipo de torneo y por lo tanto que tipo de formulario mostraremos para la creación de un nuevo torneo.


####Directorio de Clases####
/ProjectPadel/Classes

Todas las clases están hechas en php. Si miráis clase player.php podréis ver un ejemplo rápido de como crear una clase, podemos crear tanto constructores como querámos. 

Para ver una clase extendida ir a tournament.php. que extiende de tipotorneo.php.

Me faltará averiguar el tema de las listas pero estoy seguro de que con una variable del tipo Array lo arreglamos.

####Directorio de Estilos####
/ProjectPadel/css 

De momento solo incluye los estilos del menú. El resto de estilos por ahora vienen directamete de boostrap.

####Directorio de formularios####
/ProjectPadel/forms

Por una lado tenemos dos formularios AmericanPlus y AmericanTeams.

Por otro lado tenemos a tiposdetorneos. Que recibe la información del maketournament.php y determina que formulario mostrar.

ListaPlayers. Pretende ser la respuesta cada vez que pulsemos el botón insertar nuevo jugador.


####Directorio de imágenes, sonidos, etc.####
/ProjectPadel/layouts

####Directorio funciones PHP####
/ProjectPadel/php_functions

####Directorio js####
/ProjectPadel/js !ESTA POR CREAR
Directorio para los scripts js. Ahora los estoy creando donde se ejecutan, pero no sería mala idea empezar a creaarlos en este directorio, y llamar a las  funciones que necesitemos.