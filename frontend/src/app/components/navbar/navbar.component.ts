import { Component, HostListener } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/services/auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss'],
})
export class NavbarComponent {
  [x: string]: any;
  token!: string;
  username!: string | null | undefined;
  role!: any;

  constructor(public authService: AuthService, public router: Router) {}

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

  ngOnInit(): void {
    // Sottoscrizione all'observable per aggiornare il nome utente quando lo stato di accesso cambia
    this.authService.loggedIn$.subscribe((loggedIn) => {
      if (loggedIn) {
        this.username = localStorage.getItem('user_profile_username');
      } else {
        this.username = null;
      }
    });



  }

  logout() {
    this.authService.doLogout();
  }

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
