import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-buy-page',
  templateUrl: './buy-page.component.html',
  styleUrls: ['./buy-page.component.scss']
})
export class BuyPageComponent {
  routeId!: number;
  game!: any;

  constructor(public router: Router, public gameService: GameService, public route: ActivatedRoute) { }


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

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }

}
