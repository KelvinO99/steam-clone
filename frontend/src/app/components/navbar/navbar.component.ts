import { ChangeDetectorRef, Component, EventEmitter, Output } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/services/auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss'],
})
export class NavbarComponent {
  token!: string;
  loggedIn! : boolean;
  username: string | null | undefined;

  constructor(public authService: AuthService, private router : Router) {
   /* if(router.url != 'login'){
    this.checkLoggedIn();
   }  */
  }

  language: string[] = [
    '繁體中文 (Traditional Chinese)',
    '日本語 (Japanese)',
    '한국어 (Korean)',
    'ไทย (Thai)',
    'Български (Bulgarian)',
    'Čeština (Czech)',
    'Dansk (Danish)',
    'Deutsch (German)',
    'Español - España (Spanish - Spain)',
    'Español - Latinoamérica (Spanish - Latin America)',
    'Ελληνικά (Greek)',
    'Français (French)',
    'Italiano (Italian)',
    'Bahasa Indonesia (Indonesian)',
    'Magyar (Hungarian)',
    'Nederlands (Dutch)',
    'Norsk (Norwegian)',
    'Polski (Polish)',
    'Português (Portuguese - Portugal)',
    'Português - Brasil (Portuguese - Brazil)',
    'Română (Romanian)',
    'Русский (Russian)',
    'Suomi (Finnish)',
    'Svenska (Swedish)',
    'Türkçe (Turkish)',
    'Tiếng Việt (Vietnamese)',
    'Українська (Ukrainian)',
  ];

/*   ngDoCheck() {
    // Controlla se l'utente è già loggato al caricamento della pagina
    this.checkLoggedIn();
  }

  checkLoggedIn() {
    let token = localStorage.getItem('access_token');
    if(token) { 
      this.loggedIn = true; 
      this.username = localStorage.getItem('user_profile_username');
    }
    else this.loggedIn = false;
    
    console.log(this.loggedIn);
  } */

  ngOnInit() {
    this.authService.loggedIn$.subscribe((loggedIn) => {
      this.loggedIn = loggedIn;
      if (loggedIn) {
        this.username = localStorage.getItem('user_profile_username');
      }
    });
  }

  logout() {
    // Rimuovi le informazioni di accesso dal localStorage e reimposta lo stato di accesso
    localStorage.removeItem('access_token');
    localStorage.removeItem('user_profile_obj');
    localStorage.removeItem('user_profile_username');
    this.loggedIn = false;
    this.username = null;
  }
  
  ngOnDestroy () {
    console.log();
    
  }

}
