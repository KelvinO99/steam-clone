import { Component, Input } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-header-cart',
  templateUrl: './header-cart.component.html',
  styleUrls: ['./header-cart.component.scss']
})
export class HeaderCartComponent {
  @Input() game!: any;

  constructor(public router: Router){}

  ngOnInit(){

  }
  
  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
