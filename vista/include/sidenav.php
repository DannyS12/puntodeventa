<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Sistemas Infini</div>
            <a class="nav-link"  href="#" onclick="loadContent('inicio.php')">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Inicio
            </a>
            <a class="nav-link"  href="#" onclick="loadContent('clientes.php')">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Clientes
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProd" aria-expanded="false" aria-controls="collapseProd">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Productos
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseProd" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link" href="#" onclick="loadContent('categorias.php')">Categorias</a>
                <a class="nav-link" href="#" onclick="loadContent('productos.php')">Productos</a>
                <a class="nav-link" href="#" onclick="loadContent('kardex.php')">Kardex</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVenta" aria-expanded="false" aria-controls="collapseVenta">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Ventas
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseVenta" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link" href="login.html">Nueva Venta</a>
                <a class="nav-link" href="register.html">Reporte Ventas</a>
                <a class="nav-link" href="register.html">Pagos</a>
                <a class="nav-link" href="register.html">Devoluciones</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseParam" aria-expanded="false" aria-controls="collapseParam">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Parametros
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseParam" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link" href="register.html">Bancos</a>
                <a class="nav-link" href="register.html">Usuarios</a>
              </nav>
            </div>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logueado como:</div>
          <?php echo $_SESSION['nombreUsuario']."(".$_SESSION['rol'].")" ?>
        </div>
      </nav>