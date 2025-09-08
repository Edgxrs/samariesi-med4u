<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
  
  <!-- Preconnect to external domains for better performance -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://use.typekit.net">
  <link rel="preconnect" href="https://cdnjs.cloudflare.com">

  <!-- Google Fonts with optimized loading -->
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">
  <link 
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" 
    rel="stylesheet">

  <!-- Adobe Fonts -->
  <link rel="stylesheet" href="https://use.typekit.net/ttb1sbp.css">

  <!-- Font Awesome for icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer">

  <!-- Theme color for mobile browsers -->
  <meta name="theme-color" content="#ab3a50">
  <meta name="msapplication-TileColor" content="#ab3a50">
  
  <!-- Open Graph tags for social sharing -->
  <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
  <meta property="og:description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  
  <!-- Security headers -->
  <meta http-equiv="X-Content-Type-Options" content="nosniff">
  <meta http-equiv="X-Frame-Options" content="SAMEORIGIN">
  <meta http-equiv="X-XSS-Protection" content="1; mode=block">

  <?php wp_head(); ?>
  
  <!-- Inline script to ensure toggleSubteam is available immediately -->
  <script type="text/javascript">
    // Define toggleSubteam function globally - must be available before DOM loads
    function toggleSubteam(button) {
      console.log('toggleSubteam called with button:', button);
      
      if (!button) {
        console.error('No button provided to toggleSubteam');
        return;
      }
      
      const content = button.nextElementSibling;
      const container = button.parentElement;
      
      if (!content) {
        console.error('No content found next to button');
        return;
      }
      
      if (!container) {
        console.error('No container found for button');
        return;
      }
      
      const allContainers = document.querySelectorAll('.subteam-container');
      const isExpanded = button.getAttribute('aria-expanded') === 'true';
      
      console.log('Current state - isExpanded:', isExpanded, 'content classes:', content.classList.toString());
      
      // Close all other expanded sections first
      allContainers.forEach(otherContainer => {
        if (otherContainer !== container) {
          const otherButton = otherContainer.querySelector('.subteam-header');
          const otherContent = otherContainer.querySelector('.subteam-content');
          if (otherButton && otherContent) {
            otherButton.setAttribute('aria-expanded', 'false');
            otherContent.classList.remove('expanded');
          }
        }
      });
      
      // Toggle the current section
      button.setAttribute('aria-expanded', !isExpanded);
      
      if (isExpanded) {
        // Collapse
        content.classList.remove('expanded');
        console.log('Collapsed - content classes:', content.classList.toString());
      } else {
        // Expand
        content.classList.add('expanded');
        console.log('Expanded - content classes:', content.classList.toString());
        
        // Smooth scroll to show the expanded content
        setTimeout(() => {
          if (content.scrollIntoView) {
            content.scrollIntoView({
              behavior: 'smooth',
              block: 'nearest'
            });
          }
        }, 100);
      }
    }
    
    // Make function available globally  
    window.toggleSubteam = toggleSubteam;
    console.log('toggleSubteam function defined globally:', typeof window.toggleSubteam);
  </script>
  
  <!-- Direct script inclusion to avoid MIME type issues -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script.js?v=<?php echo time(); ?>"></script>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <!-- Skip to main content link for accessibility -->
  <a class="sr-only" href="#main-content">Skip to main content</a>

  <nav role="navigation" aria-label="Main navigation">
    <div class="logo-and-toggle">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home">
        <img
          class="main-logo"
          src="<?php echo get_theme_file_uri( '/imgs/pilnais-logo-3.png' ); ?>"
          alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> logo"
          width="420"
          height="115">
      </a>
    </div>

    <?php
      wp_nav_menu( [
        'theme_location'  => 'primary',
        'container'       => 'div',
        'container_class' => 'nav-links',
        'fallback_cb'     => 'samariesi_fallback_menu',
        'items_wrap'      => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
        'walker'          => new Samariesi_Nav_Walker(),
      ] );
    ?>
  </nav>

  <div id="main-content">

<?php
// Custom navigation walker for better accessibility
class Samariesi_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>' . "\n";
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        $attributes .= ' role="menuitem"';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// Fallback menu if no menu is set
function samariesi_fallback_menu() {
    echo '<div class="nav-links">';
    echo '<ul role="menubar">';
    
    $pages = array(
        array('title' => 'Home', 'url' => home_url('/')),
        array('title' => 'Pakalpojums', 'url' => home_url('/pakalpojums')),
        array('title' => 'Komanda', 'url' => home_url('/komanda')),
        array('title' => 'Atsauksmes', 'url' => home_url('/atsauksmes')),
        array('title' => 'Ziedojumi', 'url' => home_url('/ziedojumi')),
        array('title' => 'Vakances', 'url' => home_url('/vakances')),
        array('title' => 'Brīvprātīgo darbs', 'url' => home_url('/brivpratigo-darbs'))
    );
    
    foreach ($pages as $page) {
        $current_class = (is_page() && get_permalink() === $page['url']) ? ' class="current_page_item"' : '';
        echo '<li' . $current_class . '>';
        echo '<a href="' . esc_url($page['url']) . '" role="menuitem">' . esc_html($page['title']) . '</a>';
        echo '</li>';
    }
    
    echo '</ul>';
    echo '</div>';
}
?>
