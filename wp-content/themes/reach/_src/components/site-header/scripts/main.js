/* eslint-disable  */
import SiteHeader from './SiteHeader.js';

window.addEventListener('DOMContentLoaded', () => {
    const element = document.querySelector('.site-header');

    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            element.classList.add('scrolled');
            
    }else{
        element.classList.remove('scrolled');
    }

};



    
    new SiteHeader(element);





});
