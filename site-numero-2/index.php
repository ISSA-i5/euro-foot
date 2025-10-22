<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>

<body>
      <?php require_once 'header.php'; ?>
      <main>
            <section class="form-container">
                  <form action="connexion.php" method="POST" novalidate>
                        <h2>Se connecter</h2>
                        <ul>
                              <li>
                                    <label for="mail">E-mail&nbsp;:</label>
                                    <input type="email" id="mail" name="user_mail" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" />
                              </li>
                              <li>
                                    <label for="msg">Mot de passe&nbsp;:</label>
                                    <input type="password" id="msg" name="user_password" value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>" />
                              </li>
                              <div class="button">
                                    <button type="submit">Se connecter</button>
                              </div>
                        </ul>
                  </form>
            </section>
      </main>
      <footer>
            <p>&copy; 2024 Mon Site</p>
      </footer>
</body>

</html>