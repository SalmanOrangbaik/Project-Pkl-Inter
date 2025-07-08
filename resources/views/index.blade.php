@extends('layouts.frontend')
@section('content')

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <div class="header-carousel-item-img-1">
                <img src="{{ asset('assets/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="Image">
            </div>
            <div class="carousel-caption">
                <div class="carousel-caption-inner text-start p-3">
                    <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">The most prestigious Investments company in worldwide.</h1>
                    <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.5s;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    </p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Apply Now</a>
                    <a class="btn btn-dark rounded-pill py-3 px-5 mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="header-carousel-item mx-auto">
            <div class="header-carousel-item-img-2">
                <img src="{{ asset('assets/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="Image">
            </div>
            <div class="carousel-caption">
                <div class="carousel-caption-inner text-center p-3">
                    <h1 class="display-1 text-capitalize text-white mb-4">The most prestigious Investments company in worldwide.</h1>
                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    </p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4" href="#">Apply Now</a>
                    <a class="btn btn-dark rounded-pill py-3 px-5 mb-4" href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="header-carousel-item">
            <div class="header-carousel-item-img-3">
                <img src="{{ asset('assets/img/carousel-3.jpg') }}" class="img-fluid w-100" alt="Image">
            </div>
            <div class="carousel-caption">
                <div class="carousel-caption-inner text-end p-3">
                    <h1 class="display-1 text-capitalize text-white mb-4">The most prestigious Investments company in worldwide.</h1>
                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    </p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mb-4 me-4" href="#">Apply Now</a>
                    <a class="btn btn-dark rounded-pill py-3 px-5 mb-4" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img src="{{ asset('assets/img/about-3.png') }}" class="img-fluid w-100 rounded-top bg-white" alt="Image">
                        <img src="{{ asset('assets/img/about-2.jpg') }}" class="img-fluid w-100 rounded-bottom" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h4 class="text-primary">About Us</h4>
                    <h1 class="display-5 mb-4">The most Profitable Investments company in worldwide.</h1>
                    <p class="text ps-4 mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores atque nihil unde quisquam, deleniti illo a. Quam harum laboriosam, laudantium, deleniti perferendis voluptates ex non laborum libero magni, minus illo!
                    </p>
                    <div class="row g-4 justify-content-between mb-5">
                        <div class="col-lg-6 col-xl-5">
                            <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i> Strategy & Consulting</p>
                            <p class="text-dark mb-0"><i class="fas fa-check-circle text-primary me-1"></i> Business Process</p>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i> Marketing Rules</p>
                            <p class="text-dark mb-0"><i class="fas fa-check-circle text-primary me-1"></i> Partnerships</p>
                        </div>
                    </div>
                    <div class="row g-4 justify-content-between mb-5">
                        <div class="col-xl-5"><a href="#" class="btn btn-primary rounded-pill py-3 px-5">Discover More</a></div>
                        <div class="col-xl-7 mb-5">
                            <div class="about-customer d-flex position-relative">
                                <img src="{{ asset('assets/img/customer-img-1.jpg') }}" class="img-fluid btn-xl-square position-absolute" style="left: 0; top: 0;"  alt="Image">
                                <img src="{{ asset('assets/img/customer-img-2.jpg') }}" class="img-fluid btn-xl-square position-absolute" style="left: 45px; top: 0;" alt="Image">
                                <img src="{{ asset('assets/img/customer-img-3.jpg') }}" class="img-fluid btn-xl-square position-absolute" style="left: 90px; top: 0;" alt="Image">
                                <img src="{{ asset('assets/img/customer-img-1.jpg') }}" class="img-fluid btn-xl-square position-absolute" style="left: 135px; top: 0;" alt="Image">
                                <div class="position-absolute text-dark" style="left: 220px; top: 10px;">
                                    <p class="mb-0">5m+ Trusted</p>
                                    <p class="mb-0">Global Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center">
                        <div class="col-sm-4">
                            <div class="bg-primary rounded p-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value fs-1 fw-bold text-dark" data-toggle="counter-up">32</span>
                                    <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;">k+</h4>
                                </div>
                                <div class="w-100 d-flex align-items-center justify-content-center">
                                    <p class="text-white mb-0">Project Complete</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-dark rounded p-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value fs-1 fw-bold text-white" data-toggle="counter-up">21</span>
                                    <h4 class="text-white fs-1 mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                                </div>
                                <div class="w-100 d-flex align-items-center justify-content-center">
                                    <p class="mb-0">Years Of Experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-primary rounded p-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="counter-value fs-1 fw-bold text-dark" data-toggle="counter-up">97</span>
                                    <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                                </div>
                                <div class="w-100 d-flex align-items-center justify-content-center">
                                    <p class="text-white mb-0">Team Members</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

       <!-- Services Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h4 class="text-primary">Our Services</h4>
            <h1 class="display-4"> Offering the Best Consulting & Investa Services</h1>
        </div>
        <div class="row g-4 justify-content-center text-center">
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="{{ asset('assets/img/service-1.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Business Strategy Invesments</a>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum nobis est sapiente natus officiis maxime
                            </p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="{{ asset('assets/img/service-2.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Consultancy & Advice</a>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum nobis est sapiente natus officiis maxime
                            </p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="{{ asset('assets/img/service-4.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Invesments Planning</a>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum nobis est sapiente natus officiis maxime
                            </p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item bg-light rounded">
                    <div class="service-img">
                        <img src="{{ asset('assets/img/service-3.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="service-content-inner">
                            <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Private Client Investment</a>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum nobis est sapiente natus officiis maxime
                            </p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="#">Services More</a>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->


<!-- Project Start -->
<div class="container-fluid project">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h4 class="text-primary">Our Projects</h4>
            <h1 class="display-4">Explore Our Latest Projects</h1>
        </div>
        <div class="project-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.1s">
                <div class="project-img">
                    <img src="{{ asset('assets/img/projects-1.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                </div>
                <div class="project-content bg-light rounded p-4">
                    <div class="project-content-inner">
                        <div class="project-icon mb-3"><i class="fas fa-chart-line fa-4x text-primary"></i></div>
                        <p class="text-dark fs-5 mb-3">Business Growth</p>
                        <a href="#" class="h4">Business Strategy And Investment Planning Growth Consulting</a>
                        <div class="pt-4">
                            <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.3s">
                <div class="project-img">
                    <img src="{{ asset('assets/img/projects-1.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                </div>
                <div class="project-content bg-light rounded p-4">
                    <div class="project-content-inner">
                        <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div>
                        <p class="text-dark fs-5 mb-3">Marketing Strategy</p>
                        <a href="#" class="h4">Product Sailing Marketing Strategy For Improve Business</a>
                        <div class="pt-4">
                            <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-item h-100">
                <div class="project-img">
                    <img src="{{ asset('assets/img/projects-1.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                </div>
                <div class="project-content bg-light rounded p-4">
                    <div class="project-content-inner">
                        <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div>
                        <p class="text-dark fs-5 mb-3">Marketing Strategy</p>
                        <a href="#" class="h4">Product Sailing Marketing Strategy For Improve Business</a>
                        <div class="pt-4">
                            <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project End -->


<!-- Blog Start -->
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h4 class="text-primary">Our Blogs</h4>
            <h1 class="display-4">Latest Articles & News from the Blogs</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-item bg-light rounded p-4" style="background-image: url({{ asset('assets/img/bg.png') }});">
                    <div class="mb-4">
                        <h4 class="text-primary mb-2">Investment</h4>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><span class="text-dark fw-bold">On</span> Mar 14, 2024</p>
                            <p class="mb-0"><span class="text-dark fw-bold">By</span> Mark D. Brock</p>
                        </div>
                    </div>
                    <div class="project-img">
                        <img src="{{ asset('assets/img/blog-1.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                        <div class="blog-plus-icon">
                            <a href="{{ asset('assets/img/blog-1.jpg') }}" data-lightbox="blog-1" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                        </div>
                    </div>
                    <div class="my-4">
                        <a href="#" class="h4">Revisiting Your Investment & Distribution Goals</a>
                    </div>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="blog-item bg-light rounded p-4" style="background-image: url({{ asset('assets/img/bg.png') }});">
                    <div class="mb-4">
                        <h4 class="text-primary mb-2">Business</h4>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><span class="text-dark fw-bold">On</span> Mar 14, 2024</p>
                            <p class="mb-0"><span class="text-dark fw-bold">By</span> Mark D. Brock</p>
                        </div>
                    </div>
                    <div class="project-img">
                        <img src="{{ asset('assets/img/blog-2.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                        <div class="blog-plus-icon">
                            <a href="{{ asset('assets/img/blog-2.jpg') }}" data-lightbox="blog-2" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                        </div>
                    </div>
                    <div class="my-4">
                        <a href="#" class="h4">Dimensional Fund Advisors Interview with Director</a>
                    </div>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="blog-item bg-light rounded p-4" style="background-image: url({{ asset('assets/img/bg.png') }});">
                    <div class="mb-4">
                        <h4 class="text-primary mb-2">Consulting</h4>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><span class="text-dark fw-bold">On</span> Mar 14, 2024</p>
                            <p class="mb-0"><span class="text-dark fw-bold">By</span> Mark D. Brock</p>
                        </div>
                    </div>
                    <div class="project-img">
                        <img src="{{ asset('assets/img/blog-3.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                        <div class="blog-plus-icon">
                            <a href="{{ asset('assets/img/blog-3.jpg') }}" data-lightbox="blog-3" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                        </div>
                    </div>
                    <div class="my-4">
                        <a href="#" class="h4">Interested in Giving Back this year? Here are some tips</a>
                    </div>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
