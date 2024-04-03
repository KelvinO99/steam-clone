import { GameService } from 'src/app/shared/services/game.service';
import { Component } from '@angular/core';
import { Route, Router } from '@angular/router';

@Component({
  selector: 'app-updates-offer-cards',
  templateUrl: './updates-offer-cards.component.html',
  styleUrls: ['./updates-offer-cards.component.scss']
})


export class UpdatesOfferCardsComponent {

  games: any;
  skip: number = 0;
  take: number = 9;

  constructor(public gameService:GameService, public router: Router) {

  }

  ngOnInit(){
this.getUpdatesAndOffers();
  }

getUpdatesAndOffers(){
  this.gameService.getGames({skip: this.skip, take: this.take, discount: true}).subscribe({
    next: (res: any) => {

      this.games = res.games;
    }
  })
}
  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }

}