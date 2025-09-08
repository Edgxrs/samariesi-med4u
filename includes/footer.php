</main>

<!-- Contact Modal -->
<div id="contact-modal" class="modal" role="dialog" aria-labelledby="contact-modal-title" aria-hidden="true">
    <div class="modal-content">
        <button class="modal-close" aria-label="Aizvērt kontaktu formu">&times;</button>
        
        <h2 id="contact-modal-title">Sazināties ar mums</h2>
        <p>Mēs esam šeit, lai atbildētu uz jūsu jautājumiem un sniegtu atbalstu.</p>
        
        <form id="contact-form" class="contact-form" novalidate>
            <div class="form-group">
                <label for="contact-name">Vārds <span class="required">*</span></label>
                <input type="text" id="contact-name" name="name" required>
                <span class="error-message" role="alert"></span>
            </div>
            
            <div class="form-group">
                <label for="contact-email">E-pasts <span class="required">*</span></label>
                <input type="email" id="contact-email" name="email" required>
                <span class="error-message" role="alert"></span>
            </div>
            
            <div class="form-group">
                <label for="contact-phone">Tālrunis</label>
                <input type="tel" id="contact-phone" name="phone">
            </div>
            
            <div class="form-group">
                <label for="contact-region">Reģions</label>
                <select id="contact-region" name="region">
                    <option value="">Izvēlieties reģionu</option>
                    <option value="riga">Rīga un Pierīga</option>
                    <option value="vidzeme">Vidzeme</option>
                    <option value="other">Cits reģions</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="contact-message">Ziņojums <span class="required">*</span></label>
                <textarea id="contact-message" name="message" rows="5" required placeholder="Kā mēs varam jums palīdzēt?"></textarea>
                <span class="error-message" role="alert"></span>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn-primary">
                    <span class="button-text">
                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                        Nosūtīt ziņojumu
                    </span>
                    <span class="loading-spinner" style="display: none;">
                        <i class="fas fa-spinner fa-spin" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
            
            <div id="contact-status" role="alert" aria-live="polite"></div>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="site-footer" role="contentinfo">
    <div class="footer-content">
        <div class="footer-section footer-about">
            <h3>Par mums</h3>
            <p><?php echo escape_html(SITE_DESCRIPTION); ?></p>
            <p>Mūsu misija ir nodrošināt līdzjūtīgu un profesionālu paliatīvo aprūpi, palīdzot ģimenēm grūtākajās dzīves situācijās.</p>
        </div>
        
        <div class="footer-section footer-contact">
            <h3>Kontakti</h3>
            <div class="contact-regions">
                <div class="region-contact">
                    <h4>Rīgas reģions</h4>
                    <p>
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo CONTACT_PHONE_RIGA; ?>"><?php echo CONTACT_PHONE_RIGA; ?></a>
                    </p>
                    <p>
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:<?php echo CONTACT_EMAIL_RIGA; ?>"><?php echo CONTACT_EMAIL_RIGA; ?></a>
                    </p>
                </div>
                <div class="region-contact">
                    <h4>Vidzemes reģions</h4>
                    <p>
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo CONTACT_PHONE_VIDZEME; ?>"><?php echo CONTACT_PHONE_VIDZEME; ?></a>
                    </p>
                    <p>
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:<?php echo CONTACT_EMAIL_VIDZEME; ?>"><?php echo CONTACT_EMAIL_VIDZEME; ?></a>
                    </p>
                </div>
                <div class="region-contact">
                    <h4>Zemgales reģions</h4>
                    <p>
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo CONTACT_PHONE_ZEMGALE; ?>"><?php echo CONTACT_PHONE_ZEMGALE; ?></a>
                    </p>
                    <p>
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:<?php echo CONTACT_EMAIL_ZEMGALE; ?>"><?php echo CONTACT_EMAIL_ZEMGALE; ?></a>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="footer-section footer-links">
            <h3>Saites</h3>
            <ul class="footer-menu">
                <?php foreach (get_navigation_menu() as $title => $url): ?>
                    <li><a href="<?php echo get_site_url($url); ?>"><?php echo escape_html($title); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="footer-section footer-emergency">
            <h3>Neatliekamā palīdzība</h3>
            <div class="emergency-contact-footer">
                <p class="emergency-text">24/7 pieejama palīdzība:</p>
                <a href="tel:<?php echo EMERGENCY_PHONE; ?>" class="emergency-phone-footer">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    <?php echo EMERGENCY_PHONE; ?>
                </a>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>&copy; <?php echo date('Y'); ?> <?php echo escape_html(SITE_NAME); ?>. Visas tiesības aizsargātas.</p>
            <div class="footer-social">
                <span>Sekojiet mums:</span>
                <a href="#" class="social-link" aria-label="Facebook">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                </a>
                <a href="#" class="social-link" aria-label="Instagram">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#" class="social-link" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="<?php echo get_asset_url('script.js'); ?>"></script>
<script src="<?php echo get_asset_url('mobile-menu.js'); ?>"></script>

<!-- External link handling script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle external links with confirmation
    const externalLinks = document.querySelectorAll('a[href^="http"]:not([href^="<?php echo get_site_url(); ?>"])');
    externalLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const confirmed = confirm('Jūs pāriesiet uz ārēju vietni. Vai vēlaties turpināt?');
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });
});
</script>

</body>
</html>