import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-popular-carousel',
  templateUrl: './popular-carousel.component.html',
  styleUrls: ['./popular-carousel.component.scss']
})
export class PopularCarouselComponent {
  
    games: any;
    skip: number = 0;
    take: number = 9;
    most_reviewed: boolean =false;
  
    constructor(public gameService: GameService, public router: Router) {
  
    }
  
    ngOnInit(){
  this.getUpdatesAndOffers();
    }
  
  getUpdatesAndOffers(){
  
    let params: any = {};
    params.skip = 0;
    params.take = 12;
  
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
