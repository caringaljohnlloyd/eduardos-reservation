<template>
  <!-- Carousel Start -->
  <div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img :src="require('../assets/img/pool4.jpg')" class="w-100" alt="Image" />
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 700px">
              <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">
                Your Escape to Paradise
              </h6>
              <h1 class="display-3 text-white mb-4 animated slideInDown">
                SAVING LIVES BUILDING COMPANIONS!
              </h1>
              <a href="/room" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img :src="require('../assets/img/eagleview.jpg')" class="w-100" alt="Image" />
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 700px">
              <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">
                Your Ultimate Getaway
              </h6>
              <h1 class="display-3 text-white mb-4 animated slideInDown">
                Enjoy, Relax & Have Fun in the Cool & Therapeutic Waters
              </h1>
              <a href="/room" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
              <a href="/booking" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- About Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <h6 class="section-title text-start text-primary text-uppercase">
            About Us
          </h6>
          <h1 class="mb-4">
            Welcome to
            <span class="text-primary text-uppercase">Eduardo's</span>
          </h1>
          <p class="mb-4">
            Eduardo's Resort promotes tourism in the province, provides
            employment to local residents, helps the farmers maximize product of
            agricultural crops and supports swimmers and athletes.
          </p>
          <div class="row g-3 pb-4">
            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
              <div class="border rounded p-1">
                <div class="border rounded text-center p-4">
                  <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                  <h2 class="mb-1" data-toggle="counter-up">
                    {{ numberOfRooms }}
                  </h2>
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
                  <h2 class="mb-1" data-toggle="counter-up">
                    {{ numberOfClients }}
                  </h2>
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
              <img :src="require('../assets/img/pool3.jpg')" alt="" class="img-fluid rounded w-100 wow zoomIn"
                data-wow-delay="0.1s" />
            </div>
            <div class="col-6 text-start">
              <img :src="require('../assets/img/pool5.jpg')" alt="" class="img-fluid w-100 wow zoomIn"
                data-wow-delay="0.3s" />
            </div>
            <div class="col-6 text-end">
              <img :src="require('../assets/img/band.jpg')" alt="" class="img-fluid rounded w-75 wow zoomIn"
                data-wow-delay="0.5s" />
            </div>
            <div class="col-6 text-start">
              <img :src="require('../assets/img/pool2.jpg')" alt="" class="img-fluid rounded w-100 wow zoomIn"
                data-wow-delay="0.7s" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->
  <!-- Service Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title text-center text-primary text-uppercase">
          Manifest
        </h6>
        <h1 class="mb-5">
          Add your <span class="text-primary text-uppercase">Companions</span>
        </h1>
      </div>
      <section class="vh-10 gradient-custom">
        <div class="container py-10">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-20">
              <div class="card ">
                <div class="card-body p-4 p-md-5">
                  <h4 class="mb-5">Resort<span class="text-primary text-uppercase"> Manifest</span></h4>

                  <form @submit.prevent="smanifest">
                    <div class="row">
                      <!-- manifest -->
                      <div class="col-md-20 mb-3 ">
                        <div class="form-group">
                          <h6 class="fw-bold mb-1">Name: {{ username }}</h6>
                        </div>
                        <div class="form-group">
                          <label for="manifest">Name/Age/Contact Number</label>
                          <textarea type="text" placeholder="Who's with you? Insert the info needed" v-model="manifest" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div v-if="successMessage" class="alert alert-success mt-3">
                      {{ successMessage }}
                    </div>

                    <div v-if="errorMessage" class="alert alert-danger mt-3">
                      {{ errorMessage }}
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <br />

    </div>
  </div>
  <!-- Service End -->
  <!-- Video Start -->
  <div id="app" class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
    <div class="row g-0">
      <div class="col-md-6 bg-dark d-flex align-items-center">
        <div class="p-5">
          <h6 class="section-title text-start text-white text-uppercase mb-3">
            Eduardo's Resort
          </h6>
          <h1 class="text-white mb-4">"Where Every Moment Becomes a Memory"</h1>
          <p class="text-white mb-4">
            "Eduardo's Resort is a tranquil paradise nestled in a breathtaking
            natural setting. With lush gardens, pristine pools, and luxurious
            accommodations, our resort offers the perfect escape from the hustle
            and bustle of daily life. Whether you're seeking a romantic getaway,
            a family vacation, or a venue for your special events, Eduardo's
            Resort provides a serene and memorable experience. Immerse yourself
            in comfort, adventure, and relaxation, all in one remarkable
            destination."
          </p>
          <a href="/room" class="btn btn-primary py-md-3 px-md-5 me-3">Our Rooms</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="video">
          <!-- Button to trigger the modal -->
          <button type="button" class="btn-play" data-bs-toggle="modal" data-bs-target="#videoModal">
            <span></span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Eduardo's Resort Video
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Video player with controls -->
          <video controls width="100%" height="auto">
            <!-- Replace the direct URL with the actual URL of your video -->
            <source src="'../assets/img/bestresortinmindoro.mp4'" type="video/mp4" />

            Your browser does not support the video tag.
          </video>
        </div>
      </div>
    </div>
  </div>
  <!-- Video Start -->

  <!-- Testimonial Start -->
  <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h6 class="section-title text-center text-primary text-uppercase">
      Feedbacks
    </h6>
  </div>
  <div
    class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn"
    data-wow-delay="0.1s "
    style="margin-bottom: 90px"
  >
    <div class="container">
      <div class="owl-carousel testimonial-carousel py-5">
        <div
          v-for="feed in feed"
          :key="feed.id"
          v-if="feed.is_hidden !== 1"
          class="testimonial-item position-relative bg-white rounded overflow-hidden"
        >
          <div class="d-flex align-items-center">
            <i class="fas fa-user-circle fa-3x"></i>
            <div class="ps-3">
              <h6 class="fw-bold mb-1">{{ getName(feed).name }}</h6>
            </div>
          </div>
          <p>{{ feed.feedback }}</p>
        </div>
      </div>
      <div v-if="feedbackSent" class="alert alert-success mt-3" role="alert">
        Feedback sent successfully!
      </div>
    </div>
  </div>
  <!-- Testimonial End -->
  <div v-if="hasBooking">
    <insert />
  </div>
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
                                <img class="img-fluid menu" style="width: 100%; max-width: 1000px; height: 330px;" :src="require('../assets/img/' + staff.staff_image)" alt="">
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
            <h4 class="mb-4">
              Subscribe Our
              <span class="text-primary text-uppercase">Newsletter</span>
            </h4>
            <div class="position-relative mx-auto" style="max-width: 400px">
              <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email" />
              <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">
                Submit
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Team End -->
</template>
<style>
@import "@/assets/css/bootstrap.min.css";
@import "@/assets/css/style.css";
</style>
<script>
import axios from "axios";
import insert from "@/components/insert.vue";
export default {
  name: "feedback",
  components: {
    insert,
  },
  data() {
    return {
      feed: [],
      feedbackSent: false,
      numberOfClients: 0,
      numberOfRooms: 0,
      numberOfStaffs: 0,
      room:[],
      name: [],
      user:[],
      manifest: "",
      successMessage: "",
      errorMessage: "",
      staff:[],
      hasBooking: false,

    };
  },

  mounted() {
    this.getFeed();
    this.getData();
    this.getName();
    this.getUser();
    this.getRoom();
    this.getStaff();
    this.checkBooking(); 

  },
  methods: {
    async getStaff() {
                const response = await axios.get("/getStaff");
                this.staff = response.data;
                this.numberOfStaffs = this.staff.length;

        },
        async getFeed() {
  try {
    const [g, n] = await Promise.all([
      axios.get("/getFeedback"),
      axios.get("/getData"),
    ]);

    this.feed = g.data.filter(feed => feed.is_hidden !== 1);

    this.name = n.data;
    
  } catch (error) {
    console.error("Error fetching data:", error);
  }
},

    getName(g) {
      return this.name.find((n) => n.id === g.id) || {};
    },
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
    async getUser(){
      const u = await axios.get("/getData");
      this.user = u.data;
    },  
     
    async smanifest() {
      try {
        const id = sessionStorage.getItem("id");
        const response = await axios.post("manifest", {
          manifest: this.manifest,
          id: id,
        });

        if (response.status === 200) {
          console.log("manifest submitted successfully");
          this.successMessage = "manifest submitted successfully";
          this.errorMessage = "";
          this.manifest = "";
          this.id = "";
          this.$emit('data-saved');
          this.successMessage = response.data.message;
          setTimeout(() => {
            this.successMessage = "";
          }, 2000);
        }
      } catch (error) {
        console.error("Error manifest", error);
        this.errorMessage = `Error manifest: ${error.message}`;
        this.successMessage = "";
      }
    },
    async checkBooking() {
    try {
      const response = await axios.get("/getbook");
      const bookedRooms = response.data;

      const userId = sessionStorage.getItem("id");

      const userBookings = bookedRooms.filter(room => room.id === userId);

      this.hasBooking = userBookings.length > 0;

      console.log("Booking status:", this.hasBooking);
      console.log("User bookings:", userBookings);
    } catch (error) {
      console.error("Error fetching bookings:", error);
    }
  }, },
  computed:{
    username(){
        console.log('id:', JSON.parse(sessionStorage.getItem("id")) || 'Not Found');
        const id = sessionStorage.getItem("id");
        const activeuser = this.user.find(user => user.id === id);
        const client = activeuser ? activeuser.name : "Customer";
        return ` ${client}`;
      },
  }
};
</script>
