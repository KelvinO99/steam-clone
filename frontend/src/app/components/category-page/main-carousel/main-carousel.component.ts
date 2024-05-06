import { Component, Input } from '@angular/core';
import { Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-main-carousel',
  templateUrl: './main-carousel.component.html',
  styleUrls: ['./main-carousel.component.scss'],
})
export class MainCarouselComponent {
  @Input() genre: any;
  game: any;
  skip: number = 0;
  take: number = 5;
  itemsPerPage = 1;
  pages: number[] = [];
  currentIndex = 0;

  constructor(public gameService: GameService, public router: Router) {}

  ngOnInit() {
    this.getUpdatesAndOffers();
  }

  getUpdatesAndOffers() {
    this.gameService.getGames({skip: this.skip, take: this.take, tag: [this.genre] }).subscribe({
      next: (res: any) => {
        this.game = res.games;
        const pageCount = Math.ceil(this.game.length / this.itemsPerPage);
        this.pages = Array.from({ length: pageCount }, (_, i) => i + 1);
      },
    });
  }

  getCardsForPage(index: number): any[] {
    const start = index * this.itemsPerPage;
    const end = start + this.itemsPerPage;
    return this.game.slice(start, end);
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
