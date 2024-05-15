import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';
import { LanguageService } from 'src/app/shared/services/language.service';
import { TagService } from 'src/app/shared/services/tag.service';

@Component({
  selector: 'app-admin-page',
  templateUrl: './admin-page.component.html',
  styleUrls: ['./admin-page.component.scss'],
})
export class AdminPageComponent {
  games!: any; //index dei giochi
  tags!: any; //index dei tags
  languages!: any; //index delle lingue

  constructor(
    public gameService: GameService, //servizio dei giochi
    public router: Router, //libreria di angular
    public tagService: TagService, //servizio dei tags
    public languageService: LanguageService //servizio delle lingue
  ) {}

  ngOnInit() {
    //get per la visualizzazione delle infornmazioni
    this.getGames();
    this.getTags();
    this.getLanguages();
  }

  //get dell'index dei giochi
  getGames() {
    this.gameService.getGames({ take: 111111111111, skip: 0 }).subscribe({
      next: (res: any) => {
        this.games = res.games;
      },
    });
  }

  //get dell'index dei tags
  getTags() {
    this.tagService
      .getGenres({
        skip: 0,
        take: 100000,
        category: true,
      })
      .subscribe((res: any) => {
        this.tags = res.tags;
      });
  }

  //get dell'index delle lingue
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

  //collegamento alla pagina del gioco
  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
