import Collapsible from './Collapsible.js';

window.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.collapsible');

    [...items].forEach((item) => {
        new Collapsible(item);
    });
});
