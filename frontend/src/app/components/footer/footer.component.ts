import { Component, HostListener } from '@angular/core';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent {
  col_8!: string;
  col_2!: string;
  screenWidth = window.screen.width;

  constructor() {
    this.onResize()
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
    } else if (this.screenWidth >= 768 && this.screenWidth < 992) {
      this.col_8 = 'col-sm-8 p-0 m-0';
      this.col_2 = 'col-sm-2 p-0 m-0';
    } else if (this.screenWidth >= 992 && this.screenWidth < 1200) {
      this.col_8 = 'col-md-8 p-0 m-0';
      this.col_2 = 'col-md-2 p-0 m-0';
    } else if (this.screenWidth >= 1200) {
      this.col_8 = 'col-lg-8 p-0 m-0';
      this.col_2 = 'col-lg-2 p-0 m-0';
    }
  }
}
