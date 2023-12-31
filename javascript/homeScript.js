
// Sections navbar
$("#sectionsNavbar button").click(() => {
    $("#sectionsNavbar").toggleClass("-translate-x-full");
    $("#sectionsNavbar button svg").toggleClass("rotate-90");
    $(".scrollDownToSection").click(() => {
        $("#sectionsNavbar button svg").toggleClass("rotate-90");
        $('#sectionsNavbar').addClass('-translate-x-full');
    });
})

/*** Hero section ***/
let slides = Array.from(document.querySelectorAll(".slide"));
let slidesBtns = Array.from(document.querySelectorAll(".slideBtn"));
let searchBtn = document.querySelector(".searchBtn");
let searchInput = document.querySelector(".search-input");
let title = document.querySelector(".title-font");
let slidesColors = ["custom-green-", "amber-400", "fuchsia-700", "violet-900", "red-800"];

// auto Slide
let slide = () => {
    let nextSlideIndex;
    setInterval(() => {
        for (let i = 0; i < slides.length; i++) {
            if (slides[i].classList.contains("active-slide")) {
                slides[i].classList.replace('active-slide', 'hidden');
                slidesBtns[i].classList.replace(`bg-${slidesColors[i]}`, 'bg-gray-300');
                i === slides.length - 1 ? nextSlideIndex = 0 : nextSlideIndex = i + 1;
                slides[nextSlideIndex].classList.replace('hidden', 'active-slide');
                slidesBtns[nextSlideIndex].classList.replace("bg-gray-300", `bg-${slidesColors[nextSlideIndex]}`);
                title.classList.replace(`text-${slidesColors[i]}`, `text-${slidesColors[nextSlideIndex]}`);
                searchBtn.classList.replace(`bg-${slidesColors[i]}`, `bg-${slidesColors[nextSlideIndex]}`);
                searchInput.classList.replace(`border-${slidesColors[i]}`, `border-${slidesColors[nextSlideIndex]}`);
                break;
            }
        }
    }, 3000);
}
slide();

/*** Categories section ***/
let categoriesInfos = [
    {
        id: 1,
        imgURL: "../images/categories/cat1.webp",
     },

    {
        id: 2,
        imgURL: "../images/categories/cat2.webp",
     },


    {
        id: 3,
        imgURL: "../images/categories/cat3.webp",
     },

    {
        id: 4,
        imgURL: "../images/categories/cat4.webp",
     },

    {
        id: 5,
        imgURL: "../images/categories/cat5.webp",
     },

    {
        id: 6,
        imgURL: "../images/categories/cat6.webp",
     },

    {
        id: 7,
        imgURL: "../images/categories/cat7.webp",
     },

    {
        id: 8,
        imgURL: "../images/categories/cat8.webp",
     },

    {
        id: 9,
        imgURL: "../images/categories/cat9.webp",
     },

    {
        id: 10,
        imgURL: "../images/categories/cat10.webp",
     },

    {
        id: 11,
        imgURL: "../images/categories/cat11.webp",
     },

    {
        id: 12,
        imgURL: "../images/categories/cat12.webp",
     },

    {
        id: 13,
        imgURL: "../images/categories/cat13.webp",
     }
]
let categoriesCards = document.querySelectorAll('.categories-section .category-card');

let makeCategoriesCards = (infos) => {
    let i = 0;
    categoriesCards.forEach(card => {
        card.style.backgroundImage = `url("${infos[i].imgURL}")`;
        
        i++;
    })
}
makeCategoriesCards(categoriesInfos);


/*** Freelancers section ***/
let freelancersInfos = [
    {
        id: 1,
        imgURL: "../images/freelancers/ayman.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 2,
        imgURL: "../images/freelancers/smail.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 3,
        imgURL: "../images/sliders/slide4/cardAbdelghani.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 2973,
        specialities: ["Figma design", "laravel dev", "React developement"],
        projectsNumber: 1574,
        
    },
    {
        id: 4,
        imgURL: "../images/sliders/slide3/cardYassine.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 5,
        imgURL: "../images/sliders/slide2/cardMiessal.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 6,
        imgURL: "../images/sliders/slide1/cardNada.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 7,
        imgURL: "../images/sliders/slide5/cardtergui.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 8,
        imgURL: "../images/freelancers/zehra.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 9,
        imgURL: "../images/freelancers/bolbola.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 10,
        imgURL: "../images/freelancers/elaarab.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 11,
        imgURL: "../images/freelancers/elkhaili.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 12,
        imgURL: "../images/freelancers/elmorjani.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 13,
        imgURL: "../images/freelancers/ghofran.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 14,
        imgURL: "../images/freelancers/lhcen.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 15,
        imgURL: "../images/freelancers/li9ama.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 16,
        imgURL: "../images/freelancers/ossama.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 17,
        imgURL: "../images/freelancers/soulaiman.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 18,
        imgURL: "../images/freelancers/waheli.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 19,
        imgURL: "../images/freelancers/wissal.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 20,
        imgURL: "../images/freelancers/yassin.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 21,
        imgURL: "../images/freelancers/yassirAit.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 22,
        imgURL: "../images/freelancers/zaid.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 23,
        imgURL: "../images/freelancers/bilal.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
    {
        id: 24,
        imgURL: "../images/freelancers/adnan.jpg",
        countryFlag: "../images/moroccoFlag.png",
        country: "Morocco",
        rating: 4.9,
        reviews: 1142,
        specialities: ["link building", "google ranking", "google search"],
        projectsNumber: 1774,
        
    },
]
let freelancersCards = document.querySelectorAll('.freelancers-section .freelancer-card');

let makeFreelancersCards = (infos) => {
    let i = 0;
    freelancersCards.forEach((card) => {
        card.querySelector('.photo').setAttribute("src", infos[i].imgURL);
        card.querySelector('.country-flag').setAttribute("src", infos[i].countryFlag);
        card.querySelector('.country').textContent = infos[i].country;
        card.querySelector('.rating').textContent = infos[i].rating;
        card.querySelector('.reviews').textContent = infos[i].reviews;
        infos[i].specialities.forEach(speciality => {
            let link = document.createElement('a');
            link.setAttribute("class", "px-1.5 py-1 m-0.5 text-sm bg-gray-100 rounded-md");
            link.setAttribute('href', "#");
            link.textContent = speciality;
            card.querySelector('.specialities').insertBefore(link, card.querySelector(".specialities").firstChild);
        })
        card.querySelector('.projects').textContent = infos[i].projectsNumber + " projects";
        i++
    })
}
makeFreelancersCards(freelancersInfos);


/*** Offers section ***/
let offersInfos = [
    {
        id: 1,
        imgURL: "../images/offers/offer1.png",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/ayman.jpg",
        freelancerName: "Ayman B.",
        rating: 4.9,
        reviews: 2723,
        price: 205,
        dileveredDays: 5
    },
    {
        id: 2,
        imgURL: "../images/offers/offer2.png",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/sliders/slide4/cardAbdelghani.jpg",
        freelancerName: "Abdelghani A.",
        rating: 4.9,
        reviews: 1723,
        price: 500,
        dileveredDays: 4
    },
    {
        id: 3,
        imgURL: "../images/offers/offer3.jpg",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/lhcen.jpg",
        freelancerName: "Lahcen B.",
        rating: 4.9,
        reviews: 1723,
        price: 105,
        dileveredDays: 5
    },
    {
        id: 4,
        imgURL: "../images/offers/offer4.jpg",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/waheli.jpg",
        freelancerName: "Waheli B.",
        rating: 4.9,
        reviews: 1723,
        price: 105,
        dileveredDays: 5
    },
    {
        id: 5,
        imgURL: "../images/offers/offer5.jpg",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/zehra.jpg",
        freelancerName: "Zehra El.",
        rating: 4.9,
        reviews: 1723,
        price: 105,
        dileveredDays: 5
    },
    {
        id: 6,
        imgURL: "../images/offers/offer6.jpg",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/zaid.jpg",
        freelancerName: "Zaid B.",
        rating: 4.9,
        reviews: 1723,
        price: 105,
        dileveredDays: 5
    },
    {
        id: 7,
        imgURL: "../images/offers/offer7.jpg",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/yassin.jpg",
        freelancerName: "Yassin B.",
        rating: 4.9,
        reviews: 1723,
        price: 105,
        dileveredDays: 5
    },
    {
        id: 8,
        imgURL: "../images/offers/offer8.jpg",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/wissal.jpg",
        freelancerName: "Wissal B.",
        rating: 4.9,
        reviews: 1723,
        price: 105,
        dileveredDays: 5
    },
    {
        id: 9,
        imgURL: "../images/offers/offer9.jpg",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/zindihi.jpg",
        freelancerName: "Zindihi B.",
        rating: 4.9,
        reviews: 1723,
        price: 105,
        dileveredDays: 5
    },
    {
        id: 10,
        imgURL: "../images/offers/offer10.jpg",
        specialities: ["web developement", "logo design", "design"],
        freelancerPhoto: "../images/freelancers/ghofran.jpg",
        freelancerName: "Mohamed G.",
        rating: 4.9,
        reviews: 1723,
        price: 105,
        dileveredDays: 5
    },
]
let offersCards = document.querySelectorAll(".offers-section .offer-card");

let makeOffersCards = (infos) => {
    let i=0;
    offersCards.forEach(card => {
        card.querySelector(".photo").style.backgroundImage = `url("${infos[i].imgURL}")`;
        infos[i].specialities.forEach(speciality => {
            let link = document.createElement('a');
            link.setAttribute("class", "px-1.5 py-1 m-0.5 text-sm bg-gray-100 rounded-md");
            link.setAttribute('href', "#");
            link.textContent = speciality;
            card.querySelector('.specialities').insertBefore(link, card.querySelector(".specialities").firstChild);
        })
        card.querySelector(".freelancer-photo").setAttribute("src", infos[i].freelancerPhoto);
        card.querySelector(".freelancer-name").textContent = infos[i].freelancerName;
        card.querySelector(".rating").textContent = infos[i].rating;
        card.querySelector(".reviews").textContent = infos[i].reviews;
        card.querySelector(".price").textContent = `$${infos[i].price}`;
        card.querySelector(".dilevered-days").textContent = `dilevered in ${infos[i].dileveredDays} days`;
        i++;
    })
}
makeOffersCards(offersInfos);


$(document).ready(() => {
    // Categories section

    let categoriesScrollStep;
    if (window.innerWidth > 1023) {
        categoriesScrollStep = ($(".categories-section .carousal ul")[0].offsetWidth / 6) * 5 + 60;
    } else if (window.innerWidth > 767) {
        categoriesScrollStep = ($(".categories-section .carousal ul")[0].offsetWidth / 5) * 4 + 24;
    } else {
        categoriesScrollStep = ($(".categories-section .carousal ul")[0].offsetWidth / 4) * 3 + 12;
    }

    $(".categories-btns .scroll-left").click(() => {
        $(".categories-section .carousal ul").animate({
            scrollLeft: `+=${categoriesScrollStep}`
        }, 700, () => {
            let maxScrollLeft = $(".categories-section .carousal ul")[0].scrollWidth - $(".categories-section .carousal ul").width();
            $(".categories-section .carousal ul").scrollLeft() >= maxScrollLeft - 5 ? $(".categories-btns .scroll-left").prop("disabled", true) : $(".categories-btns .scroll-right").prop("disabled", false)
        });
    });

    $(".categories-btns .scroll-right").click(() => {
        $(".categories-section .carousal ul").animate({
            scrollLeft: `-=${categoriesScrollStep}`
        }, 700, () => {
            $(".categories-section .carousal ul").scrollLeft() <= 5 ? $(".categories-btns .scroll-right").prop("disabled", true) : $(".categories-btns .scroll-left").prop("disabled", false)
        });
    });

    // Freelancers section
    var maxHeight = 0;
    $('.freelancer-card').each(function () {
        var cardHeight = $(this).height();
        maxHeight = Math.max(maxHeight, cardHeight);
    });

    // Set all cards to the maximum height
    $('.freelancer-card').css('height', maxHeight + 'px');

    let freelancersScrollStep;
    if (window.innerWidth > 1023) {
        freelancersScrollStep = ($(".freelancers-section .carousal ul")[0].offsetWidth / 5) * 4 + 32;
    } else if (window.innerWidth > 767) {
        freelancersScrollStep = ($(".freelancers-section .carousal ul")[0].offsetWidth / 5) * 4 + 16;
    } else {
        freelancersScrollStep = ($(".freelancers-section .carousal ul")[0].offsetWidth / 4) * 3 + 8;
    }

    $(".freelancers-btns .scroll-left").click(() => {
        $(".freelancers-section .carousal ul").animate({
            scrollLeft: `+=${freelancersScrollStep}`
        }, 700, () => {
            let maxScrollLeft = $(".freelancers-section .carousal ul")[0].scrollWidth - $(".freelancers-section .carousal ul").width();
            $(".freelancers-section .carousal ul").scrollLeft() >= maxScrollLeft - 5 ? $(".freelancers-btns .scroll-left").prop("disabled", true) : $(".freelancers-btns .scroll-right").prop("disabled", false)
        });
    });

    $(".freelancers-btns .scroll-right").click(() => {
        $(".freelancers-section .carousal ul").animate({
            scrollLeft: `-=${freelancersScrollStep}`
        }, 700, () => {
            $(".freelancers-section .carousal ul").scrollLeft() <= 5 ? $(".freelancers-btns .scroll-right").prop("disabled", true) : $(".freelancers-btns .scroll-left").prop("disabled", false)
        });
    });

    // Offers section
    let offersScrollStep;
    if (window.innerWidth > 1023) {
        offersScrollStep = 912;
    } else if (window.innerWidth > 767) {
        offersScrollStep = ($(".offers-section .carousal ul")[0].offsetWidth / 5) * 4 + 32;
    } else {
        offersScrollStep = ($(".offers-section .carousal ul")[0].offsetWidth / 5) * 4 + 16;
    }

    $(".offers-btns .scroll-left").click(() => {
        $(".offers-section .carousal ul").animate({
            scrollLeft: `+=${offersScrollStep}`
        }, 700, () => {
            let maxScrollLeft = $(".offers-section .carousal ul")[0].scrollWidth - $(".offers-section .carousal ul").width();
            $(".offers-section .carousal ul").scrollLeft() >= maxScrollLeft - 5 ? $(".offers-btns .scroll-left").prop("disabled", true) : $(".offers-btns .scroll-right").prop("disabled", false)
        });
    });

    $(".offers-btns .scroll-right").click(() => {
        $(".offers-section .carousal ul").animate({
            scrollLeft: `-=${offersScrollStep}`
        }, 700, () => {
            $(".offers-section .carousal ul").scrollLeft() <= 5 ? $(".offers-btns .scroll-right").prop("disabled", true) : $(".offers-btns .scroll-left").prop("disabled", false)
        });
    });
})

var swiper = new Swiper(".mySwiper", {
    spaceBetween: 40,
    centeredSlides: true,
    autoplay: {
      delay: 3000,
    }
});