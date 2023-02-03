<a data-bs-toggle="modal" data-bs-target="#EditarUsuario"
class=" bi bi-pencil-square text-white btn btn-info "
wire:click="editarUsuario({{ $row->id }})"> </a>
<a class="btn btn-danger bi bi-trash3-fill  text-white "
onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
wire:click="destroy({{ $row->id }})"> </a>
<a data-bs-toggle="modal" data-bs-target="#verUsuario"
class=" bi bi bi-eye-fill text-white btn btn-warning "
wire:click="editarUsuario({{ $row->id }})"> </a>