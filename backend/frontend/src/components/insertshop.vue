<template>
  <div>
    <form @submit.prevent="saveShop">
      <label for="prod_name">Product Name</label>
      <input type="text" placeholder="Name" v-model="prod_name">
      <br>
      <label for="prod_quantity">Product Quantity</label>
      <input type="text" placeholder="Quantity" v-model="prod_quantity">
      <br>
      <label for="prod_desc">Product Description</label>
      <input type="text" placeholder="Description" v-model="prod_desc">
      <br>
      <label for="prod_price">Product Price</label>
      <input type="number" placeholder="Price" v-model="prod_price">
      <button type="submit">Submit</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {

      prod_name: "",
      prod_quantity: "",
      prod_desc: "",
      prod_price: ""
    }
  },
  methods: {
    async saveShop() {
      try {
        const ins = await axios.post("saveShop", {
          prod_name: this.prod_name,
          prod_quantity: this.prod_quantity,
          prod_desc: this.prod_desc,
          prod_price: this.prod_price,
        });
        
      } catch (error) {
        console.error(error);
       
      }
    }
  }
}
</script>
