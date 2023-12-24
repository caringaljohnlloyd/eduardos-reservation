<template>

    <div class="container-fluid">
  
      <div class="row">
        <div class="col-md-3">
      
        </div>
        <div class="col-md-9"> 
          <div class="row">
            <table class="table">

  
  
  
              <!-- User Acquisition Statistics -->
              <tr>
                <td colspan="5">
                  <div class="card card-default" id="user-acquisition">
                    <div class="card-header border-bottom pb-0">
                      <h2>User </h2>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>User</th>
                    
  
                          </tr>
                        </thead>
                        <tbody v-for="feed in feed" :key="name.id">
                          <tr>
                            <td>{{ getName(feed).name }}</td>
                            <td>
                              {{ feed.feedback }}
                            </td>
                            <td><button @click="deletefeed(feed.feed_id)">Delete</button></td>
                          </tr>
  
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer d-flex flex-wrap bg-white">
                      <a href="#" class="text-uppercase py-3">Acquisition Report</a>
                    </div>
                  </div>
                </td>
              </tr>
  
  
  
  
  
          </table>
        </div>
      </div>
  
    </div>
  
    </div>
  

  </template>

<script>
import axios from 'axios';

import TopAdmin from '@/components/TopAdmin.vue';
import SidebarAdmin from '@/components/SidebarAdmin.vue';
import EndAdmin from '@/components/EndAdmin.vue';
import HeaderAdmin from '@/components/HeaderAdmin.vue';

export default {
  name: 'analytics',
  components: {
    TopAdmin,
    SidebarAdmin,
    EndAdmin,
    HeaderAdmin,
  },
  data() {
    return {
      name: [],
      feed: [],
      numberOfClients: 0,
      numberOfItems: 0,
      numberOfbooking: 0,
    };
  },
  mounted() {
    this.getData();
    this.getShop();
    this.getFeed();
    this.getName();
    this.getbook();

  },
  methods: {

    async deletefeed(feedId) {
      const confirmResult = window.confirm("Do you want to DELETE this item?");
  
      if (confirmResult) {
          try {
              await axios.post(`/api/feedback/delete/${feedId}`);
              this.feed = this.feed.filter(feed => feed.feed_id !== feedId);
              console.log('Feedback deleted successfully');
          } catch (error) {
              console.error('Error deleting feedback:', error);
          }
      }
  },
  
      async getFeed() {
        const [g, n] = await Promise.all([
          axios.get("/getFeedback"),
          axios.get("/getData"),
        ]);
        this.feed = g.data;
        this.name = n.data;
      },
      getName(g) {
        return this.name.find((n) => n.id === g.id) || {};
      },
    async getData() {
      const response = await axios.get("/getData");
      this.data = response.data;
      this.numberOfClients = this.data.length;
    },
    async getShop() {
      const items = await axios.get("/getShop");
      this.data = items.data;
      this.numberOfItems = this.data.length;
    },
    async getbook() {
      const items = await axios.get("/getbook");
      this.data = items.data;
      this.numberOfbooking = this.data.length;
    },
  },
};
</script>