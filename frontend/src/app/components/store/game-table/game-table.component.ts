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
  incoming_game: any;
  best_seller_game: any;
  most_reviewed_game: any;
  
  skip: number = 0;
  take: number = 10;

  constructor(public gameService: GameService, public router: Router) {}

  ngOnInit() {
    this.getMostReviewed();
  }

  loadData(tab: string) {
    switch (tab) {
      case 'New & Trending':
        this.getMostReviewed();
        break;
      case 'Top Sellers':
        this.getBestSeller();
        break;
      case 'Popular Upcoming':
        this.getIncoming();
        break;
      case 'Specials offer':
        this.getDiscount();
        break;
    }
  }

  getIncoming() {
    this.gameService
      .getGames({
        skip: this.skip,
        take: this.take,
        incoming: true, // Imposta il flag a true
      })
      .subscribe((res: any) => {
        this.incoming_game = res;
        console.log('getIncoming');
        console.log(this.incoming_game);
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

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
