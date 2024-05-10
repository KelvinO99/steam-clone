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
  routeId!: number;
  game!: any;
  systemRequirements!: any;
  gameForm!: FormGroup;
  languages!: any;

  constructor(
    public route: ActivatedRoute,
    public gameService: GameService,
    private formBuilder: FormBuilder,
    public router: Router,
    public languageService: LanguageService,
    public systemService: SystemRequirementsService,
  ) {}

  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.showGame();
    this.showGameLanguages();
    this.showSystemRequirements();

    this.gameForm = this.formBuilder.group({
      name: this.game?.game.name,
      /*       is_dlc: 0,
      date: this.game?.game.date,
      base_price: this.game?.game.base_price,
      discounted_price: this.game?.game.discounted_price,
      discounted_percentage: this.game?.game.discounted_percentage,
      short_description: this.game?.game.short_description,
      long_description: this.game?.game.long_description,
      pegi_id: this.game?.game.pegi_id, */
    });
  }

  showGame() {
    this.gameService.showGame(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.game = res;
        }
      },
    });
  }

  showGameLanguages() {
    this.languageService.showGameLanguages(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.languages = res.games_languages;
        }
      },
    });
  }

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
