<template>
     <Top />
     <spinner/>
  <navbar />
  <!-- Page Header Start -->
  <div class="container-xxl bg-white p-0">
        <div class="about">
        <div class="container-fluid page-header mb-5 p-0" >
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About</h1>
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
              <!-- About Start -->
              
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    
                    <div style="text-align: justify;">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Eduardo's</span></h1>
                        <p class="mb-4">Eduardo's Resort Corporation, founded by Dr. Elizalde M. Herrera, is located at Nautical Highway Bayanan II, Calapan City, Oriental Mindoro. The resort commenced operations on September 8, 2013, and operates in compliance with Philippine laws. Eduardo's Resort actively promotes tourism in the province, provides employment opportunities for local residents, supports farmers in maximizing agricultural crop yields, and contributes to the development of swimmers and athletes.</p>
  
                        <p class="mb-4">The establishment of Eduardo's Resort Swimming Foundation, Inc. aims to promote swimming as the primary sport in Oriental Mindoro and the rest of the MIMAROPA Region. The foundation is dedicated to providing excellent training, state-of-the-art competition facilities, and other athletic support to its members and beneficiaries. Additionally, the foundation seeks to extend pool access and swimming lessons to individuals who are eager and passionate about learning the sport of swimming.</p>
  
                        <p class="mb-4">Furthermore, the foundation aims to create programs, incentives, and scholarship opportunities for competitive swimmers, coaches, and officials. It strives to establish strong partnerships and linkages with local, national, and international entities—both private and government—that can provide opportunities for the members and beneficiaries of the foundation.</p>
                    </div> <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ numberOfRooms }}</h2>
                                    <p class="mb-0">Rooms</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{numberOfStaffs}}</h2>
                                    <p class="mb-0">Staffs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ numberOfClients }}</h2>
                                    <p class="mb-0">Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img :src="require('../assets/img/pool3.jpg')" alt="" class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" > 
                        </div>
                        <div class="col-6 text-start">
                            <img :src="require('../assets/img/pool5.jpg')" alt="" class="img-fluid  w-100 wow zoomIn" data-wow-delay="0.3s">
                        </div>
                        <div class="col-6 text-end">
                            <img :src="require('../assets/img/band.jpg')" alt="" class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s">
                        </div>
                        <div class="col-6 text-start">
                            <img :src="require('../assets/img/pool2.jpg')" alt="" class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Team Start -->
    <div  class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>
                </div>
                <div class="row g-4">
                    <div v-for="staff in staff" class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid menu" style="width: 150%; max-width: 300px; height: 330px;" :src="require('../assets/img/' + staff.staff_image)" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">{{ staff.staff_name }}</h5>
                                <small>{{ staff.staff_email }}</small><br>
                                <small>0{{ staff.contactNum }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <End/>
</template>

<style scoped>
 @import '@/assets/css/bootstrap.min.css';
 @import '@/assets/css/style.css';
.about {
  background-image: url('~@/assets/img/pool4.jpg'); 
  background-size: cover; 
  background-repeat: no-repeat; 
  background-position: center center; 
  width: 100%; 
  height: 338px; 
}

</style>

<script>
import axios from 'axios'

import Top from '@/components/Top.vue';
import navbar from '@/components/navbar.vue';
import End from '@/components/End.vue';
import spinner from '@/components/spinner.vue';

export default {
  name: 'about',
  components: {
    spinner,Top,navbar,End
  },
  data(){
            return{
                feed:[],
                feedbackSent: false, 
                room:[],
                numberOfClients: 0,
                numberOfRooms: 0,
                pool:[],
                staff:[],
                numberOfStaffs: 0,

            }
        },
        mounted(){
            this.getData();
            this.getRoom();
            this.getStaff();

        },
        methods:{
            async getData() {
                const response = await axios.get("/getData"); 
                this.data = response.data;
                this.numberOfClients = this.data.length; 
            },
            async getRoom() {
                const response = await axios.get("/getRoom");
                this.room = response.data;
                this.numberOfRooms = this.room.length; 
            },
            async getStaff() {
                const response = await axios.get("/getStaff");
                this.staff = response.data;
                this.numberOfStaffs = this.staff.length;

        }
     }
    }
</script>
