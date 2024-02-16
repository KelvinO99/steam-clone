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
  username: string | null | undefined;
  col_8!: string;
  col_2!: string;
  justify_content!: string
  screenWidth = window.screen.width;

  constructor(public authService: AuthService, public router: Router) {
    this.onResize();
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
    if (this.screenWidth < 768) {
      this.col_8 = 'col-xs-8 p-0 m-0';
      this.col_2 = 'd-none';
      this.justify_content = 'row p-0 w-100 d-flex justify-content-start'

    } else if ((this.screenWidth >= 768) && (this.screenWidth < 992)) {
      this.col_8 = 'col-sm-8 p-0 m-0';
      this.col_2 = 'd-none';
      this.justify_content = 'row p-0 w-100 d-flex justify-content-start'
    }

    else if ((this.screenWidth >= 992) && (this.screenWidth < 1200)) {
      this.col_8 = 'col-md-8 p-0 m-0';
      this.col_2 = 'col-md-2 p-0 m-0';
      this.justify_content = 'row p-0 w-100 d-flex justify-content-center'

    }

    else if (this.screenWidth >= 1200) {
      this.col_8 = 'col-lg-8 p-0 m-0';
      this.col_2 = 'col-lg-2 p-0 m-0';
      this.justify_content = 'row p-0 w-100 d-flex justify-content-center'

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
