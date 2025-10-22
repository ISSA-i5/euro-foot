<?php 
$pageName = "menus";
require_once 'header.php'; 
?>

<main class="menu-mobile-container">
  <h2>Menu principal</h2>

  <a href="index.php" class="menu-link">🏠 Accueil</a>
  <a href="connexion.php" class="menu-link">🔐 Connexion</a>
  <a href="inscription.php" class="menu-link">📝 Inscription</a>

</main>


<style>
/* ====== STYLE MENU MOBILE ====== */
.menu-mobile-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: rgba(65, 167, 133, 0.85);
  padding: 25px 15px;
  margin: 25px auto;
  width: 90%;
  max-width: 350px;
  border-radius: 12px;
  box-shadow: 0 0 12px rgba(0,0,0,0.4);
  font-family: 'Audiowide', sans-serif;
}

/* العنوان */
.menu-mobile-container h2 {
  color: #fff;
  font-size: 18px;
  margin-bottom: 15px;
  text-align: center;
  letter-spacing: 0.5px;
}

/* الروابط */
.menu-mobile-container .menu-link {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 100%;
  padding: 10px 15px;
  margin: 6px 0;
  color: #fff;
  text-decoration: none;
  font-size: 15px;
  border-radius: 8px;
  background-color: rgba(255, 255, 255, 0.1);
  transition: 0.3s ease;
}

/* الأيقونة (الإيموجي) */
.menu-mobile-container .menu-link::before {
  content: "";
  margin-right: 10px;
  font-size: 18px;
}

/* تأثير عند اللمس */
.menu-mobile-container .menu-link:hover {
  background-color: #f5f570;
  color: #222;
  transform: scale(1.03);
}
</style>






<?php require_once 'footer.php'; ?>
