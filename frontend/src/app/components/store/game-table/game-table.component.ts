import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-game-table',
  templateUrl: './game-table.component.html',
  styleUrls: ['./game-table.component.scss'],
})
export class GameTableComponent {
  discount_game: any;
  upcoming_game: any;
  best_seller_game: any;
  most_reviewed_game: any;
  specia_offer: any;
  game: any;
  number!: number;
  hoveredGameId: string | null = null;

  skip: number = 0;
  take: number = 10;

  constructor(public gameService: GameService, public router: Router) {}

  ngOnInit() {
    this.getMostReviewed();
    this.showGame(this.number);
  }

  setHoveredGameId(gameId: string) {
    this.hoveredGameId = gameId;
    const gameIdNumber: number = parseInt(gameId);
    this.showGame(gameIdNumber);
  }

  resetHoveredGameId() {
    this.hoveredGameId = null;
  }

  showGame(gameId: number) {
    this.gameService.showGame(gameId).subscribe({
      next: (res: any) => {
        this.game = res;
        console.log(this.game);

        
      },
    });
  }

  loadData(tab: string) {
    switch (tab) {
      case 'New & Trending':
        this.getMostReviewed();
        break;
      case 'Top Sellers':
        this.getBestSeller();
        break;
      case 'Upcoming':
        this.getUpcoming();
        break;
      case 'Specials offers':
        this.getSpecialOffer();
        break;
    }
  }

  getUpcoming() {
    this.gameService
      .getGames({
        skip: this.skip,
        take: this.take,
        upcoming: true, // Imposta il flag a true
      })
      .subscribe((res: any) => {
        this.upcoming_game = res;
        console.log('getIncoming');
        console.log(this.upcoming_game);
      });
  }

  getBestSeller() {
    this.gameService
      .getGames({
        skip: this.skip,
        take: this.take,
        best_seller: true, // Imposta il flag a true
      })
      .subscribe((res: any) => {
        this.best_seller_game = res;
        console.log('getBestSeller');
        console.log(this.best_seller_game);
      });
  }

  getDiscount() {
    this.gameService
      .getGames({
        skip: this.skip,
        take: this.take,
        discount: true, // Imposta il flag a true
      })
      .subscribe((res: any) => {
        this.discount_game = res;
        console.log('getDiscount');
        console.log(this.discount_game);
      });
  }

  getMostReviewed() {
    this.gameService
      .getGames({
        skip: this.skip,
        take: this.take,
        most_reviewed: true, // Imposta il flag a true
      })
      .subscribe((res: any) => {
        this.most_reviewed_game = res;
        console.log('getMostReviewed');
        console.log(this.most_reviewed_game);
      });
  }

  getSpecialOffer() {
    this.gameService
      .getGames({
        skip: this.skip,
        take: this.take,
        special_offer: true, // Imposta il flag a true
      })
      .subscribe((res: any) => {
        this.specia_offer = res;
        console.log('getSpecialOffer');
        console.log(this.specia_offer);
      });
  }

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
