@extends('base')

@section('title', 'Home')

@push('css')
    <style>
        body {
            background-color:#c799ff;
            background-image:
                radial-gradient(at 80% 82%, hsla(233,67%,69%,1) 0px, transparent 50%),
                radial-gradient(at 5% 25%, hsla(201,62%,65%,1) 0px, transparent 50%),
                radial-gradient(at 26% 73%, hsla(238,65%,69%,1) 0px, transparent 50%),
                radial-gradient(at 10% 50%, hsla(321,93%,67%,1) 0px, transparent 50%),
                radial-gradient(at 9% 54%, hsla(304,71%,66%,1) 0px, transparent 50%),
                radial-gradient(at 14% 20%, hsla(203,73%,65%,1) 0px, transparent 50%),
                radial-gradient(at 8% 54%, hsla(358,60%,68%,1) 0px, transparent 50%);
        }
        .bg-glass {
            background-color: rgba(255, 255, 255, 0.37);
            backdrop-filter: blur(5px);
        }
        /* width */
        ::-webkit-scrollbar {
        width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #e4e4e4;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #dad5d5;
        }
    </style>
@endpush

@section('body')

<div class="container vh-100 text-white">
    <div class="row justify-content-center align-items-center h-100">
        <div class="bg-glass p-5 rounded text-black h-75 overflow-auto">
            <div class="my-2 d-flex gap-5">
                <div>
                    <img src="https://res.cloudinary.com/dokar/image/upload/v1685972922/1603289912732_idqvju.jpg" alt="" height="150" width="150" class="rounded-circle">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h2>Aldi Wirawan</h2>
                    <p class="mb-0">Fullstack Developer</p>
                    <p class="mb-0">Kediri, East Java, Indonesia</p>
                    <div class="d-flex">
                        <a href="https://www.linkedin.com/in/aldiwirawan/" class="btn btn-link"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <h3>About Me</h3>
            <span>
                As a Full-stack developer, I've experience with many cases of changing an idea to implement as an
                integrated system and maintaining systems like e-commerce and enterprise internal applications using a
                framework like Express.js (Node.js), Django (Python), Laravel, and Codeigniter. I am specialized in web and
                app development (mostly backend and/or full-stack), with a focus on PHP, Javascript, and Python where I
                have a lot of experience.
            </span>
            <hr>
            <div>
                <h3>Education</h3>
                <div class="mt-3">
                    <h4>State Polytechnic of Malang</h4>
                    <h5>Malang, Indonesia</h5>
                    <p class="mb-0">Associate's degree, Information Technology</p>
                    <p class="mb-0">August 2018 - November 2021</p>
                </div>
            </div>
            <hr>
            <div>
                <h3>Work Experience</h3>
                <div class="mt-3 d-flex flex-column gap-2">
                    <div>
                        <h4>Backend Developer</h4>
                        <h5>PT. Solusi Digital Industri</h5>
                        <p class="mb-0">Yogyakarta, Indonesia</p>
                        <p class="mb-0">August 2022 - Present</p>
                        <ul>
                            <li>Creating and Developing a REST API for client applications mostly using Laravel, Codeigniter, Node.js,
                                Express.js, and Django</li>
                            <li>Creating and Developing a CMS Web Application to manage data (Admin Side) for client applications</li>
                            <li>Collaborating with QA Team to debug and troubleshoot application</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Fullstack Developer Freelance</h4>
                        <h5>Self Employee</h5>
                        <p class="mb-0">Kediri, Indonesia</p>
                        <p class="mb-0">January 2020 - Present</p>
                        <ul>
                            <li>Creating and building a web application based on client requirements using framework stacks like Laravel, Codeigniter, Node.js, Express.js, React.js, Vue.js, Django (Python), and Flask (Python)</li>
                            <li>Creating and building a web application with AI Integration (Mostly using Fuzzy, WUP similarity,﻿and Named Entity Recognition (NER)) based on client requirement</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Fullstack Developer</h4>
                        <h5>PT. Generasi Baru Digital (Ngopibareng.id)</h5>
                        <p class="mb-0">Surabaya, Indonesia</p>
                        <p class="mb-0">December 2021 - August 2022</p>
                        <ul>
                            <li>Developing and Managing Ngopibareng.id website using Laravel as backend framework and Vue.js as frontend framework</li>
                            <li>Maintaining and creating new updates for Ngopibareng.id website</li>
                            <li>Creating and developing an e-commerce website for Sarung Mangga using Laravel as backend framework and Vue.js as frontend framework</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Backend Developer Intern</h4>
                        <h5>Nakula Sadewa</h5>
                        <p class="mb-0">Malang, Indonesia</p>
                        <p class="mb-0">January 2021 - February 2021</p>
                        <ul>
                            <li>Creating and developing a new web application for managing company inventory using Codeigniter Web Framework</li>
                            <li>Manage a system database for the company inventory web application</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

@endsection
