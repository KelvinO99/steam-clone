import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
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
  addGameForm!: FormGroup; //form per aggiungere i giochi
  gameToDeleteId!: any;

  constructor(
    public gameService: GameService, //servizio dei giochi
    public router: Router, //libreria di angular
    public tagService: TagService, //servizio dei tags
    public languageService: LanguageService, //servizio delle lingue
    private formBuilder: FormBuilder, //libreria di angular
  ) { }

  ngOnInit() {
    //get per la visualizzazione delle infornmazioni
    this.getGames();
    this.getTags();
    this.getLanguages();

    this.addGameForm = this.formBuilder.group({
      name: [''],
      is_dlc: [0],
      pegi_id: [0],
      date: [Date],
      base_price: [0],
      discounted_percentage: [0, [Validators.min(0), Validators.max(100)]],
      discounted_price: [0, [Validators.min(0), Validators.max(100)]],
      short_description: ['', [Validators.required, Validators.maxLength(1024)]],
      long_description: ['', [Validators.required, Validators.maxLength(1024)]],
    });
  }

  //aggiunta del nuovo gioco
  addGame() {
    this.gameService
      .storeGame(this.addGameForm.value)
      .subscribe((res) => {
        console.log(res);
      });
      this.getGames();

  }


  setGameToDelete(gameId: number) {
    this.gameToDeleteId = gameId; // Memorizza l'ID del gioco da eliminare
  }
  
  confirmDelete() {
    if (this.gameToDeleteId !== null) {
      this.deleteGameId(this.gameToDeleteId); // Chiama deleteGameId per eliminare il gioco
      this.gameToDeleteId = null; // Resetta l'ID del gioco da eliminare
    }
  }
  
  deleteGameId(gameId: number) {
    this.gameService.deleteGame(gameId)
      .subscribe((res) => {
        console.log(res);
        const index = this.games.findIndex((game: any) => game.id === gameId);
        if (index !== -1) {
          this.games.splice(index, 1);
        }
      });
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

  close() { }

  //collegamento alla pagina del gioco
  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
