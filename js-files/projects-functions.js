function pageLoad() {

    window.onresize = () => {
        let mobileMenuLogo = document.querySelector('nav div.element-wrapper div.main-menu p');

        window.innerWidth <= 1000 ? mobileMenuLogo.classList.add('mobile-view') : mobileMenuLogo.classList.remove('mobile-view');
    }

    document.querySelector('nav div.element-wrapper div.main-menu p').onclick = () => {
        console.log('change the menu');

        let apLogo = document.querySelector('nav div.element-wrapper div.main-menu p img[alt|="AP studio logo"]');
        let hamburgerIcon = document.querySelector('nav div.element-wrapper div.main-menu p img[alt|="hamburger menu icon"]');
        let ulMenu = document.querySelector('nav div.element-wrapper div.main-menu ul');
        let footerIcons = document.querySelector('footer');
        
        apLogo.classList.toggle('disappear-menu');
        apLogo.classList.toggle('twist');
        hamburgerIcon.classList.toggle('appear-menu');
        hamburgerIcon.classList.toggle('twist');
        ulMenu.classList.toggle('drop-mobile-menu');
        footerIcons.classList.toggle('show-footer');

    }

    document.querySelector('#project-nav-side-bar p').onclick = () => {
        toggleSideNav();
    }

    let projectDivs = document.querySelectorAll('#all-projects-container > div');

    let projectDivObserver = new IntersectionObserver((projects) => {
        projects.forEach((project) => {
            if (project.isIntersecting) {
                let divId = '#' + project.target.id;
                navigateToNewLink(divId);
            }
        })
    })

    projectDivs.forEach((projectDiv) => projectDivObserver.observe(projectDiv));
}

function toggleSideNav() {
    document.querySelector('#project-nav-side-bar').classList.toggle('covers-page');
    document.querySelector('#project-nav-side-bar p').classList.toggle('slide-arrow-left');
    document.querySelector('#project-nav-side-bar ul').classList.toggle('expand-second-nav');
}

function navigateToNewLink(newLink) {
    let sideNavLinks = document.querySelectorAll('#project-nav-side-bar ul li a');

    for (x=0; x<sideNavLinks.length; x++) {
        if (sideNavLinks[x].getAttribute('href') === newLink) {
            sideNavLinks[x].classList.add('active');
        } else {
            for (y=0; y<sideNavLinks.length; y++) {
                if (sideNavLinks[y].getAttribute('href') != newLink) {
                    if (sideNavLinks[y].classList.contains('active')) {
                        sideNavLinks[y].classList.remove('active');
                    }
                }
            }
        }
    }
}

function activateManualNavigation(inId) {
    navigateToNewLink(inId);
    toggleSideNav();
}