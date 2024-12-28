<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca Virtual</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Arial', sans-serif;
      background: #f4f4f4;
      color: #333;
    }
    header {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: #fff;
      padding: 20px 10%;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    header h1 {
      font-size: 2rem;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }
    nav ul li {
      display: inline;
    }
    nav ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 1rem;
      transition: color 0.3s ease;
    }
    nav ul li a:hover {
      color: #81c784;
    }
    .hero {
      background: url('https://via.placeholder.com/1200x400') no-repeat center center/cover;
      height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-align: center;
      padding: 20px;
    }
    .hero h2 {
      font-size: 2.5rem;
    }
    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 0 10px;
    }
    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }
    .card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      text-align: center;
      padding: 20px;
    }
    .card img {
      max-width: 100%;
      border-radius: 10px;
    }
    .card h3 {
      margin: 15px 0;
      font-size: 1.2rem;
    }
    .card p {
      font-size: 0.9rem;
      color: #666;
    }
    .card a {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background: #1e3c72;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      font-size: 0.9rem;
      transition: background 0.3s ease;
    }
    .card a:hover {
      background: #2a5298;
    }
    footer {
      text-align: center;
      padding: 20px;
      background: #1e3c72;
      color: #fff;
    }
  </style>
</head>
<body>
  <header>
    <h1>Biblioteca Virtual</h1>
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Catálogo</a></li>
        <li><a href="#">Eventos</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </nav>
  </header>
  
  <section class="hero">
    <h2>Bienvenido a la Biblioteca Virtual</h2>
    <p>Explora un mundo de conocimiento desde cualquier lugar.</p>
  </section>
  
  <div class="container">
    <h2>Nuestras Secciones</h2>
    <div class="features">
      <div class="card">
        <img src="https://via.placeholder.com/250x150" alt="Libros">
        <h3>Libros</h3>
        <p>Accede a miles de libros en formato físico y digital.</p>
        <a href="#">Explorar</a>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/250x150" alt="Revistas">
        <h3>Revistas</h3>
        <p>Descubre una amplia colección de revistas especializadas.</p>
        <a href="#">Explorar</a>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/250x150" alt="Eventos">
        <h3>Eventos</h3>
        <p>Participa en talleres, charlas y actividades culturales.</p>
        <a href="#">Ver más</a>
      </div>
    </div>
  </div>
  
  <footer>
    <p>&copy; 2024 Biblioteca Virtual. Todos los derechos reservados.</p>
  </footer>
</body>
</html>