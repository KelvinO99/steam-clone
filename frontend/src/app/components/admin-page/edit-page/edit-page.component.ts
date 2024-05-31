import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';
import { LanguageService } from 'src/app/shared/services/language.service';
import { SystemRequirementsService } from 'src/app/shared/services/system-requirements.service';

@Component({
  selector: 'app-edit-page',
  templateUrl: './edit-page.component.html',
  styleUrls: ['./edit-page.component.scss'],
})
export class EditPageComponent {
  routeId!: number; //id del gioco
  game!: any; //show del gioco
  systemRequirements!: any; //requisiti di sistema del gioco
  gameForm!: FormGroup; //formGroup che mi serve per le modali delle modiche del gioco
  languages!: any; //lingue supportate dal gioco

  constructor(
    public route: ActivatedRoute, //libreria di angular
    public gameService: GameService, //servizio dei giochi
    private formBuilder: FormBuilder, //libreria di angular
    public router: Router, //libreria di angular
    public languageService: LanguageService, //servizio delle lingue
    public systemService: SystemRequirementsService, //servizio dei requisiti di sistema
  ) {}

  ngOnInit() {
    this.routeId = this.route.snapshot.params['id']; //estrazione dell'id del gioco

    //le get per visualizzare le varie informazioni
    this.showGame();
    this.showGameLanguages();
    this.showSystemRequirements();

    //formGroup per le modali degli edit del gioco
    this.gameForm = this.formBuilder.group({
      name: '',
      base_price: 0,
      discounted_price: 0,
      discounted_percentage: 0,
      short_description: ['', Validators.minLength(120)],
      long_description: '',
    });
  }

  //get della show del gioco
  showGame() {
    this.gameService.showGame(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.game = res;

          //assegnazione dei valori del formGroup con i valori in quel momento presenti nel db
          this.gameForm.patchValue({
            name: this.game.game.name,
            base_price: this.game.game.base_price > 0 ? this.game.game.base_price : 0,
            discounted_price: this.game.game.discounted_price > 0 ? this.game.game.discounted_price : 0,
            discounted_percentage: this.game.game.discounted_percentage > 0 ? this.game.game.discounted_percentage : 0,
            short_description: this.game.game.short_description,
            long_description: this.game.game.long_description,
          })
        }
      },
    });
  }

  //get della show delle lingue
  showGameLanguages() {
    this.languageService.showGameLanguages(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.languages = res.games_languages;
        }
      },
    });
  }

  //get della show dei requisiti di sistema
  showSystemRequirements() {
    this.systemService.showSystemRequirements(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.systemRequirements = res;
        }
      },
    });
  }

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
