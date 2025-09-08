<?php
/**
 * Template Name: Vakances
 * Description: Enhanced careers page with job vacancy cards and application form.
 */

require_once 'wp-config.php';
get_header();
?>

<main class="vacancy-page" role="main">
  <!-- Page intro -->
  <section class="vacancy-intro">
    <h1>Vakances</h1>
    <div class="intro-content">
      <p>Mēs meklējam sirsnīgus un profesionālus cilvēkus, kas vēlas pievienoties mūsu komandai un palīdzēt nodrošināt kvalitatīvu paliatīvo aprūpi.</p>
      <div class="intro-highlights">
        <div class="highlight-item">
          <i class="fas fa-heart" aria-hidden="true"></i>
          <span>Jēgpilns darbs</span>
        </div>
        <div class="highlight-item">
          <i class="fas fa-users" aria-hidden="true"></i>
          <span>Atbalstīga komanda</span>
        </div>
        <div class="highlight-item">
          <i class="fas fa-graduation-cap" aria-hidden="true"></i>
          <span>Apmācību iespējas</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Current vacancies -->
  <section class="vacancy-cards" role="region" aria-label="Pašreizējās vakances">
    <div class="section-header">
      <h2>Pašreizējās vakances</h2>
      <p>Visas pozīcijas nodrošina iespēju strādāt jēgpilnu darbu, palīdzot cilvēkiem viņu vissarežģītākajos dzīves brīžos.</p>
    </div>
    
    <div class="vacancy-grid">
      <?php
        // Enhanced vacancy data
        $vacancies = [
          [
            'title' => 'Mobilā māsa',
            'type' => 'Pilna slodze',
            'location' => 'Rīga un Pierīga',
            'email' => 'nurse.jobs@med4you.lv',
            'requirements' => [
              'Māsas izglītība un licence',
              'Pieredze paliatīvajā aprūpē vēlama',
              'Empātija un komunikācijas prasmes',
              'Autovadītāja apliecība'
            ],
            'responsibilities' => [
              'Pacientu aprūpe dzīvesvietā',
              'Medikamentu ievadīšana',
              'Aprūpes plānu īstenošana',
              'Sadarbība ar ārstu komandu'
            ],
            'benefits' => [
              'Konkurētspējīgs atalgojums',
              'Apmācību iespējas',
              'Atbalstīga darba vide',
              'Elastīgs darba grafiks'
            ]
          ],
          [
            'title' => 'Psihologs konsultants',
            'type' => 'Daļēja slodze',
            'location' => 'Vidzeme',
            'email' => 'psych.jobs@med4you.lv',
            'requirements' => [
              'Psiholoģijas izglītība',
              'Pieredze krīzes konsultēšanā',
              'Specializācija sēru terapijā',
              'Komunikācijas prasmes'
            ],
            'responsibilities' => [
              'Pacientu un ģimeņu konsultēšana',
              'Emocionālais atbalsts',
              'Grupas terapijas vadīšana',
              'Sadarbība ar komandu'
            ],
            'benefits' => [
              'Elastīgs darba grafiks',
              'Profesionālā izaugsme',
              'Supervīzijas atbalsts',
              'Jēgpilns darbs'
            ]
          ],
          [
            'title' => 'Sociālais darbinieks',
            'type' => 'Pilna slodze',
            'location' => 'Rīga',
            'email' => 'social.jobs@med4you.lv',
            'requirements' => [
              'Sociālā darba izglītība',
              'Pieredze ģimeņu atbalstā',
              'Zināšanas sociālajos jautājumos',
              'Organizatoriskās prasmes'
            ],
            'responsibilities' => [
              'Ģimeņu sociālais atbalsts',
              'Sadarbība ar institūcijām',
              'Dokumentu kārtošana',
              'Atbalsta programmu organizēšana'
            ],
            'benefits' => [
              'Profesionālā izaugsme',
              'Apmācību programmas',
              'Atbalstīga komanda',
              'Sociālās garantijas'
            ]
          ]
        ];

        foreach( $vacancies as $index => $job ): ?>
          <article class="vacancy-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
            <div class="vacancy-header">
              <div class="vacancy-title-section">
                <h3 class="vacancy-title"><?php echo esc_html( $job['title'] ); ?></h3>
                <div class="vacancy-meta">
                  <span class="job-type"><?php echo esc_html( $job['type'] ); ?></span>
                  <span class="job-location">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <?php echo esc_html( $job['location'] ); ?>
                  </span>
                </div>
              </div>
              <div class="vacancy-icon">
                <i class="fas fa-user-md" aria-hidden="true"></i>
              </div>
            </div>

            <div class="vacancy-content">
              <p class="vacancy-description">Pievienojieties mūsu profesionālajai komandai un palīdziet nodrošināt kvalitatīvu paliatīvo aprūpi pacientiem un viņu ģimenēm.</p>
            </div>

            <div class="vacancy-footer">
              <div class="contact-info">
                <p>Kontakts: 
                  <a href="mailto:<?php echo esc_attr( $job['email'] ); ?>" class="email-link">
                    <?php echo esc_html( $job['email'] ); ?>
                  </a>
                </p>
              </div>
              <button class="apply-btn" data-position="<?php echo esc_attr($job['title']); ?>" data-email="<?php echo esc_attr($job['email']); ?>">
                <i class="fas fa-paper-plane" aria-hidden="true"></i>
                Pieteikties
              </button>
            </div>
          </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Application process -->
  <section class="application-process">
    <div class="process-container">
      <h2>Kā pieteikties?</h2>
      <div class="process-steps">
        <div class="process-step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3>Nosūtiet CV</h3>
            <p>Nosūtiet savu dzīves aprakstu un motivācijas vēstuli uz attiecīgo e-pasta adresi</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3>Pirmā intervija</h3>
            <p>Telefona vai video saruna ar HR speciālistu par jūsu pieredzi un motivāciju</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3>Tikšanās ar komandu</h3>
            <p>Klātienes tikšanās ar komandas vadītājiem un iespējamiem kolēģiem</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3>Lēmums</h3>
            <p>Mēs sazināsimies ar jums 5 darba dienu laikā pēc pēdējās intervijas</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- General application -->
  <section class="general-application">
    <div class="application-container">
      <div class="application-content">
        <h2>Neesat atradis piemērotu pozīciju?</h2>
        <p>Mēs vienmēr meklējam talantīgus profesionāļus! Nosūtiet mums savu CV, un mēs sazināsimies, kad parādīsies piemērota iespēja.</p>
        <button type="button" class="btn-primary js-open-application-modal">
          <i class="fas fa-envelope" aria-hidden="true"></i>
          Nosūtīt CV
        </button>
      </div>
      <div class="application-benefits">
        <h3>Kāpēc strādāt pie mums?</h3>
        <div class="benefit-items">
          <div class="benefit-item">
            <i class="fas fa-heart" aria-hidden="true"></i>
            <div>
              <h4>Jēgpilns darbs</h4>
              <p>Palīdziet cilvēkiem viņu vissvarīgākajos dzīves brīžos</p>
            </div>
          </div>
          <div class="benefit-item">
            <i class="fas fa-users" aria-hidden="true"></i>
            <div>
              <h4>Profesionāla komanda</h4>
              <p>Strādājiet kopā ar pieredzējušiem speciālistiem</p>
            </div>
          </div>
          <div class="benefit-item">
            <i class="fas fa-graduation-cap" aria-hidden="true"></i>
            <div>
              <h4>Nepārtraukta attīstība</h4>
              <p>Regulāras apmācības un profesionālās izaugsmes iespējas</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Application Modal -->
<div id="application-modal" class="modal" role="dialog" aria-labelledby="application-modal-title" aria-hidden="true">
  <div class="modal-content">
    <button class="modal-close" aria-label="Aizvērt pieteikšanās formu">&times;</button>
    
    <h2 id="application-modal-title">Pieteikties darbam</h2>
    
    <form id="application-form" class="application-form" enctype="multipart/form-data" novalidate>
      <div class="form-group">
        <label for="applicant-name">Vārds, uzvārds <span class="required">*</span></label>
        <input type="text" id="applicant-name" name="name" required>
        <span class="error-message" role="alert"></span>
      </div>
      
      <div class="form-group">
        <label for="applicant-email">E-pasts <span class="required">*</span></label>
        <input type="email" id="applicant-email" name="email" required>
        <span class="error-message" role="alert"></span>
      </div>
      
      <div class="form-group">
        <label for="applicant-phone">Tālrunis</label>
        <input type="tel" id="applicant-phone" name="phone">
        <span class="error-message" role="alert"></span>
      </div>
      
      <div class="form-group">
        <label for="position-interest">Interesējošā pozīcija</label>
        <select id="position-interest" name="position">
          <option value="">Izvēlieties pozīciju</option>
          <option value="Mobilā māsa">Mobilā māsa</option>
          <option value="Psihologs konsultants">Psihologs konsultants</option>
          <option value="Sociālais darbinieks">Sociālais darbinieks</option>
          <option value="Cita pozīcija">Cita pozīcija</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="cv-upload">CV fails <span class="required">*</span></label>
        <input type="file" id="cv-upload" name="cv" accept=".pdf,.doc,.docx" required>
        <small class="field-help">Atbalstītie formāti: PDF, DOC, DOCX (maks. 5MB)</small>
        <span class="error-message" role="alert"></span>
      </div>
      
      <div class="form-group">
        <label for="cover-letter">Motivācijas vēstule</label>
        <textarea id="cover-letter" name="message" rows="5" placeholder="Pastāstiet, kāpēc vēlaties pievienoties mūsu komandai..."></textarea>
      </div>
      
      <div class="form-group">
        <label class="checkbox-label">
          <input type="checkbox" name="privacy" required>
          <span class="checkmark"></span>
          Piekrītu personas datu apstrādei saskaņā ar <a href="/privacy-policy">privātuma politiku</a> <span class="required">*</span>
        </label>
        <span class="error-message" role="alert"></span>
      </div>
      
      <div class="form-group">
        <button type="submit" class="btn-primary">
          <span class="button-text">Nosūtīt pieteikumu</span>
          <span class="loading-spinner" style="display: none;">
            <i class="fas fa-spinner fa-spin"></i>
          </span>
        </button>
      </div>
      
      <div id="application-status" role="alert" aria-live="polite"></div>
    </form>
  </div>
</div>

<style>
.vacancy-intro {
  text-align: center;
  max-width: 1000px;
  margin: 0 auto 4rem auto;
  padding: 2rem;
}

.intro-content p {
  font-size: 1.2rem;
  color: var(--text-color);
  line-height: 1.6;
  margin-bottom: 2rem;
}

.intro-highlights {
  display: flex;
  justify-content: center;
  gap: 2rem;
  flex-wrap: wrap;
  margin-top: 2rem;
}

.highlight-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem 1.5rem;
  background: white;
  border-radius: 25px;
  box-shadow: var(--shadow-light);
  color: var(--separator-color);
  font-weight: 600;
}

.highlight-item i {
  color: var(--separator-color);
}

.section-header {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 3rem auto;
  padding: 0 2rem;
}

.section-header h2 {
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.section-header p {
  color: var(--text-color);
  font-size: 1.1rem;
}

.vacancy-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
  gap: 2rem;
  max-width: 1400px;
  margin: 0 auto;
  padding: 2rem;
}

.vacancy-card {
  background: white;
  border-radius: var(--border-radius);
  padding: 2rem;
  box-shadow: var(--shadow-light);
  transition: transform var(--transition-medium), box-shadow var(--transition-medium);
  display: flex;
  flex-direction: column;
  position: relative;
  overflow: hidden;
}

.vacancy-card::before {
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

.vacancy-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-heavy);
}

.vacancy-card:hover::before {
  transform: scaleY(1);
}

.vacancy-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid #f0f0f0;
}

.vacancy-title {
  color: var(--separator-color);
  margin: 0 0 0.5rem 0;
  font-size: 1.4rem;
}

.vacancy-meta {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}

.job-type {
  background: var(--separator-color);
  color: white;
  padding: 0.25rem 0.75rem;
  border-radius: 15px;
  font-size: 0.8rem;
  font-weight: 600;
  width: fit-content;
}

.job-location {
  color: #666;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  gap: 0.25rem;
}

.vacancy-icon {
  background: rgba(171, 58, 80, 0.1);
  padding: 1rem;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.vacancy-icon i {
  font-size: 1.5rem;
  color: var(--separator-color);
}

.vacancy-content {
  flex-grow: 1;
  margin-bottom: 2rem;
}

.vacancy-section {
  margin-bottom: 1.5rem;
}

.vacancy-section h4 {
  color: var(--separator-color);
  margin-bottom: 0.75rem;
  font-size: 1rem;
  font-weight: 600;
}

.requirement-list,
.responsibility-list,
.benefit-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.requirement-list li,
.responsibility-list li,
.benefit-list li {
  margin-bottom: 0.5rem;
  padding-left: 1.5rem;
  position: relative;
  color: var(--text-color);
  font-size: 0.95rem;
  line-height: 1.4;
}

.requirement-list li::before {
  content: '•';
  color: var(--separator-color);
  position: absolute;
  left: 0;
  font-weight: bold;
}

.responsibility-list li::before {
  content: '→';
  color: var(--nav-text-color);
  position: absolute;
  left: 0;
}

.benefit-list li::before {
  content: '✓';
  color: #28a745;
  position: absolute;
  left: 0;
  font-weight: bold;
}

.vacancy-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 1rem;
  border-top: 1px solid #f0f0f0;
  gap: 1rem;
}

.email-link {
  color: var(--separator-color);
  text-decoration: none;
  font-weight: 600;
}

.email-link:hover {
  text-decoration: underline;
}

.apply-btn {
  background: var(--separator-color);
  color: white;
  border: none;
  padding: 0.75rem 1.5rem;
  border-radius: 25px;
  cursor: pointer;
  transition: all var(--transition-medium);
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-weight: 600;
  white-space: nowrap;
}

.apply-btn:hover {
  background: var(--nav-text-color);
  transform: translateY(-2px);
}

.application-process {
  background: #f8f9fa;
  padding: 4rem 2rem;
}

.process-container {
  max-width: 1000px;
  margin: 0 auto;
  text-align: center;
}

.process-container h2 {
  color: var(--separator-color);
  margin-bottom: 3rem;
}

.process-steps {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.process-step {
  background: white;
  padding: 2rem;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-light);
  position: relative;
}

.step-number {
  position: absolute;
  top: -15px;
  left: 50%;
  transform: translateX(-50%);
  background: var(--separator-color);
  color: white;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
}

.step-content h3 {
  color: var(--separator-color);
  margin-bottom: 1rem;
  margin-top: 0.5rem;
}

.step-content p {
  color: var(--text-color);
  margin: 0;
  line-height: 1.5;
}

.general-application {
  padding: 4rem 2rem;
  background: white;
}

.application-container {
  max-width: 1000px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: center;
}

.application-content h2 {
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.application-content p {
  color: var(--text-color);
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 2rem;
}

.application-benefits h3 {
  color: var(--separator-color);
  margin-bottom: 1.5rem;
}

.benefit-items {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.benefit-item {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
}

.benefit-item i {
  color: var(--separator-color);
  font-size: 1.5rem;
  margin-top: 0.25rem;
}

.benefit-item h4 {
  color: var(--separator-color);
  margin: 0 0 0.25rem 0;
  font-size: 1.1rem;
}

.benefit-item p {
  color: var(--text-color);
  margin: 0;
  line-height: 1.4;
}

.application-form {
  max-width: 500px;
}

.checkbox-label {
  display: flex;
  align-items: flex-start;
  gap: 0.5rem;
  cursor: pointer;
  line-height: 1.4;
}

.checkbox-label input[type="checkbox"] {
  width: auto;
  margin: 0;
}

.field-help {
  display: block;
  margin-top: 0.25rem;
  color: #666;
  font-size: 0.85rem;
}

@media (max-width: 1024px) {
  .vacancy-grid {
    grid-template-columns: 1fr;
    padding: 1rem;
  }
  
  .application-container {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
}

@media (max-width: 768px) {
  .intro-highlights {
    flex-direction: column;
    align-items: center;
  }
  
  .vacancy-card {
    padding: 1.5rem;
  }
  
  .vacancy-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }
  
  .vacancy-footer {
    flex-direction: column;
    align-items: stretch;
  }
  
  .apply-btn {
    width: 100%;
    justify-content: center;
  }
  
  .process-steps {
    grid-template-columns: 1fr;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const applicationModal = document.getElementById('application-modal');
  const applicationForm = document.getElementById('application-form');
  const applicationStatus = document.getElementById('application-status');
  const applyButtons = document.querySelectorAll('.apply-btn');
  const generalApplyBtn = document.querySelector('.js-open-application-modal');
  
  // Open application modal
  function openApplicationModal(position = '', email = '') {
    if (applicationModal) {
      const positionSelect = document.getElementById('position-interest');
      if (position && positionSelect) {
        positionSelect.value = position;
      }
      
      applicationModal.style.display = 'block';
      document.body.style.overflow = 'hidden';
      
      // Focus first input
      const firstInput = applicationModal.querySelector('input[type="text"]');
      if (firstInput) {
        firstInput.focus();
      }
    }
  }
  
  // Bind apply buttons
  applyButtons.forEach(button => {
    button.addEventListener('click', function() {
      const position = this.getAttribute('data-position');
      const email = this.getAttribute('data-email');
      openApplicationModal(position, email);
    });
  });
  
  if (generalApplyBtn) {
    generalApplyBtn.addEventListener('click', () => openApplicationModal());
  }
  
  // Form validation and submission
  if (applicationForm) {
    applicationForm.addEventListener('submit', async function(e) {
      e.preventDefault();
      
      // Reset status
      applicationStatus.textContent = '';
      applicationStatus.className = '';
      
      // Validate form
      if (!validateApplicationForm()) {
        return false;
      }
      
      // Show loading
      setFormLoading(true);
      
      try {
        const formData = new FormData(applicationForm);
        formData.append('action', 'job_application');
        formData.append('nonce', '<?php echo wp_create_nonce("samariesi_nonce"); ?>');
        
        // Simulate API call (replace with actual endpoint)
        await new Promise(resolve => setTimeout(resolve, 2000));
        
        showApplicationStatus('Jūsu pieteikums veiksmīgi nosūtīts! Mēs sazināsimies ar jums tuvākajā laikā.', 'success');
        applicationForm.reset();
        
        setTimeout(() => {
          applicationModal.style.display = 'none';
          document.body.style.overflow = '';
        }, 3000);
        
      } catch (error) {
        showApplicationStatus('Kļūda nosūtot pieteikumu. Lūdzu mēģiniet vēlreiz vai sazinieties ar mums tieši.', 'error');
      } finally {
        setFormLoading(false);
      }
    });
  }
  
  function validateApplicationForm() {
    const name = document.getElementById('applicant-name');
    const email = document.getElementById('applicant-email');
    const cvFile = document.getElementById('cv-upload');
    const privacy = document.querySelector('input[name="privacy"]');
    let isValid = true;
    
    // Clear previous errors
    clearFormErrors();
    
    // Validate name
    if (!name.value.trim()) {
      showFieldError('applicant-name', 'Vārds un uzvārds ir obligāts');
      isValid = false;
    }
    
    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim()) {
      showFieldError('applicant-email', 'E-pasts ir obligāts');
      isValid = false;
    } else if (!emailRegex.test(email.value)) {
      showFieldError('applicant-email', 'Lūdzu ievadiet derīgu e-pasta adresi');
      isValid = false;
    }
    
    // Validate CV file
    if (!cvFile.files.length) {
      showFieldError('cv-upload', 'CV fails ir obligāts');
      isValid = false;
    } else {
      const file = cvFile.files[0];
      const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
      const maxSize = 5 * 1024 * 1024; // 5MB
      
      if (!allowedTypes.includes(file.type)) {
        showFieldError('cv-upload', 'Atbalstītie failu formāti: PDF, DOC, DOCX');
        isValid = false;
      } else if (file.size > maxSize) {
        showFieldError('cv-upload', 'Faila izmērs nedrīkst pārsniegt 5MB');
        isValid = false;
      }
    }
    
    // Validate privacy checkbox
    if (!privacy.checked) {
      showFieldError('privacy', 'Jāpiekrīt personas datu apstrādei');
      isValid = false;
    }
    
    return isValid;
  }
  
  function showFieldError(fieldName, message) {
    const field = document.getElementById(fieldName) || document.querySelector(`[name="${fieldName}"]`);
    const errorSpan = field.parentNode.querySelector('.error-message');
    
    field.classList.add('input-error');
    field.setAttribute('aria-invalid', 'true');
    if (errorSpan) {
      errorSpan.textContent = message;
    }
  }
  
  function clearFormErrors() {
    const fields = applicationForm.querySelectorAll('input, textarea, select');
    const errors = applicationForm.querySelectorAll('.error-message');
    
    fields.forEach(field => {
      field.classList.remove('input-error');
      field.removeAttribute('aria-invalid');
    });
    
    errors.forEach(error => {
      error.textContent = '';
    });
  }
  
  function setFormLoading(loading) {
    const submitButton = applicationForm.querySelector('button[type="submit"]');
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
  
  function showApplicationStatus(message, type) {
    applicationStatus.textContent = message;
    applicationStatus.className = `form-status ${type}`;
  }
});
</script>

<?php get_footer(); ?>
