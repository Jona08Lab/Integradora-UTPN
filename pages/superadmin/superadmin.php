<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Superadmin Dashboard</title>
  <link rel="stylesheet" href="/INTEGRADORA-UTPN/assets/css/superadmin.css">
</head>
<body>
  <div class="sidebar">
    <h2>Superadmin</h2>
    <ul>
      <li><a href="#">Usuarios</a></li>
      <li><a href="#">Administradores</a></li>
      <li><a href="../../logout.php">Cerrar sesión</a></li>
    </ul>
  </div>

  <div class="main-content">
    <header>
      <h1>Panel de Control</h1>
    </header>

    <section>
      <h2>Lista de Alumnos</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Correo</th>
            <th>Rol</th>
          </tr>
        </thead>
        <tbody>
          <!-- Aquí se llenará desde PHP con los alumnos -->
          <tr>
            <td>1</td>
            <td>alumno@correo.com</td>
            <td>User</td>
          </tr>
        </tbody>
      </table>
    </section>
  </div>
</body>
</html>
