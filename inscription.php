<?php
$pageName = "inscription";
require_once 'header.php';
require_once 'config.php'; // paramètres de connexion à la base de données
?>

<?php
// Fonction d'affichage des messages
function show_message($text, $type = 'error') {
    $class = ($type === 'success') ? 'message success' : 'message error';
    echo "<div class=\"$class\">$text</div>";
}

if (isset($_POST['submit'])) {

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Vérification du nom
    if ($username === '' || !preg_match('/^[\p{L} ]+$/u', $username)) {
        show_message("Le nom ne doit contenir que des lettres et des espaces.");
    }
    // Vérification de l'email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        show_message("Veuillez entrer une adresse e-mail valide (ex: user@example.com).");
    }
    // Vérification du mot de passe
    elseif (strlen($password) < 8 || !preg_match('/[0-9]/', $password) || !preg_match('/[A-Za-z]/u', $password)) {
        show_message("Le mot de passe doit contenir au moins 8 caractères avec des lettres et des chiffres.");
    }
    // Vérification de la confirmation
    elseif ($password !== $confirm_password) {
        show_message("Les mots de passe ne correspondent pas.");
    }
    else {
        try {
            // Connexion à la base
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si l'email existe déjà
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);

            if ($stmt->fetch()) {
                show_message("Cet e-mail est déjà utilisé. Essayez un autre ou connectez-vous.");
            } else {
                // Enregistrer l'utilisateur
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
                $stmt->execute([
                    'name' => $username,
                    'email' => $email,
                    'password' => $hashed_password
                ]);

                show_message("Inscription réussie ! Vous allez être redirigé vers la page de connexion...", 'success');
                echo "<script>
                    setTimeout(function(){
                        window.location.href = 'connexion.php';
                    }, 2000);
                </script>";
            }
        } catch (PDOException $e) {
            show_message("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}
?>

<style>
.message {
  max-width: 600px;
  margin: 12px auto;
  padding: 12px;
  border-radius: 6px;
  text-align: center;
  font-weight: 600;
  line-height: 1.4em;
}
.message.error { background: #ffecec; color: #c00; border: 1px solid #f5c2c2; }
.message.success { background: #e8ffea; color: #0a6b20; border: 1px solid #bde7c2; }
</style>

<main>
  <section class="form-container">
    <form action="inscription.php" method="POST" novalidate>
      <h2>Créer un compte</h2>

      <input type="text" name="username"
             placeholder="Nom complet"
             required pattern="[\p{L} ]+"
             title="Nom uniquement (lettres seulement)" />

      <input type="email" name="email" placeholder="Email" required />

      <input type="password" name="password"
             placeholder="Mot de passe"
             required pattern="(?=.*\d)(?=.*[A-Za-z]).{8,}"
             title="8 caractères minimum avec lettres et chiffres" />

      <input type="password" name="confirm_password"
             placeholder="Confirmer le mot de passe"
             required pattern="(?=.*\d)(?=.*[A-Za-z]).{8,}"
             title="Même règle que le mot de passe" />

      <button type="submit" name="submit">S'inscrire</button>

      <p class="info-text">
        En créant un compte, vous acceptez nos conditions d'utilisation.
      </p>
    </form>
  </section>
</main>

<?php require_once 'footer.php'; ?>
