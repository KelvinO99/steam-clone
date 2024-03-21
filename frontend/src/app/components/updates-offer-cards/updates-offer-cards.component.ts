import { GameService } from 'src/app/shared/services/game.service';
import { Component } from '@angular/core';

@Component({
  selector: 'app-updates-offer-cards',
  templateUrl: './updates-offer-cards.component.html',
  styleUrls: ['./updates-offer-cards.component.scss']
})


export class UpdatesOfferCardsComponent {
  discount_game: any
  incoming_game: any
  best_seller_game: any
  most_reviewed_game: any
  skip: number = 0;
  take: number = 10;
  incoming: boolean = false
  best_seller: boolean = false
  discount: boolean = false
  most_reviewed: boolean = false

  constructor(public gameService: GameService){}

  ngOnInit(){
    this.getIncoming()
    this.getBestSeller()
    this.getDiscount()
    this.getMostReviewed()
  }

  getIncoming() {
    this.gameService.getGames({skip: this.skip, take: this.take, incoming: this.incoming = true}).subscribe({
      next: (res: any) => {
        {
          this.incoming_game = res
          console.log("getIncoming")
          console.log(this.incoming_game);
          
        }
      }
    })
  }

  getBestSeller() {
    this.gameService.getGames({skip: this.skip, take: this.take, best_seller: this.best_seller = true}).subscribe({
      next: (res: any) => {
        {
          this.best_seller_game = res
          console.log("getBestSeller")
          console.log(this.best_seller_game);
          
        }
      }
    })
  }

  getDiscount() {
    this.gameService.getGames({skip: this.skip, take: this.take, discount: this.discount = true}).subscribe({
      next: (res: any) => {
        {
          this.discount_game = res
          console.log("getDiscount")
          console.log(this.discount_game);
          
        }
      }
    })
  }

  getMostReviewed() {
    this.gameService.getGames({skip: this.skip, take: this.take, most_reviewed: this.most_reviewed = true}).subscribe({
      next: (res: any) => {
        {
          this.most_reviewed_game = res
          console.log("getMostReviewed")
          console.log(this.most_reviewed_game);
          
        }
      }
    })
  }

}