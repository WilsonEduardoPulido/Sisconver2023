<canvas id="graficacirculo"></canvas>
<script>
    $(function() {


        var usuarios = {{ json_encode($totalcantidadActivosUsuarios) }}
            var datos = {{ json_encode($totalDevolucionesRealizadas) }}
            var datosc = {{ json_encode($totalCategoriasActivas) }}
            var libros = {{ json_encode($totalLibrosActivos) }}
            var prestamos = {{ json_encode($totalPrestamosActivos) }}
            var devoluciones = {{ json_encode($totalDevolucionesRealizadas) }}


            const colors = ['rgb(46, 125, 50 )', 'rgb(156, 39, 176)', 'rgb(66, 165, 245)', 'rgb(0, 172, 193 )','rgb(255, 238, 88)'];



        const ctx = document.getElementById('grafica');

        new Chart(ctx, {
            type: 'bar',

            data: {
                labels: ['Categorias', 'Usarios', 'Libros', 'Prestamos', 'Devoluciones'],
                datasets: [{
                    label: 'Estadísticas Sisconver ',
                    data: [datosc,usuarios,libros,prestamos,devoluciones],
                    borderWidth: 1,
                    backgroundColor: colors

                }]
            },



            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


<script>
    $(function() {

        var Undecimo = {{ json_encode($consultaGraficaCircuo) }}


            var Primero = {{ json_encode($consultaGraficaCircuoPrimero) }}
            var Segundo = {{ json_encode($consultaGraficaCircuoSegundo) }}
            var Tercero = {{ json_encode($consultaGraficaCircuoTercero) }}
            var Cuarto = {{ json_encode($consultaGraficaCircuoCuarto) }}
            var Quinto = {{ json_encode($consultaGraficaCircuoQuinto) }}
            var Sexto = {{ json_encode($consultaGraficaCircuoSexto) }}
            var Septimo = {{ json_encode($consultaGraficaCircuoSeptimo) }}
            var Octavo = {{ json_encode($consultaGraficaCircuoOctavo) }}
            var Noveno = {{ json_encode($consultaGraficaCircuoNoveno) }}
            var Decimo = {{ json_encode($consultaGraficaCircuoDecimo) }}
            var Undecimo = {{ json_encode($consultaGraficaCircuo) }}


            const colors = ['rgb(46, 125, 50 )', 'rgb(156, 39, 176)', 'rgb(66, 165, 245)', 'rgb(0, 172, 193 )','rgb(128, 128, 0)','rgb(0, 255, 0)','rgb(255, 0, 255)','rgb(0, 0, 128)','rgb(128, 0, 128)','rgb(255, 0, 0)','rgb(0, 0, 0)'];



        const ctx = document.getElementById('graficacirculo');

        new Chart(ctx, {
            type: 'polarArea',

            data: {
                labels: ['Primero','Segundo','Tercero','Cuarto','Quinto','Sexto','Séptimo','Octavo','Noveno','Décimo','Undecimo'],
                datasets: [{
                    label: 'Estadísticas Sisconver ',
                    data: [Primero,Segundo,Tercero,Cuarto,Quinto,Sexto,Septimo,Octavo,Noveno,Decimo,Undecimo],
                    borderWidth: 1,
                    backgroundColor: colors

                }]
            },



            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
