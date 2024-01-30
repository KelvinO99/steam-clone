import { Component } from '@angular/core';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss'],
})
export class NavbarComponent {
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
authService: any;
}
