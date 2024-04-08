import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-category-page',
  templateUrl: './category-page.component.html',
  styleUrls: ['./category-page.component.scss']
})
export class CategoryPageComponent {
  genre!: string;
  game!: any;

  constructor(public route: ActivatedRoute, public gameService: GameService){}


  ngOnInit() {
    this.genre = this.route.snapshot.params['genre'];
    this.getGames();
  }

  getGames() {
    this.gameService.getGames({tag: this.genre}).subscribe({
      next: (res: any) => {
        {
          this.game = res
          console.log(this.game);
            
        }
      }
    })
  }
}