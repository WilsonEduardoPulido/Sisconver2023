<div class="card col-10 m-auto">
   
    <div class="card-body">
        <h5 class="card-header ">
            Añadir Nuevo Libro
           
        </h5>
        <form class="mt-3 row" wire:ignore.self class="modal " id="Actualizar" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="form-group col-6 ">
                <label for="Nombre"></label>
                <input wire:model="Nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group  col-6">
                <label for="Autor"></label>
                <input wire:model="Autor" type="text" class="form-control" id="Autor" placeholder="Autor">@error('Autor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-6">
                <label for="Editorial"></label>
                <input wire:model="Editorial" type="text" class="form-control" id="Editorial" placeholder="Editorial">@error('Editorial') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-6">
                <label for="Edicion"></label>
                <input wire:model="Edicion" type="text" class="form-control" id="Edicion" placeholder="Edicion">@error('Edicion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-6">
                <label for="Descripcion"></label>
                <input wire:model="Descripcion" type="text" class="form-control" id="Descripcion" placeholder="Descripcion">@error('Descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-6">
                <label for="Estado"></label>
                <select wire:model="Estado" class="form-select" >
                    
                    <option selected value="Disponible">Disponible</option>
                    <option value="Prestado">Prestado</option>
                    <option value="Inactivo">Inactivo</option>
                    
                  </select>
                @error('Estado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-6">
                <label for="categoria_id"></label>
                <select wire:model="categoria_id" name="categoria_id" class="form-select" required>
           
                   
                </select>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-warning text-white">Guardar</button>
            </div>
        </form>
    </div>
  </div>

  </div>


<!--Final De Los TABS--->
