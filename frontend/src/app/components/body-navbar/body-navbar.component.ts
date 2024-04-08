import { TagService } from './../../shared/services/tag.service';
import { Component } from '@angular/core';

@Component({
  selector: 'app-body-navbar',
  templateUrl: './body-navbar.component.html',
  styleUrls: ['./body-navbar.component.scss']
})
export class BodyNavbarComponent {
  skip: number = 0;
  take: number = 50;
  tag!: any;

  constructor(public tagService: TagService) {}

  ngOnInit(){
    this.getGenres();
  }

  getGenres() {
    this.tagService
      .getGenres({
        skip: this.skip,
        take: this.take,
      })
      .subscribe((res: any) => {
        this.tag = res.tags;
      });
  }
  
}
