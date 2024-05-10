import { Component, Input } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { AuthService } from 'src/app/shared/services/auth.service';
import { LanguageService } from 'src/app/shared/services/language.service';

@Component({
  selector: 'app-edit-body-page',
  templateUrl: './edit-body-page.component.html',
  styleUrls: ['./edit-body-page.component.scss']
})
export class EditBodyPageComponent {
  routeId!: number;
  @Input() game!: any;
  @Input() systemRequirements!: any;
  languages!: any;
  offset = 1;

  constructor(public route: ActivatedRoute, public languageService: LanguageService, public authService: AuthService){}


  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.showGameLanguages();
  }
  
  showGameLanguages() {
    this.languageService.showGameLanguages(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.languages = res.games_languages
        }
      }
    })
  }
}
