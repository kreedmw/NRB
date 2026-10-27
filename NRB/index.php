<?php
include 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRVS Dashboard</title>
    <link rel="stylesheet" href="assets/stylesheet.css">
</head>
<body class="app-body">
    <?php include 'includes/sidebar.php'; ?>

    <header class="topbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <p class="eyebrow">National Registration Bureau</p>
                <h1>CRVS Dashboard</h1>
            </div>
            <span class="status-pill">System Ready</span>
        </div>
    </header>

    <main class="container py-5">
        <section class="hero-card mb-4">
            <div>
                <p class="eyebrow">Civil Registration & Vital Statistics</p>
                <h2>Manage registrations with a single view</h2>
            </div>
            <a href="persons/add_person.php" class="btn btn-light">Register Person</a>
        </section>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card primary">
                    <div class="feature-card__icon">👤</div>
                    <h5>Persons</h5>
                    <p>Register a new person record and maintain the citizen profile.</p>
                    <a href="persons/add_person.php" class="btn btn-primary w-100">Add Person</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card success">
                    <div class="feature-card__icon">👶</div>
                    <h5>Birth</h5>
                    <p>Create and track birth registrations from the registry office.</p>
                    <a href="vital_events/birth_form.php" class="btn btn-success w-100">Birth Form</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card danger">
                    <div class="feature-card__icon">⚰️</div>
                    <h5>Death</h5>
                    <p>Record death events and official registration details.</p>
                    <a href="vital_events/death_form.php" class="btn btn-danger w-100">Death Form</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card warning">
                    <div class="feature-card__icon">💍</div>
                    <h5>Marriage</h5>
                    <p>Register marriages and maintain spouse relationship details.</p>
                    <a href="vital_events/marriage_form.php" class="btn btn-warning w-100 text-white">Marriage Form</a>
                </div>
            </div>
        </div>
    </main>
    </div>
</div>
</body>
</html>
