import { TagService } from 'src/app/shared/services/tag.service';
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';
import { animate } from '@angular/animations';

@Component({
  selector: 'app-game-table',
  templateUrl: './game-table.component.html',
  styleUrls: ['./game-table.component.scss'],
})
export class GameTableComponent {
  //Filtri Chiamate BackEnd
  tag!: any;
  skip: number = 0;
  take: number = 10;
  games!: any;
  showGames!: any;
  number!: number;
  hoveredGameId: number | null = null;

  tags: any = [
    {
      name: 'New & Trading',
      id: 0,
    },
    {
      name: 'Top Sellers',
      id: 1,
    },
    {
      name: 'Popular Upcoming',
      id: 2,
    },
    {
      name: 'Specials Offers',
      id: 3,
    },
  ];

  constructor(
    public gameService: GameService,
    public tagService: TagService,
    public router: Router
  ) {}

  ngOnInit() {
    /* this.showGame(this.number); */
    this.loadData(0);
  }

  loadData(filtrer?: number) {
    this.getGames(filtrer);
  }

  getGames(filtrer?: number) {
    let params: any = {};
    params.take = 10;
    params.skip = 0;

    switch (filtrer) {
      case 0:
        params.most_reviewed = true;
        break;
      case 1:
        params.best_seller = true;
        break;
      case 2:
        params.upcoming = true;
        break;
      case 3:
        params.special_offer = true;
        break;
      default:
        break;
    }

    this.gameService
      .getGames(params)
      .subscribe((res: any) => {
        this.games = res;
      });
  }

  setHoveredGameId(gameId: number) {
    this.hoveredGameId = gameId;
    this.showGame(this.hoveredGameId);
  }

  resetHoveredGameId() {
    this.hoveredGameId = null;
  }

  showGame(gameId: number) {
    this.gameService.showGame(gameId).subscribe({
      next: (res: any) => {
        this.showGames = res;
        console.log(this.showGames);
      },
    });
  }

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
