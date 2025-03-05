export default function sliderTimeline() {
    class SliderTimeline {
        constructor(timelineNavSelector, timelineMainSelector, buttonGroupSelector, previousButtonSelector, nextButtonSelector, sliderDots1Selector, sliderDots2Selector) {
            this.$carouselnav = $(timelineNavSelector).flickity({
                asNavFor: timelineMainSelector,
                contain: true,
                pageDots: false,
                cellAlign: 'left',
                prevNextButtons: false,
                freeScroll: true,
                imagesLoaded: true,
                draggable: true,
            });

            this.$carouselmain = $(timelineMainSelector).flickity({
                pageDots: false,
                wrapAround: true,
                prevNextButtons: false,
                cellAlign: 'left',
                autoPlay: 7000,
                adaptiveHeight: true,
            });

            this.flkty = this.$carouselmain.data('flickity');
            this.$cellButtonGroup = $(buttonGroupSelector);
            this.$cellButtons = this.$cellButtonGroup.find('.button');
            this.$previousButton = $(previousButtonSelector);
            this.$nextButton = $(nextButtonSelector);
            this.$JSsliderSimpleNavGroup1 = $(sliderDots1Selector);
            this.$JSsliderSimpleNavItem1 = this.$JSsliderSimpleNavGroup1.find('li');
            this.$JSsliderSimpleNavGroup2 = $(sliderDots2Selector);
            this.$JSsliderSimpleNavItem2 = this.$JSsliderSimpleNavGroup2.find('li');

            if (!Modernizr.touch) {
                this.$carouselmain.on('dragStart.flickity', () => {
                    this.$carouselmain.css('pointer-events', 'none').css('cursor', 'grabbing');
                });
                this.$carouselmain.on('dragEnd.flickity', () => {
                    this.$carouselmain.css('pointer-events', 'all').css('cursor', 'inherit');
                });
            }
            this.init();
        }

        init() {
            this.$previousButton.on('click', () => this.$carouselmain.flickity('previous'));
            this.$nextButton.on('click', () => this.$carouselmain.flickity('next'));

            this.$carouselmain.on('select.flickity', () => this.updateButtons());
            this.$cellButtonGroup.on('click', '.button', (event) => this.selectCell(event));
            this.$JSsliderSimpleNavGroup1.on('click', 'li', (event) => this.selectNavItem(event, this.$JSsliderSimpleNavItem1));
            this.$JSsliderSimpleNavGroup2.on('click', 'li', (event) => this.selectNavItem(event, this.$JSsliderSimpleNavItem2));
        }

        updateButtons() {
            if (!this.flkty.cells[this.flkty.selectedIndex - 1]) {
                this.$previousButton.attr('disabled', 'disabled');
                this.$nextButton.removeAttr('disabled');
            } else if (!this.flkty.cells[this.flkty.selectedIndex + 1]) {
                this.$nextButton.attr('disabled', 'disabled');
                this.$previousButton.removeAttr('disabled');
            } else {
                this.$previousButton.removeAttr('disabled');
                this.$nextButton.removeAttr('disabled');
            }

            this.$JSsliderSimpleNavItem1.filter('.is-selected').removeClass('is-selected');
            this.$JSsliderSimpleNavItem1.eq(this.flkty.selectedIndex).addClass('is-selected');

            this.$JSsliderSimpleNavItem2.filter('.is-selected').removeClass('is-selected');
            this.$JSsliderSimpleNavItem2.eq(this.flkty.selectedIndex).addClass('is-selected');
        }

        selectCell(event) {
            const index = $(event.currentTarget).index();
            this.$carouselmain.flickity('select', index);
        }

        selectNavItem(event, navItems) {
            const index = $(event.currentTarget).index();
            this.$carouselmain.flickity('select', index);
            this.$carouselmain.flickity('pausePlayer');
        }
    }

    // Initialize sliders
    $(document).ready(() => {
        new SliderTimeline('.timeline-nav', '.timeline-main', '.button-group--cells', '.button--previous', '.button--next', '.sliderDots1', '.sliderDots2');
        new SliderTimeline('.new-timeline-nav', '.new-timeline-main', '.new-button-group--cells', '.new-button--previous', '.new-button--next', '.new-sliderDots1', '.new-sliderDots2');

    });
}