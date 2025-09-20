<?php 
$session = load_class('Session', 'libraries'); 
$old = $session->flashdata('old') ?? []; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student List Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: #ffe6f0; /* light pink background */
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 400px;
      background: #ffccdd; /* pink card */
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .container h1 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 2rem;
      color: #d81b60; /* dark pink */
    }

    .container p {
      text-align: center;
      margin-bottom: 25px;
      color: #800040;
      font-size: 0.95rem;
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #c2185b;
    }

    .flash {
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
    }
    .success { background: #f8bbd0; color: #880e4f; }
    .error { background: #f48fb1; color: #b71c1c; }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: 600;
      margin-bottom: 5px;
      display: block;
      color: #880e4f;
    }

    input, button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
    }

    input {
      background: #ffd6e8;
      color: #880e4f;
      outline: none;
      transition: 0.3s;
    }

    input:focus {
      box-shadow: 0 0 0 2px #d81b60;
    }

    button {
      background: #d81b60;
      color: #fff;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #ad1457;
    }

    button:focus {
      box-shadow: 0 0 0 2px #d81b60;
      outline: none;
    }

    .container p.footer {
      margin-top: 20px;
      font-size: 0.9rem;
      color: #880e4f;
      text-align: center;
    }

    .container a {
      color: #c2185b;
      text-decoration: none;
    }

    @media (max-width: 480px) {
      .container {
        padding: 20px;
      }
      .container h1 {
        font-size: 1.6rem;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>STUDENT LIST</h1>
    <p>Manage and view all registered students</p>

    <h2>🔐 Login</h2>

    <?php if ($session->flashdata('success')): ?>
      <div class="flash success">
        <?= htmlspecialchars($session->flashdata('success')) ?>
      </div>
    <?php endif; ?>
    <?php if ($session->flashdata('error')): ?>
      <div class="flash error">
        <?= htmlspecialchars($session->flashdata('error')) ?>
      </div>
    <?php endif; ?>

    <form method="post" action="/auth/login">
      <div>
        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
      </div>

      <div>
        <label>Password</label>
        <input type="password" name="password" required>
      </div>

      <button type="submit">Login</button>
    </form>

    <p class="footer">No account? <a href="/auth/register">Register here</a></p>
  </div>

</body>
</html>
