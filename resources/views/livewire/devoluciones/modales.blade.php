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

                  </tr>
                </thead>
                <tbody>


                  <tr>

                    <th colspan="3" > Bibliotecario Devoluciòn :   {{ $bibliotecarioR}} </th>

                  </tr>
                  <tr>

                    <th colspan="3" > Fecha Devoluciòn  :   {{ $fechaDevo }}   </th>




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

                   <table class="table ">
                       <thead>

                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Tipo</th>
                           <th scope="col">Nombre</th>
                           <th scope="col">Cantidad</th>
                           <th scope="col">Novedades</th>
                       </tr>
                       </thead>
                       <tbody>

                       @foreach ($detallesDevolucionConsulta as $key => $value)
                           <tbody>
                           <tr class="text-center " wir:key=" {{ $key }} ">
                               <td scope="row" wire:key=" {{ $key + 1 }} "> {{ $loop->iteration }}
                               </td>
                               <td> {{ $value['Tipo_Elemento'] }} </td>

                               @if ($value['Tipo_Elemento'] == 'Libro')
                                   <td> {{ $value['Nombre'] }}{{ $value['NombreTomo'] }} </td>
                               @elseif ($value['Tipo_Elemento'] == 'Elemento')
                                   <td> {{ $value['nombre'] }} </td>
                               @endif


                               <td> {{ $value['CantidaDevueltaU'] }} </td>s
                               <td> {{ $value['NovedadesDevolucionU'] }} </td>

                               </td>
                           </tr>

                           </tbody>
                           @endforeach
                           </tbody>
                   </table>



            </div>
            <div class="modal-footer">
                <button type="button"  wire:click="cancelar()" class="btn btn-danger  text-white close-btn" data-bs-dismiss="modal">Cerrar </button>

            </div>
        </div>
    </div>
</div>


