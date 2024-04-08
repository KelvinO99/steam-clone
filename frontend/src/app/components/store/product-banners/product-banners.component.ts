import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-product-banners',
  templateUrl: './product-banners.component.html',
  styleUrls: ['./product-banners.component.scss']
})
export class ProductBannersComponent {
  
  constructor(private router:Router) {
    
  }
}
