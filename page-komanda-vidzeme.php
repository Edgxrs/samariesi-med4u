<?php
/**
 * Template Name: Komanda Vidzeme
 * Description: Shows the Vidzeme team members with enhanced accessibility and styling.
 */

require_once 'wp-config.php';
get_header();
?>

<!-- Intro sections moved outside main for full-screen team design -->
<section class="team-intro-header">
  <div class="intro-content">
    <h1>Mūsu mērķis</h1>
    <p>Paliatīvās aprūpes komandas mērķis ir sniegt profesionālu, savlaicīgu un cieņpilnu veselības, sociālo, psiholoģisko un garīgo aprūpi pacientiem ar smagām, hroniskām vai neizārstējamām slimībām, kā arī nodrošināt atbalstu un apmācību viņu tuviniekiem.</p>
    
    <h2>Mūsu komanda - Vidzeme</h2>
    <p>Mēs esam starpdisciplināra komanda, kurā strādā pieredzējuši speciālisti - ārsti, ārstu palīgi, māsas, sociālie darbinieki, aprūpētāji, kapelāni un psihologi.</p>
    <p>Ikvienam no mums šis nav tikai darbs, bet gan aicinājums un pagodinājums būt līdzās pacientiem un viņu tuviniekiem.</p>
    
    <!-- Contact information for Vidzeme -->
    <div class="region-contact-info">
      <div class="contact-highlight">
        <i class="fas fa-phone" aria-hidden="true"></i>
        <span>Diennakts tālrunis Vidzemē: <a href="tel:+37125762922">25762922</a></span>
      </div>
    </div>
  </div>
</section>

<main class="team-page" role="main">
  <!-- Team organization full-screen -->
  <section class="team-organization" role="region" aria-label="Vidzemes komandas organizācija">
    <?php
      // Team members organized by subteams
      $subteams = [
        'Mediķu komanda' => [
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
        'Sociālās aprūpes komanda' => [
          [ 
            'img' => 'riga-member3.jpg', 
            'name' => 'Marta Kalniņa',     
            'role' => 'Sociālā darbiniece',
            'description' => 'Atbalsta ģimenes sarežģītās situācijās'
          ],
          [ 
            'img' => 'riga-member4.jpg', 
            'name' => 'Dr. Pēteris Jansons',    
            'role' => 'Psihologs',
            'description' => 'Psiholoģiskais atbalsts pacientiem un ģimenēm'
          ],
        ],
        'Garīgā un psihoemocionālā atbalsta komanda' => [
          [ 
            'img' => 'riga-member5.jpg', 
            'name' => 'Liga Liepiņa',      
            'role' => 'Garīdznieks',
            'description' => 'Garīgais padomnieks un atbalsts ticības jautājumos'
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

<!-- Additional services info moved outside main -->
<section class="team-services">
    <h2>Mūsu pakalpojumi Vidzemē</h2>
    <div class="services-grid">
      <div class="service-item">
        <i class="fas fa-home" aria-hidden="true"></i>
        <h3>Aprūpe mājās</h3>
        <p>Nodrošinām kvalitatīvu aprūpi pacienta dzīvesvietā visā Vidzemes reģionā</p>
      </div>
      <div class="service-item">
        <i class="fas fa-phone" aria-hidden="true"></i>
        <h3>24/7 konsultācijas</h3>
        <p>Diennakts konsultāciju tālrunis paliatīvās aprūpes jautājumos</p>
      </div>
      <div class="service-item">
        <i class="fas fa-users" aria-hidden="true"></i>
        <h3>Ģimeņu atbalsts</h3>
        <p>Atbalsts un apmācība pacientu tuviniekiem un aprūpētājiem</p>
      </div>
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

.team-services {
  max-width: 1000px;
  margin: 4rem auto 0 auto;
  text-align: center;
  padding: 2rem;
}

.team-services h2 {
  margin-bottom: 3rem;
  color: var(--separator-color);
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.service-item {
  background: white;
  padding: 2rem;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-light);
  transition: transform var(--transition-medium);
}

.service-item:hover {
  transform: translateY(-3px);
}

.service-item i {
  font-size: 2.5rem;
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.service-item h3 {
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.service-item p {
  color: var(--text-color);
  line-height: 1.6;
  margin: 0;
}

@media (max-width: 768px) {
  .contact-highlight {
    flex-direction: column;
    gap: 0.5rem;
    padding: 1rem;
    font-size: 1rem;
  }
  
  .services-grid {
    grid-template-columns: 1fr;
    gap: 1rem;
  }
  
  .service-item {
    padding: 1.5rem;
  }
}
</style>

<?php get_footer(); ?>
