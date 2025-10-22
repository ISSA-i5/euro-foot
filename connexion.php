<?php
$pageName = "connexion";
require_once 'bdd.php'; // $pdo
require_once 'header.php';

?>

<style>
      .error {
            background-color: red;
            color: white;
            width: max-content;
            max-width: 85vw;
            margin: 0 auto;
            padding: 0.5rem;
            border-radius: .5rem;
            text-align: center;
      }

      .success {
            background-color: green;
            color: white;
            width: max-content;
            max-width: 85vw;
            margin: 0 auto;
            padding: 0.5rem;
            border-radius: .5rem;
            text-align: center;
      }
</style>

<?php
// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = htmlspecialchars($_POST['user_mail']);
      $password = htmlspecialchars($_POST['user_password']);

      // Si pas un email valide alors on affiche un message d'erreur
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) echo "<p class='error'>L'adresse e-mail n'est pas valide.</p>";

      // Longueur minimum 5 caractères
      elseif (strlen($password) < 5) echo "<p class='error'>Le mot de passe doit contenir au moins 5 caractères.</p>";

      else {
            try {
                  // Préparation et exécution de la requête
                  $stmt = $pdo->prepare("SELECT id, password, name FROM users WHERE email = :email");
                  $stmt->bindParam(':email', $email);
                  $stmt->execute();

                  // Récupération du résultat
                  $user = $stmt->fetch(PDO::FETCH_ASSOC);

                  if ($user && password_verify($password, $user['password'])) {

                      // Authentification réussie
                      $_SESSION['user_id'] = $user['id'];
                      $_SESSION['user_email'] = $email;
                      $_SESSION['user_name'] = $user['name']; // Utiliser la partie avant '@' comme nom d'utilisateur
                      echo "<p class='success'>Connexion réussie. Bienvenue !</p>";
                      echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 0);</script>";
                  } else {
                      // Échec de l'authentification
                      echo "<p class='error'>E-mail ou mot de passe incorrect.</p>";
                  }
            } catch (PDOException $e) {
                  echo "<p class='error'>Erreur de connexion à la base de données : " . $e->getMessage() . "</p>";
            }
      }
}

?>

<main>
      <form action="" method="post">
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
</main>


















<?php require_once 'footer.php'; ?>