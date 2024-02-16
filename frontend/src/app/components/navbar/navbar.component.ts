import { Component, HostListener } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/services/auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss'],
})
export class NavbarComponent {
  token!: string;
  username: string | null | undefined;
  size!: string;
  screenWidth = window.screen.width;

  constructor(public authService: AuthService) {
    this.onResize();
    /* this.size = "col-xl-8" */
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

  @HostListener('window:resize', ['$event'])
  onResize(event?: undefined) {
    this.screenWidth = window.innerWidth;
    this.updateSize();
  }

  updateSize() {
    if (this.screenWidth >= 1200) {
      this.size = 'col-8 p-0 m-0';
    } else if (this.screenWidth < 1200) {
      this.size = 'col-xl-8 p-0 m-0';
    }
  }

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
}
