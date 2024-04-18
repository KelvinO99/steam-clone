import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';
import { TagService } from 'src/app/shared/services/tag.service';

@Component({
  selector: 'app-category-page',
  templateUrl: './category-page.component.html',
  styleUrls: ['./category-page.component.scss']
})
export class CategoryPageComponent {
  genre!: string;
  game!: any;
  tags!: any;

  constructor(public route: ActivatedRoute, public gameService: GameService, public tagService: TagService){}


  ngOnInit() {
    this.genre = this.route.snapshot.params['genre'];
    this.getGames(true);
    this.getTags();
  }

  loadData(feat: boolean, tag?: string) {
    this.getGames(feat, tag)
  }

  getGames(feat: boolean, tags: any = null) {
    let params: any = {};
    params.skip = 0;
    params.take = 50;

    if (feat) {
      params.featured = true;
    }

    if (tags !== null) {
      params.tag = [this.genre, tags];
    } else {
      params.featured = true;
    }

    this.gameService.getGames(params).subscribe({
      next: (res: any) => {
        this.game = res;
        console.log([this.game]);
      }
    });
  }

  getTags() {

    this.tagService.getGenres({skip: 0, take: 5, category: true}).subscribe({
      next: (res: any) => {
        this.tags = res.tags;
        console.log([this.game]);
      }
    });
  }
}
