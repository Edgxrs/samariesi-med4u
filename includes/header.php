<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo escape_html(SITE_DESCRIPTION); ?>">
    <meta name="robots" content="index, follow">
    <meta name="author" content="<?php echo escape_html(SITE_NAME); ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo escape_html(get_page_title($page_title ?? '')); ?>">
    <meta property="og:description" content="<?php echo escape_html(SITE_DESCRIPTION); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo escape_html(get_site_url()); ?>">
    <meta property="og:site_name" content="<?php echo escape_html(SITE_NAME); ?>">
    
    <!-- Security Headers -->
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="SAMEORIGIN">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    
    <title><?php echo escape_html(get_page_title($page_title ?? '')); ?></title>
    
    <!-- Preload critical resources -->
    <link rel="preload" href="<?php echo get_asset_url('style.css'); ?>" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700&family=Aptos:wght@400;500;600;700&display=swap" as="style">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo get_asset_url('style.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700&family=Aptos:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_asset_url('favicon.ico'); ?>">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "MedicalOrganization",
        "name": "<?php echo escape_html(SITE_NAME); ?>",
        "description": "<?php echo escape_html(SITE_DESCRIPTION); ?>",
        "medicalSpecialty": "Palliative Care",
        "areaServed": [
            {"@type": "City", "name": "Riga"},
            {"@type": "State", "name": "Vidzeme"}
        ],
        "telephone": ["<?php echo CONTACT_PHONE_RIGA; ?>", "<?php echo CONTACT_PHONE_VIDZEME; ?>"],
        "url": "<?php echo get_site_url(); ?>",
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "<?php echo CONTACT_PHONE_RIGA; ?>",
                "contactType": "Emergency",
                "areaServed": "Riga",
                "availableLanguage": "Latvian"
            },
            {
                "@type": "ContactPoint",
                "telephone": "<?php echo CONTACT_PHONE_VIDZEME; ?>",
                "contactType": "Emergency",
                "areaServed": "Vidzeme",
                "availableLanguage": "Latvian"
            }
        ]
    }
    </script>
</head>
<body class="<?php echo get_current_page() ? 'page-' . get_current_page() : 'home'; ?>">

<!-- Skip to main content for accessibility -->
<a href="#main-content" class="sr-only sr-only-focusable">Pāriet uz galveno saturu</a>

<header class="site-header" role="banner">
    <div class="header-container">
        <!-- Logo and site title -->
        <div class="site-branding">
            <a href="<?php echo get_site_url(); ?>" class="site-logo" aria-label="<?php echo escape_html(SITE_NAME); ?> - sākumlapa">
                <h1 class="site-title"><?php echo escape_html(SITE_NAME); ?></h1>
                <p class="site-tagline"><?php echo escape_html(SITE_DESCRIPTION); ?></p>
            </a>
        </div>

        <!-- Emergency contact -->
        <div class="emergency-contact">
            <div class="emergency-info">
                <span class="emergency-label">24/7 Neatliekamā palīdzība:</span>
                <a href="tel:<?php echo EMERGENCY_PHONE; ?>" class="emergency-phone">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    <?php echo EMERGENCY_PHONE; ?>
                </a>
            </div>
        </div>

        <!-- Mobile menu toggle -->
        <button class="mobile-menu-toggle" aria-label="Atvērt izvēlni" aria-expanded="false" aria-controls="main-navigation">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </div>

    <!-- Main Navigation -->
    <nav class="main-navigation" id="main-navigation" role="navigation" aria-label="Galvenā navigācija">
        <ul class="nav-menu">
            <?php
            $current_page = get_current_page();
            foreach (get_navigation_menu() as $title => $url):
                $page_slug = str_replace('.php', '', $url);
                $page_slug = $page_slug === 'index' ? '' : $page_slug;
                $is_current = ($current_page === $page_slug);
            ?>
                <li class="nav-item <?php echo $is_current ? 'current-page' : ''; ?>">
                    <a href="<?php echo get_site_url($url); ?>" 
                       class="nav-link"
                       <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                        <?php echo escape_html($title); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- Contact button in navigation -->
        <div class="nav-contact">
            <button type="button" class="contact-button" data-action="open-modal">
                <i class="fas fa-envelope" aria-hidden="true"></i>
                <span>Sazināties</span>
            </button>
        </div>
    </nav>
</header>

<main id="main-content" class="main-content" role="main" tabindex="-1">