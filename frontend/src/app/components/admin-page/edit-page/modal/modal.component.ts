import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-modal',
  templateUrl: './modal.component.html',
  styleUrls: ['./modal.component.scss'],
})
export class ModalComponent {
  routeId!: number;
  game!: any;
  systemRequirements!: any;
  gameForm!: FormGroup;
  languages!: any;

  constructor(
    public route: ActivatedRoute,
    public gameService: GameService,
    private formBuilder: FormBuilder
  ) {}

  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.showGame();

    this.gameForm = this.formBuilder.group({
      name: this.game?.game.name,
      /*       is_dlc: 0,
      date: this.game?.game.date,
      base_price: this.game?.game.base_price,
      discounted_price: this.game?.game.discounted_price,
      discounted_percentage: this.game?.game.discounted_percentage,
      short_description: this.game?.game.short_description,
      long_description: this.game?.game.long_description,
      pegi_id: this.game?.game.pegi_id, */
    });
  }

  updateGame() {
    this.gameService
      .updateGame(this.routeId, this.gameForm.value)
      .subscribe((res) => {
        console.log(res);
      });
  }

  showGame() {
    this.gameService.showGame(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.game = res;
        }
      },
    });
  }
}
