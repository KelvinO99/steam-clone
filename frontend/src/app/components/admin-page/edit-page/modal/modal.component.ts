import { Component, Input } from '@angular/core';
import { FormGroup } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

@Component({
  selector: 'app-modal',
  templateUrl: './modal.component.html',
  styleUrls: ['./modal.component.scss'],
})
export class ModalComponent {
  routeId!: number;
  @Input() game!: any;
  @Input() gameForm!: FormGroup;
  systemRequirements!: any;
  languages!: any;

  constructor(public route: ActivatedRoute, public gameService: GameService) {}

  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
  }

  updateGame() {
    this.gameService
      .updateGame(this.routeId, this.gameForm.value)
      .subscribe((res) => {
        console.log(res);

        this.game.game.name = this.gameForm.controls['name'].value;
        this.game.game.base_price = this.gameForm.controls['base_price'].value;
        this.game.game.discounted_price =
          this.gameForm.controls['discounted_price'].value;
        this.game.game.discounted_percentage =
          this.gameForm.controls['discounted_percentage'].value;
        this.game.game.short_description =
          this.gameForm.controls['short_description'].value;
        this.game.game.long_description =
          this.gameForm.controls['long_description'].value;
      });
  }

  close() {
    this.gameForm.patchValue({
      name: this.game.game.name,
      base_price: this.game.game.base_price > 0 ? this.game.game.base_price : 0,
      discounted_price:
        this.game.game.discounted_price > 0
          ? this.game.game.discounted_price
          : 0,
      discounted_percentage:
        this.game.game.discounted_percentage > 0
          ? this.game.game.discounted_percentage
          : 0,
      short_description: this.game.game.short_description,
      long_description: this.game.game.long_description,
    
    });
  }
}
