@php
    
        $listEducation =  App\Models\ResumeEducation::where('employee_id', Auth::guard('employee')->id())->orderBy('start_date', 'desc')->get();
        $listExperience = App\Models\ResumeExperience::where('employee_id', Auth::guard('employee')->id())->orderBy('start_date', 'desc')->get();
        $listSkill = App\Models\ResumeSkill::where('employee_id', Auth::guard('employee')->id())->get();
        $employeeData = App\Models\Employee::where('id', Auth::guard('employee')->id())->first();
@endphp
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Right Resume</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"
        media="print" onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
    </noscript>
    <link href="https://demo.templateflip.com/right-resume/css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link href="https://demo.templateflip.com/right-resume/css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
    <link href="https://demo.templateflip.com/right-resume/css/aos.css?ver=1.2.0" rel="stylesheet">
    <link href="https://demo.templateflip.com/right-resume/css/main.css?ver=1.2.0" rel="stylesheet">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
</head>

<body id="top">
        <div class="container">
            <div class="cover shadow-lg bg-white">
                <div class="cover-bg p-3 p-lg-4 text-white">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="avatar hover-effect bg-white shadow-sm p-1"><img src="{{ asset('frontEndAssets/img/'.Auth::guard('employee')->user()->photo) }}"
                                    width="200" height="200" /></div>
                        </div>
                        <div class="col-lg-8 col-md-7 text-center text-md-start">
                            <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">{{ $employeeData->firstname . ' ' . $employeeData->lastname }}</h2>
                            <p data-aos="fade-left" data-aos-delay="100">Graphic Designer & Web Developer</p>
                            <div class="d-print-none" data-aos="fade-left" data-aos-delay="200"></div>
                        </div>
                    </div>
                </div>
                <div class="about-section pt-4 px-3 px-lg-4 mt-1">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="h3 mb-3">About Me</h2>
                            <p>{{ $employeeData->bio }}</p>
                        </div>
                        <div class="col-md-5 offset-md-1">
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    <div class="pb-1">Age</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-1 text-secondary">{{ $employeeData->dateOfBirth }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="pb-1">Email</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-1 text-secondary">{{ $employeeData->email }}</a>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="pb-1">Phone</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-1 text-secondary">{{ $employeeData->number }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="pb-1">Address</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-1 text-secondary">{{ $employeeData->address }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <hr class="d-print-none" />
                <div class="work-experience-section px-3 px-lg-4">
                    <h2 class="h3 mb-4">Work Experience</h2>
                    <div class="timeline">
                        @foreach($listExperience as $experience)
                        <div class="timeline-card timeline-card-primary card shadow-sm">
                            <div class="card-body">
                                <div class="h5 mb-1">{{ $experience->designation }} <span class="text-muted h6">at {{ $experience->work_name }}</span></div>
                                <div class="text-muted text-small mb-2">{{ $experience->start_date }} - {{ $experience->end_date }}</div>
                                <div>{{ $experience->details }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr class="d-print-none" />
                <div class="page-break"></div>
                <div class="education-section px-3 px-lg-4 pb-4">
                    <h2 class="h3 mb-4">Education</h2>
                    <div class="timeline">
                        @foreach($listEducation as $education)
                        <div class="timeline-card timeline-card-success card shadow-sm">
                            <div class="card-body">
                                <div class="h5 mb-1">{{ $education->degree }} <span
                                        class="text-muted h6">from {{ $education->school_name }}</span></div>
                                <div class="text-muted text-small mb-2">{{ $education->start_date }} - {{ $education->end_date }}</div>
                                <div>{{ $education->details }}</div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    <script data-cfasync="false" src="https://demo.templateflip.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://demo.templateflip.com/right-resume/scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="https://demo.templateflip.com/right-resume/scripts/aos.js?ver=1.2.0"></script>
    <script src="https://demo.templateflip.com/right-resume/scripts/main.js?ver=1.2.0"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon='{"rayId":"7c240fde8ef19e7a","version":"2023.4.0","r":1,"token":"9b7e49e3e22049349b96a4d30f3c83ad","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>
