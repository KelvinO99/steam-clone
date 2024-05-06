import { Component } from '@angular/core';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-admin-page',
  templateUrl: './admin-page.component.html',
  styleUrls: ['./admin-page.component.scss']
})
export class AdminPageComponent {
  games!: any;

  constructor(public gameService: GameService) { }

  ngOnInit() {
    this.getGames();
   }

  getGames() {

    this.gameService.getGames({take: 10000, skip: 0}).subscribe({
      next: (res: any) => {

        this.games = res.games;
      }
    })
  }
}
