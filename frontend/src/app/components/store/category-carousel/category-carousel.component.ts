import { TagService } from 'src/app/shared/services/tag.service';
import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-category-carousel',
  templateUrl: './category-carousel.component.html',
  styleUrls: ['./category-carousel.component.scss'],
})
export class CategoryCarouselComponent {
  category: boolean = false;
  skip: number = 0;
  take: number = 12;
  genres: any;
  itemsPerPage = 4;
  pages: number[] = [];
  currentIndex = 0;
  images: any[] = [
    '../../../../assets/image/category/action.png',
    '../../../../assets/image/category/adventure.png',
    '../../../../assets/image/category/strategy.png',
    '../../../../assets/image/category/rpg.png',
    '../../../../assets/image/category/simulation.png',
    '../../../../assets/image/category/strategy.png',
    '../../../../assets/image/category/open_world.png',
    '../../../../assets/image/category/horror.png',
    '../../../../assets/image/category/sci-fi.png',
    '../../../../assets/image/category/strategy.png',
    '../../../../assets/image/category/sports.png',
    '../../../../assets/image/category/racing.png',
  ];

  background: any = [
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(139, 0, 0)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(233, 140, 0)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(0, 139, 139)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(0, 100, 0)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(184, 134, 11)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(0, 0, 139)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(0, 0, 139)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(184, 134, 11)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(0, 100, 0)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(139, 0, 139)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(0, 100, 0)) 100%;",
    "background: linear-gradient(rgba(0, 0, 0, 0), rgb(0, 139, 139)) 100%;",
  ]

  constructor(public tagService: TagService, public router: Router) {}

  ngOnInit() {
    this.getGenres();
  }

  getGenres() {
    this.tagService
      .getGenres({
        skip: this.skip,
        take: this.take,
        category: true, // Imposta il flag a true
      })
      .subscribe((res: any) => {
        this.genres = res.tags;
        const pageCount = Math.ceil(this.genres.length / this.itemsPerPage);
        this.pages = Array.from({ length: pageCount }, (_, i) => i + 1);
        
      });
  }

  getCardsForPage(index: number): any[] {
    const start = index * this.itemsPerPage;
    const end = Math.min(start + this.itemsPerPage, this.genres.length);
    const indices = [];
    for (let i = start; i < end; i++) {
      indices.push(i);
    }
    return indices;
  }

  prevPage(): void {
    if (this.currentIndex > 0) {
      this.currentIndex--;
    }
  }

  nextPage(): void {
    if (this.currentIndex < this.pages.length - 1) {
      this.currentIndex++;
    }
  }

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
