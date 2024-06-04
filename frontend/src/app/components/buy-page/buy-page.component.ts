import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-buy-page',
  templateUrl: './buy-page.component.html',
  styleUrls: ['./buy-page.component.scss']
})
export class BuyPageComponent {
  
  constructor(public router: Router) { }
  

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }


}
