<?php
/**
 * Template Name: Brīvprātīgo darbs
 * Description: Volunteer opportunities page with hero + CTA, description, apply button, and contacts.
 */

require_once 'wp-config.php';
get_header();
?>

<main class="volunteer-page">

  <!-- Hero with image + animated CTA -->
  <section class="volunteer-hero">
    <div class="volunteer-hero-image">
      <img
        src="<?php echo get_theme_file_uri('imgs/donations.png'); ?>"
        alt="Volunteers at work">
    </div>
    <div class="volunteer-hero-content">
      <div class="volunteer-quote">
        <blockquote>
         Lielākā dāvana ir Laiks un Sirds, kas spēj redzēt, dzirdēt un just. Tev tāda ir! Pievienojies!
        </blockquote>
      </div>
      <div class="volunteer-hero-cta">
        <a href="#volunteer-application" class="btn-primary volunteer-apply">
          Pievienojies mums
        </a>
      </div>
    </div>
  </section>

  <!-- Small description -->
  <section class="volunteer-description">
    <p>
      Mēs meklējam zinošus un sirsnīgus brīvprātīgos, kas palīdzētu padarīt 
      paliatīvās aprūpes pieejamāku ģimenēm visā reģionā. Pie mums tu vari:
    </p>
    <ul>
      <li>Piedalīties pacientu aprūpē mājās</li>
      <li>Sadarboties ar medicīnas personālu</li>
      <li>Piedāvāt emocionālu atbalstu ģimenēm</li>
    </ul>
  </section>

  <!-- Volunteer Application Section -->
  <section id="volunteer-application" class="volunteer-separator">
    <div class="application-container">
      <h2>Brīvprātīgo pieteikums</h2>
      <p>Aizpildiet pieteikumu divās daļās - vispirms jūsu kontaktinformācija, pēc tam īss tests, lai labāk iepazītos ar jums.</p>
      
      <!-- Multi-step form -->
      <div class="volunteer-form-container">
        
        <!-- Step 1: Contact Information -->
        <form id="volunteer-form-step1" class="volunteer-form-step active">
          <h3>1. daļa: Kontaktinformācija</h3>
          
          <div class="form-group">
            <label for="volunteer-name">Vārds un uzvārds <span class="required">*</span></label>
            <input type="text" id="volunteer-name" name="name" required>
            <span class="error-message"></span>
          </div>
          
          <div class="form-group">
            <label for="volunteer-email">E-pasta adrese <span class="required">*</span></label>
            <input type="email" id="volunteer-email" name="email" required>
            <span class="error-message"></span>
          </div>
          
          <div class="form-group">
            <label for="volunteer-phone">Tālrunis <span class="required">*</span></label>
            <input type="tel" id="volunteer-phone" name="phone" required>
            <span class="error-message"></span>
          </div>
          
          <div class="form-group">
            <label for="volunteer-age">Vecums</label>
            <select id="volunteer-age" name="age">
              <option value="">Izvēlieties vecumu</option>
              <option value="18-25">18-25</option>
              <option value="26-35">26-35</option>
              <option value="36-50">36-50</option>
              <option value="51-65">51-65</option>
              <option value="65+">65+</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="volunteer-experience">Iepriekšējā pieredze aprūpes jomā</label>
            <textarea id="volunteer-experience" name="experience" rows="3" placeholder="Aprakstiet savu pieredzi (ja tāda ir)..."></textarea>
          </div>
          
          <button type="button" class="btn-primary next-step">Turpināt uz testu</button>
        </form>
        
        <!-- Step 2: Assessment Quiz -->
        <form id="volunteer-form-step2" class="volunteer-form-step">
          <h3>2. daļa: Īss tests</h3>
          <p>Atbildiet uz dažiem jautājumiem, lai mēs labāk saprastu jūsu motivāciju un piemērotību brīvprātīgo darbam.</p>
          
          <div class="quiz-question">
            <label>1. Kāpēc vēlaties kļūt par brīvprātīgo paliatīvās aprūpes jomā? <span class="required">*</span></label>
            <textarea name="question1" required placeholder="Jūsu atbilde..."></textarea>
          </div>
          
          <div class="quiz-question">
            <label>2. Kā jūs rīkotos, ja pacients izrāda neapmierinātību vai agresiju? <span class="required">*</span></label>
            <div class="radio-group">
              <label class="radio-option">
                <input type="radio" name="question2" value="stay_calm" required>
                <span>Paliku mierīgs un mēģinātu noskaidrot problēmas cēloni</span>
              </label>
              <label class="radio-option">
                <input type="radio" name="question2" value="call_staff" required>
                <span>Nekavējoties sauktu medicīnas personālu</span>
              </label>
              <label class="radio-option">
                <input type="radio" name="question2" value="leave_situation" required>
                <span>Atstātu situāciju un vēlāk to apspriestu ar koordinatoru</span>
              </label>
            </div>
          </div>
          
          <div class="quiz-question">
            <label>3. Cik daudz laika nedēļā varat veltīt brīvprātīgo darbam? <span class="required">*</span></label>
            <div class="radio-group">
              <label class="radio-option">
                <input type="radio" name="question3" value="2-4_hours" required>
                <span>2-4 stundas</span>
              </label>
              <label class="radio-option">
                <input type="radio" name="question3" value="5-8_hours" required>
                <span>5-8 stundas</span>
              </label>
              <label class="radio-option">
                <input type="radio" name="question3" value="9+_hours" required>
                <span>9+ stundas</span>
              </label>
            </div>
          </div>
          
          <div class="quiz-question">
            <label>4. Vai jums ir transporta līdzeklis un autovadītāja apliecība?</label>
            <div class="radio-group">
              <label class="radio-option">
                <input type="radio" name="question4" value="yes_car">
                <span>Jā, man ir auto un apliecība</span>
              </label>
              <label class="radio-option">
                <input type="radio" name="question4" value="no_car">
                <span>Nē, izmantoju sabiedrisko transportu</span>
              </label>
            </div>
          </div>
          
          <div class="quiz-question">
            <label>5. Papildu komentāri vai jautājumi</label>
            <textarea name="question5" rows="3" placeholder="Jebkas, ko vēlaties mums pastāstīt..."></textarea>
          </div>
          
          <div class="form-buttons">
            <button type="button" class="btn-secondary back-step">Atpakaļ</button>
            <button type="submit" class="btn-primary submit-application">Iesniegt pieteikumu</button>
          </div>
        </form>
        
        <!-- Step 3: Thank You Screen -->
        <div id="volunteer-form-step3" class="volunteer-form-step thank-you-screen">
          <div class="thank-you-content">
            <h3>Paldies par jūsu pieteikumu!</h3>
            <p>Mēs esam saņēmuši jūsu pieteikumu un drīzumā ar jums sazināsimies.</p>
            <p>Ja jums ir steidzami jautājumi, sazinieties ar mūsu koordinatoru:</p>
            <div class="contact-info">
              <p><strong>Evita Zālīte</strong></p>
              <p>Tālrunis: <a href="tel:+37128017600">28017600</a></p>
              <p>E-pasts: <a href="mailto:volunteers@samariesi.lv">volunteers@samariesi.lv</a></p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- Contact info -->
  <section class="volunteer-contact">
    <h2>Sazinies ar mums</h2>
    <div class="contact-card">
      <div class="contact-item">
        <h3>Brīvprātīgo darba koordinatore</h3>
        <p>Evita Zālīte</p>
        <p>+371 1234 5678</p>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>