<template>
  <Top/>
  <navbar/>
  <div class="container-xxl bg-white p-0">
        <div class="Testimonial">
        <div class="container-fluid page-header mb-5 p-0" >
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Testimonial</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
            </div>
        </div>
<br><br>
<feedbacks/>

        <!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->
        <spinner/>
        <End/>
</template>

<style>
@import '@/assets/css/bootstrap.min.css';
 @import '@/assets/css/style.css';
.Testimonial {
  background-image: url('~@/assets/img/pool4.jpg'); 
  background-size: cover; 
  background-repeat: no-repeat; 
  background-position: center center; 
  width: 100%; 
  height: 338px; 
}
</style>

<script>
 import Top from '@/components/Top.vue';
 import navbar from '@/components/navbar.vue';
import End from '@/components/End.vue';
import feedbacks from '@/components/feedbacks.vue';
import spinner from '@/components/spinner.vue';

import axios from 'axios'

export default {
  name: 'Testimonial',
  components: {
    spinner,Top,navbar,End,feedbacks
  },
  data(){
    return{
                feed:[],
            }
        },
        mounted(){
            this.getFeed();

        },
        methods:{
           async getFeed(){
                const [g,n] = await Promise.all
                ([ axios.get("/getFeedback"),
                axios.get("/getData")]);
                this.feed = g.data;
                this.name = n.data;

            },
            getName(g) {
                return this.name.find(n => n.id === g.id) || {};
            },

        },
}
</script>