<template>
	<Top/>
	<spinner/>
	<navbar />
	<div class="container-xxl bg-white p-0">
		<div class="service">
			<div class="container-fluid page-header mb-5 p-0">
				<div class="container-fluid page-header-inner py-5">
					<div class="container text-center pb-5">
						<h1 class="display-3 text-white mb-3 animated slideInDown">
							Services
						</h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center text-uppercase">
								<li class="breadcrumb-item">
									<a href="#">
										Home
									</a>
								</li>
								<li class="breadcrumb-item">
									<a href="#">
										Pages
									</a>
								</li>
								<li class="breadcrumb-item text-white active" aria-current="page">
									Contact
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->
	<!-- Service Start -->
	<div class="container-xxl py-5">
		<div class="container">
			<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
				<h6 class="section-title text-center text-primary text-uppercase">
					Our Services
				</h6>
				<h1 class="mb-5">
					Explore Our
					<span class="text-primary text-uppercase">
						Services
					</span>
				</h1>
			</div>
			<div class="row g-4">
				<div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
					<a class="service-item rounded" href="">
						<div class="service-icon bg-transparent border rounded p-1">
							<div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
								<i class="fa fa-hotel fa-2x text-primary">
								</i>
							</div>
						</div>
						<h5 class="mb-3">
							Rooms & Appartment
						</h5>
						<p class="text-body mb-0">
							"Welcome to our luxurious and comfortable Rooms & Apartments at Eduardo's
							Resort. Our carefully designed accommodations are the perfect haven for
							relaxation and rejuvenation. From spacious rooms with breathtaking views
							to well-appointed apartments that feel like a home away from home, we offer
							a range of options to suit your every need. "
						</p>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
					<a class="service-item rounded" href="">
						<div class="service-icon bg-transparent border rounded p-1">
							<div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
								<i class="fa fa-utensils fa-2x text-primary">
								</i>
							</div>
						</div>
						<h5 class="mb-3">
							Food & Restaurant
						</h5>
						<p class="text-body mb-0">
							"Indulge in a culinary journey at our resort's Food & Restaurant, where
							exceptional flavors and exquisite dining experiences await you. Our expert
							chefs artfully prepare a diverse range of dishes that tantalize your taste
							buds, from delectable international cuisine to locally inspired delicacies.
							"
						</p>
					</a>
				</div>
			</div>
			<br>
			<div class="row g-4">
				<div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
					<a class="service-item rounded" href="">
						<div class="service-icon bg-transparent border rounded p-1">
							<div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
								<i class="fa fa-swimmer fa-2x text-primary">
								</i>
							</div>
						</div>
						<h5 class="mb-3">
							Swimming Lesson
						</h5>
						<p class="text-body mb-0">
							"Dive into a world of aqua adventures at our resort's Swimming Lessons!
							Whether you're a beginner looking to conquer the waters or an experienced
							swimmer seeking to refine your skills, our certified instructors are here
							to guide you through an exciting and educational journey. "
						</p>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
					<a class="service-item rounded" href="">
						<div class="service-icon bg-transparent border rounded p-1">
							<div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
								<i class="fa fa-glass-cheers fa-2x text-primary">
								</i>
							</div>
						</div>
						<h5 class="mb-3">
							Event & Party
						</h5>
						<p class="text-body mb-0">
							"Experience unforgettable moments at our resort's Events and Party offerings.
							Whether you're celebrating a special occasion, hosting a corporate event,
							or simply looking for a place to unwind with friends and family, our resort
							provides the perfect backdrop for your gatherings. "
						</p>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Service End -->
	<feedbacks/>
	<!-- Newsletter Start -->
	<div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
		<div class="row justify-content-center">
			<div class="col-lg-10 border rounded p-1">
				<div class="border rounded text-center p-1">
					<div class="bg-white rounded text-center p-5">
						<h4 class="mb-4">
							Subscribe Our
							<span class="text-primary text-uppercase">
								Newsletter
							</span>
						</h4>
						<div class="position-relative mx-auto" style="max-width: 400px;">
							<input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
							<button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">
								Submit
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Newsletter Start -->
	<End/>
	<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
		<i class="bi bi-arrow-up">
		</i>
	</a>
</template>
<style>
	@import '@/assets/css/bootstrap.min.css'; @import '@/assets/css/style.css';
	.service { background-image: url('~@/assets/img/pool4.jpg'); background-size:
	cover; background-repeat: no-repeat; background-position: center center;
	width: 100%; height: 338px; }
</style>
<script>
	import Top from '@/components/Top.vue';
	import navbar from '@/components/navbar.vue';
	import End from '@/components/End.vue';
    import feedbacks from '@/components/feedbacks.vue';
	import spinner from '@/components/spinner.vue';

	import axios from 'axios'

	export
default{
		name:
		'service',
		components:{
			spinner,Top,
			navbar,
			End,
            feedbacks
		},
		data(){
			return {
				feed: [],
			}
		},
		mounted() {
			this.getFeed();
		},

		methods:{
			async getFeed(){
				const[g, n] = await Promise.all([axios.get("/getFeedback"), axios.get("/getData")]);
				this.feed = g.data;
				this.name = n.data;
			},
			getName(g){
				return this.name.find(n => n.id === g.id) || {};
			},

		},
	}
</script>