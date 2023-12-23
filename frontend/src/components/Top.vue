<template>
    <div>

      <link rel="icon" href="favicon.ico">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" >
      <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet"
      >
      <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
      >
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet"
      ><link href="https://cdn.jsdelivr.net/npm/vue@2">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
    </div>
  </template>
  
<style>
 @import '@/assets/css/bootstrap.min.css';
 @import '@/assets/css/style.css';
 </style>

<script>
export default {
  mounted() {
   
    this.loadExternalResources();
  },
  methods: {
    loadExternalResources() {
    
      const resourceUrls = [
        'img/favicon.ico',
        'https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css',
        'lib/animate/animate.min.css',
        'lib/owlcarousel/assets/owl.carousel.min.css',
        'lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css',
        'css/bootstrap.min.css',
        'css/style.css',
      ];

    
      resourceUrls.forEach((url) => {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = url;
        document.head.appendChild(link);
      });

      const favicon = document.createElement('link');
      favicon.rel = 'icon';
      favicon.href = 'img/favicon.ico';
      document.head.appendChild(favicon);
    },
  },
};
</script>