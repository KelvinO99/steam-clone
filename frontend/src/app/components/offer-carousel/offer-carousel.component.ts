import { Component } from '@angular/core';

@Component({
  selector: 'app-offer-carousel',
  templateUrl: './offer-carousel.component.html',
  styleUrls: ['./offer-carousel.component.scss']
})
export class OfferCarouselComponent {

  image: string[] = [
  '../../../assets/image/image/img1.jpg',
  '../../../assets/image/image/img2.jpg',
  '../../../assets/image/image/img3.jpg',
  '../../../assets/image/image/img4.jpg', 
  ]

  constructor() { }

  ngOnInit(){}

}
