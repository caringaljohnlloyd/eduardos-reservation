<template>
    <navbar/>

      <insert @data-saved="getInfo" /> 
      
  </template>
  
  <script>
    import navbar from '@/components/navbar.vue';
  import insert from '@/components/insert.vue';
  import axios from 'axios';
  
  export default {
    components: {
      insert,
      navbar
    },
    data() {
  return {
    info: [],
      };
    },
    created() {
      this.getInfo();
    },
    methods: {
      
      async getInfo() {
        try {
          const inf = await axios.get('getData');
          this.info = inf.data;
        } catch (error) {
          console.log(error);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  .table-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  
  .styled-table {
    background-color: #e0e0e0;
    border-collapse: collapse;
    width: 80%;
    max-width: 600px;
  }
  
  .styled-table th {
    background-color: #333;
    color: #fff;
  }
  
  .styled-table td {
    border: 1px solid #ccc;
    padding: 8px;
  }
  </style>
  