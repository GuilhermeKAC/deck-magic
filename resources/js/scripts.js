/*!
    * Start Bootstrap - Material Admin Pro v1.0.2 (https://startbootstrap.com/theme/material-admin-pro)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under SEE_LICENSE (https://github.com/StartBootstrap/material-admin-pro/blob/master/LICENSE)
    */
window.addEventListener('DOMContentLoaded', event => {
  // Enable tooltips globally
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // Enable popovers globally
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });

  // Activate Bootstrap scrollspy for the sticky nav component
  const navStick = document.body.querySelector('#navStick');
  if (navStick) {
    new bootstrap.ScrollSpy(document.body, {
      target: '#navStick',
      offset: 150,
    });
  }

  // Toggle the side navigation
  const drawerToggle = document.body.querySelector('#drawerToggle');
  if (drawerToggle) {
    drawerToggle.addEventListener('click', event => {
      event.preventDefault();
      document.body.classList.toggle('drawer-toggled');
    });
  }

  // Close side navigation when width < LG
  const drawerContent = document.body.querySelector('#layoutDrawer_content');
  if (drawerContent) {
    drawerContent.addEventListener('click', event => {
      const BOOTSTRAP_LG_WIDTH = 992;
      if (window.innerWidth >= 992) {
        return;
      }
      if (document.body.classList.contains("drawer-toggled")) {
        document.body.classList.toggle("drawer-toggled");
      }
    });
  }


  // Add active state to sidbar nav links
  let activatedPath = window.location.pathname.match(/([\w-]+\.html)/, '$1');

  if (activatedPath) {
    activatedPath = activatedPath[0];
  } else {
    activatedPath = 'index.html';
  }

  const targetAnchors = document.body.querySelectorAll('[href="' + activatedPath + '"].nav-link');

  targetAnchors.forEach(targetAnchor => {
    let parentNode = targetAnchor.parentNode;
    while (parentNode !== null && parentNode !== document.documentElement) {
      if (parentNode.classList.contains('collapse')) {
        parentNode.classList.add('show');
        const parentNavLink = document.body.querySelector(
          '[data-bs-target="#' + parentNode.id + '"]'
        );
        parentNavLink.classList.remove('collapsed');
        parentNavLink.classList.add('active');
      }
      parentNode = parentNode.parentNode;
    }
    targetAnchor.classList.add('active');
  });
});

if (!String.prototype.slugify) {
  String.prototype.slugify = function () {

    return this.toString().toLowerCase()
      .replace(/[????????????????????????]+/g, 'a')       // Special Characters #1
      .replace(/[????????????????]+/g, 'e')        // Special Characters #2
      .replace(/[????????????????]+/g, 'i')        // Special Characters #3
      .replace(/[??????????????????????]+/g, 'o')        // Special Characters #4
      .replace(/[????????????????]+/g, 'u')        // Special Characters #5
      .replace(/[????????]+/g, 'y')          // Special Characters #6
      .replace(/[????]+/g, 'n')            // Special Characters #7
      .replace(/[????]+/g, 'c')            // Special Characters #8
      .replace(/[??]+/g, 'ss')            // Special Characters #9
      .replace(/[????]+/g, 'ae')            // Special Characters #10
      .replace(/[??????]+/g, 'oe')          // Special Characters #11
      .replace(/[%]+/g, 'pct')            // Special Characters #12
      .replace(/\s+/g, '-')              // Replace spaces with -
      .replace(/[^\w\-]+/g, '')          // Remove all non-word chars
      .replace(/\-\-+/g, '-')            // Replace multiple - with single -
      .replace(/^-+/, '')                // Trim - from start of text
      .replace(/-+$/, '');            		// Trim - from end of text

  };
}
