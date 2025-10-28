<?php
require_once 'bdd.php';
$pageName = 'pages-ligue';
require_once 'header.php';

// Vérifier si le paramètre id_ligue existe dans l’URL
if (!isset($_GET['id_ligue'])) {
    header("Location: index.php");
    exit();
}

$id_ligue = intval($_GET['id_ligue']);

// 🔹 Récupération des informations de la ligue
$stmt = $pdo->prepare("SELECT * FROM ligues WHERE id_ligue = :id_ligue");
$stmt->bindParam(':id_ligue', $id_ligue, PDO::PARAM_INT);
$stmt->execute();
$ligue = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$ligue) {
    echo "<p style='color:red;text-align:center;'>Ligue non trouvée.</p>";
    require_once 'footer.php';
    exit();
}

// 🔹 Récupération des clubs appartenant à cette ligue
$stmt = $pdo->prepare("
    SELECT * FROM clubs 
    WHERE id_ligue = :id_ligue 
    ORDER BY nb_titres_nationaux DESC
");
$stmt->bindParam(':id_ligue', $id_ligue, PDO::PARAM_INT);
$stmt->execute();
$clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- ====================== CONTENU ====================== -->

<main style="max-width: 1000px; margin: auto; text-align: center; font-family: 'Audiowide', sans-serif; color: #fff;">
    <section style="background: rgba(0,0,0,0.6); padding: 20px; border-radius: 12px; margin-top: 20px;">
        
        <!-- Détails de la ligue -->
        <img src="<?= htmlspecialchars($ligue['logo']); ?>" alt="<?= htmlspecialchars($ligue['nom_ligue']); ?>" width="150" style="margin-bottom: 10px;">
        <h1><?= htmlspecialchars($ligue['nom_ligue']); ?></h1>
        <p><strong>Pays :</strong> <?= htmlspecialchars($ligue['pays']); ?></p>
        <p><?= nl2br(htmlspecialchars($ligue['description'])); ?></p>
        <p><a href="<?= htmlspecialchars($ligue['site_officiel']); ?>" target="_blank" style="color: #ffd700;">🌐 Site officiel</a></p>

        <hr style="margin: 30px 0; border: 1px solid #555;">

        <!-- Titre -->
        <h2>🏆 Les 10 meilleurs clubs de cette ligue</h2>

        <!-- Liste des clubs -->
        <ul style="list-style: none; padding: 0; margin-top: 20px;">
            <?php foreach ($clubs as $club): ?>
                <li style="margin: 25px 0; background: rgba(255,255,255,0.08); padding: 15px; border-radius: 10px;">
                    <img src="<?= htmlspecialchars($club['logo']); ?>" width="90" alt="<?= htmlspecialchars($club['name']); ?>" style="margin-bottom: 10px;">
                    <h3 style="color: #00ff99;"><?= htmlspecialchars($club['name']); ?></h3>
                    <p style="max-width: 800px; margin: 10px auto;"><?= nl2br(htmlspecialchars($club['description'])); ?></p>
                    <p><strong>Pays :</strong> <?= htmlspecialchars($club['pays']); ?></p>
                    <p><strong>Titres nationaux :</strong> <?= htmlspecialchars($club['nb_titres_nationaux']); ?> |
                       <strong>Internationaux :</strong> <?= htmlspecialchars($club['nb_titres_internationaux']); ?></p>
                    <p><strong>Légendes :</strong> <?= htmlspecialchars($club['joueurs_legendes']); ?></p>
                    <a href="<?= htmlspecialchars($club['site_officiel']); ?>" target="_blank" style="color: #ffd700;">Site officiel</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if (empty($clubs)): ?>
            <p style="color: #ff5555;">Aucun club trouvé pour cette ligue.</p>
        <?php endif; ?>
    </section>
</main>

<?php require_once 'footer.php'; ?>
