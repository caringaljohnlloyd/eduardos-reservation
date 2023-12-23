<template>
          <!-- Footer Start -->
          <div>
          <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-4">
                            <a href="/user"><h1 class="text-white text-uppercase mb-3">Eduardo's</h1></a>
                            <p class="text-white mb-0">
                              "Escape to Eduardo's Resort and discover a world of luxury, tranquility, and unforgettable experiences."
							</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Nautical Highway Bayanan II, Calapan City, Oriental Mindoro, Philippines</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>Contact Number: (043) 288-7153 / Cell Phone Number: 0921 507 4378 / 0977 845 8144 / 0928 890 6708</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Company</h6>
                                <a class="btn btn-link" href="/about">About Us</a>
                                <a class="btn btn-link" href="/contact">Contact Us</a>
                                <a class="btn btn-link" href="">Privacy Policy</a>
                                <a class="btn btn-link" href="">Terms & Condition</a>
                                <a class="btn btn-link" href="">Support</a>
                            </div>
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                                <a class="btn btn-link" href="">Food & Restaurant</a>
                                <a class="btn btn-link" href="">Swimming Lesson</a>
                                <a class="btn btn-link" href="">Event & Party</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Eduardo's Resort</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="/user">Eduardo's</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="/user" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
</template>
<style>
 @import '@/assets/css/bootstrap.min.css';
 @import '@/assets/css/style.css';


 </style>
  <script>
  export default {
    
    name: "Include",

    mounted() {
      this.loadScripts();
    },
    methods: {
      loadScripts() {
        const cssUrls = [
          '/lib/animate/animate.min.css',
          '/lib/owlcarousel/assets/owl.carousel.min.css',
          '/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css',
        ];
  
        const jsUrls = [
          'https://code.jquery.com/jquery-3.6.0.min.js',
          '/lib/wow/wow.min.js',
          '/lib/easing/easing.min.js',
          '/lib/waypoints/waypoints.min.js',
          '/lib/counterup/counterup.min.js',
          '/lib/owlcarousel/owl.carousel.min.js',
          '/lib/tempusdominus/js/moment.min.js',
          '/lib/tempusdominus/js/moment-timezone.min.js',
          '/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js',
          'js/main.js',
        ];
  
        const head = document.getElementsByTagName('head')[0];
  
        const loadCss = (index) => {
          if (index < cssUrls.length) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = cssUrls[index];
            link.onload = () => {
              loadCss(index + 1);
            };
            head.appendChild(link);
          } else {
            loadJs(0); 
          }
        };
  
        const loadJs = (index) => {
          if (index < jsUrls.length) {
            const script = document.createElement('script');
            script.src = jsUrls[index];
            script.async = true;
            script.onload = () => {
              loadJs(index + 1);
            };
            head.appendChild(script);
          }
        };
  
        loadCss(0);
       
      },
    },
  };
  </script>
  

