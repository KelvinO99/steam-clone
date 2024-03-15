import { GameService } from 'src/app/shared/services/game.service';
import { Component } from '@angular/core';
import { ActivatedRoute, Route } from '@angular/router';

@Component({
  selector: 'app-game',
  templateUrl: './game.component.html',
  styleUrls: ['./game.component.scss']
})
export class GameComponent {
  routeId!: number;
  game!: any;

  constructor(public route: ActivatedRoute, public gameService: GameService){}


  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    console.log(this.routeId);
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
