import { Component } from '@angular/core';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-category-carousel',
  templateUrl: './category-carousel.component.html',
  styleUrls: ['./category-carousel.component.scss']
})
export class CategoryCarouselComponent {

  category: boolean = false;
  genres: any;
  image: string[] = ['../../../assets/image/category/1-action.png','../../../assets/image/category/2-adventure.png'];

  constructor(public gameService: GameService) {
  }

  ngOnInit(){
    this.getGenres();
    console.log('ciao, sono init');
    
  }

  getGenres(){
    this.gameService.getGenres({category: this.category}).subscribe({
      next: (res: any) => {
        this.genres = res;
        console.log(this.genres);
      }
    })
  }

}
