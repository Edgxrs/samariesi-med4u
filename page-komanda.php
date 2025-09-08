<?php
/**
 * Template Name: Komanda Landing
 * Description: Let users choose Rīga or Vidzeme.
 */

get_header();
?>

<main class="komanda-landing">
  <div class="region-split">
  <a
    href="<?php echo esc_url( home_url('/komanda-riga') ); ?>"
    class="region-option"
    style="background-image: url('<?php echo get_theme_file_uri('/imgs/riga-hero.jpg'); ?>');"
  >
    <span>Rīga</span>
  </a>
  <a
    href="<?php echo esc_url( home_url('/komanda-vidzeme') ); ?>"
    class="region-option"
    style="background-image: url('<?php echo get_theme_file_uri('/imgs/vidzeme-hero.jpg'); ?>');"
  >
    <span>Vidzeme</span>
  </a>
  <a
    href="<?php echo esc_url( home_url('/komanda-zemgale') ); ?>"
    class="region-option"
    style="background-image: url('<?php echo get_theme_file_uri('/imgs/zemgale-hero-2.jpg'); ?>');"
  >
    <span>Zemgale</span>
  </a>
</div>

</main>

<?php get_footer(); ?>
