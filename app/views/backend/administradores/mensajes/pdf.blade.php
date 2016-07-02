<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Your Website</title>
</head>

<body>

<<<<<<< HEAD
=======


>>>>>>> fec1d7fce866ecb23c601393d597f878dc014db2
    <section>
        <article>
            <header>
                <center><h2>Reporte envio de Información</h2></center>

            </header>
            <p><strong>Fecha:</strong>  {{ $fecha }}</p>
            <p><strong>Fecha Leido:</strong>  {{ $fecha_leido }}</p>
            <p><strong>Residente:</strong></p>
            <p>{{ $nombres }} {{ $apellidos }}</p>
        </article>
        <article>
            <header>
                <h3>Mensaje</h3>
            </header>
            <p><strong>Asunto: </strong> {{ $asunto }}</p>
            <br/>
            <p>{{ $mensaje }}</p>
        </article>
    </section>



    <footer>
        <center>Copyright 2015 - SMS Group</center>
    </footer>



</body>

</html>