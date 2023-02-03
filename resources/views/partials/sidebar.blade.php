<div class="sidebar close d-flex flex-column justify-content-around">
    <div class="logo-details d-flex justify-content-center">

        <span class="logo_name mt-2">Sisconver </span>

    </div>
    <ul class="nav-links ">
        <li class="mt-2">

           <div>
            <a href="{{ '/home' }}">

                
 
                <i class="bi-house-fill bi-grid bxs-book"></i>
                <span class="link_name ">Inicio</span>
             
            
            
                           
                        </a>
            </div> 
          
            <ul class="sub-menu blank">
                <li><a class=" bi bi-house-fill text-white btn btn-primary " href="/home">Inicio  </a></li>
            </ul>
        </li>
        <li class="mt-2">
          <div class="iocn-link">
              <a href="{{ '/categorias' }}">
                  <i class='bx bi bi-grid bxs-book'></i>
                  <span class="link_name">Categorias</span>
              </a>
              <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
              <li><a class="text-white btn btn-primary " href="/categorias">Gestion Categorias</a></li>
             

          </ul>
      </li>
        <li class="mt-2">
            <div class="iocn-link">
                <a href="{{ '/libros' }}">
                    <i class='bx bxs-book bi bi-journal'></i>
                    <span class="link_name">Libros</span>
                </a>
                <i class='bx bxs-chevron-down  arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="text-white btn btn-primary" href="/libros">Gestion Libros</a></li>
               

            </ul>
        </li>
        <li class="">
            <div class="iocn-link">
                <a href="{{ '/elementos' }}">
                    <i class='bx bx-book-alt bi bi-archive-fill'></i>
                    <span class="link_name">Elementos</span>
                </a>

            </div>
            <ul class="sub-menu">
                <li><a class="text-white btn btn-primary" href="/elementos">Elementos</a></li>

            </ul>
        </li>
        <li class="mt-2">
            <a href="{{ '/prestamos' }}">
                <i class='bx bx-pie-chart-alt-2 bi bi-calendar-check-fill'></i>
                <span class="link_name  ">Prestamos</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="text-white btn btn-primary" href="/prestamos"> Prestamos</a></li>
            </ul>
        </li>
        <li class="mt-2">
            <div class="iocn-link">
                <a href="{{ '/devoluciones' }}">
                    <i class='bx bx-book-alt bi bi-calendar-x'></i>
                    <span class="link_name">Devoluciones</span>
                </a>
                
            </div>
            <ul class="sub-menu">
                <li><a class="text-white btn btn-primary" href="/devoluciones">Devoluciones</a></li>

            </ul>
        </li>




        <li class="mt-2">
            <div class="iocn-link">
                <a href="{{ '/usuarios' }}">
                    <i class='bx bxs-user-circle bi bi-people-fill'></i>
                    <span class="link_name">Usuarios</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="text-white btn btn-primary" href="/usuarios">Usuarios</a></li>

            </ul>
        </li>

        <form class="col-8" method="POST" action="{{ route('logout') }} ">
        <li class="mt-2">
          <a href="/logout">
              <i class='bx bx-cog bx-spin-hover bi bi-escape'></i>
              <span class="link_name">Salir</span>

          </a>
          <ul class="sub-menu blank">
              <li><a class="link_name  text-white btn btn-primary" href="/logout">Salir</a></li>
              <ul class="">

                 
                 
                    @csrf

                    


                </form>
              </ul>
          </ul>
      </li>
    </ul>
    


</div>

