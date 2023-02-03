<!-- Add Modal -->
<div wire:ignore.self class="modal modal-lg fade" id="verDetallesDevoluciones" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="createDataModalLabel">Detalles Devolución</h5>
                <button wire:click.prevent="cancelar()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">

            <table class="table">
                <thead>
                  <tr>
                    <th  colspan="4">Tipo Prestamo :{{  $tipoPresta }} </th>
                    <th colspan="3" > Elemento o Libro Prestado :{{$nombreArticulo}}  </th>
                  </tr>
                </thead>
                <tbody>


                  <tr>
                    <th colspan="3" > Bibliotecario Prestador :  {{$NombreBibliotecario}}   </th>
                    <th colspan="3" > Bibliotecario Devoluciòn :   {{ $bibliotecarioR}} </th>

                  </tr>
                  <tr>
                    <th colspan="3" > Fecha Prestamo :{{$Fecha_Prestamo}}  </th>
                    <th colspan="3" > Fecha Devoluciòn  :   {{ $fechaDevo }}   </th>

                  </tr>

                  <tr>

                    <th colspan="3" > Cantidad Devuelta  :  {{  $cantidaD }}   </th>

                  </tr>

                  <tr>
                    <th colspan="4" > Novedades : {{  $novedadesA }} </th>


                  </tr>







                  <tr>



                    <th colspan="3" > Nombres Apellidos Prestador :{{$nombreAlumno}} {{$apellidoAlumno}}  </th>
                    <th colspan="3" > Direccion :{{$direccionA}}   </th>

                  </tr>
                  <tr>
                    <th colspan="3" > Celular : {{$celularA}}  </th>
                    <th colspan="3" > Grado :{{$gradoA}}   </th

                  </tr>
                  <tr>
                    <th colspan="3" > Tipo Documento :{{$tipocDocA}}  </th>
                    <th colspan="3" > Numero Documento :    {{ $numeroDocA  }}  </th>

                  </tr>





                </tbody>
              </table>
            </div>
            <div class="modal-footer">
                <button type="button"  wire:click="cancelar()" class="btn btn-danger  text-white close-btn" data-bs-dismiss="modal">Cerrar </button>

            </div>
        </div>
    </div>
</div>


