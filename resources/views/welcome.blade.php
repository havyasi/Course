<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontdev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />    
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="asatu">Frontdev</a>
            <a href="#" class="asatu"></a>
            <a href="{{ route('login') }}" class="btn-nav">
                <button class="btn-van" id="btn-satu">Sign In</button>
            </a>
            <a href="{{ route('register') }}" class="btn-nav">
                <button class="btn-van" id="btn-dua">Sign Up</button>
            </a>
        </div>
    </nav>

    <section class="hero1">
        <div class="welcome-word">
            <h1 class="title" style="font-size: 50px;">Tingkatkan Keterampilan <br> Anda dengan <br> Kursus yang Berkualitas</h1>
        </div>
    </section>

    <section class="hero2">
        <div class="row" id="gallery">
            <div class="col">
                <img src="{{ asset('img/sayur1.jpg') }}" alt="">
                <div class="info">
                    <h1>FrontEnd</h1>
                    <a href="https://id.wikipedia.org/wiki/Cabai" target="_blank">- More Info -</a>
                </div> 
            </div>
            <div class="col">
                <img src="{{ asset('img/sayur2.jpg') }}" alt="">
                <div class="info">
                    <h1>BackEnd</h1>
                    <a href="https://id.wikipedia.org/wiki/Tomat" target="_blank">- More Info -</a>
                </div>
            </div>
            <div class="col">
                <img src="{{ asset('img/sayur3.jpg') }}" alt="">
                <div class="info">
                    <h1>UI/UX Designer</h1>
                    <a href="https://id.wikipedia.org/wiki/Wortel" target="_blank">- More Info -</a>
                </div>
            </div>
            <div class="col">
                <img src="{{ asset('img/sayur4.jpg') }}" alt="">
                <div class="info">
                    <h1>Database Analyst</h1>
                    <a href="https://id.wikipedia.org/wiki/Kubis" target="_blank">- More Info -</a>
                </div>
            </div>
        </div>
    </section>

    <section class="hero3">
        <div class="hero-child">
            <div class="fill-one">
                <div class="one-one">
                    <p>Creative <br> Learning <br> Made Easy</p>
                </div>
                <div class="one-two">
                    <p><i class='bx bx-checkbox-checked'></i>Thousands of creative classes. Friendly for beginners.</p>
                    <p><i class='bx bx-checkbox-checked'></i>Learning Paths to help you achieve your goals.</p>
                    <p><i class='bx bx-checkbox-checked'></i>Simple methods that make you easy to learn</p>
                </div>
            </div>
            <div class="fill-two">
                <div class="two-one">
                    <p id="pesatu">Creative</p>
                    <p>CLASSES</p>
                </div>
                <div class="two-two">
                    <p id="petu">Trusted</p>
                    <p>CLASSES</p>
                </div>
                <div class="two-three">
                    <p id="petiga">Attractive</p>
                    <p>CLASSES</p>
                </div>
            </div>
        </div>
    </section>

    <section class="hero4">
        <div class="head-four">
            <h1>What Can I do <br> in Here?</h1>
            <p>From beginner to expert and beyond...</p>
        </div>
        <div class="fill-up">
            <div class="card-up">
                <!-- Content here -->
            </div>
        </div>
        <div class="fill-mid">
            <div class="card-mid">
                <!-- Content here -->
            </div>
            <div class="card-mid">
                <!-- Content here -->
            </div>
        </div>
        <div class="fill-bottom">
            <div class="card-bottom">
                <!-- Content here -->
            </div>
        </div>
    </section>

    <section class="hero5">
        <div class="five-head">
            <h3>Frequently Asked Questions</h3>
        </div>
        <div class="five-body">
            <div class="body-fill">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <button class="faq-title">
                        What is Frontdev? 
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4 4-4"/>
                        </svg>
                    </button>
                    <div class="faq-content">
                        <p>Frontdev is an online learning platform focused on frontend development courses.</p>
                    </div>
                </div>
    
                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <button class="faq-title">
                        What courses are available on Frontdev?
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4 4-4"/>
                        </svg>
                    </button>
                    <div class="faq-content">
                        <p>We offer courses on HTML, CSS, JavaScript, React, Vue, and many more frontend technologies.</p>
                    </div>
                </div>
    
                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <button class="faq-title">
                        How can I enroll in a course?
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4 4-4"/>
                        </svg>
                    </button>
                    <div class="faq-content">
                        <p>Simply sign up for an account, browse our courses, and click the enroll button on the course page.</p>
                    </div>
                </div>
    
                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <button class="faq-title">
                        Are there any prerequisites for the courses?
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4 4-4"/>
                        </svg>
                    </button>
                    <div class="faq-content">
                        <p>Some courses may have prerequisites, which will be listed on the course page. Many beginner courses require no prior knowledge.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hero6">
        <div class="foot-up">
            <div class="up-start">
                <img src="#" alt="logos">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis aliquid suscipit, blanditiis distinctio earum culpa at repellat ullam id esse voluptas numquam officia voluptate quod alias repudiandae! Eius, obcaecati porro?</p>
            </div>
            <div class="up-child">
                <div class="up-one">
                    <p id="one-head">Company</p>
                    <p>About</p>
                    <p>Docs</p>
                </div>
                <div class="up-one">
                    <p id="one-head">Help and Support</p>
                    <p>Contact Us</p>
                </div>
                <div class="up-one">
                    <p id="one-head">Teaching</p>
                    <p>Become a Teacher</p>
                    <p>Teacher Rules & Requirements</p>
                </div>
            </div>
        </div>

        <div class="GeneralHeading__Line"></div>

        <div class="foot-last">
            <p>2024 Frontdev. All rights reserved. <a href="https://policies.google.com/terms">Terms</a> | <a href="https://policies.google.com/privacy">Privacy</a></p>
        </div>
    </section>

    <script src="{{ asset('javascript/index.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>