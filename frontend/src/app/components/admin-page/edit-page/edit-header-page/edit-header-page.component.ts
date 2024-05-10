import { Component, Input } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-edit-header-page',
  templateUrl: './edit-header-page.component.html',
  styleUrls: ['./edit-header-page.component.scss'],
})
export class EditHeaderPageComponent {
  routeId!: number;
  @Input() game!: any;
  offset = 1;

  constructor(
    public route: ActivatedRoute,
    public gameService: GameService,
    public router: Router,
  ) {}

  ngOnInit() {}

  goTo(path: string) {
    this.router.navigate([path]);
    console.log(path);
  }
}
