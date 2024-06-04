import { Component, Input } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';
import { EditPageComponent } from '../edit-page.component';

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
  firstFormGroup!: any;
  secondFormGroup!: any;
  isLinear!: boolean;
  selected = 'option1';

  constructor(public route: ActivatedRoute, public gameService: GameService, public editPage: EditPageComponent, public formBuilder: FormBuilder) {}

  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.firstFormGroup = this.formBuilder.group({
      firstCtrl: [''],
    });
    this.secondFormGroup = this.formBuilder.group({
      secondCtrl: [''],
    });
    this.isLinear = false;
  }

  updateGame() {
    this.gameService
      .updateGame(this.routeId, this.gameForm.value)
      .subscribe((res) => {
        console.log(res);
      });

      this.editPage.showGame()

      /* this.editPage.showGame() */
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
      pegi_id: this.game.game.pegi_id    
    });
  }

}
