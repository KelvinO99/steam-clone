import { animate } from '@angular/animations';
import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-reviews',
  templateUrl: './reviews.component.html',
  styleUrls: ['./reviews.component.scss']
})
export class ReviewsComponent {

  @Input() game!: any;

  constructor(){}

  ngOnInit() {
  }
}
