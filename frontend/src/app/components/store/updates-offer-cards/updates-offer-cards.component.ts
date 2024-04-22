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
  most_reviewed: boolean =false;

  constructor(public gameService:GameService, public router: Router) {

  }

  ngOnInit(){
this.getUpdatesAndOffers();
  }

getUpdatesAndOffers(){

  let params: any = {};
  params.skip = 0;
  params.take = 9;

  if (this.most_reviewed) {
    params.most_reviewed = true;
  }

  else {
    params.discount = true;
  }

  this.gameService.getGames(params).subscribe({
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