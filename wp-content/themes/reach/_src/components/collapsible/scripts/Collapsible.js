export default class ComponentName {
    constructor(element) {
        this.el = element;
        this.items = this.el.querySelectorAll('.collapsible__item');

        this.init();
    }

    init() {
        this.items.forEach((item) => {
            const title = item.querySelector('.collapsible__item__title');

            title.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });
    }
}
