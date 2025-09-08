  </div> <!-- Close main-content -->

<footer role="contentinfo">
  <div class="footer-content">
    <!-- Logo section (left) -->
    <div class="footer-logo">
      <img src="<?php echo get_theme_file_uri('/imgs/samariesi-logo.png'); ?>" alt="Samarieši@Med4You logo" class="footer-logo-img">
      <p class="footer-tagline">Paliatīvās aprūpes pakalpojumi</p>
    </div>

    <!-- Contact information (center) -->
    <div class="footer-contacts">
      <h3>Kontakti</h3>
      <div class="contact-card">
        <div class="contact-item">
          <h4>Diennakts tālrunis Rīgā:</h4>
          <p><a href="tel:+37128017600" aria-label="Zvanīt uz Rīgas tālruni">28017600</a></p>
        </div>
        <div class="contact-item">
          <h4>Diennakts tālrunis Vidzemē:</h4>
          <p><a href="tel:+37125762922" aria-label="Zvanīt uz Vidzemes tālruni">25762922</a></p>
        </div>
        <div class="contact-item">
          <h4>Diennakts tālrunis Zemgalē:</h4>
          <p><a href="tel:+37129123456" aria-label="Zvanīt uz Zemgales tālruni">29123456</a></p>
        </div>
      </div>
    </div>

    <!-- Useful links (right) -->
    <div class="footer-nav">
      <h3>Noderīgas saites</h3>
      <?php
        wp_nav_menu( array(
          'theme_location' => 'footer',
          'container'      => 'nav',
          'container_class'=> 'footer-menu',
          'fallback_cb'    => false,
          'depth'          => 1,
        ) );
      ?>
      <div class="footer-links">
        <a href="/pakalpojums">Latvijas Samariešu apvienība</a>
        <a href="/komanda">Sapņu pavadonis</a>
        <a href="/brivpratigo-darbs">Onkoalianse</a>

      </div>
    </div>
  </div>
  
  <!-- Copyright footer -->
  <div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Visas tiesības aizsargātas.</p>
  </div>
</footer>

<!-- Contact Modal -->
<div id="contact-modal" class="modal" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-content">
    <button class="modal-close" aria-label="Close contact modal">&times;</button>
    
    <h2 id="modal-title">Kontaktu informācija</h2>
    
    <!-- Contact information -->
    <div class="contact-card">
      <div class="contact-item">
        <h3>Diennakts tālrunis Rīgā:</h3>
        <p><a href="tel:+37128017600">28017600</a></p>
      </div>
      <div class="contact-item">
        <h3>Diennakts tālrunis Vidzemē:</h3>
        <p><a href="tel:+37125762922">25762922</a></p>
      </div>
    </div>

    <!-- Contact form -->
    <div class="contact-form-container">
      <h3>Sūtīt ziņojumu</h3>
      <form id="contact-form" class="contact-form" novalidate>
        <div class="form-group">
          <label for="contact-name">Vārds <span class="required">*</span></label>
          <input type="text" id="contact-name" name="name" required aria-describedby="name-error">
          <span id="name-error" class="error-message" role="alert"></span>
        </div>
        
        <div class="form-group">
          <label for="contact-email">E-pasts <span class="required">*</span></label>
          <input type="email" id="contact-email" name="email" required aria-describedby="email-error">
          <span id="email-error" class="error-message" role="alert"></span>
        </div>
        
        <div class="form-group">
          <label for="contact-phone">Tālrunis</label>
          <input type="tel" id="contact-phone" name="phone" aria-describedby="phone-error">
          <span id="phone-error" class="error-message" role="alert"></span>
        </div>
        
        <div class="form-group">
          <label for="contact-message">Ziņojums <span class="required">*</span></label>
          <textarea id="contact-message" name="message" rows="5" required aria-describedby="message-error" placeholder="Aprakstiet, kādā veidā mēs varam jums palīdzēt..."></textarea>
          <span id="message-error" class="error-message" role="alert"></span>
        </div>
        
        <div class="form-group">
          <button type="submit" class="btn-primary">
            <span class="button-text">Sūtīt ziņojumu</span>
            <span class="loading-spinner" style="display: none;">
              <i class="fas fa-spinner fa-spin"></i>
            </span>
          </button>
        </div>
        
        <div id="form-status" role="alert" aria-live="polite"></div>
      </form>
    </div>
  </div>
</div>

<!-- Loading overlay for better UX -->
<div id="loading-overlay" class="loading-overlay" style="display: none;">
  <div class="loading-content">
    <div class="loading-spinner">
      <i class="fas fa-heart fa-2x"></i>
    </div>
    <p>Loading...</p>
  </div>
</div>

<script>
// Enhanced contact form functionality
document.addEventListener('DOMContentLoaded', function() {
  const contactForm = document.getElementById('contact-form');
  const formStatus = document.getElementById('form-status');
  
  if (contactForm) {
    contactForm.addEventListener('submit', async function(e) {
      e.preventDefault();
      
      // Reset previous status
      formStatus.textContent = '';
      formStatus.className = '';
      
      // Validate form
      if (!validateContactForm()) {
        return false;
      }
      
      // Show loading state
      setFormLoading(true);
      
      try {
        const formData = new FormData(contactForm);
        formData.append('action', 'contact_form');
        formData.append('nonce', '<?php echo wp_create_nonce("samariesi_nonce"); ?>');
        
        const response = await fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
          method: 'POST',
          body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
          showFormStatus('Ziņojums veiksmīgi nosūtīts! Mēs ar jums sazināsimies drīzumā.', 'success');
          contactForm.reset();
        } else {
          showFormStatus(result.data || 'Kļūda nosūtot ziņojumu. Lūdzu mēģiniet vēlreiz.', 'error');
        }
      } catch (error) {
        showFormStatus('Kļūda nosūtot ziņojumu. Lūdzu pārbaudiet interneta savienojumu.', 'error');
      } finally {
        setFormLoading(false);
      }
    });
  }
  
  function validateContactForm() {
    const name = document.getElementById('contact-name');
    const email = document.getElementById('contact-email');
    const message = document.getElementById('contact-message');
    let isValid = true;
    
    // Clear previous errors
    clearFormErrors();
    
    // Validate name
    if (!name.value.trim()) {
      showFieldError('contact-name', 'Vārds ir obligāts');
      isValid = false;
    }
    
    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim()) {
      showFieldError('contact-email', 'E-pasts ir obligāts');
      isValid = false;
    } else if (!emailRegex.test(email.value)) {
      showFieldError('contact-email', 'Lūdzu ievadiet derīgu e-pasta adresi');
      isValid = false;
    }
    
    // Validate message
    if (!message.value.trim()) {
      showFieldError('contact-message', 'Ziņojums ir obligāts');
      isValid = false;
    } else if (message.value.trim().length < 10) {
      showFieldError('contact-message', 'Ziņojumam jābūt vismaz 10 rakstzīmju garam');
      isValid = false;
    }
    
    return isValid;
  }
  
  function showFieldError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorSpan = document.getElementById(fieldId.replace('contact-', '') + '-error');
    
    field.classList.add('input-error');
    field.setAttribute('aria-invalid', 'true');
    errorSpan.textContent = message;
  }
  
  function clearFormErrors() {
    const fields = contactForm.querySelectorAll('input, textarea');
    const errors = contactForm.querySelectorAll('.error-message');
    
    fields.forEach(field => {
      field.classList.remove('input-error');
      field.removeAttribute('aria-invalid');
    });
    
    errors.forEach(error => {
      error.textContent = '';
    });
  }
  
  function setFormLoading(loading) {
    const submitButton = contactForm.querySelector('button[type="submit"]');
    const buttonText = submitButton.querySelector('.button-text');
    const loadingSpinner = submitButton.querySelector('.loading-spinner');
    
    if (loading) {
      submitButton.disabled = true;
      buttonText.style.display = 'none';
      loadingSpinner.style.display = 'inline-block';
    } else {
      submitButton.disabled = false;
      buttonText.style.display = 'inline-block';
      loadingSpinner.style.display = 'none';
    }
  }
  
  function showFormStatus(message, type) {
    formStatus.textContent = message;
    formStatus.className = `form-status ${type}`;
  }
});
</script>

<style>
.loading-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.9);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

.loading-content {
  text-align: center;
}

.loading-spinner {
  color: var(--separator-color);
  margin-bottom: 1rem;
  animation: pulse 2s infinite;
}

.form-status {
  padding: 1rem;
  border-radius: 8px;
  margin-top: 1rem;
  text-align: center;
}

.form-status.success {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
}

.form-status.error {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}

.footer-nav {
  margin: 2rem 0;
}

.footer-menu ul {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  list-style: none;
  padding: 0;
  margin: 0;
  justify-content: center;
}

.footer-menu a {
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
  transition: color var(--transition-fast);
}

.footer-menu a:hover {
  color: white;
}

.footer-info {
  text-align: center;
  margin-top: 2rem;
  padding-top: 2rem;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-info p {
  margin: 0.5rem 0;
  color: rgba(255, 255, 255, 0.7);
  font-size: 0.9rem;
}

@media (max-width: 768px) {
  .footer-menu ul {
    flex-direction: column;
    align-items: center;
    gap: 1rem;
  }
}
</style>

<!-- Load JavaScript files directly to avoid path conflicts -->
<script src="./script.js?v=<?php echo time(); ?>"></script>
<script src="./mobile-menu.js?v=<?php echo time(); ?>"></script>


<?php wp_footer(); ?>
</body>
</html>
