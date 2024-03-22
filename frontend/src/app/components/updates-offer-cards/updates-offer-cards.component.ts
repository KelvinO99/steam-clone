import { GameService } from 'src/app/shared/services/game.service';
import { Component } from '@angular/core';

@Component({
  selector: 'app-updates-offer-cards',
  templateUrl: './updates-offer-cards.component.html',
  styleUrls: ['./updates-offer-cards.component.scss']
})


export class UpdatesOfferCardsComponent {

  games: any;
  itemsPerPage = 6;
  pages: number[] = [];
  currentIndex = 0;

  constructor(public gameService:GameService) {

  }

  ngOnInit(){
this.getUpdatesAndOffers();
  }

getUpdatesAndOffers(){
  this.gameService.getGames({discount: true}).subscribe({
    next: (res: any) => {

      this.games = res.games;
      const pageCount = Math.ceil(this.games.length / this.itemsPerPage);
      this.pages = Array.from({ length: pageCount }, (_, i) => i + 1);
    }
  })
  }
  getCardsForPage(index: number): any[] {
    const start = index * this.itemsPerPage;
    const end = start + this.itemsPerPage;
    return this.games.slice(start, end);
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

}