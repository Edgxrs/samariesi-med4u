<?php
/**
 * Template Name: Homepage
 * Description: Main landing page with hero image, services overview, team showcase, and CTA.
 */

require_once 'wp-config.php';
get_header();
?>

<main>

  <!-- GALLERY SLIDER -->
  <div class="gallery" role="banner" aria-label="Hero image slider">
    <div class="slide active"
         style="background-image: url('<?php echo get_theme_file_uri('imgs/rudens.jpg'); ?>')">
      <div class="text-overlay">
        <h2>Drošs un uzticams ceļabiedrs grūtā brīdī</h2>
        <button type="button" class="sign-up js-open-modal" aria-describedby="contact-description">
          Sazinies ar mums
        </button>
        <span id="contact-description" class="sr-only">Atvērt kontaktu informāciju</span>
      </div>
    </div>
    <div class="slide"
         style="background-image: url('<?php echo get_theme_file_uri('/imgs/winter.jpg'); ?>')">
      <div class="text-overlay">
        <h2>Tu neesi <em>viens!</em></h2>
        <button type="button" class="sign-up js-open-modal" aria-describedby="contact-description">
          Sazinies ar mums
        </button>
      </div>
    </div>
    <button class="prev" onclick="moveSlide(-1)" aria-label="Previous image">&#10094;</button>
    <button class="next" onclick="moveSlide(1)" aria-label="Next image">&#10095;</button>
    
    <!-- Slide indicators for accessibility -->
    <div class="slide-indicators sr-only" aria-live="polite">
      <span>Slide 1 of 2</span>
    </div>
  </div>

  <!-- SEPARATOR -->
  <section class="separator" role="complementary">
    <h3>
      Mūsu komanda sniedz valsts apmaksātu paliatīvās aprūpes mobilās komandas
      pakalpojumu pacienta dzīvesvietā Rīgā, Pierīgā un Vidzemē
    </h3>
  </section>

  <!-- SECTION 1 -->
  <section class="full-screen" id="section1" role="main">
    <div class="half-width image">
      <img src="<?php echo get_theme_file_uri('/imgs/sunset.jpg'); ?>"
           alt="Paliatīvās aprūpes speciālists ar pacientu"
           loading="lazy">
    </div>
    <div class="half-width text">
      <h1>Kas ir <em>paliatīvā aprūpe?</em></h1>
      <p>
        Paliatīvā aprūpe ir visaptveroša pieeja nedziedināmi slimu cilvēku
        aprūpei. Tā ietver medicīnisko, psiholoģisko, sociālo un garīgo
        atbalstu, lai uzlabotu pacienta un viņa tuvinieku dzīves kvalitāti
        smagas slimības laikā.
      </p>
    </div>
  </section>

  <!-- SECTION 2 -->
  <section class="full-screen" id="section2" role="main">
    <div class="half-width image">
      <img src="<?php echo get_theme_file_uri('/imgs/trees.jpg'); ?>"
           alt="Māsa sniedz aprūpi pacientam mājās"
           loading="lazy">
    </div>
    <div class="half-width text">
      <h1>Kas var saņemt pakalpojumu?</h1>
      <ul role="list">
        <li>ir IV vai V līmeņa stacionārās ārstniecības iestādes ārstu konsīlija lēmums par paliatīvās aprūpes nepieciešamību mājās;</li>
        <li>konsīlija lēmumā ir piešķirts "paliatīvā pacienta" statuss;</li>
        <li>prognozētā dzīvildze ir līdz 6 mēnešiem, neatkarīgi no diagnozes.</li>
      </ul>
      <button type="button" class="sign-up js-open-modal">Sazinies ar mums</button>
    </div>
  </section>

  <!-- SECTION 3 -->
  <section class="full-screen" id="section3" role="main">
    <div class="half-width image">
      <img src="<?php echo get_theme_file_uri('/imgs/winter2.jpg'); ?>"
           alt="Samarieši@Med4You logo"
           loading="lazy">
    </div>
    <div class="half-width text">
      <h1>Kā saņemt konsīlija slēdzienu?</h1>
      <ul role="list">
        <li>Ambulatoriem pacientiem nosūtījumu uz konsīliju izsniedz ģimenes ārsts vai ārstējošais speciālists.</li>
        <li>Ja pacients atrodas stacionārā, konsīliju organizē attiecīgā ārstniecības iestāde.</li>
      </ul>
    </div>
  </section>

  <!-- SEPARATOR 2 -->
  <section class="separator2" role="complementary">
    <h1>Gada laikā mūsu pakalpojums ir sniegts vairāk kā 300 pacientiem.</h1>
    <button type="button" class="sign-up js-open-modal">Sazinies ar mums</button>
  </section>

</main>

<script>
// Enhanced gallery functionality with accessibility
let slideIndex = 0;
let slides = document.getElementsByClassName("slide");
let slideTimer;
let isUserInteracting = false;

function moveSlide(n) {
    isUserInteracting = true;
    showSlide(slideIndex + n);
    resetTimer();
    
    // Update indicators for screen readers
    updateSlideIndicators();
}

function showSlide(n) {
    if (slides.length === 0) return;
    
    // Hide current slide
    if (slides[slideIndex]) {
        slides[slideIndex].classList.remove('active');
    }
    
    // Calculate next slide
    slideIndex = (n + slides.length) % slides.length;
    
    // Show new slide
    if (slides[slideIndex]) {
        slides[slideIndex].classList.add('active');
    }
    
    updateSlideIndicators();
}

function updateSlideIndicators() {
    const indicator = document.querySelector('.slide-indicators span');
    if (indicator) {
        indicator.textContent = `Slide ${slideIndex + 1} of ${slides.length}`;
    }
}

function nextSlide() {
    if (!isUserInteracting) {
        showSlide(slideIndex + 1);
    }
}

function resetTimer() {
    clearInterval(slideTimer);
    setTimeout(() => {
        isUserInteracting = false;
        slideTimer = setInterval(nextSlide, 6000);
    }, 1000);
}

// Initialize slider
if (slides.length > 0) {
    slideTimer = setInterval(nextSlide, 6000);
    updateSlideIndicators();
    
    // Pause on focus/hover for accessibility
    const gallery = document.querySelector('.gallery');
    gallery.addEventListener('mouseenter', () => isUserInteracting = true);
    gallery.addEventListener('mouseleave', () => {
        isUserInteracting = false;
        resetTimer();
    });
    
    gallery.addEventListener('focusin', () => isUserInteracting = true);
    gallery.addEventListener('focusout', () => {
        isUserInteracting = false;
        resetTimer();
    });
}

// Keyboard navigation for gallery
document.addEventListener('keydown', function(e) {
    if (document.activeElement.closest('.gallery')) {
        if (e.key === 'ArrowLeft') {
            moveSlide(-1);
            e.preventDefault();
        } else if (e.key === 'ArrowRight') {
            moveSlide(1);
            e.preventDefault();
        }
    }
});
</script>

<?php get_footer(); ?>
