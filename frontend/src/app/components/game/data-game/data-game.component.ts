import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-data-game',
  templateUrl: './data-game.component.html',
  styleUrls: ['./data-game.component.scss']
})
export class DataGameComponent {

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
