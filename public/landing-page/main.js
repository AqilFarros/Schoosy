// Toggle Button
const navMenu = document.getElementById("nav-menu")
const navLink = document.querySelectorAll(".nav-link")
const hamburger = document.getElementById("hamburger")

hamburger.addEventListener("click", () => {
    navMenu.classList.toggle("left-[0]")
    hamburger.classList.toggle("ri-close-large-line")
})

navLink.forEach(link => {
    link.addEventListener("click", () => {
        navMenu.classList.toggle("left-[0]")
        hamburger.classList.toggle("ri-close-large-line")
    })
})

// Swiper
const swiper = new Swiper('.swiper', {
    // Optional parameters
    speed: 400,
    spaceBetween: 30,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false
    },

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    grabCursor: true,
    breakpoints: {
        640: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        },
    }
});

// Show Scroll Up 
const scrollUp = () => {
    const scrollUpBtn = document.getElementById("scroll-up")

    if (this.scrollY >= 250) {
        scrollUpBtn.classList.remove("-bottom-1/2")
        scrollUpBtn.classList.add("bottom-4")
    } else {
        scrollUpBtn.classList.add("-bottom-1/2")
        scrollUpBtn.classList.remove("bottom-4")
    }
}

window.addEventListener("scroll", scrollUp)

// Change Background Header
const scrollHeader = () => {
    const header = document.getElementById("navbar")

    if (this.scrollY >= 50) {
        header.classList.add("border-b", "border-yellow-400")
    } else {
        header.classList.remove("border-b", "border-yellow-400")
    }
}

window.addEventListener("scroll", scrollHeader)

// Scroll Sections Active Link
const activeLink = () => {
    const sections = document.querySelectorAll('section')
    const navLinks = document.querySelectorAll('.nav-link')

    let current = "home"

    sections.forEach(section => {
        const sectionTop = section.offsetTop;

        if (this.scrollY >= sectionTop - 60) {
            current = section.getAttribute("id")
        }
    })

    navLinks.forEach(item => {
        item.classList.remove("active")

        if (item.href.includes(current)) {
            item.classList.add("active")
        }
    })
}

window.addEventListener("scroll", activeLink)

// Scroll Reveal Animation
const sr = ScrollReveal({
    origin: "top",
    distance: "60px",
    duration: 2500,
    delay: 300,
    reset: true
})

sr.reveal('.home__data, .service__top, .about__top, .developer__top, .review__top, .review__swipper, .footer__icon, .footer__content, .copy__right')
sr.reveal('.home__image', {
    delay: 500,
    scale: .5
})

sr.reveal('.service__card, .developer__card', {
    interval: 100
})

sr.reveal('.about__item__1-content, .about__item__2-img', {
    origin: "right"
})
sr.reveal('.about__item__2-content, .about__item__1-img', {
    origin: "left"
})