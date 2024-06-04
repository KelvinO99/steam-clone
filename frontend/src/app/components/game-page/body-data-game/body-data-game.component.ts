import { LanguageService } from './../../../shared/services/language.service';
import { AuthService } from 'src/app/shared/services/auth.service';
import { Component, Input } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-body-data-game',
  templateUrl: './body-data-game.component.html',
  styleUrls: ['./body-data-game.component.scss']
})
export class BodyDataGameComponent {
  routeId!: number;
  @Input() game!: any;
  @Input() systemRequirements!: any;
  languages!: any;
  username!: any;
  role!: any;
  offset = 1;

  constructor(public route: ActivatedRoute, public languageService: LanguageService, public authService: AuthService, public router: Router){}


  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.showGameLanguages();

    this.authService.loggedIn$.subscribe((loggedIn) => {
      if (loggedIn) {
        this.username = localStorage.getItem('user_profile_username');
        this.role = localStorage.getItem('role');
      } else {
        this.username = null;
      }
    });
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

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }

}



