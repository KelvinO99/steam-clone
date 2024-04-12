import { Component } from '@angular/core';
import { Route, Router } from '@angular/router';
import { TagService } from 'src/app/shared/services/tag.service';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.scss']
})
export class SidebarComponent {

  skip: any = 0;
  take: any = 20;
  genre: any;

  constructor(public router: Router, public tagService: TagService){}

  ngOnInit() {
    this.getGenres();
  }

  getGenres() {
    this.tagService
      .getGenres({
        skip: this.skip,
        take: this.take,
        category: true,
      })
      .subscribe((res: any) => {
        this.genre = res.tags;
      });
  }

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
