<template>
    <Top/>
    <!-- Testimonial Start -->
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title text-center text-primary text-uppercase">
            Feedbacks
        </h6>
    </div>
    <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s "
    style="margin-bottom: 90px;">
        <div class="container">
            <div class="owl-carousel testimonial-carousel py-5">
                <div v-for="feed in feed" :key="name.id" class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <div class="d-flex align-items-center">
    <i class="fas fa-user-circle fa-3x"></i>
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">
                                {{getName(feed).name}}
                            </h6>
                        </div>
                    </div>
                    <p>
                        {{ feed.feedback }}
                    </p>
                    
                </div>
            </div>
            <div v-if="feedbackSent" class="alert alert-success mt-3" role="alert">
                Feedback sent successfully!
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
</template>
<style>
    @import '@/assets/css/bootstrap.min.css';
    @import '@/assets/css/style.css';
</style>
<script>
    import Top from '@/components/Top.vue';
    import axios from 'axios'
    export default {
        name:
        'testimonials',
        components: {
            Top

        },
        data() {
            return {
                feed: [],
                name: [],
            }
        },
        mounted() {
            this.getFeed();
            this.getData();
            this.getName();
        },
        methods: {
            async getFeed(){
                const[g, n] = await Promise.all([axios.get("/getFeedback"), axios.get("/getData")]);
                this.feed = g.data;
                this.name = n.data;
            },
            getName(g){
                return this.name.find(n => n.id === g.id) || {};
            },
            async getData(){
                const response = await axios.get("/getData");
                this.data = response.data;
                this.numberOfClients = this.data.length;
            },

        }
    }
</script>