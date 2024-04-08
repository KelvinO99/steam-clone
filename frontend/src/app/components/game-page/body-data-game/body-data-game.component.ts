import { AuthService } from 'src/app/shared/services/auth.service';
import { Component, Input } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-body-data-game',
  templateUrl: './body-data-game.component.html',
  styleUrls: ['./body-data-game.component.scss']
})
export class BodyDataGameComponent {
  routeId!: number;
  @Input() game!: any;
  languages!: any;
  offset = 1;

  constructor(public route: ActivatedRoute, public gameService: GameService, public authService: AuthService){}


  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.showGameLanguages();
  }
  
  showGameLanguages() {
    this.gameService.showGameLanguages(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.languages = res.games_languages
        }
      }
    })
  }
}
