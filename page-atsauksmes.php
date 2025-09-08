<?php
/**
 * Template Name: Atsauksmes
 * Description: Review submission & approved-reviews carousel with enhanced functionality.
 */

get_header();

// Force comments open on this page
global $post;
$post->comment_status = 'open';
?>

<main class="reviews-page" role="main">
  <!-- Page intro -->
  <section class="reviews-intro">
    <h1><?php the_title(); ?></h1>
    <p>Jūsu pieredze ir svarīga mums. Dalieties ar savu stāstu, lai palīdzētu citiem ģimenēm un uzlabotu mūsu pakalpojumu kvalitāti.</p>
  </section>

  <!-- Review submission form -->
  <section class="reviews-submission" role="form">
    <div class="submission-header">
      <h2>Atstāj savu atsauksmi</h2>
      <p>Visas atsauksmes tiek pārskatītas pirms publicēšanas, lai nodrošinātu piemērotību un konfidencialitāti.</p>
    </div>
    
    <?php
      // Enhanced comment form
      $comment_args = array(
        'title_reply'          => '',
        'label_submit'         => 'Sūtīt atsauksmi',
        'comment_field'        => '<div class="form-group">
          <label for="comment">Jūsu atsauksme <span class="required">*</span></label>
          <textarea name="comment" id="comment" rows="6" required placeholder="Pastāstiet par savu pieredzi ar mūsu komandu un pakalpojumiem..." maxlength="1000"></textarea>
          <small class="field-help">Maksimums: 1000 rakstzīmes</small>
        </div>',
        'comment_notes_before' => '<div class="form-notice">
          <i class="fas fa-info-circle" aria-hidden="true"></i>
          <span>Jūsu atsauksme tiks pārskatīta un publicēta pēc apstiprinājuma.</span>
        </div>',
        'comment_notes_after'  => '',
        'fields' => array(
          'author' => '<div class="form-group">
            <label for="author">Vārds <span class="required">*</span></label>
            <input type="text" name="author" id="author" required placeholder="Jūsu vārds vai iniciāļi">
          </div>',
          'email' => '<div class="form-group">
            <label for="email">E-pasts <span class="required">*</span></label>
            <input type="email" name="email" id="email" required placeholder="jūsu@epasts.lv">
            <small class="field-help">E-pasts netiks publicēts</small>
          </div>',
          'url' => '', // Remove URL field
        ),
        'class_submit' => 'btn-primary',
        'submit_button' => '<button type="submit" class="btn-primary">
          <i class="fas fa-paper-plane" aria-hidden="true"></i>
          %4$s
        </button>',
      );
      
      comment_form($comment_args);
    ?>
  </section>

  <!-- Approved reviews carousel -->
  <section class="reviews-carousel" role="region" aria-label="Klientu atsauksmes">
    <div class="carousel-header">
      <h2>Ko saka mūsu klienti</h2>
      <p>Izlasiet atsauksmes no ģimenēm, kurām esam palīdzējuši.</p>
    </div>
    
    <?php
      $comments = get_comments([
        'post_id' => get_the_ID(),
        'status'  => 'approve',
        'order'   => 'DESC',
        'number'  => 20, // Limit to latest 20 reviews
      ]);
      
      if ( $comments && count($comments) > 0 ) : ?>
        <div class="review-carousel-container">
          <div class="review-slides" role="list">
            <?php foreach ( $comments as $index => $comment ) : ?>
              <div class="review-slide" role="listitem" <?php echo $index === 0 ? 'data-active="true"' : ''; ?>>
                <div class="review-content">
                  <div class="review-quote">
                    <i class="fas fa-quote-left quote-icon" aria-hidden="true"></i>
                    <blockquote>
                      <?php echo esc_html( $comment->comment_content ); ?>
                    </blockquote>
                  </div>
                  <div class="review-meta">
                    <cite class="review-author">— <?php echo esc_html( $comment->comment_author ); ?></cite>
                    <time class="review-date" datetime="<?php echo esc_attr( $comment->comment_date ); ?>">
                      <?php echo date_i18n( get_option( 'date_format' ), strtotime( $comment->comment_date ) ); ?>
                    </time>
                  </div>
                </div>
                <div class="review-rating" role="img" aria-label="5 zvaigžņu novērtējums">
                  <?php for($i = 0; $i < 5; $i++): ?>
                    <i class="fas fa-star" aria-hidden="true"></i>
                  <?php endfor; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          
          <div class="carousel-controls">
            <button class="review-prev" aria-label="Iepriekšējā atsauksme">
              <i class="fas fa-chevron-left" aria-hidden="true"></i>
            </button>
            <div class="carousel-indicators" role="tablist">
              <?php foreach($comments as $index => $comment): ?>
                <button 
                  class="indicator <?php echo $index === 0 ? 'active' : ''; ?>" 
                  data-slide="<?php echo $index; ?>"
                  role="tab"
                  aria-label="Atsauksme <?php echo $index + 1; ?>"
                  <?php echo $index === 0 ? 'aria-selected="true"' : 'aria-selected="false"'; ?>
                ></button>
              <?php endforeach; ?>
            </div>
            <button class="review-next" aria-label="Nākamā atsauksme">
              <i class="fas fa-chevron-right" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      <?php else : ?>
        <div class="no-reviews">
          <div class="no-reviews-content">
            <i class="fas fa-comments" aria-hidden="true"></i>
            <h3>Pagaidām nav atsauksmju</h3>
            <p>Esat pirmais, kas dalās ar savu pieredzi!</p>
          </div>
        </div>
      <?php endif; ?>
  </section>

  <!-- Statistics section -->
  <section class="reviews-stats">
    <div class="stats-container">
      <div class="stat-item">
        <span class="stat-number" data-count="300">0</span>
        <span class="stat-label">Palīdzētās ģimenes</span>
      </div>
      <div class="stat-item">
        <span class="stat-number" data-count="<?php echo count($comments); ?>">0</span>
        <span class="stat-label">Saņemtās atsauksmes</span>
      </div>
      <div class="stat-item">
        <span class="stat-number" data-count="24">0</span>
        <span class="stat-label">Stundu atbalsts</span>
      </div>
    </div>
  </section>
</main>

<style>
.reviews-intro {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 3rem auto;
  padding: 2rem;
}

.reviews-intro p {
  font-size: 1.1rem;
  color: var(--text-color);
  line-height: 1.6;
  margin-top: 1rem;
}

.reviews-submission {
  max-width: 600px;
  margin: 0 auto 4rem auto;
  background: white;
  padding: 2rem;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-light);
}

.submission-header {
  text-align: center;
  margin-bottom: 2rem;
}

.submission-header h2 {
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.submission-header p {
  color: var(--text-color);
  font-size: 0.95rem;
}

.form-notice {
  background: #e8f4fd;
  padding: 1rem;
  border-radius: 8px;
  margin-bottom: 1.5rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #0c5aa6;
  font-size: 0.9rem;
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  color: var(--separator-color);
  font-weight: 600;
}

.required {
  color: #dc3545;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 0.75rem;
  border: 2px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
  transition: border-color var(--transition-fast);
  font-family: var(--font-2);
}

.form-group input:focus,
.form-group textarea:focus {
  outline: none;
  border-color: var(--separator-color);
}

.field-help {
  display: block;
  margin-top: 0.25rem;
  color: #666;
  font-size: 0.85rem;
}

.reviews-carousel {
  max-width: 1000px;
  margin: 0 auto 4rem auto;
  padding: 2rem;
}

.carousel-header {
  text-align: center;
  margin-bottom: 3rem;
}

.carousel-header h2 {
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.review-carousel-container {
  background: white;
  border-radius: var(--border-radius);
  padding: 2rem;
  box-shadow: var(--shadow-light);
  position: relative;
  overflow: hidden;
}

.review-slides {
  display: flex;
  transition: transform 0.5s ease;
  min-height: 200px;
}

.review-slide {
  min-width: 100%;
  padding: 1rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.review-content {
  flex-grow: 1;
}

.review-quote {
  position: relative;
  margin-bottom: 1.5rem;
}

.quote-icon {
  position: absolute;
  top: -10px;
  left: -10px;
  font-size: 2rem;
  color: var(--separator-color);
  opacity: 0.3;
}

.review-slide blockquote {
  font-size: 1.2rem;
  font-style: italic;
  color: var(--text-color);
  margin: 0;
  padding-left: 2rem;
  line-height: 1.6;
}

.review-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 1rem;
  padding-top: 1rem;
  border-top: 1px solid #eee;
}

.review-author {
  color: var(--separator-color);
  font-weight: bold;
  font-style: normal;
}

.review-date {
  color: #666;
  font-size: 0.9rem;
}

.review-rating {
  text-align: center;
  margin-top: 1rem;
}

.review-rating i {
  color: #ffc107;
  margin: 0 2px;
}

.carousel-controls {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 2rem;
  padding-top: 1rem;
  border-top: 1px solid #eee;
}

.review-prev,
.review-next {
  background: var(--separator-color);
  color: white;
  border: none;
  padding: 0.75rem;
  border-radius: 50%;
  cursor: pointer;
  transition: background-color var(--transition-medium);
  width: 45px;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.review-prev:hover,
.review-next:hover {
  background: var(--nav-text-color);
}

.carousel-indicators {
  display: flex;
  gap: 0.5rem;
}

.indicator {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: none;
  background: #ddd;
  cursor: pointer;
  transition: background-color var(--transition-fast);
}

.indicator.active {
  background: var(--separator-color);
}

.no-reviews {
  background: white;
  border-radius: var(--border-radius);
  padding: 4rem 2rem;
  text-align: center;
  box-shadow: var(--shadow-light);
}

.no-reviews-content i {
  font-size: 4rem;
  color: var(--separator-color);
  margin-bottom: 1rem;
  opacity: 0.5;
}

.no-reviews-content h3 {
  color: var(--separator-color);
  margin-bottom: 1rem;
}

.reviews-stats {
  background: var(--separator-color);
  color: white;
  padding: 3rem 2rem;
  margin-top: 2rem;
}

.stats-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 2rem;
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

.stat-item {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.stat-number {
  font-size: 3rem;
  font-weight: bold;
  font-family: var(--font-1);
  margin-bottom: 0.5rem;
}

.stat-label {
  font-size: 1.1rem;
  opacity: 0.9;
}

@media (max-width: 768px) {
  .reviews-submission {
    margin: 0 1rem 2rem 1rem;
    padding: 1.5rem;
  }
  
  .review-carousel-container {
    padding: 1rem;
  }
  
  .review-slide blockquote {
    font-size: 1.1rem;
    padding-left: 1.5rem;
  }
  
  .review-meta {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.5rem;
  }
  
  .carousel-controls {
    flex-direction: column;
    gap: 1rem;
  }
  
  .stats-container {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .stat-number {
    font-size: 2.5rem;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Enhanced carousel functionality
  const slidesContainer = document.querySelector('.review-slides');
  const slides = document.querySelectorAll('.review-slide');
  const prevBtn = document.querySelector('.review-prev');
  const nextBtn = document.querySelector('.review-next');
  const indicators = document.querySelectorAll('.indicator');
  
  if (slidesContainer && slides.length > 0) {
    let current = 0;
    let autoplayTimer;
    
    const showSlide = (index) => {
      slidesContainer.style.transform = `translateX(-${100 * index}%)`;
      
      // Update indicators
      indicators.forEach((indicator, i) => {
        indicator.classList.toggle('active', i === index);
        indicator.setAttribute('aria-selected', i === index ? 'true' : 'false');
      });
      
      current = index;
    };
    
    const nextSlide = () => {
      const next = (current + 1) % slides.length;
      showSlide(next);
    };
    
    const prevSlide = () => {
      const prev = (current - 1 + slides.length) % slides.length;
      showSlide(prev);
    };
    
    // Event listeners
    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        nextSlide();
        resetAutoplay();
      });
    }
    
    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        prevSlide();
        resetAutoplay();
      });
    }
    
    // Indicator clicks
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        showSlide(index);
        resetAutoplay();
      });
    });
    
    // Auto-advance
    const startAutoplay = () => {
      autoplayTimer = setInterval(nextSlide, 8000);
    };
    
    const resetAutoplay = () => {
      clearInterval(autoplayTimer);
      startAutoplay();
    };
    
    // Pause on hover
    const carouselContainer = document.querySelector('.review-carousel-container');
    if (carouselContainer) {
      carouselContainer.addEventListener('mouseenter', () => {
        clearInterval(autoplayTimer);
      });
      
      carouselContainer.addEventListener('mouseleave', startAutoplay);
    }
    
    // Start autoplay if more than one slide
    if (slides.length > 1) {
      startAutoplay();
    }
  }
  
  // Animated counter for stats
  const animateCounters = () => {
    const counters = document.querySelectorAll('.stat-number[data-count]');
    
    counters.forEach(counter => {
      const target = parseInt(counter.getAttribute('data-count'));
      const duration = 2000;
      const increment = target / (duration / 16);
      let current = 0;
      
      const updateCounter = () => {
        if (current < target) {
          current += increment;
          counter.textContent = Math.floor(current);
          requestAnimationFrame(updateCounter);
        } else {
          counter.textContent = target;
        }
      };
      
      updateCounter();
    });
  };
  
  // Trigger counter animation when stats section comes into view
  const statsSection = document.querySelector('.reviews-stats');
  if (statsSection && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounters();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    
    observer.observe(statsSection);
  }
});
</script>

<?php get_footer(); ?>
