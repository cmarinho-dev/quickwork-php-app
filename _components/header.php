<?php
$header = <<<HTML
<style>
  .navbar-glass {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
    .logo {
        font-size: 1.5rem;
        font-weight: bold;
    }
  </style>
<div class="demo-section">
    <div class="container">
        <h3 class="demo-title">3. Glass Effect Navbar</h3>
    </div>

    <nav class="navbar navbar-expand-lg navbar-glass">
        <div class="container">
            <a class="navbar-brand logo text-dark" href="#">
                <i class="fas fa-layer-group text-info"></i>
GlassUI
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav3">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav3">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info text-white ms-2" href="#">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
HTML;