import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-body-data-game',
  templateUrl: './body-data-game.component.html',
  styleUrls: ['./body-data-game.component.scss']
})
export class BodyDataGameComponent {
  routeId!: number;
  game!: any;
  offset = 1;

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
          console.log(this.game);
        }
      }
    })
  }
}
