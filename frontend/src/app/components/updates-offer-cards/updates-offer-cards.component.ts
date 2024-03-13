import { GameService } from 'src/app/shared/services/game.service';
import { Component } from '@angular/core';

@Component({
  selector: 'app-updates-offer-cards',
  templateUrl: './updates-offer-cards.component.html',
  styleUrls: ['./updates-offer-cards.component.scss']
})


export class UpdatesOfferCardsComponent {

  games: any;

  constructor(public gameService:GameService) {
    
  }

  ngOnInit(){
    this.getUpdatesAndOffers();
  }

getUpdatesAndOffers(){
  this.gameService.getBestSellingGames({discount: true,}).subscribe({
    next: (res: any) => {0
      
      this.games = res;
      console.log('ciao');
      
      console.log(this.games);
    }
  })
  }


}
