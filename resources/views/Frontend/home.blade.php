@extends('Frontend.layouts.master')
@section('page_title')#1 Job Portal Company @endsection
@section('body_content')
			<div class="home-banner margin-bottom-0" style="background:#eff6f2 url({{ asset('frontEndAssets/img/'.$HomePageData->image) }}) no-repeat;">
				<div class="container">
					<div class="row justify-content-start">
						<div class="col-xl-6 col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="banner_caption text-left mb-4">
								<h1 class="banner_title ft-bold mb-1">{!! $HomePageData->heading !!}</h1>
								<p class="fs-md ft-regular">{{ $HomePageData->description }}</p>
							</div>
						</div>
						<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 col-12">

							<form class="bg-white rounded p-1" method="GET" action="{{ route('job.search') }}">
							
								<div class="row no-gutters">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="form-group mb-0 position-relative">
											<input type="text" name="jobs" class="form-control lg left-ico" placeholder="{{ $HomePageData->job_placeholder }}" />
											<i class="bnc-ico lni lni-search-alt"></i>
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
										<div class="form-group mb-0 position-relative">
                                            <select name="location" class="custom-select lg b-0 left-ico">
                                                <option value="">{{ $HomePageData->location_placeholder }}</option>
                                                @foreach ($JobLocations as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                              </select>
											<i class="bnc-ico lni lni-target"></i>
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
										<div class="form-group mb-0 position-relative">
                                            <select name="category" class="custom-select lg b-0 left-ico">
                                                <option value="">{{ $HomePageData->category_placeholder }}</option>
												@foreach ($JobCategoriesAll as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
												@endforeach
                                              </select>
                                              <i class="bnc-ico lni lni-funnel"></i>
										</div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
										<div class="form-group mb-0 position-relative">
											<button class="btn full-width custom-height-lg theme-bg text-white fs-md" type="submit">{{ $HomePageData->job_button }}</button>
										</div>
									</div>
								</div>
							</form>

							<div class="top-searches-key">
								<ul class="p-0 mt-4 align-items-center d-flex">
									<li><span class="text-dark ft-medium medium">Quick Search:</span></li>
									<li><a href="{{ route('job.search', ['jobs' => 'laravel']) }}" class="">Laravel</a></li>
									<li><a href="{{ route('job.search', ['jobs' => 'marketing']) }}" class="">Marketing</a></li>
									<li><a href="{{ route('job.search', ['jobs' => 'html']) }}" class="">HTML5</a></li>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Home Banner ======================== -->

			<!-- ======================= All category ======================== -->
			@if($HomePageData->job_category_status == 'Show')
			<section class="space">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">{{ $HomePageData->job_category_heading }}</h6>
								<h2 class="ft-bold">{!! $HomePageData->job_category_description !!}</h2>
							</div>
						</div>
					</div>

					<!-- row -->
					<div class="row align-items-center">
						@foreach($JobCategories as $item)
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
							<div class="cats-wrap text-center">
								<a href="{{ route('job.search','category'.'='. $item->id) }}" class="cats-box d-block rounded bg-white shadow px-2 py-4">
									<div class="text-center mb-2 mx-auto position-relative d-inline-flex align-items-center justify-content-center p-3 theme-bg-light circle"><i class="{{ $item->icon }} fs-lg theme-cl"></i></div>
									<div class="cats-box-caption">
										<h4 class="fs-md mb-0 ft-medium m-catrio">{{ $item->name }}</h4>
										<span class="text-muted">{{ $item->jobcatcount_count }} Jobs</span>
									</div>
								</a>
							</div>
						</div>
						@endforeach

					</div>
					<!-- /row -->

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="position-relative text-center">
								<a href="{{ route('category') }}" class="btn btn-md bg-dark rounded text-light hover-theme">Browse All Categories<i class="lni lni-arrow-right-circle ml-2"></i></a>
							</div>
						</div>
					</div>

				</div>
			</section>
			@endif
			<!-- ======================= All category ======================== -->

			<!-- ======================= Job List ======================== -->
			<section class="middle gray">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">Trending Jobs</h6>
								<h2 class="ft-bold">All Popular <span class="theme-cl">Listed jobs</span></h2>
							</div>
						</div>
					</div>

					<!-- row -->
					<div class="row align-items-center">
						@php
						if($boosted->count() > 0){
							$hirings[] = $boosted[0];
						}
						else{
							$hirings = $hiringss;
						}
						 //appending the boosted job to the hiring array
						//dd($hirings);
						$keys = iterator_to_array($hirings); //converting the array to keys
			
						shuffle($keys); //shuffling the array
			
						@endphp
						@foreach($keys as $hiring)
						<!-- Single -->
						
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 text-center">
							@if($hiring->isBoosted == 'yes')<sub class="text-center">-Advertisement-</sub>@endif
							<div class="job_grid rounded ">
								@if(!Auth::guard('employer')->check())
								<div class="position-absolute ab-left"><a href="{{ route('employee.job.bookmark', $hiring['id']) }}" class="p-3 border circle d-flex align-items-center justify-content-center bg-white text-gray"><i class="lni lni-heart-filled position-absolute snackbar-wishlist"></i></a></div>
								@endif
								<div class="position-absolute ab-right">@if($hiring->isBoosted == 'yes')<span class="medium color-gray theme-bg-light px-2 py-1 rounded"> AD @else <span class="medium theme-cl theme-bg-light px-2 py-1 rounded"> {{ $hiring->jobtype->name }}@endif</span></div>
								<div class="job_grid_thumb mb-3 pt-5 px-3">
									<a href="{{ route('jobs', $hiring->id) }}" class="d-block text-center m-auto"><img src="{{ asset('frontEndAssets/img').'/'. $hiring->jobemployers->logo }}" class="img-fluid" width="70" alt="" /></a>
								</div>
								<div class="job_grid_caption text-center pb-3 px-3">
									<h4 class="mb-0 ft-medium medium"><a href="{{ route('jobs', $hiring->id) }}" class="text-dark fs-md">{{ $hiring->title }}</a></h4>
									<div class="jbl_location"><i class="lni lni-map-marker mr-1"></i><span>{{ $hiring->joblocation->name }}</span></div>
								</div>
								<div class="job_grid_footer pt-2 pb-4 px-3 d-flex align-items-center justify-content-between">
									<div class="row">
										<div class="df-1 text-muted col-6 mb-2"><i class="lni lni-briefcase mr-1"></i>{{ $hiring->jobcategory->name }}</div>
										<div class="df-1 text-muted col-6 mb-2"><i class="lni lni-wallet mr-1"></i>{{ $hiring->salaryrange->name }} PA.</div>
										<div class="df-1 text-muted col-6"><i class="lni lni-users mr-1"></i>{{ $hiring->vacancies }} Vacancy</div>
										<div class="df-1 text-muted col-6"><i class="lni lni-timer mr-1"></i>{{ $hiring->created_at->diffForHumans() }}</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
					<!-- row -->

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="position-relative text-center">
								<a href="{{ route('job.search') }}" class="btn btn-md theme-bg rounded text-light hover-theme">Explore More Jobs<i class="lni lni-arrow-right-circle ml-2"></i></a>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ======================= Job List ======================== -->

			<!-- ============================ Our Partner Start ================================== -->
			<section class="bg-cover" style="background:#28b661 url(assets/img/curve.svg)no-repeat">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-7 col-md-9 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-light mb-0">Current Openings</h6>
								<h2 class="ft-bold text-light">We Have Worked with 10,000+ Trusted Companies</h2>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-xl-10 col-lg-11 col-md-12 col-sm-12">
							<div class="row justify-content-center">
								@foreach($employers as $employer)
								<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
									<div class="cats-wrap text-left">
										<a href="{{ route('employer.details', $employer->id) }}" class="cats-box rounded bg-white d-flex align-items-center px-2 py-3">
											<div class="text-center"><img src="{{ asset('frontEndAssets/img').'/'. $employer->logo }}" class="img-fluid" width="55" alt=""></div>
											<div class="cats-box-caption px-2">
												<h4 class="fs-md mb-0 ft-medium">{{ $employer->employer_name }}</h4>
												<span class="text-muted">{{ $employer->count_employer_count }} Jobs</span>
											</div>
										</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>

				</div>
				<div class="ht-50"></div>
			</section>
			<!-- ============================ Our Partner End ================================== -->

			<!-- ======================= Customer Review ======================== -->
			<section class="middle space min gray">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">Our Reviews</h6>
								<h2 class="ft-bold">What Our Customer <span class="theme-cl">Saying</span></h2>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
							<div class="reviews-slide px-3">
								@foreach($testimonials as $review)
								<!-- single review -->
								<div class="single_review">
									<div class="sng_rev_thumb"><figure><img src="{{ asset('frontEndAssets/img/'.$review->image) }}" class="img-fluid circle" alt="" /></figure></div>
									<div class="sng_rev_caption text-center">
										<div class="rev_desc mb-4">
											<p class="fs-md">{{ $review->testimonial }}</p>
										</div>
										<div class="rev_author">
											<h4 class="mb-0">{{ $review->name }}</h4>
											<span class="fs-sm">{{ $review->designation }}  {{ $review->company }}</span>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Customer Review ======================== -->

			<!-- ============================ Pricing Start ==================================== -->
			{{-- <section class="space min gray">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-7 col-md-9 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">Our Pricing</h6>
								<h2 class="ft-bold">Choose Your <span class="theme-cl">Package</span></h2>
							</div>
						</div>
					</div>

					<div class="row align-items-center">

						<!-- Single Package -->
						<div class="col-lg-4 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4 class="ft-medium">Basic</h4>
								</div>
								<div class="prt_price">
									<h2 class="ft-bold"><span>$</span>29</h2>
									<span class="fs-md">per user, per month</span>
								</div>
								<div class="prt_body">
									<ul>
										<li>99.5% Uptime Guarantee</li>
										<li>120GB CDN Bandwidth</li>
										<li>5GB Cloud Storage</li>
										<li class="none">Personal Help Support</li>
										<li class="none">Enterprise SLA</li>
									</ul>
								</div>
								<div class="prt_footer">
									<a href="#" class="btn choose_package">Start Basic</a>
								</div>
							</div>
						</div>

						<!-- Single Package -->
						<div class="col-lg-4 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<div class="recommended">Best Value</div>
									<h4 class="ft-medium">Standard</h4>
								</div>
								<div class="prt_price">
									<h2 class="ft-bold"><span>$</span>49</h2>
									<span class="fs-md">per user, per month</span>
								</div>
								<div class="prt_body">
									<ul>
										<li>99.5% Uptime Guarantee</li>
										<li>150GB CDN Bandwidth</li>
										<li>10GB Cloud Storage</li>
										<li>Personal Help Support</li>
										<li class="none">Enterprise SLA</li>
									</ul>
								</div>
								<div class="prt_footer">
									<a href="#" class="btn choose_package active">Start Standard</a>
								</div>
							</div>
						</div>

						<!-- Single Package -->
						<div class="col-lg-4 col-md-4">
							<div class="pricing_wrap">
								<div class="prt_head">
									<h4 class="ft-medium">Platinum</h4>
								</div>
								<div class="prt_price">
									<h2 class="ft-bold"><span>$</span>79</h2>
									<span class="fs-md">2 user, per month</span>
								</div>
								<div class="prt_body">
									<ul>
										<li>100% Uptime Guarantee</li>
										<li>200GB CDN Bandwidth</li>
										<li>20GB Cloud Storage</li>
										<li>Personal Help Support</li>
										<li>Enterprise SLA</li>
									</ul>
								</div>
								<div class="prt_footer">
									<a href="#" class="btn choose_package">Start Platinum</a>
								</div>
							</div>
						</div>

					</div>

				</div>
			</section> --}}
			<!-- ============================ Pricing End ==================================== -->

			<!-- ======================= Blog Start ============================ -->
			<section class="space min">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-4">
								<h6 class="text-muted mb-0">Latest News</h6>
								<h2 class="ft-bold">Pickup New <span class="theme-cl">Updates</span></h2>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">

						@foreach($postData as $item)
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="blg_grid_box">
								<div class="blg_grid_thumb">
									<a href="{{ route('post',$item->slug) }}"><img src="{{ asset('frontEndAssets/img/'.$item->image) }}" class="img-fluid" alt=""></a>
								</div>
								<div class="blg_grid_caption">
									<div class="blg_tag"><span>{{ $item->category }}</span></div>
									<div class="blg_title"><h4><a href="{{ route('post',$item->slug) }}">{{ $item->title }}</a></h4></div>
									<div class="blg_desc"><p>{{ htmlspecialchars(trim(strip_tags(Str::words($item->content,20)))) }}</p></div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
										<div class="crs_fl_first">
										</div>
										<div class="crs_fl_first">
											<div class="foot_list_info">
												<ul>
													<li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">{{ $item->view_count }} Views</div></li>
													<li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">{{ $item->created_at->format('d M Y') }}</div></li>
												</ul>
											</div>
										</div>
										<div class="crs_fl_last">
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach

					</div>

				</div>
			</section>
			<!-- ======================= Blog Start ============================ -->

			<!-- ======================= Newsletter Start ============================ -->
			<section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
				<div class="container py-5">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-light mb-0">Subscribe Now</h6>
								<h2 class="ft-bold text-light">Get All New Job Notification</h2>
							</div>
						</div>
					</div>

					<div class="row align-items-center justify-content-center">
						<div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
							<form class="bg-white rounded p-1">
								<div class="row no-gutters">
									<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
										<div class="form-group mb-0 position-relative">
											<input type="text" class="form-control lg left-ico" placeholder="Enter Your Email Address">
											<i class="bnc-ico lni lni-envelope"></i>
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
										<div class="form-group mb-0 position-relative">
											<button class="btn full-width custom-height-lg theme-bg text-light fs-md" type="button">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</section>
			<!-- ======================= Newsletter Start ============================ -->

			<!-- ============================ Footer Start ================================== -->
            @endsection
			