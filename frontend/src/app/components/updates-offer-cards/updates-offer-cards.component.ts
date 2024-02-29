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

  }

getUpdatesAndOffers(){
  this.gameService.getUpdatesAndOffers().subscribe({
    next: (res: any) => {
      
      this.games = res;
      console.log(this.games);
    }
  })
  }


}
