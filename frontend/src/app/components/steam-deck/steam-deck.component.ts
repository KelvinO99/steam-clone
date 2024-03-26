import { AuthService } from 'src/app/shared/services/auth.service';
import { Component, HostListener } from '@angular/core';

@Component({
  selector: 'app-steam-deck',
  templateUrl: './steam-deck.component.html',
  styleUrls: ['./steam-deck.component.scss']
})
export class SteamDeckComponent {
  col_8!: string;
  col_2!: string;
  col_2_1!: string;
  col_12!: string;
  screenWidth = window.screen.width;

  constructor(public authService: AuthService) {
    this.onResize();
  }
  logout() {
    this.authService.doLogout();
  }

  @HostListener('window:resize', ['$event'])
  onResize(event?: undefined) {
    this.screenWidth = window.innerWidth;
    this.updateSize();
  }

  updateSize() {
    if (this.screenWidth < 768) {
      this.col_8 = 'col-xs-8 p-0 m-0';
      this.col_2 = 'col-xs-2 p-0 m-0';
      this.col_12 = 'col-xs-12 p-0 m-0';

    } else if (this.screenWidth >= 768 && this.screenWidth < 992) {
      this.col_8 = 'col-sm-8 p-0 m-0';
      this.col_2 = 'col-sm-2 p-0 m-0';
      this.col_12 = 'col-sm-12 p-0 m-0'

    } else if (this.screenWidth >= 992 && this.screenWidth < 1200) {
      this.col_8 = 'col-md-8 p-0 m-0';
      this.col_2 = 'col-md-2 p-0 m-0 d-flex justify-content-end';
      this.col_12 = 'col-md-12 p-0 m-0'

    } else if (this.screenWidth >= 1200) {
      this.col_8 = 'col-lg-8 p-0 m-0';
      this.col_2 = 'col-lg-2 p-0 m-0 d-flex justify-content-end';
      this.col_12 = 'col-lg-12 p-0 m-0'

    }
  }

}
