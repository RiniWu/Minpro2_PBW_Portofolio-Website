<?php
include 'koneksi.php';

// Ambil data
$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM profile LIMIT 1")) ?? [];
$about = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM about LIMIT 1")) ?? [];
$skills = mysqli_query($conn, "SELECT * FROM skills");
$sertifikat = mysqli_query($conn, "SELECT * FROM sertifikat");
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - <?= $profile['name'] ?? 'Portfolio'; ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top glass-navbar">
    <div class="container">

      <a class="navbar-brand fw-bold" href="#home">
        <?= $profile['name'] ?? 'Nama'; ?>
      </a>

      <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto nav-spacing">
          <li class="nav-item">
            <a class="nav-link" href="#home">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">Tentang Saya</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#sertifikat">Sertifikat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Kontak</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <!-- Beranda -->
  <section id="home" class="hero-section">
    <div class="container">
      <div class="row align-items-center gx-2">

        <div class="col-md-5 mb-5 mb-md-0 text-center text-md-start">
          <h5>Perkenalkan, Saya</h5>
          <h1 class="fw-bold display-5"><?= $profile['name'] ?? ''; ?></h1>
          <p class="text-muted"><?= $profile['description'] ?? ''; ?></p>
          <a href="#about" class="btn btn-dark rounded-pill px-4">
            Tentang Saya
          </a>
        </div>

        <div class="col-md-7 text-center hero-image-wrapper">
          <img src="images/Profil1_.jpg" class="hero-image">
        </div>

      </div>
    </div>
  </section>

  <!-- Tentang Saya -->
  <section id="about" class="about-section">
    <div class="container">

      <div class="text-center mb-5">
        <h2 class="fw-bold">Tentang Saya</h2>
      </div>

      <div class="row g-4 align-items-stretch">

        <!-- Latar Belakang -->
        <div class="col-md-6">
          <div class="about-card h-100 p-4 text-center">

            <img src="<?= $about['image']; ?>" class="about-image mb-4">

            <h4 class="fw-bold mb-3"><?= $about['title']; ?></h4>

            <p class="text-muted">
              <?= $about['description']; ?>
            </p>

          </div>
        </div>

        <div class="col-md-6">
          <div class="row g-4 h-100">

            <!-- Skill -->
            <div class="col-12">
              <div class="about-card right-card p-4">

                <h5 class="fw-bold mb-2">Skill</h5>
                <div class="accent-line mb-4"></div>

                <?php while ($skill = mysqli_fetch_assoc($skills)) { ?>
                  <div class="mb-3">

                    <div class="d-flex justify-content-between">
                      <span><?= $skill['name']; ?></span>
                      <span><?= $skill['level']; ?>%</span>
                    </div>

                    <div class="progress">
                      <div class="progress-bar skill-bar"
                        style="width: <?= $skill['level']; ?>%">
                      </div>
                    </div>

                  </div>
                <?php } ?>

              </div>
            </div>

            <!-- Pengalaman -->
            <div class="col-12">
              <div class="about-card right-card p-4">

                <h5 class="fw-bold mb-2">Pengalaman</h5>
                <div class="accent-line mb-3"></div>

                <p class="text-muted mb-0">
                  <?= $profile['experience']; ?>
                </p>

              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- Sertifikat -->
  <section id="sertifikat" class="section-space bg-light">
    <div class="container text-center">

      <h2 class="fw-bold mb-5">Sertifikat</h2>

      <div class="row g-4">
        <?php while ($cert = mysqli_fetch_assoc($sertifikat)) { ?>
          <div class="col-lg-4 col-md-6">
            <div class="certificate-card p-4 h-100">

              <img src="<?= $cert['image']; ?>" class="certificate-image mb-3">

              <h6 class="fw-bold"><?= $cert['title']; ?></h6>
              <p class="text-muted small mb-0"><?= $cert['description']; ?></p>

            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </section>

  <!-- Kontak -->
  <section id="contact" class="contact-section text-center">
    <div class="container">

      <p class="contact-label">Kontak</p>
      <h2 class="fw-bold fs-2 mb-4">Hubungi Saya</h2>

      <div class="social-icons d-flex justify-content-center gap-4">

        <a href="https://wa.me/6285255509272" class="social-item">
          <i class="bi bi-telephone"></i>
        </a>

        <a href="mailto:riniwulandari1205@email.com" class="social-item">
          <i class="bi bi-envelope"></i>
        </a>

        <a href="https://github.com/RiniWu"
          class="social-item"
          target="_blank">
          <i class="bi bi-github"></i>
        </a>

        <a href="https://www.instagram.com/riniwulan_dari_?igsh=MTNtOXNhbTVkbHc5MA=="
          class="social-item"
          target="_blank">
          <i class="bi bi-instagram"></i>
        </a>

      </div>

    </div>
  </section>

  <footer class="footer">
    <div class="container text-center">
      <p class="mb-0">
        © 2026 <?= $profile['name'] ?? ''; ?>. Mahasiswa S1 Sistem Informasi Universitas Mulawarman.
      </p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>