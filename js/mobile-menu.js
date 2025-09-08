/**
 * Enhanced Mobile Menu Functionality
 * Handles responsive navigation and mobile-specific interactions
 */

document.addEventListener("DOMContentLoaded", function () {
  const mobileMenu = {
    // Configuration
    config: {
      breakpoint: 1024,
      animationDuration: 300,
      swipeThreshold: 50,
    },

    // DOM elements
    elements: {
      burger: null,
      nav: null,
      navLinks: null,
      menuItems: null,
      body: document.body,
    },

    // State
    state: {
      isOpen: false,
      touchStartX: 0,
      touchStartY: 0,
      isAnimating: false,
    },

    // Initialize mobile menu
    init() {
      this.bindElements();
      this.bindEvents();
      this.createMobileMenu();
      this.setupAccessibility();
    },

    // Bind DOM elements
    bindElements() {
      this.elements.burger = document.querySelector(".burger-menu");
      this.elements.nav = document.querySelector("nav");
      this.elements.navLinks = document.querySelector(".nav-links");
      this.elements.menuItems = document.querySelectorAll(".nav-links a");
    },

    // Create mobile menu structure if it doesn't exist
    createMobileMenu() {
      if (!this.elements.burger) {
        this.createBurgerButton();
      }

      if (this.elements.navLinks) {
        this.elements.navLinks.setAttribute("role", "menu");
        this.elements.navLinks.setAttribute("aria-label", "Main navigation");
      }
    },

    // Create burger button
    createBurgerButton() {
      const burger = document.createElement("button");
      burger.className = "burger-menu";
      burger.setAttribute("aria-label", "Toggle navigation menu");
      burger.setAttribute("aria-expanded", "false");
      burger.innerHTML = `
                <span></span>
                <span></span>
                <span></span>
            `;

      const logoContainer = document.querySelector(".logo-and-toggle");
      if (logoContainer) {
        logoContainer.appendChild(burger);
        this.elements.burger = burger;
      }
    },

    // Setup accessibility features
    setupAccessibility() {
      // Add ARIA attributes to menu items
      this.elements.menuItems.forEach((item, index) => {
        item.setAttribute("role", "menuitem");
        item.setAttribute("tabindex", this.state.isOpen ? "0" : "-1");
      });

      // Trap focus when menu is open
      this.setupFocusTrap();
    },

    // Setup focus trapping
    setupFocusTrap() {
      const focusableElements =
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';

      document.addEventListener("keydown", (e) => {
        if (!this.state.isOpen) return;

        if (e.key === "Tab") {
          const focusableContent =
            this.elements.navLinks.querySelectorAll(focusableElements);
          const firstFocusable = focusableContent[0];
          const lastFocusable = focusableContent[focusableContent.length - 1];

          if (e.shiftKey) {
            if (document.activeElement === firstFocusable) {
              lastFocusable.focus();
              e.preventDefault();
            }
          } else {
            if (document.activeElement === lastFocusable) {
              firstFocusable.focus();
              e.preventDefault();
            }
          }
        }
      });
    },

    // Bind event listeners
    bindEvents() {
      // Burger menu click
      if (this.elements.burger) {
        this.elements.burger.addEventListener("click", (e) => {
          e.preventDefault();
          this.toggle();
        });
      }

      // Menu item clicks
      this.elements.menuItems.forEach((item) => {
        item.addEventListener("click", () => {
          if (window.innerWidth <= this.config.breakpoint) {
            this.close();
          }
        });
      });

      // Escape key
      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && this.state.isOpen) {
          this.close();
        }
      });

      // Window resize
      let resizeTimer;
      window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
          if (window.innerWidth > this.config.breakpoint && this.state.isOpen) {
            this.close();
          }
        }, 250);
      });

      // Touch events for swipe gestures
      this.setupTouchEvents();

      // Click outside to close
      document.addEventListener("click", (e) => {
        if (
          this.state.isOpen &&
          !this.elements.nav.contains(e.target) &&
          !this.elements.burger.contains(e.target)
        ) {
          this.close();
        }
      });
    },

    // Setup touch/swipe events
    setupTouchEvents() {
      this.elements.navLinks.addEventListener(
        "touchstart",
        (e) => {
          this.state.touchStartX = e.touches[0].clientX;
          this.state.touchStartY = e.touches[0].clientY;
        },
        { passive: true }
      );

      this.elements.navLinks.addEventListener(
        "touchmove",
        (e) => {
          if (!this.state.isOpen) return;

          const touchX = e.touches[0].clientX;
          const touchY = e.touches[0].clientY;
          const deltaX = touchX - this.state.touchStartX;
          const deltaY = touchY - this.state.touchStartY;

          // Prevent vertical scrolling while swiping horizontally
          if (Math.abs(deltaX) > Math.abs(deltaY)) {
            e.preventDefault();
          }
        },
        { passive: false }
      );

      this.elements.navLinks.addEventListener(
        "touchend",
        (e) => {
          if (!this.state.isOpen) return;

          const touchX = e.changedTouches[0].clientX;
          const deltaX = touchX - this.state.touchStartX;

          // Swipe left to close (for RTL layouts, this would be swipe right)
          if (deltaX < -this.config.swipeThreshold) {
            this.close();
          }
        },
        { passive: true }
      );
    },

    // Toggle menu
    toggle() {
      if (this.state.isAnimating) return;

      if (this.state.isOpen) {
        this.close();
      } else {
        this.open();
      }
    },

    // Open menu
    open() {
      if (this.state.isAnimating || this.state.isOpen) return;

      this.state.isAnimating = true;
      this.state.isOpen = true;

      // Update classes and attributes
      this.elements.burger.classList.add("open");
      this.elements.burger.setAttribute("aria-expanded", "true");
      this.elements.navLinks.classList.add("open");
      this.elements.body.classList.add("menu-open");

      // Update tabindex for menu items
      this.elements.menuItems.forEach((item) => {
        item.setAttribute("tabindex", "0");
      });

      // Focus first menu item
      setTimeout(() => {
        const firstMenuItem = this.elements.menuItems[0];
        if (firstMenuItem) {
          firstMenuItem.focus();
        }
        this.state.isAnimating = false;
      }, this.config.animationDuration);

      // Prevent body scroll
      this.elements.body.style.overflow = "hidden";

      // Announce to screen readers
      this.announceToScreenReader("Menu opened");
    },

    // Close menu
    close() {
      if (this.state.isAnimating || !this.state.isOpen) return;

      this.state.isAnimating = true;
      this.state.isOpen = false;

      // Update classes and attributes
      this.elements.burger.classList.remove("open");
      this.elements.burger.setAttribute("aria-expanded", "false");
      this.elements.navLinks.classList.remove("open");
      this.elements.body.classList.remove("menu-open");

      // Update tabindex for menu items
      this.elements.menuItems.forEach((item) => {
        item.setAttribute("tabindex", "-1");
      });

      // Return focus to burger button
      setTimeout(() => {
        this.elements.burger.focus();
        this.state.isAnimating = false;
      }, this.config.animationDuration);

      // Restore body scroll
      this.elements.body.style.overflow = "";

      // Announce to screen readers
      this.announceToScreenReader("Menu closed");
    },

    // Announce changes to screen readers
    announceToScreenReader(message) {
      const announcement = document.createElement("div");
      announcement.setAttribute("aria-live", "polite");
      announcement.setAttribute("aria-atomic", "true");
      announcement.className = "sr-only";
      announcement.textContent = message;

      document.body.appendChild(announcement);

      setTimeout(() => {
        document.body.removeChild(announcement);
      }, 1000);
    },

    // Add smooth scrolling for anchor links
    setupSmoothScrolling() {
      this.elements.menuItems.forEach((link) => {
        if (link.getAttribute("href").startsWith("#")) {
          link.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = link.getAttribute("href");
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
              const headerOffset = this.elements.nav.offsetHeight;
              const elementPosition = targetElement.getBoundingClientRect().top;
              const offsetPosition =
                elementPosition + window.pageYOffset - headerOffset;

              window.scrollTo({
                top: offsetPosition,
                behavior: "smooth",
              });
            }

            this.close();
          });
        }
      });
    },
  };

  // Initialize mobile menu
  mobileMenu.init();
  mobileMenu.setupSmoothScrolling();

  // Expose to global scope for debugging
  window.mobileMenu = mobileMenu;
});

// Add CSS for additional mobile menu enhancements
const mobileMenuStyles = `
    .menu-open {
        overflow: hidden !important;
    }
    
    .nav-links.open {
        animation: slideIn 0.3s ease-out;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .burger-menu:focus {
        outline: 2px solid var(--separator-color);
        outline-offset: 2px;
    }
    
    @media (max-width: 1024px) {
        .nav-links {
            position: fixed;
            top: var(--nav-height);
            left: 0;
            width: 100vw;
            height: calc(100vh - var(--nav-height));
            background: var(--nav-background-color);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            overflow-y: auto;
            z-index: 999;
        }
        
        .nav-links.open {
            transform: translateX(0);
        }
        
        .nav-links ul {
            flex-direction: column;
            padding: 2rem;
            gap: 1rem;
            height: 100%;
            justify-content: flex-start;
        }
        
        .nav-links li {
            width: 100%;
            text-align: center;
        }
        
        .nav-links a {
            display: block;
            padding: 1rem;
            font-size: 1.25rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
    }
`;

// Inject mobile menu styles
const styleSheet = document.createElement("style");
styleSheet.textContent = mobileMenuStyles;
document.head.appendChild(styleSheet);
