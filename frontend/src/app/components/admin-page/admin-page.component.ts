import { Component, ViewChild, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MatPaginator, PageEvent } from '@angular/material/paginator';
import { Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';
import { LanguageService } from 'src/app/shared/services/language.service';
import { TagService } from 'src/app/shared/services/tag.service';

@Component({
  selector: 'app-admin-page',
  templateUrl: './admin-page.component.html',
  styleUrls: ['./admin-page.component.scss'],
})
export class AdminPageComponent implements OnInit {
  tags!: any; // index dei tags
  languages!: any; // index delle lingue
  addGameForm!: FormGroup; // form per aggiungere i giochi
  gameToDeleteId!: any;
  searchText!: any;
  firstFormGroup!: any;
  secondFormGroup!: any;
  isLinear!: boolean;
  // variabili per la paginazione
  games: any[] = [];
  length = 0;
  pageSize = 10;
  pageSizeOptions: number[] = [5, 10, 25, 100];
  pageIndex = 0;
  @ViewChild(MatPaginator) paginator!: MatPaginator;

  constructor(
    public gameService: GameService, // servizio dei giochi
    public router: Router, // libreria di angular
    public tagService: TagService, // servizio dei tags
    public languageService: LanguageService, // servizio delle lingue
    private formBuilder: FormBuilder, // libreria di angular
  ) {}

  ngOnInit() {
    this.loadGames();
    this.getTags();
    this.getLanguages();

    this.addGameForm = this.formBuilder.group({
      name: [''],
      is_dlc: [0],
      pegi_id: [0],
      date: [Date],
      base_price: [0],
      game_imgs: [],
      discounted_percentage: [0, [Validators.min(0), Validators.max(100)]],
      discounted_price: [0, [Validators.min(0), Validators.max(100)]],
      short_description: ['', [Validators.required, Validators.maxLength(1024)]],
      long_description: ['', [Validators.required, Validators.maxLength(1024)]],
      
    });

    this.firstFormGroup = this.formBuilder.group({
      firstCtrl: [''],
    });
    this.secondFormGroup = this.formBuilder.group({
      secondCtrl: [''],
    });
    this.isLinear = false;

    console.log(this.addGameForm.controls["game_imgs"].value);
    
  }

  addGame() {
    this.gameService.storeGame(this.addGameForm.value).subscribe((res) => {
      console.log(res);
      this.loadGames();
    });
  }

  loadGames(): void {
    this.gameService.getGames({ skip: this.pageIndex * this.pageSize, take: this.pageSize }).subscribe(data => {
      console.log('Data from server:', data);
      this.games = data.games; // Accedi alla proprietà 'games' invece di 'items'
      this.length = data.total; // Accedi alla proprietà 'total' per ottenere il numero totale di giochi
      console.log('Games:', this.games);
      console.log('Total games:', this.length);
    });
  }
  

  handlePageEvent(event: PageEvent): void {
    this.pageIndex = event.pageIndex;
    this.pageSize = event.pageSize;
    console.log('Page event:', event);
    this.loadGames();
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
    this.gameService.deleteGame(gameId).subscribe((res) => {
      console.log(res);
      this.loadGames(); // Ricarica i giochi dopo l'eliminazione
    });
  }

  getTags() {
    this.tagService.getGenres({
      skip: 0,
      take: 100000,
      category: true,
    }).subscribe((res: any) => {
      this.tags = res.tags;
    });
  }

  getLanguages() {
    this.languageService.getLanguages({
      skip: 0,
      take: 100000,
    }).subscribe((res: any) => {
      this.languages = res.languages;
    });
  }

  close() { }

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
