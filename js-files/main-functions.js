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
}