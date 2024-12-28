<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pantalla de Login</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg, #6e45e2, #88d3ce);
      color: #fff;
    }
    .login-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      text-align: center;
      width: 300px;
    }
    .login-container h1 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #fff;
    }
    .login-container input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      outline: none;
      font-size: 1rem;
    }
    .login-container input[type="email"],
    .login-container input[type="password"] {
      background: rgba(255, 255, 255, 0.8);
      color: #333;
    }
    .login-container input::placeholder {
      color: #888;
    }
    .login-container button {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      background: #6e45e2;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .login-container button:hover {
      background: #88d3ce;
    }
    .login-container a {
      display: block;
      margin-top: 15px;
      color: #fff;
      text-decoration: none;
      font-size: 0.9rem;
    }
    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Iniciar Sesión</h1>
    <form action="/login" method="POST">
      <input type="email" name="email" placeholder="Correo electrónico" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit">Entrar</button>
    </form>
    <a href="#">¿Olvidaste tu contraseña?</a>
    <a href="#">Crear una cuenta</a>
  </div>
</body>
</html>