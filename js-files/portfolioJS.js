/* 
Portfolio javascript
*/
// mobile nav animations
let hamburgerMenu = document.querySelector("div.hamburger");
let hamburgerBars = document.querySelectorAll("div.hamburger span");
let navList = document.querySelector("nav ul");

hamburgerMenu.onclick = () => {
    hamburgerBars[0].classList.toggle("bar1-rotate");
    hamburgerBars[1].classList.toggle("bar2-fade");
    hamburgerBars[2].classList.toggle("bar3-rotate");

    navList.classList.toggle("drop-menu");
}

// observer for first level of sections 
let infoSections = document.querySelectorAll("body > section");

let sectionObserver = new IntersectionObserver((sections) => {
    sections.forEach((section) => {
        if (section.isIntersecting) {
            section.target.classList.add("reveal-section");
        } else {
            section.target.classList.remove("reveal-section");
        }
    });
});

infoSections.forEach((section) => sectionObserver.observe(section));

// observers for section 1 animations
let introSectionDivs = document.querySelectorAll("section.intro > div");
let skillGauges = document.querySelectorAll("section.intro div.skill-gauges span");

let introDivObserver = new IntersectionObserver ((divs) => {
    divs.forEach((div) => {
        if (div.isIntersecting) {
            div.target.classList.add("slide-down");
        } else {
            div.target.classList.remove("slide-down");
        }
    });
});
introSectionDivs.forEach((div) => introDivObserver.observe(div));

let skillGaugesObserver = new IntersectionObserver ((gauges) => {
    gauges.forEach((gauge) => {
        if (gauge.isIntersecting) {
            gauge.target.classList.add("fill-gauges");
        } else {
            gauge.target.classList.remove("fill-gauges");
        }
    });
});
skillGauges.forEach((gauge) => skillGaugesObserver.observe(gauge));

// observers for final project sections
let desktopImages = document.querySelectorAll("img.screen-shot-img");
let projectParagraphs = document.querySelectorAll("p.start-position-p");

let desktopImageObserver = new IntersectionObserver ((images) => {
    images.forEach((image) => {
        if (image.isIntersecting) {
            image.target.classList.add("slide-center");
        } else {
            image.target.classList.remove("slide-center");
        }
    });
});
desktopImages.forEach((image) => desktopImageObserver.observe(image));

let projectParagraphObserver = new IntersectionObserver ((paragraphs) => {
    paragraphs.forEach((paragraph) => {
        if (paragraph.isIntersecting) {
            paragraph.target.classList.add("slide-out");
        } else {
            paragraph.target.classList.remove("slide-out");
        }
    });
});
projectParagraphs.forEach((paragraph) => projectParagraphObserver.observe(paragraph));