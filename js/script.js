// toggleSubteam function is now defined inline in header.php for immediate availability

document.addEventListener("DOMContentLoaded", function () {
  // Mobile menu toggle
  const burgerMenu = document.querySelector(".burger-menu");
  const navLinks = document.querySelector(".nav-links");

  if (burgerMenu && navLinks) {
    burgerMenu.addEventListener("click", function () {
      burgerMenu.classList.toggle("open");
      navLinks.classList.toggle("open");
    });

    // Close mobile menu when clicking a link
    navLinks.addEventListener("click", function (e) {
      if (e.target.tagName === "A") {
        burgerMenu.classList.remove("open");
        navLinks.classList.remove("open");
      }
    });
  }

  // Smooth scroll for in-page anchors
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Enhanced gallery slider with touch support
  let slideIndex = 0;
  const slides = document.getElementsByClassName("slide");
  let timer;
  let isTransitioning = false;

  const showSlide = (n) => {
    if (isTransitioning || slides.length === 0) return;

    isTransitioning = true;
    clearTimeout(timer);

    const next = (n + slides.length) % slides.length;
    const current = slides[slideIndex];
    const nextSlide = slides[next];

    if (current) current.style.opacity = 0;
    if (nextSlide) {
      nextSlide.style.display = "block";
      setTimeout(() => {
        nextSlide.style.opacity = 1;
        isTransitioning = false;
      }, 50);
    }

    slideIndex = next;
    timer = setTimeout(() => showSlide(slideIndex + 1), 6000);
  };

  // Navigation buttons
  document.querySelectorAll(".prev, .next").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      const direction = btn.classList.contains("prev") ? -1 : 1;
      showSlide(slideIndex + direction);
    });
  });

  // Touch/swipe support for gallery
  let startX = 0;
  let endX = 0;
  const gallery = document.querySelector(".gallery");

  if (gallery) {
    gallery.addEventListener("touchstart", function (e) {
      startX = e.touches[0].clientX;
    });

    gallery.addEventListener("touchend", function (e) {
      endX = e.changedTouches[0].clientX;
      const difference = startX - endX;

      if (Math.abs(difference) > 50) {
        // Minimum swipe distance
        if (difference > 0) {
          showSlide(slideIndex + 1); // Swipe left, next slide
        } else {
          showSlide(slideIndex - 1); // Swipe right, previous slide
        }
      }
    });
  }

  // Initialize gallery if slides exist
  if (slides.length > 0) {
    showSlide(slideIndex);
  }

  // Enhanced navbar hide/show on scroll
  let lastScroll = 0;
  let scrollTimeout;
  const navbar = document.querySelector("nav");

  window.addEventListener("scroll", () => {
    const currentScroll =
      window.pageYOffset || document.documentElement.scrollTop;

    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
      if (currentScroll > 100) {
        if (currentScroll > lastScroll && currentScroll > navbar.offsetHeight) {
          // Scrolling down
          navbar.style.transform = "translateY(-100%)";
        } else {
          // Scrolling up
          navbar.style.transform = "translateY(0)";
        }
      } else {
        navbar.style.transform = "translateY(0)";
      }

      lastScroll = currentScroll <= 0 ? 0 : currentScroll;
    }, 100);
  });

  // Modal functionality
  const modal = document.getElementById("contact-modal");
  const closeBtn = modal?.querySelector(".modal-close");
  const triggers = document.querySelectorAll(".js-open-modal");

  triggers.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      if (modal) {
        modal.style.display = "block";
        document.body.style.overflow = "hidden"; // Prevent background scrolling

        // Focus management for accessibility
        const firstFocusable = modal.querySelector(
          'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        if (firstFocusable) {
          firstFocusable.focus();
        }
      }
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener("click", closeModal);
  }

  // Close modal on escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal && modal.style.display === "block") {
      closeModal();
    }
  });

  // Close modal when clicking outside
  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      closeModal();
    }
  });

  function closeModal() {
    if (modal) {
      modal.style.display = "none";
      document.body.style.overflow = ""; // Restore scrolling
    }
  }

  // Reviews carousel functionality
  const reviewsContainer = document.querySelector(".review-slides");
  const reviewSlides = document.querySelectorAll(".review-slide");
  const prevBtn = document.querySelector(".review-prev");
  const nextBtn = document.querySelector(".review-next");

  if (reviewsContainer && reviewSlides.length > 0) {
    let currentReview = 0;
    let reviewTimer;

    const showReview = (index) => {
      reviewsContainer.style.transform = `translateX(-${100 * index}%)`;
      currentReview = index;
    };

    const nextReview = () => {
      const next = (currentReview + 1) % reviewSlides.length;
      showReview(next);
    };

    const prevReview = () => {
      const prev =
        (currentReview - 1 + reviewSlides.length) % reviewSlides.length;
      showReview(prev);
    };

    if (nextBtn) {
      nextBtn.addEventListener("click", () => {
        nextReview();
        clearInterval(reviewTimer);
        startReviewTimer();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", () => {
        prevReview();
        clearInterval(reviewTimer);
        startReviewTimer();
      });
    }

    const startReviewTimer = () => {
      reviewTimer = setInterval(nextReview, 6000);
    };

    // Start auto-advance
    startReviewTimer();

    // Pause on hover
    reviewsContainer.addEventListener("mouseenter", () => {
      clearInterval(reviewTimer);
    });

    reviewsContainer.addEventListener("mouseleave", () => {
      startReviewTimer();
    });
  }

  // Form validation and enhancement
  const forms = document.querySelectorAll("form");

  forms.forEach((form) => {
    const inputs = form.querySelectorAll("input, textarea");

    inputs.forEach((input) => {
      // Real-time validation
      input.addEventListener("blur", validateField);
      input.addEventListener("input", clearFieldError);
    });

    form.addEventListener("submit", function (e) {
      let isValid = true;

      inputs.forEach((input) => {
        if (!validateField.call(input)) {
          isValid = false;
        }
      });

      if (!isValid) {
        e.preventDefault();
        return false;
      }

      // Add loading state
      const submitBtn = form.querySelector(
        'button[type="submit"], input[type="submit"]'
      );
      if (submitBtn) {
        submitBtn.classList.add("loading");
        submitBtn.disabled = true;
      }
    });
  });

  function validateField() {
    const value = this.value.trim();
    const type = this.type;
    const required = this.hasAttribute("required");
    let isValid = true;
    let errorMessage = "";

    // Clear previous errors
    this.classList.remove("input-error");
    const existingError = this.parentNode.querySelector(".error-message");
    if (existingError) {
      existingError.remove();
    }

    if (required && !value) {
      isValid = false;
      errorMessage = "This field is required.";
    } else if (value) {
      switch (type) {
        case "email":
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailRegex.test(value)) {
            isValid = false;
            errorMessage = "Please enter a valid email address.";
          }
          break;
        case "tel":
          const phoneRegex = /^[\+]?[0-9\s\-\(\)]{8,}$/;
          if (!phoneRegex.test(value)) {
            isValid = false;
            errorMessage = "Please enter a valid phone number.";
          }
          break;
      }
    }

    if (!isValid) {
      this.classList.add("input-error");
      const errorSpan = document.createElement("span");
      errorSpan.className = "error-message";
      errorSpan.textContent = errorMessage;
      this.parentNode.appendChild(errorSpan);
    }

    return isValid;
  }

  function clearFieldError() {
    this.classList.remove("input-error");
    const errorMessage = this.parentNode.querySelector(".error-message");
    if (errorMessage) {
      errorMessage.remove();
    }
  }

  // Lazy loading for images
  const images = document.querySelectorAll("img[data-src]");

  if ("IntersectionObserver" in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove("lazy");
          observer.unobserve(img);
        }
      });
    });

    images.forEach((img) => imageObserver.observe(img));
  } else {
    // Fallback for older browsers
    images.forEach((img) => {
      img.src = img.dataset.src;
    });
  }

  // Smooth animations for elements coming into view
  const animatedElements = document.querySelectorAll(
    ".team-card, .service-card, .vacancy-card"
  );

  if ("IntersectionObserver" in window) {
    const animationObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
          }
        });
      },
      {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
      }
    );

    animatedElements.forEach((el) => {
      el.style.opacity = "0";
      el.style.transform = "translateY(30px)";
      el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
      animationObserver.observe(el);
    });
  }

  // Volunteer page pulse animation control
  const volunteerBtn = document.querySelector(".volunteer-apply");
  if (volunteerBtn) {
    volunteerBtn.addEventListener("mouseenter", function () {
      this.style.animationPlayState = "paused";
    });

    volunteerBtn.addEventListener("mouseleave", function () {
      this.style.animationPlayState = "running";
    });
  }

  // External link confirmation
  const externalLinks = document.querySelectorAll(
    'a[href^="http"]:not([href*="' + window.location.hostname + '"])'
  );

  externalLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const url = this.href;

      if (
        confirm(
          "You are being redirected to an external website. Do you want to continue?"
        )
      ) {
        window.open(url, "_blank", "noopener,noreferrer");
      }
    });
  });

  // Performance: Throttle resize events
  let resizeTimer;
  window.addEventListener("resize", function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      // Handle any resize-specific logic here
      if (window.innerWidth > 1024 && navLinks) {
        navLinks.classList.remove("open");
        if (burgerMenu) {
          burgerMenu.classList.remove("open");
        }
      }
    }, 250);
  });

  // Add loading states for slow-loading content
  const contentSections = document.querySelectorAll(
    ".team-cards, .service-cards, .reviews-carousel"
  );

  contentSections.forEach((section) => {
    if (section.children.length === 0) {
      section.innerHTML =
        '<div class="loading-placeholder">Loading content...</div>';
    }
  });

  // Initialize team functionality
  const subteamHeaders = document.querySelectorAll(".subteam-header");
  console.log("Found", subteamHeaders.length, "subteam headers");

  // Attach click handlers for team headers that don't have onclick
  subteamHeaders.forEach((header) => {
    if (!header.getAttribute("onclick")) {
      header.addEventListener("click", function () {
        window.toggleSubteam(this);
      });
    }
  });

  // Latvia Map Interaction
  const regions = document.querySelectorAll(".region");
  const popups = document.querySelectorAll(".map-popup");

  regions.forEach((region) => {
    const regionName = region.getAttribute("data-region");
    const popup = document.getElementById(`popup-${regionName}`);

    if (popup) {
      region.addEventListener("mouseenter", function (e) {
        // Hide all other popups
        popups.forEach((p) => p.classList.remove("visible"));

        // Show current popup
        popup.classList.add("visible");

        // Position popup near the region
        const rect = region.getBoundingClientRect();
        const mapRect = region.closest(".map-wrapper").getBoundingClientRect();

        // Calculate position relative to map container
        let left =
          rect.left - mapRect.left + rect.width / 2 - popup.offsetWidth / 2;
        let top = rect.top - mapRect.top - popup.offsetHeight - 10;

        // Ensure popup stays within map bounds
        if (left < 0) left = 10;
        if (left + popup.offsetWidth > mapRect.width) {
          left = mapRect.width - popup.offsetWidth - 10;
        }
        if (top < 0) {
          top = rect.bottom - mapRect.top + 10;
        }

        popup.style.left = left + "px";
        popup.style.top = top + "px";
      });

      region.addEventListener("mouseleave", function () {
        setTimeout(() => {
          if (!popup.matches(":hover") && !region.matches(":hover")) {
            popup.classList.remove("visible");
          }
        }, 100);
      });

      // Keep popup visible when hovering over it
      popup.addEventListener("mouseenter", function () {
        popup.classList.add("visible");
      });

      popup.addEventListener("mouseleave", function () {
        popup.classList.remove("visible");
      });
    }
  });

  // Multi-step volunteer form functionality
  const volunteerForm = {
    currentStep: 1,
    formData: {},

    init: function () {
      this.bindEvents();
      this.showStep(1);
    },

    bindEvents: function () {
      // Next step button
      const nextBtn = document.querySelector(".next-step");
      console.log("Next button found:", nextBtn);
      if (nextBtn) {
        nextBtn.addEventListener("click", (e) => {
          e.preventDefault();
          console.log("Next button clicked");
          if (this.validateStep(1)) {
            console.log("Step 1 validation passed");
            this.collectStepData(1);
            this.showStep(2);
          } else {
            console.log("Step 1 validation failed");
          }
        });
      }

      // Back step button
      const backBtn = document.querySelector(".back-step");
      if (backBtn) {
        backBtn.addEventListener("click", () => {
          this.showStep(1);
        });
      }

      // Submit form
      const submitBtn = document.querySelector(".submit-application");
      if (submitBtn) {
        submitBtn.addEventListener("click", (e) => {
          e.preventDefault();
          if (this.validateStep(2)) {
            this.collectStepData(2);
            this.submitForm();
          }
        });
      }
    },

    showStep: function (step) {
      // Hide all steps
      document.querySelectorAll(".volunteer-form-step").forEach((stepEl) => {
        stepEl.classList.remove("active");
      });

      // Show current step
      const currentStepEl = document.querySelector(
        `#volunteer-form-step${step}`
      );
      if (currentStepEl) {
        currentStepEl.classList.add("active");
      }

      this.currentStep = step;
    },

    validateStep: function (step) {
      const stepForm = document.querySelector(`#volunteer-form-step${step}`);
      console.log(`Validating step ${step}, form found:`, stepForm);
      if (!stepForm) return false;

      const requiredFields = stepForm.querySelectorAll("[required]");
      console.log(`Required fields found:`, requiredFields.length);
      let isValid = true;

      // Clear previous errors
      stepForm.querySelectorAll(".error-message").forEach((error) => {
        error.textContent = "";
      });
      stepForm.querySelectorAll(".input-error").forEach((field) => {
        field.classList.remove("input-error");
      });

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          this.showFieldError(field, "Šis lauks ir obligāts");
          isValid = false;
        } else if (field.type === "email" && !this.isValidEmail(field.value)) {
          this.showFieldError(field, "Lūdzu ievadiet derīgu e-pasta adresi");
          isValid = false;
        } else if (field.type === "tel" && !this.isValidPhone(field.value)) {
          this.showFieldError(field, "Lūdzu ievadiet derīgu tālruņa numuru");
          isValid = false;
        }
      });

      return isValid;
    },

    showFieldError: function (field, message) {
      field.classList.add("input-error");
      const errorSpan = field.parentNode.querySelector(".error-message");
      if (errorSpan) {
        errorSpan.textContent = message;
      }
    },

    isValidEmail: function (email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    },

    isValidPhone: function (phone) {
      const phoneRegex = /^[\+]?[0-9\s\-\(\)]{8,}$/;
      return phoneRegex.test(phone);
    },

    collectStepData: function (step) {
      const stepForm = document.querySelector(`#volunteer-form-step${step}`);
      if (!stepForm) return;

      const formData = new FormData(stepForm);
      for (let [key, value] of formData.entries()) {
        this.formData[key] = value;
      }
    },

    submitForm: async function () {
      // Show loading state
      const submitBtn = document.querySelector(".submit-application");
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = "Nosūta...";
      }

      try {
        // Prepare form data for submission
        const formData = new FormData();
        formData.append("action", "volunteer_application");

        // Add all collected form data
        Object.keys(this.formData).forEach((key) => {
          formData.append(key, this.formData[key]);
        });

        // Submit to volunteer form handler
        const response = await fetch("./volunteer-handler.php", {
          method: "POST",
          body: formData,
        });

        const result = await response.json();

        if (result.success) {
          // Show thank you step
          this.showStep(3);
        } else {
          throw new Error(result.data || "Submission failed");
        }
      } catch (error) {
        console.error("Error submitting form:", error);
        alert("Kļūda nosūtot pieteikumu. Lūdzu mēģiniet vēlreiz.");

        // Reset button
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = "Iesniegt pieteikumu";
        }
      }
    },

    simulateSubmission: function () {
      return new Promise((resolve) => {
        setTimeout(resolve, 2000); // Simulate network delay
      });
    },

    sendEmailNotification: function () {
      // In production, this would be handled by your backend
      // For demonstration, we'll log the data that would be sent
      console.log("Volunteer application submitted:", this.formData);

      // Prepare email content
      const emailContent = this.formatEmailContent();
      console.log("Email content that would be sent:", emailContent);
    },

    formatEmailContent: function () {
      return `
        New Volunteer Application:
        
        Contact Information:
        - Name: ${this.formData.name || "N/A"}
        - Email: ${this.formData.email || "N/A"}
        - Phone: ${this.formData.phone || "N/A"}
        - Age: ${this.formData.age || "N/A"}
        - Experience: ${this.formData.experience || "N/A"}
        
        Assessment Answers:
        1. Motivation: ${this.formData.question1 || "N/A"}
        2. Conflict handling: ${this.formData.question2 || "N/A"}
        3. Time availability: ${this.formData.question3 || "N/A"}
        4. Transportation: ${this.formData.question4 || "N/A"}
        5. Additional comments: ${this.formData.question5 || "N/A"}
      `;
    },
  };

  // Initialize volunteer form if on volunteer page
  const volunteerContainer = document.querySelector(
    ".volunteer-form-container"
  );
  const volunteerStep1 = document.querySelector("#volunteer-form-step1");
  const nextButton = document.querySelector(".next-step");

  console.log("Volunteer form container found:", volunteerContainer);
  console.log("Volunteer step 1 found:", volunteerStep1);
  console.log("Next button found:", nextButton);

  if (volunteerContainer || volunteerStep1) {
    console.log("Initializing volunteer form...");
    volunteerForm.init();
  } else {
    console.log("Volunteer form elements not found on this page");
  }

  // Fallback direct button handler in case the main form doesn't initialize
  setTimeout(() => {
    const fallbackNextBtn = document.querySelector(".next-step");
    if (
      fallbackNextBtn &&
      !fallbackNextBtn.hasAttribute("data-listener-added")
    ) {
      console.log("Adding fallback button handler");
      fallbackNextBtn.setAttribute("data-listener-added", "true");
      fallbackNextBtn.addEventListener("click", function (e) {
        e.preventDefault();
        console.log("Fallback button clicked");

        // Basic validation
        const step1 = document.querySelector("#volunteer-form-step1");
        const step2 = document.querySelector("#volunteer-form-step2");
        const requiredFields = step1.querySelectorAll("[required]");
        let allValid = true;

        requiredFields.forEach((field) => {
          if (!field.value.trim()) {
            allValid = false;
            field.style.borderColor = "#e74c3c";
          } else {
            field.style.borderColor = "";
          }
        });

        if (allValid) {
          step1.classList.remove("active");
          step2.classList.add("active");
          console.log("Moved to step 2");
        } else {
          console.log("Validation failed - missing required fields");
        }
      });
    }
  }, 1000);

  console.log("Samariesi Med4U website initialized successfully");
});

// Service Worker registration for better performance (if supported)
if ("serviceWorker" in navigator) {
  window.addEventListener("load", function () {
    navigator.serviceWorker
      .register("/sw.js")
      .then(
        function (registration) {
          console.log("ServiceWorker registration successful");
        },
        function (err) {
          console.log("ServiceWorker registration failed: ", err);
        }
      )
      .catch(function (err) {
        console.log("ServiceWorker registration error: ", err);
      });
  });
}
