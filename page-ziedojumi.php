<?php
/**
 * Template Name: Ziedojumi
 * Description: Donation page with hero image, bank details, and PayPal widget.
 */

get_header();
?>

<main class="donation-page" role="main">
  <!-- Hero image -->
  <section class="donation-hero">
    <div class="hero-overlay">
      <div class="hero-content">
        <h1>Ziedojumi</h1>
        <p>Jūsu atbalsts ļauj mums turpināt sniegt dzīvībai svarīgu aprūpi</p>
      </div>
    </div>
    <img
      src="<?php echo get_theme_file_uri( '/imgs/donate-hero.jpg' ); ?>"
      alt="Atbalstiet mūsu darbu paliatīvajā aprūpē"
      loading="eager"
      onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
    />
    <div class="hero-fallback" style="display: none;">
      <div class="fallback-content">
        <i class="fas fa-heart" aria-hidden="true"></i>
        <h2>Atbalstiet mūsu misiju</h2>
      </div>
    </div>
  </section>

  <!-- Intro text -->
  
  <!-- Donation methods -->
  <section class="donation-methods">
    <div class="methods-container">
      <!-- Bank transfer -->
      <div class="donation-method">
        <div class="method-header">
          <i class="fas fa-university" aria-hidden="true"></i>
          <h2>Bankas pārskaitījums</h2>
        </div>
        <div class="bank-details">
          <div class="detail-item">
            <label>Saņēmējs:</label>
            <span>Samarieši@Med4You</span>
            <button class="copy-btn" data-copy="Samarieši@Med4You" aria-label="Kopēt saņēmēja nosaukumu">
              <i class="fas fa-copy" aria-hidden="true"></i>
            </button>
          </div>
          <div class="detail-item">
            <label>Konts (IBAN):</label>
            <span>LV12HABA0551023456789</span>
            <button class="copy-btn" data-copy="LV12HABA0551023456789" aria-label="Kopēt IBAN">
              <i class="fas fa-copy" aria-hidden="true"></i>
            </button>
          </div>
          <div class="detail-item">
            <label>Banka:</label>
            <span>SWEDBANK</span>
          </div>
          <div class="detail-item">
            <label>SWIFT/BIC:</label>
            <span>HABALV22</span>
            <button class="copy-btn" data-copy="HABALV22" aria-label="Kopēt SWIFT kodu">
              <i class="fas fa-copy" aria-hidden="true"></i>
            </button>
          </div>
        </div>
        <div class="method-note">
          <i class="fas fa-info-circle" aria-hidden="true"></i>
          <span>Norādiet pārskaitījuma mērķi: "Ziedojums paliatīvajai aprūpei"</span>
        </div>
      </div>

      <!-- PayPal donation -->
      <div class="donation-method">
        <div class="method-header">
          <i class="fab fa-paypal" aria-hidden="true"></i>
          <h2>Ziedot ar PayPal</h2>
        </div>
        <div class="paypal-content">
          <p>Ātrs un drošs veids, kā atbalstīt mūsu darbu tiešsaistē.</p>
          <div class="paypal-button-container">
            <form
              action="https://www.paypal.com/donate"
              method="post"
              target="_blank"
              rel="noopener noreferrer"
            >
              <input
                type="hidden"
                name="hosted_button_id"
                value="YOUR_HOSTED_BUTTON_ID"
              />
              <button type="submit" class="paypal-btn">
                <i class="fab fa-paypal" aria-hidden="true"></i>
                <span>Ziedot ar PayPal</span>
              </button>
            </form>
          </div>
          <div class="paypal-security">
            <i class="fas fa-shield-alt" aria-hidden="true"></i>
            <span>Droša maksājumu apstrāde</span>
          </div>
        </div>
      </div>

      <!-- Other methods -->
      <div class="donation-method">
        <div class="method-header">
          <i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
          <h2>Citi atbalsta veidi</h2>
        </div>
        <div class="other-methods">
          <div class="other-method">
            <h3>Brīvprātīgais darbs</h3>
            <p>Piedāvājiet savu laiku un prasmes mūsu komandai.</p>
            <a href="<?php echo esc_url(home_url('/brivpratigo-darbs')); ?>" class="method-link">
              Uzzināt vairāk <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
          <div class="other-method">
            <h3>Materiālie ziedojumi</h3>
            <p>Medicīnas aprīkojums, aprūpes līdzekļi vai citas nepieciešamības.</p>
            <button type="button" class="method-link js-open-modal">
              Sazināties <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Impact section -->


  <!-- FAQ Section -->
  <section class="donation-faq">
    <div class="faq-container">
      <h2>Biežāk uzdotie jautājumi</h2>
      <div class="faq-items">
        <details class="faq-item">
          <summary>Vai mani ziedojumi ir nodokļu atvieglojumu tiesīgi?</summary>
          <div class="faq-content">
            <p>Jā, saskaņā ar Latvijas likumdošanu fiziskās personas var saņemt nodokļa atvieglojumus par ziedojumiem sabiedriskā labuma organizācijām. Mēs nodrošināsim nepieciešamos dokumentus.</p>
          </div>
        </details>
        
        <details class="faq-item">
          <summary>Kā tiek izlietoti ziedojumi?</summary>
          <div class="faq-content">
            <p>Visi ziedojumi tiek izmantoti, lai nosegtu papildu pakalpojumus, kas netiek nosegti ar valsts budžeta līdzekļiem.</p>
          </div>
        </details>
        
        <details class="faq-item">
          <summary>Vai varu ziedot regulāri?</summary>
          <div class="faq-content">
            <p>Protams! Regulāri ziedojumi palīdz mums plānot un nodrošināt nepārtrauktu aprūpes kvalitāti. Sazinieties ar mums, lai izveidotu regulāra ziedojuma shēmu.</p>
          </div>
        </details>
      </div>
    </div>
  </section>

  <!-- Thank you section -->
  <section class="donation-thanks">
    <div class="thanks-content">
      <i class="fas fa-heart" aria-hidden="true"></i>
      <h2>Paldies par jūsu atbalstu!</h2>
      <p>Katrs ziedojums, neatkarīgi no tā lieluma, palīdz mums turpināt sniegt dzīvībai svarīgu aprūpi un atbalstu ģimenēm grūtajos brīžos.</p>
    </div>
  </section>
</main>

<style>
.donation-hero {
  position: relative;
  height: 50vh;
  min-height: 400px;
  overflow: hidden;
  border-radius: 0 0 var(--border-radius) var(--border-radius);
  display: flex;
  align-items: center;
  justify-content: center;
}

.donation-hero img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 1;
}

.hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgba(171, 58, 80, 0.8), rgba(169, 2, 48, 0.6));
  z-index: 2;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hero-content {
  text-align: center;
  color: white;
  z-index: 3;
  max-width: 600px;
  padding: 2rem;
}

.hero-content h1 {
  color: white;
  font-size: clamp(2.5rem, 5vw, 4rem);
  margin-bottom: 1rem;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.hero-content p {
  font-size: clamp(1.1rem, 2.5vw, 1.4rem);
  margin: 0;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}

.hero-fallback {
  width: 100%;
  height: 100%;
  background: var(--separator-color);
  display: flex;
  align-items: center;
  justify-content: center;
}

.fallback-content {
  text-align: center;
  color: white;
}

.fallback-content i {
  font-size: 4rem;
  margin-bottom: 1rem;
}

.donation-intro {
  max-width: 1000px;
  margin: 0 auto;
  padding: 4rem 2rem;
  text-align: center;
}

.intro-content h2 {
  margin-bottom: 2rem;
  color: var(--separator-color);
}

.intro-content > p {
  font-size: 1.2rem;
  color: var(--text-color);
  line-height: 1.6;
  margin-bottom: 3rem;
}

.impact-points {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-top: 3rem;
}

.impact-item {
  background: white;
  padding: 2rem;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-light);
  text-align: center;
  transition: transform var(--transition-medium);
}

.impact-item:hover {
  transform: translateY(-3px);
}

.impact-item i {
  font-size: 2.5rem;
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.impact-item h3 {
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.impact-item p {
  color: var(--text-color);
  margin: 0;
}

.donation-methods {
  background: #f8f9fa;
  padding: 4rem 2rem;
}

.methods-container {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 2rem;
}

.donation-method {
  background: white;
  border-radius: var(--border-radius);
  padding: 2rem;
  box-shadow: var(--shadow-light);
  transition: transform var(--transition-medium);
}

.donation-method:hover {
  transform: translateY(-3px);
}

.method-header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 2rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid var(--separator-color);
}

.method-header i {
  font-size: 2rem;
  color: var(--separator-color);
}

.method-header h2 {
  color: var(--separator-color);
  margin: 0;
  font-size: 1.5rem;
}

.bank-details {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.detail-item {
  display: grid;
  grid-template-columns: 1fr 2fr auto;
  align-items: center;
  gap: 1rem;
  padding: 0.75rem;
  background: #f8f9fa;
  border-radius: 8px;
}

.detail-item label {
  font-weight: 600;
  color: var(--separator-color);
}

.detail-item span {
  font-family: monospace;
  font-size: 1.1rem;
  color: var(--text-color);
}

.copy-btn {
  background: var(--separator-color);
  color: white;
  border: none;
  padding: 0.5rem;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color var(--transition-fast);
}

.copy-btn:hover {
  background: var(--nav-text-color);
}

.method-note {
  background: #e8f4fd;
  padding: 1rem;
  border-radius: 8px;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #0c5aa6;
  font-size: 0.9rem;
}

.paypal-content {
  text-align: center;
}

.paypal-content p {
  margin-bottom: 2rem;
  color: var(--text-color);
}

.paypal-btn {
  background: #0070ba;
  color: white;
  border: none;
  padding: 1rem 2rem;
  border-radius: 8px;
  font-size: 1.1rem;
  cursor: pointer;
  transition: background-color var(--transition-medium);
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  margin-bottom: 1rem;
}

.paypal-btn:hover {
  background: #005ea6;
}

.paypal-security {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  color: #666;
  font-size: 0.9rem;
}

.other-methods {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.other-method {
  padding: 1.5rem;
  border: 2px solid #eee;
  border-radius: 8px;
  transition: border-color var(--transition-medium);
}

.other-method:hover {
  border-color: var(--separator-color);
}

.other-method h3 {
  color: var(--separator-color);
  margin-bottom: 0.5rem;
}

.other-method p {
  color: var(--text-color);
  margin-bottom: 1rem;
}

.method-link {
  color: var(--separator-color);
  text-decoration: none;
  font-weight: 600;
  background: none;
  border: none;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  transition: color var(--transition-fast);
  font-family: var(--font-2);
}

.method-link:hover {
  color: var(--nav-text-color);
}

.donation-impact {
  padding: 4rem 2rem;
  background: white;
}

.impact-container {
  max-width: 1000px;
  margin: 0 auto;
  text-align: center;
}

.impact-container h2 {
  margin-bottom: 3rem;
  color: var(--separator-color);
}

.impact-examples {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
}

.impact-example {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  padding: 2rem;
  background: #f8f9fa;
  border-radius: var(--border-radius);
  text-align: left;
}

.impact-amount {
  font-size: 2.5rem;
  font-weight: bold;
  color: var(--separator-color);
  font-family: var(--font-1);
  min-width: 80px;
}

.impact-description h3 {
  color: var(--separator-color);
  margin-bottom: 0.5rem;
  font-size: 1.2rem;
}

.impact-description p {
  color: var(--text-color);
  margin: 0;
  line-height: 1.5;
}

.donation-faq {
  background: #f8f9fa;
  padding: 4rem 2rem;
}

.faq-container {
  max-width: 800px;
  margin: 0 auto;
}

.faq-container h2 {
  text-align: center;
  margin-bottom: 3rem;
  color: var(--separator-color);
}

.faq-items {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.faq-item {
  background: white;
  border-radius: var(--border-radius);
  overflow: hidden;
  box-shadow: var(--shadow-light);
}

.faq-item summary {
  padding: 1.5rem;
  background: var(--separator-color);
  color: white;
  cursor: pointer;
  font-weight: 600;
  user-select: none;
  list-style: none;
  position: relative;
}

.faq-item summary::-webkit-details-marker {
  display: none;
}

.faq-item summary::after {
  content: '+';
  position: absolute;
  right: 1.5rem;
  top: 50%;
  transform: translateY(-50%);
  font-size: 1.5rem;
  transition: transform var(--transition-medium);
}

.faq-item[open] summary::after {
  transform: translateY(-50%) rotate(45deg);
}

.faq-content {
  padding: 1.5rem;
  background: white;
  animation: fadeIn 0.3s ease;
}

.faq-content p {
  margin: 0;
  color: var(--text-color);
  line-height: 1.6;
}

.donation-thanks {
  background: var(--separator-color);
  color: white;
  padding: 4rem 2rem;
  text-align: center;
}

.thanks-content i {
  font-size: 4rem;
  margin-bottom: 1rem;
  animation: heartbeat 2s infinite;
}

@keyframes heartbeat {
  0% { transform: scale(1); }
  14% { transform: scale(1.1); }
  28% { transform: scale(1); }
  42% { transform: scale(1.1); }
  70% { transform: scale(1); }
}

.thanks-content h2 {
  color: white;
  margin-bottom: 1rem;
}

.thanks-content p {
  font-size: 1.2rem;
  max-width: 600px;
  margin: 0 auto;
  opacity: 0.9;
}

@media (max-width: 768px) {
  .donation-hero {
    height: 40vh;
    min-height: 300px;
  }
  
  .methods-container {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .detail-item {
    grid-template-columns: 1fr;
    text-align: center;
    gap: 0.5rem;
  }
  
  .impact-examples {
    grid-template-columns: 1fr;
  }
  
  .impact-example {
    flex-direction: column;
    text-align: center;
  }
  
  .impact-amount {
    min-width: auto;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Copy to clipboard functionality
  const copyButtons = document.querySelectorAll('.copy-btn');
  
  copyButtons.forEach(button => {
    button.addEventListener('click', async function() {
      const textToCopy = this.getAttribute('data-copy');
      
      try {
        await navigator.clipboard.writeText(textToCopy);
        
        // Visual feedback
        const originalIcon = this.innerHTML;
        this.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i>';
        this.style.background = '#28a745';
        
        setTimeout(() => {
          this.innerHTML = originalIcon;
          this.style.background = '';
        }, 2000);
        
        // Accessibility announcement
        const announcement = document.createElement('div');
        announcement.setAttribute('aria-live', 'polite');
        announcement.className = 'sr-only';
        announcement.textContent = 'Nokopēts starpliktuvē';
        document.body.appendChild(announcement);
        
        setTimeout(() => {
          document.body.removeChild(announcement);
        }, 3000);
        
      } catch (err) {
        console.error('Copy failed:', err);
        
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = textToCopy;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
      }
    });
  });
});
</script>

<?php get_footer(); ?>
