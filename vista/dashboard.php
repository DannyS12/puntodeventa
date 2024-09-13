<?php
error_reporting(-1);
error_reporting(0);
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

session_start();
if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../login.php");
  exit();
}
include("include/header.php")
?>
<body class="sb-nav-fixed">
  <?php include("include/nav.php") ?>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <?php include("include/sidenav.php") ?>
    </div>
    <div id="layoutSidenav_content">
      <!-- manejador de las vistas -->
      <div class="content-page page-content-margin" id="page-content">
      </div>      
      <?php include("include/footer.php") ?>
    </div>
  </div>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Bootstrap Bundle (que incluye Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/scripts.js"></script> 
  <script>
  function loadContent(page) {
    localStorage.setItem('lastPage', page);
    fetch(page)
      .then(response => response.text())
      .then(data => {
        document.getElementById('page-content').innerHTML = data;
         // Ejecutar scripts después de que el contenido haya sido cargado
         runPageScripts();

      })
      .catch(error => console.error('Error:', error));
  }

  function runPageScripts() {
    // Aquí puedes colocar cualquier lógica para ejecutar scripts internos
    /*if (document.querySelector('#tabladatos')) {
      $('#tabladatos').DataTable();
    }*/
    // Ejecutar scripts adicionales
    const scripts = document.querySelectorAll('#page-content script');
    scripts.forEach(script => {
      const newScript = document.createElement('script');
      newScript.src = script.src;
      document.body.appendChild(newScript);
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    const lastPage = localStorage.getItem('lastPage');
    if (lastPage) {
      loadContent(lastPage);
    } else {
      loadContent('inicio.php');
    }
  });
</script>
</body>
</html>