import { Component, HostListener, Input, NgModule } from '@angular/core';
import { GameService } from 'src/app/shared/services/game.service';
import { CommonModule } from '@angular/common';
import { MatCardModule } from '@angular/material/card';
import { Router } from '@angular/router';

@Component({
  selector: 'app-offer-carousel',
  templateUrl: './offer-carousel.component.html',
  styleUrls: ['./offer-carousel.component.scss']
})
export class OfferCarouselComponent {
  @Input() genre: any = null;
  game: any
  skip: number = 0;
  take: number = 3;
  itemsPerPage = 3; 
  pages: number[] = []; 
  currentIndex = 0; 

  constructor(public gameService: GameService, public router: Router) {
    
   }

  ngOnInit(){
    this.getUpdatesAndOffers()
  }
 
getUpdatesAndOffers(){ 
  this.gameService.getGames({discount: true, tag: this.genre ? this.genre : ''}).subscribe({ 
    next: (res: any) => { 
 
      this.game = res.games; 
      const pageCount = Math.ceil(this.game.length / this.itemsPerPage); 
      this.pages = Array.from({ length: pageCount }, (_, i) => i + 1); 
    } 
  }) 
}

  getCardsForPage(index: number): any[] { 
    const start = index * this.itemsPerPage; 
    const end = start + this.itemsPerPage; 
    return this.game.slice(start, end); 
  } 
 
  prevPage(): void { 
    if (this.currentIndex > 0) { 
      this.currentIndex--; 
    } 
  } 
 
  nextPage(): void { 
    if (this.currentIndex < this.pages.length - 1) { 
      this.currentIndex++; 
    } 
  } 

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
