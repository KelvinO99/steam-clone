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
  tag: any[] = [
    {
      name: "action",
      id: 1,
    },

    {
      name: "adventure",
      id: 2,
    },

    {
      name: "sci-fi",
      id: 3,
    }

  ];

  constructor(public route: ActivatedRoute, public gameService: GameService){}


  ngOnInit() {
    this.genre = this.route.snapshot.params['genre'];
    this.getGames(true);
  }

  loadData(feat: boolean, tag?: string) {
    this.getGames(feat, tag)
  }
  
  getGames(feat: boolean, tags: any = null) {
    let params: any = {};
  
    if (feat) {
      params.featured = true;
    }
  
    if (tags !== null) {
      params.tag = [tags];
    } else {
      params.tag = [this.genre];
    }
  
    this.gameService.getGames(params).subscribe({
      next: (res: any) => {
        this.game = res;
        console.log([this.game]);
      }
    });
  }
  

}