import { Component, HostListener, NgModule } from '@angular/core';
import { GameService } from 'src/app/shared/services/game.service';
import { CommonModule } from '@angular/common';
import { MatCardModule } from '@angular/material/card';

@Component({
  selector: 'app-offer-carousel',
  templateUrl: './offer-carousel.component.html',
  styleUrls: ['./offer-carousel.component.scss']
})
export class OfferCarouselComponent {
  game: any
  col_10!: string;
  col_4!: string;
  col_1!: string;
  screenWidth = window.screen.width;
  skip: number = 0;
  take: number = 22;
  discount: boolean = false

  constructor(public gameService: GameService) {
    
   }

  ngOnInit(){
    this.getDiscount()
  }

  getDiscount() {
    this.gameService.getGames({skip: this.skip, take: this.take, discount: this.discount = true}).subscribe({
      next: (res: any) => {
        {
          this.game = res
          console.log("getDiscount");
          console.log(this.game);
          
        }
      }
    })
  }

  @HostListener('window:resize', ['$event'])
  onResize(event?: undefined) {
    this.screenWidth = window.innerWidth;
    this.updateSize();
  }

  updateSize() {
    if (this.screenWidth < 768) {
      this.col_10 = 'col-xs-8 d-flex p-0';
      this.col_1 = 'col-xs-2  d-flex p-0';

    } else if (this.screenWidth >= 768 && this.screenWidth < 992) {
      this.col_10 = 'col-sm-8 d-flex p-0';
      this.col_1 = 'col-sm-2 d-flex p-0';

    } else if (this.screenWidth >= 992 && this.screenWidth < 1200) {
      this.col_10 = 'col-md-8 d-flex p-0';
      this.col_1 = 'col-md-2 d-flex p-0 d-flex justify-content-end';

    } else if (this.screenWidth >= 1200) {
      this.col_10 = 'col-lg-8 d-flex p-0';
      this.col_1 = 'col-lg-2 d-flex p-0 d-flex justify-content-end';

    }
  }
}
