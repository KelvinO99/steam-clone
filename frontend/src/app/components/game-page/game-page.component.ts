import { GameService } from 'src/app/shared/services/game.service';
import { Component } from '@angular/core';
import { ActivatedRoute, Route } from '@angular/router';
import { SystemRequirementsService } from 'src/app/shared/services/system-requirements.service';

@Component({
  selector: 'app-game-page',
  templateUrl: './game-page.component.html',
  styleUrls: ['./game-page.component.scss']
})
export class GameComponent {
  routeId!: number;
  game!: any;
  systemRequirements!: any;
  systemCharacteristics!: any

  constructor(public route: ActivatedRoute, public gameService: GameService, public systemService: SystemRequirementsService){}


   ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.showGame();
    this.showSystemRequirements();
    this.showSystemCharacteristics();
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

  showSystemRequirements() {
    this.systemService.showSystemRequirements(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.systemRequirements = res
          
        }
      }
    })
  }

  showSystemCharacteristics() {
    this.systemService.showSystemCharacteristics(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.systemCharacteristics = res
        }
      }
    })
  }

}
