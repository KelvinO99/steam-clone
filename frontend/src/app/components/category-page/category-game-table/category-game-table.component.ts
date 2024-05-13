import { Component } from '@angular/core';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-category-game-table',
  templateUrl: './category-game-table.component.html',
  styleUrls: ['./category-game-table.component.scss']
})
export class CategoryGameTableComponent {
  game!: any;

  constructor(public gameService: GameService){}

  ngOnInit(){
    this.getGames();
  }

  getGames() {
    this.gameService.getGames({skip: 0, take: 10, tag: ["action"]}).subscribe({
      next: (res: any) => {
        this.game = res.games;
        console.log([this.game]);
      }
    });
  }

}
