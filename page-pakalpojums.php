<?php
/**
 * Template Name: Pakalpojums
 * Description: Shows three service-offering cards with enhanced accessibility.
 */

require_once 'wp-config.php';
get_header();
?>

<main class="service-page" role="main">
  <div class="service-intro">
    <h1>Kas ietilpst pakalpojumā?</h1>
  </div>

  <section class="service-cards" role="region" aria-label="Pakalpojumu kategorijas">
    <!-- Card 1: Healthcare -->
    <article class="service-card" data-category="healthcare">
      <div class="service-icon">
        <i class="fas fa-user-md" aria-hidden="true"></i>
      </div>
      <h2 class="service-title">Veselības aprūpe</h2>
      <ul class="service-list" role="list">
        <li>Ārsta un medmāsas vizītes mājās</li>
        <li>Veselības aprūpes plāna sastādīšana</li>
        <li>Medikamentu un infūziju nodrošināšana</li>
        <li>Speciālistu konsultācijas</li>
        <li>24/7 telefona konsultācijas</li>
        <li>Apmācītu aprūpētāju atbalsts</li>
        <li>Pacienta un ģimenes apmācība</li>
        <li>Speciālais medicīniskais transports</li>
      </ul>
      <div class="service-highlight">
        <span class="highlight-text">Profesionāla medicīniskā aprūpe</span>
      </div>
    </article>

    <!-- Card 2: Social Support -->
    <article class="service-card" data-category="social">
      <div class="service-icon">
        <i class="fas fa-users" aria-hidden="true"></i>
      </div>
      <h2 class="service-title">Sociālais atbalsts</h2>
      <ul class="service-list" role="list">
        <li>Darbinieku mājas apmeklējumi</li>
        <li>Konsultācijas birojā vai pa telefonu</li>
        <li>Tehnisko palīglīdzekļu nodrošināšana</li>
        <li>Sadarbība ar sociālajiem dienestiem</li>
        <li>Palīdzība dokumentu kārtošanā</li>
        <li>Informācija par sociālajiem pakalpojumiem</li>
        <li>Atbalsts ģimenes locekļiem</li>
      </ul>
      <div class="service-highlight">
        <span class="highlight-text">Visaptveroša sociālā palīdzība</span>
      </div>
    </article>

    <!-- Card 3: Spiritual and Psychological Support -->
    <article class="service-card" data-category="spiritual">
      <div class="service-icon">
        <i class="fas fa-heart" aria-hidden="true"></i>
      </div>
      <h2 class="service-title">Garīgais un psihoemocionālais atbalsts</h2>
      <ul class="service-list" role="list">
        <li>Kapelāna un psihologa konsultācijas</li>
        <li>Mājas vizītes vai biroja tikšanās</li>
        <li>Apmācītu brīvprātīgo atbalsts</li>
        <li>Sēru konsultācijas tuviniekiem</li>
        <li>Grupas terapijas sesijas</li>
        <li>Garīgais atbalsts visām konfesijām</li>
        <li>Emocionālais atbalsts krīzes situācijās</li>
      </ul>
      <div class="service-highlight">
        <span class="highlight-text">Dvēseles miers un atbalsts</span>
      </div>
    </article>
  </section>

  <!-- Call to action section -->
  <section class="service-cta" role="complementary">
    <div class="cta-content">
      <h2>Nepieciešams atbalsts?</h2>
      <p>Mūsu komanda ir gatava sniegt nepieciešamo palīdzību un atbildēt uz visiem jūsu jautājumiem par paliatīvās aprūpes pakalpojumiem.</p>
      <div class="cta-buttons">
        <button type="button" class="btn-primary js-open-modal">
          <i class="fas fa-phone" aria-hidden="true"></i>
          Sazinies ar mums
        </button>
        <a href="<?php echo esc_url(home_url('/komanda')); ?>" class="btn-secondary">
          <i class="fas fa-users" aria-hidden="true"></i>
          Uzzināt par komandu
        </a>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="service-faq">
    <h2>Biežāk uzdotie jautājumi</h2>
    <div class="faq-container">
      <details class="faq-item">
        <summary>Kas var saņemt paliatīvās aprūpes pakalpojumu?</summary>
        <div class="faq-content">
          <p>Pakalpojumu var saņemt pacienti, kuriem ir:</p>
          <ul>
            <li>IV vai V līmeņa stacionārās ārstniecības iestādes ārstu konsīlija lēmums</li>
            <li>Piešķirts "paliatīvā pacienta" statuss</li>
            <li>Prognozētā dzīvildze līdz 6 mēnešiem</li>
          </ul>
        </div>
      </details>
      
      <details class="faq-item">
        <summary>Vai par pakalpojumu ir jāmaksā?</summary>
        <div class="faq-content">
          <p>Pamatpakalpojums tiek segts no valsts budžeta līdzekļiem.</p>
        </div>
      </details>
      
      <details class="faq-item">
        <summary>Cik ātri var saņemt palīdzību?</summary>
        <div class="faq-content">
          <p>Pēc konsīlija lēmuma saņemšanas, mūsu komanda sazinās ar jums 24 stundu laikā, lai organizētu nepieciešamo aprūpi.</p>
        </div>
      </details>
    </div>
  </section>
</main>

<style>
.service-intro {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 4rem auto;
  padding: 2rem;
}

.service-intro p {
  font-size: 1.2rem;
  color: var(--text-color);
  line-height: 1.6;
  margin-top: 1rem;
}

.service-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 2rem;
  max-width: 1200px;
  margin: 0 auto 4rem auto;
  padding: 2rem;
}

.service-card {
  background: white;
  border-radius: var(--border-radius);
  padding: 2rem;
  box-shadow: var(--shadow-light);
  transition: transform var(--transition-medium), box-shadow var(--transition-medium);
  position: relative;
  overflow: hidden;
}

.service-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-heavy);
}

.service-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 4px;
  height: 100%;
  background: var(--separator-color);
  transform: scaleY(0);
  transition: transform var(--transition-medium);
}

.service-card:hover::before {
  transform: scaleY(1);
}

.service-icon {
  text-align: center;
  margin-bottom: 1.5rem;
}

.service-icon i {
  font-size: 3rem;
  color: var(--separator-color);
  background: rgba(171, 58, 80, 0.1);
  padding: 1rem;
  border-radius: 50%;
  width: 80px;
  height: 80px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

.service-title {
  color: var(--separator-color);
  margin-bottom: 1.5rem;
  text-align: center;
  border-bottom: 2px solid var(--separator-color);
  padding-bottom: 1rem;
  font-size: 1.4rem;
}

.service-list {
  list-style: none;
  padding: 0;
  margin-bottom: 2rem;
}

.service-list li {
  margin-bottom: 1rem;
  padding-left: 2rem;
  position: relative;
  color: var(--text-color);
  line-height: 1.5;
}

.service-list li::before {
  content: '✓';
  position: absolute;
  left: 0;
  color: var(--separator-color);
  font-weight: bold;
  font-size: 1.2rem;
}

.service-highlight {
  text-align: center;
  padding: 1rem;
  background: linear-gradient(135deg, var(--separator-color), var(--nav-text-color));
  border-radius: 25px;
  color: white;
  font-weight: 600;
  margin-top: auto;
}

.service-cta {
  background: white;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-medium);
  max-width: 800px;
  margin: 0 auto 4rem auto;
  padding: 0;
  overflow: hidden;
}

.cta-content {
  padding: 3rem 2rem;
  text-align: center;
  background: linear-gradient(135deg, var(--separator-color), var(--nav-text-color));
  color: white;
}

.cta-content h2 {
  color: white;
  margin-bottom: 1rem;
}

.cta-content p {
  font-size: 1.1rem;
  margin-bottom: 2rem;
  opacity: 0.9;
}

.cta-buttons {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-secondary {
  background: transparent;
  border: 2px solid white;
  color: white;
  text-decoration: none;
  padding: 0.75rem 1.5rem;
  border-radius: 30px;
  font-family: var(--font-2);
  font-weight: 600;
  transition: all var(--transition-medium);
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}

.btn-secondary:hover {
  background: white;
  color: var(--separator-color);
  text-decoration: none;
}

.service-faq {
  max-width: 800px;
  margin: 0 auto;
  padding: 2rem;
}

.service-faq h2 {
  text-align: center;
  margin-bottom: 2rem;
  color: var(--separator-color);
}

.faq-container {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.faq-item {
  background: white;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-light);
  overflow: hidden;
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

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.faq-content p {
  margin-bottom: 1rem;
  color: var(--text-color);
}

.faq-content ul {
  color: var(--text-color);
  padding-left: 1.5rem;
}

@media (max-width: 768px) {
  .service-cards {
    grid-template-columns: 1fr;
    padding: 1rem;
    gap: 1.5rem;
  }
  
  .service-card {
    padding: 1.5rem;
  }
  
  .service-icon i {
    font-size: 2.5rem;
    width: 70px;
    height: 70px;
  }
  
  .cta-buttons {
    flex-direction: column;
    align-items: center;
  }
  
  .btn-primary, .btn-secondary {
    width: 100%;
    max-width: 300px;
  }
  
  .faq-item summary {
    padding: 1rem;
  }
  
  .faq-content {
    padding: 1rem;
  }
}
</style>

<?php get_footer(); ?>
