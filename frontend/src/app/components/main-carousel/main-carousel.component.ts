import { AfterViewInit, Component, ElementRef, Renderer2 } from '@angular/core';

@Component({
  selector: 'app-main-carousel',
  templateUrl: './main-carousel.component.html',
  styleUrls: ['./main-carousel.component.scss']
})
export class MainCarouselComponent implements AfterViewInit {
  constructor(private renderer: Renderer2, private el: ElementRef) {}

  ngAfterViewInit() {
    const cards: NodeListOf<Element> = this.el.nativeElement.querySelectorAll('.card');
  
    cards.forEach((card: Element) => {
      const screenshots: NodeListOf<Element> = card.querySelectorAll('.gamescreenshot');
      const mainImage: HTMLImageElement = card.querySelector('.card-img') as HTMLImageElement;
      const originalSrc: string = mainImage.src;

      screenshots.forEach((screenshot: Element) => {
        this.renderer.listen(screenshot, 'mouseover', (event: Event) => {
          const target = event.target as HTMLImageElement;
          this.renderer.setProperty(mainImage, 'src', target.src);
        });
        this.renderer.listen(screenshot, 'mouseout', () => {
          this.renderer.setProperty(mainImage, 'src', originalSrc);
        });
      });
    });
  }
}