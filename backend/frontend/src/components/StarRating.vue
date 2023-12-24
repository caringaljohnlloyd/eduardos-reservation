<template>
    <div >
      <div class="text-primary" >
        <i v-for="star in stars" :key="star" @click="selectRating(star)" :class="{ ' fas fa-star': star <= selectedRating, 'far fa-star': star > selectedRating }"></i>
      </div>
      <div class="rating-info">
        <p>Current Rating: {{ selectedRating }}</p>
        
      </div>
    </div>
  </template>
  
  <script>
  import Top from '@/components/Top.vue';
  import axios from 'axios'

  export default {
    components: {
      Top,
    },
    props: {
      initialRating: Number,

    },
    data() {
      return {
        selectedRating: this.initialRating || 0,
        stars: [1, 2, 3, 4, 5],
        rating: [],
      };
    },
    mounted() {
            this.getRating();
        },
    
    methods: {
      selectRating(rating) {
        this.selectedRating = rating;
        this.$emit('rating-selected', rating);
        
      },
      async getRating(){
        
            const r = await axios.get("/getShop");
            this.rating = r.data;
        
      }
    },
  };
  </script>
  