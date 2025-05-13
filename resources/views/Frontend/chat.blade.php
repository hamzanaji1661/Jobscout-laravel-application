@extends('Frontend.layouts.masterDashboard')            
@section('page_title')#1 Job Portal Company @endsection
@section('header_shadow')head-shadow @endsection
@section('body_content')
@include('Frontend.layouts.employerDashboardNav')
<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-5">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="ft-medium">Messages</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="theme-cl">Messages</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="dashboard-widg-bar d-block">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="_dashboard_content bg-white rounded mb-4">
                    
                    <div class="_dashboard_content_body">
                        <!-- Convershion -->
                        <div class="messages-container margin-top-0">
                            <div class="messages-headline">
                                <h4>Connor Griffin</h4>
                                <a href="#" class="message-action"><i class="ti-trash"></i> Delete Conversation</a>
                            </div>

                            <div class="messages-container-inner">

                                <!-- Messages -->
                                <div class="dash-msg-inbox">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status online"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Tilly Bartlett</h5>
                                                        <span>36 min ago</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year.. </p>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="active-message">
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status offline"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>George Howarth</h5>
                                                        <span>2 hours ago</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status busy"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Harriet Ball</h5>
                                                        <span>Yesterday</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status online"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Sienna Bruce</h5>
                                                        <span>02.01.2020</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status busy"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Leo Stewart</h5>
                                                        <span>03.01.2020</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status online"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Shaurya Preet</h5>
                                                        <span>05.01.2020</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status offline"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Dan Preet</h5>
                                                        <span>04.01.2020</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status online"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Maddison</h5>
                                                        <span>31.05.2019</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status busy"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Maddison</h5>
                                                        <span>27.05.2019</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status busy"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Eleanor Lloyd</h5>
                                                        <span>24.05.2019</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status offline"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Anna Curtis</h5>
                                                        <span>05.01.2020</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="dash-msg-avatar"><img src="https://via.placeholder.com/500x500" alt=""><span class="_user_status online"></span></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>Tyler Fraser</h5>
                                                        <span>07.01.2020</span>
                                                    </div>
                                                    <p>Hello, I am a web designer with 5 year..</p>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <!-- Messages / End -->

                                <!-- Message Content -->
                                <div class="dash-msg-content">

                                    <div class="message-plunch">
                                        <div class="dash-msg-avatar"><img src="https://image.flaticon.com/icons/png/512/145/145849.png" alt=""></div>
                                        <div class="dash-msg-text"><p>Hello, Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p></div>
                                    </div>

                                    <div class="message-plunch me">
                                        <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
                                        <div class="dash-msg-text"><p>looked up one of the more obscure Latin words, consectetur, from a Lorem</p></div>
                                    </div>

                                    <div class="message-plunch">
                                        <div class="dash-msg-avatar"><img src="https://image.flaticon.com/icons/png/512/145/145849.png" alt=""></div>
                                        <div class="dash-msg-text"><p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing</p></div>
                                    </div>

                                    <div class="message-plunch me">
                                        <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
                                        <div class="dash-msg-text"><p>please consider donating a small sum to help pay for the hosting and bandwidth bill.</p></div>
                                    </div>

                                    <div class="message-plunch">
                                        <div class="dash-msg-avatar"><img src="https://image.flaticon.com/icons/png/512/145/145849.png" alt=""></div>
                                        <div class="dash-msg-text"><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p></div>
                                    </div>

                                    <div class="message-plunch me">
                                        <div class="dash-msg-avatar"><img src="https://via.placeholder.com/400x400" alt=""></div>
                                        <div class="dash-msg-text"><p>numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p></div>
                                    </div>

                                    <div class="message-plunch">
                                        <div class="dash-msg-avatar"><img src="https://image.flaticon.com/icons/png/512/145/145849.png" alt=""></div>
                                        <div class="dash-msg-text"><p>But I must explain to you how all this mistaken idea of denouncing pleasure</p></div>
                                    </div>
                                    
                                    <!-- Reply Area -->
                                    <div class="clearfix"></div>
                                    <div class="message-reply">
                                        <textarea cols="40" rows="3" class="form-control with-light" placeholder="Your Message"></textarea>
                                        <button type="submit" class="btn theme-bg text-white">Send Message</button>
                                    </div>
                                    
                                </div>
                                <!-- Message Content -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
@endsection