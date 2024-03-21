import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-game-table',
  templateUrl: './game-table.component.html',
  styleUrls: ['./game-table.component.scss']
})
export class GameTableComponent {
  discount_game: any
  incoming_game: any
  best_seller_game: any
  most_reviewed_game: any
  price: any

  skip: number = 0;
  take: number = 10;
  incoming: boolean = false
  best_seller: boolean = false
  discount: boolean = false
  most_reviewed: boolean = false
  special_offer: boolean = true

  constructor(public gameService: GameService, public router: Router){}

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
    this.gameService.getGames({skip: this.skip, take: this.take, discount: this.discount = true}).subscribe({
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

  goTo(path: string) {
    this.router.navigate([path])
    console.log(path);
    
  }

}
