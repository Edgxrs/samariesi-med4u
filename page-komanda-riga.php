<?php
/**
 * Template Name: Komanda Rīga
 * Description: Shows the Riga team members with enhanced accessibility and styling.
 */

require_once 'wp-config.php';
get_header();
?>

<!-- Intro sections moved outside main for full-screen team design -->
<section class="team-intro-header">
  <div class="intro-content">
    <h1>Mūsu mērķis</h1>
    <p>Paliatīvās aprūpes komandas mērķis ir sniegt profesionālu, savlaicīgu un cieņpilnu veselības, sociālo, psiholoģisko un garīgo aprūpi pacientiem ar smagām, hroniskām vai neizārstējamām slimībām, kā arī nodrošināt atbalstu un apmācību viņu tuviniekiem.</p>
    
    <h2>Mūsu komanda - Rīga</h2>
    <p>Mēs esam starpdisciplināra komanda, kurā strādā pieredzējuši speciālisti - ārsti, ārstu palīgi, māsas, sociālie darbinieki, aprūpētāji, kapelāni un psihologi.</p>
    <p>Ikvienam no mums šis nav tikai darbs, bet gan aicinājums un pagodinājums būt līdzās pacientiem un viņu tuviniekiem.</p>
    
    <!-- Contact information for Riga -->
    <div class="region-contact-info">
      <div class="contact-highlight">
        <i class="fas fa-phone" aria-hidden="true"></i>
        <span>Diennakts tālrunis Rīgā: <a href="tel:+37128017600">28017600</a></span>
      </div>
    </div>
  </div>
</section>

<main class="team-page" role="main">
  <!-- Team organization full-screen -->
  <section class="team-organization" role="region" aria-label="Rīgas komandas organizācija">
    <?php
      // Team members organized by subteams
      $subteams = [
        'Medicīniskais atbalsts' => [
          [ 
            'img' => 'riga-member1.jpg', 
            'name' => 'Dr. Anna Bērziņa',    
            'role' => 'Paliatīvās aprūpes ārste',
            'description' => 'Vadošā ārste ar 20 gadu pieredzi onkoloģijā'
          ],
          [ 
            'img' => 'riga-member2.jpg', 
            'name' => 'Jānis Ozoliņš',     
            'role' => 'Mobilās aprūpes māsa',
            'description' => 'Specializējas sāpju vadīšanā un simptomu kontrolē'
          ],
        ],
        'Sociālā aprūpe' => [
          [ 
            'img' => '/komanda/riga/aprupetaji/i-gerharde.jpg', 
            'name' => 'Inta Gerharde',     
            'role' => 'Vadītāja',
            'description' => 'kaut ko dara :D'
          ],[ 
            'img' => '/komanda/riga/aprupetaji/e-zalite.jpg', 
            'name' => 'Evita Zālīte',     
            'role' => 'Brīvprātīgo darba koordinatore',
            'description' => 'Organizē un atbalsta mūsu brīvprātīgo komandu'
          ],[ 
            'img' => '/komanda/riga/aprupetaji/d-zusmane.jpg', 
            'name' => 'Dace Zušmane',     
            'role' => 'Aprūpētājs',
            'description' => 'Atbalsta ģimenes sarežģītās situācijās'
          ],
          [ 
            'img' => '/komanda/riga/aprupetaji/v-lukjanovics.jpeg', 
            'name' => 'Viesturs Lukjanovičs',     
            'role' => 'Aprūpētājs',
            'description' => 'Atbalsta ģimenes sarežģītās situācijās'
          ],
          [ 
            'img' => 'riga-member4.jpg', 
            'name' => 'Dr. Pēteris Jansons',    
            'role' => 'Psihologs',
            'description' => 'Psiholoģiskais atbalsts pacientiem un ģimenēm'
          ],
        ],
        'Garīgais un psiholoģiskais atbalsts' => [
          [ 
            'img' => '/komanda/riga/aprupetaji/d-zusmane.jpg', 
            'name' => 'Dace Zušmane',      
            'role' => 'Garīgā un psiholoģiskā darba vadītāja',
            'description' => 'Organizē un koordinē garīgā un psihoemocionālā atbalsta sniegšanu'
          ],
          [ 
            'img' => 'riga-member6.jpg', 
            'name' => 'Roberts Ziediņš',    
            'role' => 'Komandas koordinators',
            'description' => 'Organizē un koordinē visas aprūpes aktivitātes'
          ],
        ],
      ];
      
      foreach( $subteams as $teamName => $members ): ?>
        <div class="subteam-container">
          <button class="subteam-header" aria-expanded="false" onclick="toggleSubteam(this)">
            <h3><?php echo esc_html($teamName); ?></h3>
          </button>
          <div class="subteam-content">
            <div class="team-cards">
              <?php foreach( $members as $index => $member ): ?>
                <article class="team-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                  <div class="team-photo">
                    <img 
                      src="<?php echo get_theme_file_uri("/imgs/{$member['img']}"); ?>"
                      alt="<?php echo esc_attr($member['name']); ?> - <?php echo esc_attr($member['role']); ?>"
                      loading="lazy"
                      onerror="this.src='<?php echo get_theme_file_uri('/imgs/default-avatar.svg'); ?>'"
                    >
                  </div>
                  <div class="team-info">
                    <h4 class="team-name"><?php echo esc_html($member['name']); ?></h4>
                    <p class="team-role"><?php echo esc_html($member['role']); ?></p>
                    <?php if (isset($member['description'])): ?>
                      <p class="team-description"><?php echo esc_html($member['description']); ?></p>
                    <?php endif; ?>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
  </section>
</main>

<!-- Coverage area info moved outside main -->
<section class="coverage-area">
    <h2>Mūsu darbības reģions</h2>
    <div class="coverage-info">
      <div class="coverage-item">
        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
        <h3>Rīga</h3>
        <p>Visi Rīgas rajoni un apkārtnes</p>
      </div>
      <div class="coverage-item">
        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
        <h3>Pierīga</h3>
        <p>Pierīgas novadi un pilsētas</p>
      </div>
      <div class="coverage-item">
        <i class="fas fa-clock" aria-hidden="true"></i>
        <h3>24/7 pakalpojums</h3>
        <p>Diennakts atbalsts un konsultācijas</p>
      </div>
    </div>
  </section>

  <!-- Quick contact section -->
  <section class="quick-contact">
    <h2>Nepieciešama palīdzība?</h2>
    <p>Mūsu komanda ir gatava palīdzēt jebkurā diennakts laikā.</p>
    <div class="contact-actions">
      <a href="tel:+37128017600" class="btn-primary contact-btn">
        <i class="fas fa-phone" aria-hidden="true"></i>
        Zvanīt tagad
      </a>
      <button type="button" class="btn-primary js-open-modal">
        <i class="fas fa-envelope" aria-hidden="true"></i>
        Sūtīt ziņojumu
      </button>
    </div>
  </section>
</main>

<style>
.region-contact-info {
  margin: 2rem 0;
  text-align: center;
}

.contact-highlight {
  background: var(--separator-color);
  color: white;
  padding: 1rem 2rem;
  border-radius: 30px;
  display: inline-flex;
  align-items: center;
  gap: 1rem;
  font-size: 1.2rem;
  box-shadow: var(--shadow-medium);
}

.contact-highlight a {
  color: white;
  text-decoration: none;
  font-weight: bold;
}

.contact-highlight a:hover {
  text-decoration: underline;
}

.team-description {
  font-size: 0.9rem;
  color: #666;
  font-style: italic;
  margin-top: 0.5rem;
}

.coverage-area, .quick-contact {
  max-width: 1000px;
  margin: 4rem auto 0 auto;
  text-align: center;
  padding: 2rem;
}

.coverage-area h2, .quick-contact h2 {
  margin-bottom: 3rem;
  color: var(--separator-color);
}

.coverage-info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.coverage-item {
  background: white;
  padding: 2rem;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-light);
  transition: transform var(--transition-medium);
}

.coverage-item:hover {
  transform: translateY(-3px);
}

.coverage-item i {
  font-size: 2.5rem;
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.coverage-item h3 {
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.coverage-item p {
  color: var(--text-color);
  line-height: 1.6;
  margin: 0;
}

.quick-contact {
  background: white;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-light);
}

.quick-contact p {
  font-size: 1.1rem;
  color: var(--text-color);
  margin-bottom: 2rem;
}

.contact-actions {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
}

.contact-btn {
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}

.contact-btn:hover {
  text-decoration: none;
}

@media (max-width: 768px) {
  .contact-highlight {
    flex-direction: column;
    gap: 0.5rem;
    padding: 1rem;
    font-size: 1rem;
  }
  
  .coverage-info {
    grid-template-columns: 1fr;
    gap: 1rem;
  }
  
  .coverage-item {
    padding: 1.5rem;
  }
  
  .contact-actions {
    flex-direction: column;
    align-items: center;
  }
  
  .contact-btn, .btn-primary {
    width: 100%;
    max-width: 300px;
  }
}
</style>

<?php get_footer(); ?>
