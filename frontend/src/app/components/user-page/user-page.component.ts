import { Component, OnInit } from '@angular/core';
import { GameService } from 'src/app/shared/services/game.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-user-page',
  templateUrl: './user-page.component.html',
  styleUrls: ['./user-page.component.scss']
})
export class UserPageComponent implements OnInit {
  games: any;
  skip: number = 0;
  take: number = 4;

  constructor(public gameService: GameService, public router: Router) { }

  ngOnInit() {
    this.getGames();
  }

  getGames() {
    let params: any = {};
    params.skip = this.skip;
    params.take = this.take;

    this.gameService.getGames(params).subscribe({
      next: (res: any) => {
        this.games = res.games;
        console.log(res);
      }
    })
  }

  
}
