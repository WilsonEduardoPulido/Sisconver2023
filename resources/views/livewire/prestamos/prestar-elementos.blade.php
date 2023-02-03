<div>
    

 {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card m-4 ">
        <div class="card p-5">
            <div class="card-header bg-warning text-center text-white">
              Realizar Prestamo de un elemento
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              
            </div><form class="row g-3">
                <div class="col-md-4">
                  <label for="validationServer01" class="form-label">Bibliotecario</label>
                  <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required wire:model="prestador">
                  <div class="valid-feedback" > 
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationServer02" class="form-label">Persona que Solicita el Prestamo</label>
                 
                 
                    <label for="" class="form-label">City</label>
                    <select class="form-select is-valid" name="" id="">

                        @foreach ($consultaUsuarios as $item)
                        <option selected>{{$item->name}}</option>
                        @endforeach
                      
                       
                    </select>
                  </div>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>

                <input type="number" name="" id="" wire:model="cantidad">

                <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Elemento a Prestar</label>
                   
                   
                      <label for="" class="form-label">City</label>
                      <select class="form-select is-valid" name="" id="">
  
                          @foreach ($consultaElemento as $item)
                          <option selected wire:click="cargardatos({{ $item->id }})">{{$item->nombre}}</option>


                          @endforeach



                          
                        
                         
                      </select>


                    </div>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>


                  <div class="col-md-4">
                    <label for="validationServerUsername"  wire:model="nombre" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend3">@</span>
                      <input wire:model="cantidad" type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                      
                      <div id="validationServerUsernameFeedback" class="invalid-feedback">
                     
                      </div>
                    </div>
                  </div>
                  
                <div class="col-md-6">
                  <label for="validationServer03" class="form-label">City</label>
                  <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationServer04" class="form-label">State</label>
                  <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                  </select>
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationServer05" class="form-label">Zip</label>
                  <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                    <label class="form-check-label" for="invalidCheck3">
                      Agree to terms and conditions
                    </label>
                    <div id="invalidCheck3Feedback" class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
              </form>
          </div>
      </div>

      {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
