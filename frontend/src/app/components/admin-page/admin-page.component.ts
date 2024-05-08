import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';
import { LanguageService } from 'src/app/shared/services/language.service';
import { TagService } from 'src/app/shared/services/tag.service';

@Component({
  selector: 'app-admin-page',
  templateUrl: './admin-page.component.html',
  styleUrls: ['./admin-page.component.scss']
})
export class AdminPageComponent {
  games!: any;
  tags!: any;
  languages!: any;

  constructor(public gameService: GameService, public router: Router, public tagService: TagService, public languageService: LanguageService) { }

  ngOnInit() {
    this.getGames();
    this.getTags();
    this.getLanguages();
   }

  getGames() {

    this.gameService.getGames({take: 10000, skip: 0}).subscribe({
      next: (res: any) => {

        this.games = res.games;
      }
    })
  }
  
  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }

  getTags() {
    this.tagService
    .getGenres({
      skip: 0,
      take: 100000,
      category: true
    })
    .subscribe((res: any) => {
      this.tags = res.tags;
    });
  }

  getLanguages() {
    this.languageService
    .getLanguages({
      skip: 0,
      take: 100000,
    })
    .subscribe((res: any) => {
      this.languages = res.languages;
    });
  }
}
