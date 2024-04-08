import { Component, Input } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-header-data-game',
  templateUrl: './header-data-game.component.html',
  styleUrls: ['./header-data-game.component.scss']
})
export class DataGameComponent {

  routeId!: number;
  @Input() game!: any;
  offset = 1;

  constructor(public route: ActivatedRoute, public gameService: GameService){}


  ngOnInit() {
  }

}
