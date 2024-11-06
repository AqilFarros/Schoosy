<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/Logo.png') }}" type="image/x-icon">
    <!-- Remix Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('landing-page/style.css') }}">
    <title>Schoosy</title>
</head>

<body>
    <header id="navbar" class="bg-main-color fixed w-full top-0 left-0 z-50">
        <nav class="container flex items-center justify-between h-16 sm:h-20">
            <div class="font-TitanOne sm:text-2xl">
                <a href="/">Schoosy</a>
            </div>

            <div id="nav-menu"
                class="absolute top-0 left-[-100%] min-h-[80vh] w-full bg-main-color/80 backdrop-blur-sm flex items-center justify-center duration-300 overflow-hidden lg:static lg:min-h-fit lg:bg-transparent lg:w-auto">
                <ul class="flex flex-col items-center gap-8 lg:flex-row">
                    <li>
                        <a href="#home" class="nav-link active">Home</a>
                    </li>

                    <li>
                        <a href="#about" class="nav-link">About</a>
                    </li>

                    <li>
                        <a href="#developer" class="nav-link">Developer</a>
                    </li>

                    <li>
                        <a href="#review" class="nav-link">Review</a>
                    </li>

                    @guest
                        <div class="lg:hidden flex flex-col items-center gap-8">
                            <form action="{{ route('login') }}" method="get">
                                <button class="nav-link" type="submit">Sign In</button>
                            </form>
                            <form action="{{ route('register') }}" method="get">
                                <button
                                    class="bg-yellow-400 py-1 px-2 rounded-lg hover:text-main-color hover:bg-white hover:shadow-lg text-lg font-bold duration-300"
                                    type="submit">Sign
                                    Up</button>
                            </form>
                        </div>
                    @endguest
                </ul>
            </div>

            <div class="hidden lg:flex gap-4" style="align-items: center">
                @auth
                    <a href="{{ route('user.show', Auth::id()) }}">
                        <div class="pl-20 justify-start">
                            @if (empty(Auth::user()->image))
                                <img src="https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}"
                                    alt="profile_image"
                                    class="border-4 border-white hover:border-yellow-400 rounded-full h-12 cursor-pointer duration-300">
                            @else
                                <img src="{{ url('storage/profile/', Auth::user()->image) }}" alt="profile_image"
                                    class="border-4 border-white hover:border-yellow-400 rounded-full h-12 cursor-pointer duration-300">
                            @endif
                        </div>
                    </a>
                @endauth

                @guest
                    <form action="{{ route('login') }}" method="get">
                        <button class="nav-link" type="submit">Sign In</button>
                    </form>
                    <form action="{{ route('register') }}" method="get">
                        <button class="btn"><span>Sign Up</span></button>
                    </form>
                @endguest
            </div>

            <div class="text-xl sm:text-3xl cursor-pointer z-50 lg:hidden">
                <i class="ri-menu-4-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"
                    id="hamburger"></i>
            </div>
        </nav>
    </header>

    <main>
        <!-- Home -->
        <section id="home" class="relative">
            <div class="container">
                <div class="flex flex-col items-center gap-5 lg:flex-row">
                    <!-- content -->
                    <div class="home__data w-full space-y-5 lg:w-1/2">
                        <h1 class="font-Nunito">
                            <span class="text-yellow-400">School</span> build a learning <br> place that supports <span
                                class="text-yellow-400">students</span> best potential.
                        </h1>

                        <p class="text-slate-300">
                            The school is committed to creating an inspiring and supportive learning environment. With
                            adequate facilities and quality teaching, it strives to provide an enjoyable learning
                            experience for every student. Together, building a bright future!
                        </p>

                        <div class="font-Nunito flex flex-col gap-2 sm:flex-row md:gap-4 lg:pt-1 xl:pt-3">
                            <button class="btn">
                                @if (Auth::check())
                                    <a href="{{ route('user.show', Auth::id()) }}">
                                        <span>Get Started</span>
                                    </a>
                                @else
                                <a href="{{ route('login') }}">
                                    <span>Get Started</span>
                                </a>
                                @endif
                                <i class="ri-medal-fill"></i>
                            </button>

                            <button class="btn btn_outline">
                                <a href="#about">
                                    <span>Know More</span>
                                </a>
                                <i class="ri-arrow-right-circle-fill"></i>
                            </button>
                        </div>

                        <p class="text-xs text-slate-300">
                            You will get 30-days free trial.
                        </p>

                        <div class="flex items-center gap-5 text-lg lg:pt-3">
                            <i
                                class="ri-facebook-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                            <i
                                class="ri-twitter-x-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer text-base"></i>
                            <i
                                class="ri-instagram-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                            <i
                                class="ri-linkedin-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        </div>
                    </div>

                    <!-- image -->
                    <div class="w-full relative lg:w-1/2">
                        <img src="{{ asset('landing-page/asset/bg.png') }}" alt="home_image" class="home__image">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <div class="bg-white text-main-color py-20">
            <div class="service__top flex flex-col items-center gap-3 text-center mb-10 md:mb-20">
                <h2 class="title">Features</h2>
                <p class="max-w-2xl">Various features available</p>
            </div>

            <div class="container w-full grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <!-- card 1 -->
                <div
                    class="service__card border border-main-color p-5 cursor-pointer rounded-md hover:shadow-2xl hover:translate-y-1 duration-300 space-y-5">
                    <div class="flex items-center gap-5">
                        <i class="ri-book-2-fill text-3xl md:text-4xl xl:text-5xl"></i>
                        <p class="md:text-lg font-bold font-Nunito">Digital Library</p>
                    </div>
                    <p>Digital Library offers quick access to a wide range of books and resources, supporting learning
                        anytime, anywhere.</p>
                </div>

                <!-- card 2 -->
                <div
                    class="service__card border border-main-color p-5 cursor-pointer rounded-md hover:shadow-2xl hover:translate-y-1 duration-300 space-y-5">
                    <div class="flex items-center gap-5">
                        <i class="ri-account-box-fill text-3xl md:text-4xl xl:text-5xl"></i>
                        <p class="md:text-lg font-bold font-Nunito">Attendance Tracking</p>
                    </div>
                    <p>Attendance Tracking ensures accurate monitoring of student participation, making it easy to track
                        and manage attendance in real time.</p>
                </div>

                <!-- card 3 -->
                <div
                    class="service__card border border-main-color p-5 cursor-pointer rounded-md hover:shadow-2xl hover:translate-y-1 duration-300 space-y-5">
                    <div class="flex items-center gap-5">
                        <i class="ri-graduation-cap-fill text-3xl md:text-4xl xl:text-5xl"></i>
                        <p class="md:text-lg font-bold font-Nunito">Curriculum Management</p>
                    </div>
                    <p>Curriculum Management simplifies the organization and storage of course materials for quick
                        access and updates.</p>
                </div>

                <!-- card 4 -->
                <div
                    class="service__card border border-main-color p-5 cursor-pointer rounded-md hover:shadow-2xl hover:translate-y-1 duration-300 space-y-5">
                    <div class="flex items-center gap-5">
                        <i class="ri-community-fill text-3xl md:text-4xl xl:text-5xl"></i>
                        <p class="md:text-lg font-bold font-Nunito">Virtual Classroom</p>
                    </div>
                    <p>Virtual Classroom enables real-time interaction and engagement between teachers and students</p>
                </div>
            </div>
        </div>

        <!-- About Us -->
        <section id="about" class="relative overflow-hidden">
            <div class="about__top flex flex-col items-center gap-3 text-center mb-10 md:mb-20">
                <h2 class="title">About Us</h2>
                <p class="max-w-2xl">Follow instruction for more</p>
            </div>

            <div class="container space-y-10 xl:space-y-0">
                <!-- item 1 -->
                <div class="flex flex-col items-center lg:flex-row gap-5">
                    <!-- image -->
                    <div class="about__item__1-img w-full lg:w-1/2">
                        <img src="{{ asset('landing-page/asset/model1.png') }}" alt="about_image"
                            class="w-full sm:w-2/3 lg:w-full xl:w-2/3 mx-auto">
                    </div>

                    <!-- content -->
                    <div class="about__item__1-content w-full lg:w-1/2">
                        <div class="space-y-5">
                            <h3 class="font-Nunito">
                                Innovative <span class="text-yellow-400">School</span> <br> Platform
                            </h3>
                            <p class="to-slate-300">
                                Welcome to our innovative school platform, dedicated to creating an enriching learning
                                environment for students and teachers alike. Our mission is to provide seamless access
                                to virtual classrooms, a comprehensive digital library, efficient attendance tracking,
                                and effective curriculum management, all designed to foster academic excellence and
                                personal growth.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- item 2 -->
                <div class="flex flex-col items-center lg:flex-row-reverse gap-5">
                    <!-- image -->
                    <div class="about__item__2-img w-full lg:w-1/2">
                        <img src="{{ asset('landing-page/asset/model2.png') }}" alt="about_image"
                            class="w-full sm:w-2/3 lg:w-full xl:w-2/3 mx-auto">
                    </div>

                    <!-- content -->
                    <div class="about__item__2-content w-full lg:w-1/2">
                        <div class="space-y-5">
                            <h3 class="font-Nunito">
                                The Advantages of the <br> <span class="text-yellow-400">Education</span> Platform We
                                Developed
                            </h3>
                            <p class="to-slate-300">
                                At our school, we believe in harnessing technology to enhance education. Our platform
                                offers a cohesive ecosystem featuring interactive classrooms, a vast digital library,
                                precise attendance management, and streamlined curriculum oversight. We are committed to
                                empowering students and educators to achieve their fullest potential in a supportive and
                                engaging online environment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Developer -->
        <section id="developer" class="bg-secondary-color">
            <div class="developer__top flex flex-col items-center gap-3 text-center mb-40">
                <h2 class="title">Our Developer</h2>
                <p class="max-w-2xl">Talented team crafting exceptional websites</p>
            </div>

            <div
                class="container w-full grid grid-cols-1 gap-x-8 gap-y-36 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <!-- card 1 -->
                <div class="developer__card bg-main-color p-10 pt-24 rounded-md relative">
                    <img src="{{ asset('landing-page/asset/developer1.png') }}" alt="popular_image"
                        class="w-56 absolute rounded-full -top-5 left-1/2 transform -translate-x-1/2 -translate-y-1/2 duration-500">
                    <p class="italic">Backend Developer</p>
                    <h3>Aqil Farros Al Ghonim</h3>

                    <div class="flex items-center gap-5 text-2xl pt-10">
                        <i class="ri-facebook-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        <i
                            class="ri-twitter-x-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer text-base"></i>
                        <i
                            class="ri-instagram-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        <i class="ri-linkedin-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                    </div>

                </div>

                <!-- card 2 -->
                <div class="developer__card bg-main-color p-10 pt-24 rounded-md relative">
                    <img src="{{ asset('landing-page/asset/developer2.png') }}" alt="popular_image"
                        class="w-56 absolute rounded-full -top-5 left-1/2 transform -translate-x-1/2 -translate-y-1/2 duration-500">
                    <p class="italic">Frontend Developer</p>
                    <h3>Daud Tsaqiif Rahmadsyah</h3>

                    <div class="flex items-center gap-5 text-2xl pt-10">
                        <i class="ri-facebook-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        <i
                            class="ri-twitter-x-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer text-base"></i>
                        <i
                            class="ri-instagram-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        <i class="ri-linkedin-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                    </div>

                </div>

                <!-- card 3 -->
                <div class="developer__card bg-main-color p-10 pt-24 rounded-md relative">
                    <img src="{{ asset('landing-page/asset/developer3.png') }}" alt="popular_image"
                        class="w-56 absolute rounded-full -top-5 left-1/2 transform -translate-x-1/2 -translate-y-1/2 duration-500">
                    <p class="italic">Frontend Developer</p>
                    <h3>Muhammad Jahran</h3>

                    <div class="flex items-center gap-5 text-2xl pt-10">
                        <i class="ri-facebook-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        <i
                            class="ri-twitter-x-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer text-base"></i>
                        <i
                            class="ri-instagram-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        <i class="ri-linkedin-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                    </div>

                </div>
            </div>
        </section>

        <!-- Review -->
        <section id="review" class="relative mb-20 md:mb-28 overflow-hidden">
            <div class="review__top flex flex-col items-center gap-3 text-center mb-10 md:mb-20">
                <h2 class="title">Customer Review</h2>
                <p class="max-w-2xl">Valued feedback drives our improvement</p>
            </div>

            <div class="review__swipper container">
                <div class="swiper py-12">
                    <ul class="swiper-wrapper">
                        <!-- review 1 -->
                        <li class="swiper-slide">
                            <div class="flex flex-col gap-5 bg-secondary-color rounded-md p-6">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo modi quibusdam esse ex
                                    hic, dicta porro et?</p>
                                <div>
                                    <img src="{{ asset('landing-page/asset/review1.png') }}" alt="review_image"
                                        class="w-12 h-12 rounded-full">
                                    <div class="ml-2">
                                        <p class="font-Nunito text-yellow-400">Karim Adeyemi</p>
                                        <p>Principal School</p>
                                    </div>
                                    <i class="ri-double-quotes-r text-4xl ml-auto"></i>
                                </div>
                            </div>
                        </li>

                        <!-- review 2 -->
                        <li class="swiper-slide">
                            <div class="flex flex-col gap-5 bg-secondary-color rounded-md p-6">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo modi quibusdam esse ex
                                    hic, dicta porro et?</p>
                                <div>
                                    <img src="{{ asset('landing-page/asset/review2.png') }}" alt="review_image"
                                        class="w-12 h-12 rounded-full">
                                    <div class="ml-2">
                                        <p class="font-Nunito text-yellow-400">Karim Adeyemi</p>
                                        <p>Principal School</p>
                                    </div>
                                    <i class="ri-double-quotes-r text-4xl ml-auto"></i>
                                </div>
                            </div>
                        </li>

                        <!-- review 3 -->
                        <li class="swiper-slide">
                            <div class="flex flex-col gap-5 bg-secondary-color rounded-md p-6">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo modi quibusdam esse ex
                                    hic, dicta porro et?</p>
                                <div>
                                    <img src="{{ asset('landing-page/asset/review3.png') }}" alt="review_image"
                                        class="w-12 h-12 rounded-full">
                                    <div class="ml-2">
                                        <p class="font-Nunito text-yellow-400">Karim Adeyemi</p>
                                        <p>Principal School</p>
                                    </div>
                                    <i class="ri-double-quotes-r text-4xl ml-auto"></i>
                                </div>
                            </div>
                        </li>

                        <!-- review 4 -->
                        <li class="swiper-slide">
                            <div class="flex flex-col gap-5 bg-secondary-color rounded-md p-6">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo modi quibusdam esse ex
                                    hic, dicta porro et?</p>
                                <div>
                                    <img src="{{ asset('landing-page/asset/review4.png') }}" alt="review_image"
                                        class="w-12 h-12 rounded-full">
                                    <div class="ml-2">
                                        <p class="font-Nunito text-yellow-400">Karim Adeyemi</p>
                                        <p>Principal School</p>
                                    </div>
                                    <i class="ri-double-quotes-r text-4xl ml-auto"></i>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-yellow-100 text-secondary-color pt-20 pb-10 md:pt-28 relative">

        <!-- social icon -->
        <div class="footer__icon container mt-16 mb-10">
            <div class="border-b border-secondary-color relative">
                <div class="absolute top-0 transform -translate-y-1/2 left-0 right-0 max-w-36 mx-auto">
                    <div class="bg-yellow-100 text-lg text-center space-x-2">
                        <i class="ri-facebook-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        <i
                            class="ri-twitter-x-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer text-base"></i>
                        <i
                            class="ri-instagram-line to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                        <i class="ri-linkedin-fill to-slate-300 hover:text-yellow-400 duration-300 cursor-pointer"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- content -->
        <div
            class="footer__content container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 text-center md:text-start">
            <!-- item 1 -->
            <div>
                <div class="text-7xl text-secondary-color text-center inline-block">
                    <i class="ri-school-fill"></i>
                    <p class="font-TitanOne text-xl sm:text-2xl">Schoosy</p>
                </div>
            </div>

            <!-- item 2 -->
            <div>
                <p class="mb-5 font-bold text-xl">Quick Link</p>

                <div class="flex flex-col gap-1">
                    <a href="#">Plants</a>
                    <a href="#">Flowers</a>
                    <a href="#">Gerdening</a>
                    <a href="#">Seeds</a>
                    <a href="#">Shipping</a>
                </div>
            </div>

            <!-- item 3 -->
            <div>
                <p class="mb-5 font-bold text-xl">Popular Services</p>

                <div class="flex flex-col gap-1">
                    <a href="#">Tree Planting</a>
                    <a href="#">Grass Cutting</a>
                    <a href="#">Weeds Control</a>
                    <a href="#">Project</a>
                </div>
            </div>

            <!-- item 4 -->
            <div>
                <p class="mb-5 font-bold text-xl">Contact Us</p>

                <div class="flex flex-col gap-1">
                    <a href="tel:+6283893078704">+62 838 9307 8704</a>
                    <a href="mailto:schoosy@gmail.com">schoosy@gmail.com</a>
                    <br>
                    <p>Karang Tengah, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810</p>
                </div>
            </div>
        </div>

        <!-- copyright -->
        <div class="copy__right container">
            <p class="text-center mt-10 opacity-50">Copyright &copy; 2024 Schoosy. All right reserved.</p>
        </div>
    </footer>

    <!-- Scroll Up -->
    <a href="#"
        class="fixed right-4 -bottom-1/2 bg-yellow-400 shadow-sm inline-block px-3 py-1 md:px-4 md:py-2 rounded-md text-lg z-50 hover:-translate-y-1 duration-300"
        id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Scroll Reveal JS -->
    <script src="{{ asset('landing-page/scrollreveal.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('landing-page/main.js') }}"></script>
</body>

</html>
