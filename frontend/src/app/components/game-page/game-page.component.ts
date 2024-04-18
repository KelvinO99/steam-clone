import { GameService } from 'src/app/shared/services/game.service';
import { Component } from '@angular/core';
import { ActivatedRoute, Route } from '@angular/router';

@Component({
  selector: 'app-game-page',
  templateUrl: './game-page.component.html',
  styleUrls: ['./game-page.component.scss']
})
export class GameComponent {
  routeId!: number;
  game!: any;

  constructor(public route: ActivatedRoute, public gameService: GameService){}


   ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.showGame();
  }

  showGame() {
    this.gameService.showGame(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.game = res
        }
      }
    })
  }
}
